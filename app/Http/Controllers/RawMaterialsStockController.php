<?php

namespace App\Http\Controllers;

use App\Models\RawMaterials;
use Illuminate\Http\Request;
use App\Models\RawMaterialsStock;
use App\Http\Requests\StoreRawMaterialsStockRequest;
use App\Http\Requests\UpdateRawMaterialsStockRequest;

class RawMaterialsStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rawmaterial = RawMaterials::create($request->all());
        // $rawmaterialsData = $request->input('rawmaterials');

        // Create a new stock record for the medicine
        $rawmaterial =  RawMaterialsStock::create([
            'rawmaterial_id' => $rawmaterial->id,
            'quantity' => $rawmaterial->quantity,
            'unit_id' => $rawmaterial->unit->name,
            'unit_price' => $rawmaterial->unit_price,
            'memo_no' => $rawmaterial->memo_no,
            'total'=>$rawmaterial->unit_price * $rawmaterial->quantity
        ]);
        
        if(!empty($rawmaterial)){
            return redirect()->route('medicines.index')->with('success' ,'Your Medicine has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawMaterialsStock  $rawMaterialsStock
     * @return \Illuminate\Http\Response
     */
    public function show(RawMaterialsStock $rawMaterialsStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawMaterialsStock  $rawMaterialsStock
     * @return \Illuminate\Http\Response
     */
    public function edit(RawMaterialsStock $rawMaterialsStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawMaterialsStockRequest  $request
     * @param  \App\Models\RawMaterialsStock  $rawMaterialsStock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRawMaterialsStockRequest $request, RawMaterialsStock $rawMaterialsStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawMaterialsStock  $rawMaterialsStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawMaterialsStock $rawMaterialsStock)
    {
        //
    }
}
