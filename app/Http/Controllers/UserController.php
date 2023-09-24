<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Devision;
use App\Models\District;
use App\Models\RolesDevision;
use App\Models\SubDistrict;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['devisions'] = Devision::all();
        $data['districts'] = District::all();
        $data['subDistricts'] = SubDistrict::all();
        $data['warehouses'] = Warehouse::all();
        $data['areas'] = Area::pluck('name','id');
        // $data['users'] = User::all();
        $data['users'] = User::get();

        return view('backend.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['devisions'] = Devision::pluck('name','id');
        $data['districts'] = District::pluck('name','id');
        $data['subDistricts'] = SubDistrict::pluck('name','id');
        $data['areas'] = Area::pluck('name','id');
        $data['warehouses'] = Warehouse::pluck('name','id');
        $data['roles'] = Role::all();
        $data['permissions'] = Permission::all();
        return view('backend.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8'],
        'role' => ['required'], // Add validation rule for role
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);
    
   
    $role = Role::findByName($validatedData['role']);
    $user->assignRole($role);

    if ($role->name === 'RSM') {
        $user->devisions()->attach($request->input('devision_id'));
    } elseif ($role->name === 'ASM') {
        $user->districts()->attach($request->input('district_id'));
    } elseif ($role->name === 'SPO') {
        $user->subDistricts()->attach($request->input('sub_district_id'));
    } elseif ($role->name === 'ASPO') {
        $user->areas()->attach($request->input('area_id'));
    }elseif ($role->name === 'WARE') {
        $user->warehouses()->attach($request->input('warehouse_id'));
    }
    // dd($request->all());
    
    return redirect()->route('users.index')->with('success', 'User created successfully.');
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
        $data['user'] = User::where('id',$id)->first();
        $data['roles'] = Role::all();
        $data['devisions'] = Devision::get();
        $data['rolesDevision'] = RolesDevision::where('user_id',$id)->first();
        $data['districts'] = District::get();
        $data['subDistricts'] = SubDistrict::get();
        $data['warehouses'] = Warehouse::get();
        $data['areas'] = Area::get();
        $data['permissions'] = Permission::all();
        return view('backend.user.edit',$data);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $rolesDevision = RolesDevision::where('user_id',$id)->first();
        if ($rolesDevision) {
            // If the record exists, update its fields
            $rolesDevision->devision_id = $request->devision_id;
            $rolesDevision->district_id = $request->district_id;
            $rolesDevision->sub_district_id = $request->sub_district_id;
            $rolesDevision->area_id = $request->area_id;
            $rolesDevision->warehouse_id = $request->warehouse_id;
            $rolesDevision->update();
        } else {
            // If the record doesn't exist, create a new one
            $newRolesDevision = new RolesDevision();
            $newRolesDevision->user_id = $id;
            $newRolesDevision->devision_id = $request->devision_id;
            $newRolesDevision->district_id = $request->district_id;
            $newRolesDevision->sub_district_id = $request->sub_district_id;
            $newRolesDevision->area_id = $request->area_id;
            $newRolesDevision->warehouse_id = $request->warehouse_id;
            $newRolesDevision->save();
        }

        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        if($user->update()){
            if ($request->roles) {
                $user->roles()->detach();
                $user->assignRole($request->roles);
            }
            return redirect()->route("users.index");
        }
       
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->delete();
        if(!empty($user)){
            return back();
        }
        return back();
    }
}
