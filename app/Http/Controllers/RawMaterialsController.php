<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Subcategory;
use App\Models\RawMaterials;
use Illuminate\Http\Request;
use App\Models\RawMaterialsShop;
use App\Models\RawMaterialsStock;
use App\Http\Requests\StoreRawMaterialsRequest;
use App\Http\Requests\UpdateRawMaterialsRequest;

class RawMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
 
        $data['rawMaterialsShops'] = RawMaterialsShop::all();
        $data['rawmaterials'] = RawMaterials::get();
        return view('backend.rawmaterials.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $rawmaterial = RawMaterials::create($input);

        $rawmaterial->RawMaterialsStock()->create([
            'rawmaterial_id' => $rawmaterial->id,
            'quantity' => $rawmaterial->quantity,
            'unit_name' => $rawmaterial->unit->name,
            'unit_price' => $rawmaterial->unit_price,
            'memo_no' => $rawmaterial->memo_no,
            'total' => $rawmaterial->unit_price * $rawmaterial->quantity,
        ]);

        $selectedShopId = $request->input('rawmaterials.0.shop_id');
        $shop = RawMaterialsShop::find($selectedShopId);
        if ($shop) {
            $rawmaterial->rawMaterialShops()->attach($shop);
        }

        if (!empty($rawmaterial)) {
            return redirect()->route('rawmaterials.index')->with('success', 'Your Medicine has been added');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function saveAll(Request $request)
    {
        $rawmaterialsData = $request->input('rawmaterials');
        $now = now();

        foreach ($rawmaterialsData as $rawmaterialData) {
            $rawmaterial = RawMaterials::create($rawmaterialData);

            $selectedShopId = $rawmaterialData['shop_id'];
            $shop = RawMaterialsShop::find($selectedShopId);
            if ($shop) {
                $rawmaterial->rawMaterialShops()->attach($shop);
            }

            $shopOption = $request->input('shop_option');

            if ($shopOption === 'existing') {
                $selectedShopId = $request->input('shop_id');
                // Attach the selected shop to the raw material
            } elseif ($shopOption === 'new') {
                $rawMaterialsShop = RawMaterialsShop::create([
                    'shopeName'=>$request->input('shopeName'),
                    'address'=>$request->input('address'),
                    'phone'=>$request->input('phone'),
                ]);
                $rawmaterial->rawMaterialShops()->attach($rawMaterialsShop->id);
                // Create a new shop and attach it to the raw material
            }

            RawMaterialsStock::create([
                'rawmaterial_id' => $rawmaterial->id,
                'quantity' => $rawmaterial->quantity,
                'unit_id' => $rawmaterial->unit_id,
                'unit_price' => $rawmaterial->unit_price,
                'memo_no' => $rawmaterial->memo_no,
                'total' => $rawmaterial->unit_price * $rawmaterial->quantity,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        if (!empty($rawmaterial)) {
            return redirect()->route('rawmaterials.index')->with('success', 'Your Rawmaterials have been added');
        } else {
            return redirect()->back()->withInput();
        }
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
