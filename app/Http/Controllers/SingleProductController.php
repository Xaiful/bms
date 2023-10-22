<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\RawMaterials;
use App\Models\SingleProduct;
use App\Models\RawMaterialsShop;
use App\Http\Requests\StoreSingleProductRequest;
use App\Http\Requests\UpdateSingleProductRequest;

class SingleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['singleProduct'] = SingleProduct::all();
        return view('backend.singleProducts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['rawmaterials'] = RawMaterials::all();
        $data['shops'] = RawMaterialsShop::all();
        $data['units'] = Unit::get();
        return view('backend.singleProducts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSingleProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSingleProductRequest $request)
    {
        $singleProduct = SingleProduct::create([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'unit_id' => $request->input('unit_id'),
        ]);
        $rawMaterialQuantities = [];

        foreach ($request->input('raw_material_ids') as $rawMaterialId) {
            $quantityKey = 'quantity_' . $rawMaterialId;
            $rawMaterialQuantities[$rawMaterialId] = [
                'quantity' => $request->input($quantityKey),
            ];
           
            
        }

        $singleProduct->rawMaterials()->attach($rawMaterialQuantities);
        return redirect()->route('singleProducts.index')->with('success', 'Product Ratio created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SingleProduct $singleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SingleProduct $singleProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSingleProductRequest  $request
     * @param  \App\Models\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSingleProductRequest $request, SingleProduct $singleProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SingleProduct  $singleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleProduct $singleProduct)
    {
        //
    }
}
