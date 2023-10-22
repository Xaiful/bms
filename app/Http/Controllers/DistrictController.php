<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Devision;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;

class DistrictController extends Controller
{   
    function __construct()
    {
         $this->middleware('permission:districts-list', ['only' => ['index','show']]);
         $this->middleware('permission:districts-create', ['only' => ['create','store']]);
         $this->middleware('permission:districts-subdistricts', ['only' => ['showDistrictsSubDistricts','show']]);
         $this->middleware('permission:districts-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:districts-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['districts'] = District::whereIn('id', function ($query) {
            $query->select('district_id')
                ->from('roles_devisions')
                ->whereIn('user_id', [Auth::user()->id]);
                
        })->get();
        
        $data['user'] = Auth::user();
        return view('backend.districts.index', $data);
    }


    public function district()
    {
        $data['districts'] = District::all();
        return view('backend.districts.districts',$data);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['devisions'] = Devision::get();
        return view('backend.districts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDistrictRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $district = District::create([
            'name' => $request->input('name'),
            'devision_id' => $request->input('devision_id')
        ]);
        // $district = District::find($districtId);
        // $devision = $district->devision;
    //dd($subcategory);
        if(!empty($district)){
            return redirect()->route('districts.districts')->with('success' ,'Your District has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function showSubDistrict(District $district)
    {
        $subdistricts = $district->subDistricts()->get();
        $users = User::all();
        // $area = Area::all();
        return view('backend.districts.subdistricts', compact('district', 'subdistricts','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDistrictRequest  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistrictRequest $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
