<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;

class WarehouseProductController extends Controller
{   
    function __construct()
    {
         $this->middleware('permission:warehouseproduct-list', ['only' => ['index','show']]);
         $this->middleware('permission:warehouseproduct-create', ['only' => ['create','store']]);
         $this->middleware('permission:warehouseproduct-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:warehouseproduct-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        // Retrieve all warehouse products with their associated warehouses and products
        $pivotDatas = WarehouseProduct::with('warehouse', 'product')->get();
        // $units = Unit::get();

        return view('backend.warehouseproduct.index', compact('pivotDatas'));
    }
}
