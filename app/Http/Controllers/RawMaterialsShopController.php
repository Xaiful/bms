<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\RawMaterials;
use Illuminate\Http\Request;
use App\Models\RawMaterialsShop;
use App\Http\Requests\UpdateRawMaterialsShopRequest;

class RawMaterialsShopController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:rawmaterialshops-list', ['only' => ['index','show']]);
         $this->middleware('permission:rawmaterialshops-create', ['only' => ['create','store']]);
         $this->middleware('permission:rawmaterialshops-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:rawmaterialshops-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rawMaterialsShops'] = RawMaterialsShop::get();
        return view('backend.rawmaterialshops.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.rawmaterialshops.create');

    }

    
    public function store(Request $request)
    {
        $rawMaterialsShop = RawMaterialsShop::create([
            'shopeName'=>$request->shopeName,
            'address'=>$request->address,
            'phone'=>$request->phone,
        ]);
        // dd($cow);

        if(!empty($rawMaterialsShop)){
            return redirect()->route('rawmaterialshops.index')->with('success' ,'Your RawMaterialsShop has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawMaterialsShop  $rawMaterialsShop
     * @return \Illuminate\Http\Response
     */
   

     public function show($rawMaterialsShop)
     {
         $data['rawMaterialsShop'] = RawMaterialsShop::findOrFail($rawMaterialsShop);
         $data['rawmaterials'] = RawMaterials::get();
         return view('backend.rawmaterialshops.show',$data);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawMaterialsShop  $rawMaterialsShop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['rawMaterialsShop'] = RawMaterialsShop::findOrFail($id);
        return view('backend.rawmaterialshops.edit',$data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawMaterialsShopRequest  $request
     * @param  \App\Models\RawMaterialsShop  $rawMaterialsShop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawMaterialsShopRequest $request, RawMaterialsShop $rawMaterialsShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawMaterialsShop  $rawMaterialsShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawMaterialsShop $rawMaterialsShop)
    {
        //
    }
}
