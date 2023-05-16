<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medicines'] = Medicine::get();
        return view('admin.medicines.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['categories'] = Category::get();
        $data['subcategories'] = Subcategory::pluck('name','id');
        return view('admin.medicines.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->subcategory_id = $request->subcategory_id;
        $medicine->quantity = $request->quantity;
        $medicine->save();

        $medicineStock = new Stock;
        $medicineStock->medicine_id = $medicine->id;
        $medicineStock->quantity = $request->quantity;

        $medicineStock->save();

        if(!empty($medicine)){
            return redirect()->route('medicines.index')->with('success' ,'Your Medicine has been added');
            }
            return redirect()->back()->withInput();
    }

    public function showStock(Medicine $medicine)
    {
        $data['medicineStocks'] = $medicine->stocks;
        $data['medicine'] = Medicine::get();
        return view('admin.medicines.stock',$data);
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
    public function update(Request $request, $id)
    {
        //
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
