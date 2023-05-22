<?php

namespace App\Http\Controllers\Admin;


use App\Models\Stock;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicine = Medicine::create($request->all());
        // Create a new stock record for the medicine
        Stock::create([
            'medicine_id' => $medicine->id,
            'quantity' => $request->input('stock_quantity', 0),
            'total'=>$medicine->unit_price * $medicine->quantity
        ]);
        
        if(!empty($medicine)){
            return redirect()->route('medicines.index')->with('success' ,'Your Medicine has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStock(Request $request, $stockId)
{
    // Retrieve the stock record
    $stock = Stock::findOrFail($stockId);

    // Retrieve the associated medicine record
    $medicine = $stock->medicine;

    // Update the stock quantity (code omitted for brevity)

    // Calculate the updated total value
    $updatedTotal = $medicine->unit_price * $medicine->quantity;

    // Pass the updated total to the view
    if(!empty($medicine)){
        return redirect()->route('medicines.index',$updatedTotal)->with('success' ,'Your Medicine has been updated');
        }
        return redirect()->back()->withInput();
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
