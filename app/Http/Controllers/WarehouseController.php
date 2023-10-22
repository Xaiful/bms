<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\RolesDevision;
use App\Models\WarehouseProduct;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class WarehouseController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:warehouses-list', ['only' => ['index','show']]);
         $this->middleware('permission:warehouses-warehouse', ['only' => ['index','show']]);
         $this->middleware('permission:view-warehouse', ['only' => ['show']]);
         $this->middleware('permission:warehouses-create', ['only' => ['create','store']]);
         $this->middleware('permission:warehouses-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:warehouses-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['warehouses'] = Warehouse::get();
        $data['warehouses'] = Warehouse::whereIn('id', function ($query) {
            $query->select('warehouse_id')
                ->from('roles_devisions')
                ->whereIn('user_id', [Auth::user()->id]);
                
        })->get();
        return view('backend.warehouses.index',$data);
    }
    
    public function warehouse()
    {
        $data['warehouses'] = Warehouse::get();
        return view('backend.warehouses.warehouse',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWarehouseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarehouseRequest $request)
    {
        $warehouse = Warehouse::create([
            'name'=>$request->name,
            'location'=>$request->location,
        ]);
        if(!empty($warehouse)){
            return redirect()->route('warehouses.index')->with('success' ,'Your Warehouse has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    
    // public function show(Warehouse $warehouse)
    // {   
        // $data['pivotData'] = WarehouseProduct::findOrFail($warehouse);
        // dd($data);
        // dd($data);
    //     $data['pivotDatas'] = WarehouseProduct::where('warehouse_id',$warehouse->id)->get();
    //     $data['warehouse'] = $warehouse;
    //     $data['products'] = Product::get();

    //     return view('backend.warehouses.show', $data);
    // }    


    // public function show($warehouse)
    // {   
    //     $warehouse_products = WarehouseProduct::where('warehouse_id',$warehouse)->get();
    //     return view('backend.warehouses.show2',compact('warehouse_products','warehouse'));
    // }

    public function show($warehouseId)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Check if the user has the 'WARE' role or if they have access to the specified warehouse
        if ($user->hasRole('WARE')) {
            $warehouse = Warehouse::find($warehouseId);

            // Check if the user has access to the specified warehouse by checking if it exists in RolesDevision
            $rolesDevision = RolesDevision::where('user_id', $user->id)
                ->where('warehouse_id', $warehouseId)
                ->first();

            if ($warehouse && $rolesDevision) {
                // If the user has the 'WARE' role or access to the warehouse, proceed to show it
                $data['warehouse'] = $warehouse;
                $data['warehouse_products'] = WarehouseProduct::where('warehouse_id', $warehouseId)->get();
                return view('backend.warehouses.show', $data);
            }
        } elseif ($user->hasRole(['Admin','SRD'])) {
            // If the user has the 'Admin' role, allow access to the warehouse
            $warehouse = Warehouse::find($warehouseId);
            if ($warehouse) {
                $data['warehouse'] = $warehouse;
                $data['warehouse_products'] = WarehouseProduct::where('warehouse_id', $warehouseId)->get();
                return view('backend.warehouses.show', $data);
            }
        }
        

        // If the user doesn't have the required role or access, redirect them or show an error message
        return redirect()->back()->with('error', 'Unauthorized access to this warehouse.');
    }




    public function update_quantity(Request $request, $warehouse)
    {   
        $input = $request->only('quantity', 'damage','status');

        $input['status'] = true;

        WarehouseProduct::where(['id' => $warehouse])->update($input);

        // $warehouse_product = WarehouseProduct::find($warehouse);
        // $warehouse_product->quantity = $request->quantity;
        // $warehouse_product->damage = $request->quantity;
        // $warehouse_product->status = '1';
        // $warehouse_product -> update();

        return redirect()->back();
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWarehouseRequest  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Warehouse $warehouse)
    {
    
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
