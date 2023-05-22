<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cow;
use App\Models\Stock;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CowMedicineController extends Controller
{
    public function index()
{
    $data['cows'] = Cow::get();
    $data['medicines'] = Medicine::get();
    

    // $cows = Cow::with('medicines')->get();
    // $data = [];

    // foreach ($cows as $cow) {
    //     foreach ($cow->medicines as $medicine) {
    //         $quantity = $medicine->pivot->quantity;
    //         $data[] = [
    //             'cow_id' => $cow->id,
    //             'medicine_id' => $medicine->id,
    //             'quantity' => $quantity
    //         ];
    //     }
    // }

    return view('admin.cow-medicines.index',$data);
}

    public function create()
    {
    $data['cows'] = Cow::pluck('name','id');
    $data['medicines'] = Medicine::pluck('name','id');
    return view('admin.cow-medicines.create',$data);
    }

    public function store(Request $request)
    {   
        // $medicine = Medicine::get();
        $data = $request->validate([
            'cow_id' => 'required|integer',
            'medicine_id' => 'required|integer',
            'quantity' => 'required|integer',
            // 'total'=>$medicine->quantity * $medicine->unit_price,
        ]);
    
        $cow = Cow::findOrFail($data['cow_id']);
        $medicine = Medicine::findOrFail($data['medicine_id']);
        $quantity = $data['quantity'];
        // $taka = $data['taka'];
    
        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Quantity must be a positive number.');
        }
    
        $totalStockQuantity = $medicine->stocks()->sum('quantity');
    
        if ($quantity > $medicine->quantity || $quantity > $totalStockQuantity) {
            return redirect()->back()->with('error', 'Insufficient medicine or stock quantity.');
        }

        $medicine->decrement('quantity', $quantity);
        $stocks = $medicine->stocks()->orderBy('id')->get();
        foreach ($stocks as $stock) {
            if ($quantity <= $stock->quantity) {
                $stock->decrement('quantity', $quantity);
                $stock->refresh(); // Refresh the stock model to reflect the updated quantity
                break;
            } else {
                $quantity -= $stock->quantity;
                $stock->quantity = 0;
                $stock->save();
            }
        }
        $updatedTotal = $medicine->unit_price * ($medicine->quantity - $quantity);

    // Update the medicine's total amount
    $medicine->update(['total' => $updatedTotal]);

    // Attach medicine consumption record to the cow
    $cow->medicines()->attach($medicine->id, ['quantity' => $data['quantity']]);

    return redirect()->route('cow-medicines.index')->with('success', 'Cow medicine consumption recorded successfully.');
    }

    
   
}


        