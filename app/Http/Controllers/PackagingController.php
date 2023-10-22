<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Packaging;
use App\Http\Requests\StorePackagingRequest;
use App\Http\Requests\UpdatePackagingRequest;
use App\Models\RawMaterials;

class PackagingController extends Controller
{   
    function __construct()
    {
         $this->middleware('permission:packagings-list', ['only' => ['index','show']]);
         $this->middleware('permission:packagings-create', ['only' => ['create','store']]);
         $this->middleware('permission:packagings-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:packagings-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $data['packagings'] = Packaging::get();
        return view('backend.packagings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['units'] = Unit::get();
        $data['rawmaterials'] = RawMaterials::get();

        return view('backend.packagings.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackagingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackagingRequest $request)
    {
        $packaging = Packaging::create([
            'name'=>$request->name,
            'size'=>$request->size,
            'type'=>$request->type,
            'quantity'=>$request->quantity,
            'unit_id' => $request->input('unit_id'),

        ]);
        $rawMaterialQuantities = [];

        foreach ($request->input('raw_material_ids') as $rawMaterialId) {
            $quantityKey = 'quantity_' . $rawMaterialId;
            $rawMaterialQuantities[$rawMaterialId] = [
                'quantity' => $request->input($quantityKey),
            ];
           
            
        }

        $packaging->rawMaterials()->attach($rawMaterialQuantities);
        return redirect()->route('singleProducts.index')->with('success', 'Product Ratio created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function show(Packaging $packaging)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function edit(Packaging $packaging)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackagingRequest  $request
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackagingRequest $request, Packaging $packaging)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packaging $packaging)
    {
        //
    }
}
