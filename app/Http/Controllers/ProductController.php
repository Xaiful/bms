<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\ProductStock;
use App\Models\RawMaterials;
use App\Models\SingleProduct;
use App\Models\RawMaterialsShop;
use App\Models\RawMaterialsStock;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:products-list', ['only' => ['index','show']]);
        $this->middleware('permission:products-create', ['only' => ['create','store']]);
        $this->middleware('permission:products-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:products-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        $data['singleProducts'] = SingleProduct::pluck('id','name');
        $data['rawMaterials'] = RawMaterials::pluck('id','name');
        $data['units'] = Unit::get();
        return view('backend.products.index',$data);

    }

    public function send()
    {
        $data['products'] = Product::all();
        $data['warehouses'] = Warehouse::all();
       
        return view('backend.products.send',$data);
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
        $data['singleProducts'] = SingleProduct::get();
        return view('backend.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'single_product_id' => $request->input('single_product_id'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'unit_id' => $request->input('unit_id'),
        ]);
        
        ProductStock::create([
            'product_id' => $product->id,
            'quantity' => $product->quantity,
            'unit_id' => $product->unit_id,
        ]);

        $singleQuantities = DB::table('single_product_rawmaterials')->select('raw_materials_id', 'quantity')->get();

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

                    $rawMaterialStock->decrement('last_quantity', $ratio);
                    // dd($ratio);

                } else {
                   
                }
            }

        }
    
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function sendToWarehouse(Request $request)
    {
        $productIds = $request->input('product_ids'); // Ensure the input name matches
        $warehouseId = $request->input('warehouse');
        $quantity = $request->input('quantity');
        $status = $request->input('status');
    
        // Retrieve the products and warehouse
        $products = Product::find($productIds);
        $warehouse = Warehouse::find($warehouseId);
    
        $productQuantities = [];
    
        foreach ($productIds as $productId) {
            $quantityKey = 'quantity_' . $productId;
            $productQuantities[$productId] = [
                'quantity' => $request->input($quantityKey),
                // $sendId = Uuid::uuid4()->toString(),
            ];
            $product = Product::findOrFail($productId);
            $product->quantity -= $productQuantities[$productId]['quantity'];
            $product->save();
    
            // Update product stock quantity
            $productStock = ProductStock::where('product_id', $productId)->firstOrFail();
            $productStock->quantity -= $productQuantities[$productId]['quantity'];
            // $productStock->total = $productStock->unit_price * $productStock->quantity;
            $productStock->save();
    
            // Attach the product to the warehouse with the specified quantity
            $warehouse->products()->attach([
                $productId => ['quantity' => $productQuantities[$productId]['quantity']],
                // 'send_id' => $sendId,

            ]);
        }
    
        return redirect()->route('products.index')->with('success', 'Products sent to warehouse successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
