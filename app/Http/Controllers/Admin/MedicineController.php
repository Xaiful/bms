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
        $data['subcategories'] = Subcategory::get();
        // $subcategories = Subcategory::pluck('name','id');
        return view('admin.medicines.create',$data);
        // return view('admin.medicines.create', ['subcategories' => $subcategories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicine = Medicine::create([
            'name'=>$request->input('name'),
            'quantity'=>$request->input('quantity'),
            'subcategory_id'=>$request->input('subcategory_id'),
            'suplier'=>$request->input('suplier'),
            'memo_no'=>$request->input('memo_no'),
            'unit_price'=>$request->input('unit_price'),
            'total'=>$request->input('total')

        ]);
        $medicine->stocks()->create([
            'quantity' => $medicine['quantity'],
            'total'=>$medicine->unit_price * $medicine->quantity
        ]);
        
        if(!empty($medicine)){
            return redirect()->route('medicines.index')->with('success' ,'Your Medicine has been added');
            }
            return redirect()->back()->withInput();
    }

    public function showStock(Medicine $medicine)
    {
        $data['medicineStocks'] = $medicine->stocks;
        $data['updatedTotal'] = $medicine->unit_price * $medicine->quantity;
        $data['medicines'] = Medicine::get();
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
    public function edit(Medicine $medicine)
    {
        $data['subcategories'] = Subcategory::all();
        $data['medicineStock'] = Stock::all();
        $data['medicine'] = $medicine;
        return view('admin.medicines.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatestock(Request $request,Medicine $medicine)
    {
        $data = $request->all();
        $medicine->update($data);
        $medicine->stocks()->update(['quantity' => $request->quantity]);
        $medicine->stocks()->update(['total' => $request->total]);

        if(!empty($medicine)){
            return redirect()->route('medicines.index')->with('success' ,'Your Medicine has been updated');
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
        $medicine = Medicine::find($id);
        if (!$medicine) {
            return redirect()->back()->with('error', 'Medicine not found.');
        }
        // Delete associated stock records
        $medicine->stocks()->delete();
        // $medicine->detach()->stocks();
        // Delete the medicine
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success','Your medicine has been successfully deleted');
    }

}
