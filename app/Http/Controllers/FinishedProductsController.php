<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Packaging;
use App\Models\ProductStock;
use App\Models\RawMaterials;
use App\Models\FinishedProducts;
use App\Models\RawMaterialsStock;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFinishedProductsRequest;
use App\Http\Requests\UpdateFinishedProductsRequest;

class FinishedProductsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:finished-list', ['only' => ['index','show']]);
        //  $this->middleware('permission:products-send', ['only' => ['index','show']]);
         $this->middleware('permission:finished-create', ['only' => ['create','store']]);
         $this->middleware('permission:finished-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:finished-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['finishedProducts'] = FinishedProducts::get();
        return view('backend.finished.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::all();
        $data['packagings'] = Packaging::all();
        $data['units'] = Unit::get();
        return view('backend.finished.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFinishedProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreFinishedProductsRequest $request)
    {
        $finishedProduct = FinishedProducts::create([
            'product_id' => $request->input('product_id'),
            'packaging_id' => $request->input('packaging_id'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'unit_id' => $request->input('unit_id'),
        ]);
        
        // $packageQuantities = DB::table('single_package_rawmatrials')->select('raw_materials_id', 'quantity')->get();

        $singleQuantities = DB::table('single_package_rawmatrials')->select('raw_materials_id', 'quantity')->get();

        // Initialize an array to store the ratios
        foreach ($singleQuantities as $row) {
            $rawMaterialId = $row->raw_materials_id; // Ensure 'raw_material_id' is selected in your query
            $ratio = $row->quantity * $request->input('quantity');
            $ratios[$rawMaterialId] = $ratio;
            // dd($ratio);
        
            // Update raw materials quantity using Eloquent
            $rawMaterial = RawMaterials::find($rawMaterialId);
            $rawMaterialStock = RawMaterialsStock::find($rawMaterialId);
        
            if ($rawMaterial && $rawMaterialStock) {
                // Ensure the raw materials have enough quantity to decrement
                if ($rawMaterial->quantity >= $ratio && $rawMaterialStock->quantity >= $ratio) {
                    $rawMaterial->decrement('quantity', $ratio);
                    $rawMaterialStock->decrement('quantity', $ratio);
                } else {
                    // Handle insufficient quantity error here, for example:
                    // You can throw an exception, log the error, or take appropriate action.
                    // Example: throw new \Exception('Insufficient quantity');
                }
            }
            $quantityToSubtract = $request->input('quantity') * $request->input('packagings.size') - $request->input('quantity');

    // Update the Product and ProductStock tables
            $product = Product::find($request->input('product_id'));
            $productStock = ProductStock::find($request->input('product_id'));

            if ($product && $productStock) {
                // Ensure the Product and ProductStock have enough quantity to decrement
                if ($product->quantity >= $quantityToSubtract && $productStock->quantity >= $quantityToSubtract) {
                    $product->decrement('quantity', $quantityToSubtract);
                    $productStock->decrement('quantity', $quantityToSubtract);
                } else {
                    // Handle insufficient quantity error here, for example:
                    // You can throw an exception, log the error, or take appropriate action.
                    // Example: throw new \Exception('Insufficient quantity');
                }
            }

        }
    
        // Now $ratios contains the calculated ratios for each raw material
        // dd($ratios);
        
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinishedProducts  $finishedProducts
     * @return \Illuminate\Http\Response
     */
    public function show(FinishedProducts $finishedProducts)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinishedProducts  $finishedProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(FinishedProducts $finishedProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinishedProductsRequest  $request
     * @param  \App\Models\FinishedProducts  $finishedProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinishedProductsRequest $request, FinishedProducts $finishedProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinishedProducts  $finishedProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinishedProducts $finishedProducts)
    {
        //
    }
}
