<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Subcategory;
use App\Models\RawMaterials;
use Illuminate\Http\Request;
use App\Models\RawMaterialsShop;
use App\Models\RawMaterialsStock;
use Illuminate\Support\Facades\DB;

class RawMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
 
        $data['rawmaterials'] = RawMaterials::get();
        $data['shops'] = RawMaterialsShop::get();
        $data['subcategories'] = Subcategory::get();
        $data['units'] = Unit::get();
        return view('backend.rawmaterials.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rawmaterials'] = RawMaterials::get();
        $data['shops'] = RawMaterialsShop::get();
        $data['subcategories'] = Subcategory::get();
        $data['units'] = Unit::get();
        return view('backend.rawmaterials.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rawMaterialName = $input['name'];
        $existingRawMaterial = RawMaterials::where('name', $rawMaterialName)->first();
        
        $rawmaterial = null; // Initialize $rawmaterial

        if ($existingRawMaterial) {
            // If a raw material with the same name exists, update its quantity
            $existingRawMaterial->update([
                'quantity' => $existingRawMaterial->quantity + $input['quantity'],
            ]);
            $rawmaterial = $existingRawMaterial; // Assign the existing raw material to $rawmaterial
        } else {
            // If no raw material with the same name exists, create a new one
            $rawmaterial = RawMaterials::create($input);
        }

        // Handle shop-related logic
        $shopOption = $request->input('shop_option');

        if ($shopOption === 'existing') {
            $selectedShopId = $request->input('shop_id');
            if ($rawmaterial && $selectedShopId) {
                $shop = RawMaterialsShop::find($selectedShopId);
                if ($shop) {
                    $rawmaterial->rawMaterialShops()->attach($shop, ['quantity' => $input['quantity']]);
                }
            }
        } elseif ($shopOption === 'new') {
            // Handle the case where a new shop is being created
            $newShop = RawMaterialsShop::create([
                'shopeName' => $request->input('shopeName'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
            ]);
            if ($rawmaterial && $newShop) {
                $rawmaterial->rawMaterialShops()->attach($newShop, ['quantity' => $input['quantity']]);
            }
        }

        if (!empty($rawmaterial) || !empty($existingRawMaterial)) {
          
            RawMaterialsStock::create([
                'rawmaterial_id' => $rawmaterial->id,
                'quantity' => $rawmaterial->quantity,
                'last_quantity' => $rawmaterial->quantity,
                'size' => $input['size'],
                'unit_id' => $input['unit_id'],
                'unit_price' => $input['unit_price'],
                'memo_no' => $input['memo_no'],
                'amount' => $input['unit_price'] * $rawmaterial['quantity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
            return redirect()->route('rawmaterials.index')->with('success', 'Your Medicine has been added');
        } else {
            return redirect()->back()->withInput();
        }
    }


    public function saveAll(Request $request)
    {
        $rawmaterialsData = $request->input('rawmaterials');
        $now = now();

        // Declare these variables before the loop
        $totalQuantities = []; // Associative array to store total quantities by ID

        foreach ($rawmaterialsData as $rawmaterialData) {
            $existingRawMaterial = RawMaterials::where('name', $rawmaterialData['name'])->first();
            
            // Initialize $rawmaterial
            $rawmaterial = null;

            if ($existingRawMaterial) {
                // If a raw material with the same name exists, update its quantity
                $existingRawMaterial->update([
                    'quantity' => $existingRawMaterial->quantity + $rawmaterialData['quantity'],
                ]);

                // Add the quantity to the totalQuantities array by the ID of the raw material
                $rawmaterialId = $existingRawMaterial->id;
                if (!isset($totalQuantities[$rawmaterialId])) {
                    $totalQuantities[$rawmaterialId] = 0;
                }
                $totalQuantities[$rawmaterialId] += $rawmaterialData['quantity'];

                // Assign the existing raw material to $rawmaterial
                $rawmaterial = $existingRawMaterial;
            } else {
                // If no raw material with the same name exists, create a new one
                $rawmaterial = RawMaterials::create($rawmaterialData);

                // Add the quantity to the totalQuantities array by the ID of the raw material
                $rawmaterialId = $rawmaterial->id;
                if (!isset($totalQuantities[$rawmaterialId])) {
                    $totalQuantities[$rawmaterialId] = 0;
                }
                $totalQuantities[$rawmaterialId] += $rawmaterialData['quantity'];
            }

            // Handle shop-related logic
            $shopOption = $request->input('shop_option');

            if ($shopOption === 'existing') {
                $selectedShopId = $rawmaterialData['shop_id'];
                if ($rawmaterial && $selectedShopId) {
                    $shop = RawMaterialsShop::find($selectedShopId);
                    if ($shop) {
                        $quantity = $rawmaterialData['quantity'];
                        $rawmaterial->rawMaterialShops()->attach($shop, ['quantity' => $quantity]);
                    }
                }
            } elseif ($shopOption === 'new') {
                // Handle the case where a new shop is being created
                $newShop = RawMaterialsShop::create([
                    'shopeName' => $request->input('shopeName'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                ]);
                if ($rawmaterial && $newShop) {
                    $quantity = $rawmaterialData['quantity'];
                    $rawmaterial->rawMaterialShops()->attach($newShop, ['quantity' => $quantity]);
                }
            }

            if ($rawmaterial) {
                $totalQuantity = RawMaterialsStock::where('rawmaterial_id', $rawmaterial->id)->sum('quantity');

                $lastQuantity = $totalQuantity + $rawmaterialData['quantity'];
                // Get the last processed stock entry, which will have the 'last_quantity'
                // $last_quantity = $totalQuantity + $rawmaterialData['quantity'] ;

                RawMaterialsStock::create([
                    'rawmaterial_id' => $rawmaterial->id,
                    'quantity' => $rawmaterialData['quantity'],
                    'last_quantity' => $lastQuantity,
                    'size' => $rawmaterialData['size'],
                    'unit_id' => $rawmaterialData['unit_id'],
                    'unit_price' => $rawmaterialData['unit_price'],
                    'memo_no' => $rawmaterialData['memo_no'],
                    'amount' => $rawmaterialData['unit_price'] * $rawmaterialData['quantity'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
        // dd($totalQuantity + $rawmaterialData['quantity']);
        // dd($lastQuantity);

        // $totalQuantitiesByRawMaterialId = RawMaterialsStock::selectRaw('rawmaterial_id, SUM(quantity) as total_quantity')->groupBy('rawmaterial_id')->get();
        return redirect()->route('rawmaterials.index')->with('success', 'Your Rawmaterials have been added');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawMaterials  $rawMaterials
     * @return \Illuminate\Http\Response
     */
    public function showRawmaterialShop(RawMaterials $rawMaterials)
    {
        $rawmaterials = $rawMaterials->rawmaterials;
        return view('backend.rawmaterialshops.show', compact('rawMaterials', 'rawmaterials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawMaterials  $rawMaterials
     * @return \Illuminate\Http\Response
     */
    public function edit(RawMaterials $rawMaterials)
    {
        {
            $data['subcategories'] = Subcategory::all();
            $data['rawmaterialsStock'] = RawMaterialsStock::all();
            $data['rawMaterials'] = $rawMaterials;
            return view('backend.rawmaterials.edit',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRawMaterialsRequest  $request
     * @param  \App\Models\RawMaterials  $rawMaterials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawMaterials $rawMaterials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawMaterials  $rawMaterials
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $rawmaterial = RawMaterials::find($id);
        if (!$rawmaterial) {
            return redirect()->back()->with('error', 'Rawmaterial not found.');
        }
        $rawmaterial->RawMaterialsStock()->delete();
        $rawmaterial->delete();
        return redirect()->route('medicines.index')->with('success','Your medicine has been successfully deleted');
    }
}






