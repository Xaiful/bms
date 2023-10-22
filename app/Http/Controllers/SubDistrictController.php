<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSubDistrictRequest;
use App\Http\Requests\UpdateSubDistrictRequest;

class SubDistrictController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:subdistricts-list', ['only' => ['index','show']]);
         $this->middleware('permission:subdistricts-subdistricts', ['only' => ['index','show']]);
         $this->middleware('permission:subdistricts-create', ['only' => ['create','store']]);
         $this->middleware('permission:subdistricts-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subdistricts-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subdistricts'] = SubDistrict::whereIn('id', function ($query) {
            $query->select('sub_district_id')
                ->from('roles_devisions')
                ->whereIn('user_id', [Auth::user()->id]);
                
        })->get();
        
        $data['user'] = Auth::user();
        return view('backend.subdistricts.index', $data);
    }

    public function subdistrict()
    {
        $data['subdistricts'] = SubDistrict::all();
        return view('backend.subdistricts.subdistricts',$data);

    }

    // public function showArea(SubDistrict $subdistrict)
    // {
    //     $areas = $subdistrict->areas()->where('sub_district_id', $subdistrict->id)->get();
    //     $users = User::all();
    //     return view('backend.subdistricts.areas', compact('subdistrict', 'areas','users'));
    // }
    public function showArea(SubDistrict $subdistrict)
    {
        $areas = $subdistrict->areas()->where('sub_district_id', $subdistrict->id)->get();
        $data['areas'] = $subdistrict->areas()->where('id', function ($query) {
            $query->select('sub_district_id')
                ->from('roles_devisions')
                ->whereIn('user_id', [Auth::user()->id]);
                
        })->get();
        $users = User::all();
        // $area = Area::all();
        return view('backend.subdistricts.areas', compact('subdistrict', 'areas','users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['districts'] = District::get();
        return view('backend.subdistricts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubDistrictRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubDistrictRequest $request)
    {
        $subDistrict = SubDistrict::create([
            'name' => $request->input('name'),
            'district_id' => $request->input('district_id')
        ]);
    //dd($subcategory);
        if(!empty($subDistrict)){
            return redirect()->route('subdistricts.subdistricts')->with('success' ,'Your SubDistrict has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function show(SubDistrict $subDistrict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function edit(SubDistrict $subDistrict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubDistrictRequest  $request
     * @param  \App\Models\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubDistrictRequest $request, SubDistrict $subDistrict)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubDistrict  $subDistrict
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDistrict $subDistrict)
    {
        //
    }
}
