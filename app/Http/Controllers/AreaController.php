<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\User;
use App\Models\VisitType;

class AreaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:areas-list', ['only' => ['index','show']]);
         $this->middleware('permission:areas-create', ['only' => ['create','store']]);
         $this->middleware('permission:areas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:areas-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['areas'] = Area::get();
        $data['users'] = User::get();
        // $data['areas'] = Area::whereIn('id', function ($query) {
        //     $query->select('area_id')
        //         ->from('roles_devisions')
        //         ->whereIn('user_id', [Auth::user()->id]);
                
        // })->get();
        return view('backend.areas.index', $data);
    }
    // public function showVisit(Area $area)
    // {
    //     // $data['areas'] = Area::findOrfail($id);
    //     $subDistricts = $district->subDistricts;
    //     $users = User::all();
    //     return view('backend.areas.areas',$data);

    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subDistricts'] = SubDistrict::get();
        return view('backend.areas.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = Area::create([
            'name'=>$request->name,
            'start'=>$request->start,
            'end'=>$request->end,
            'sub_district_id' => $request->input('sub_district_id')
        ]);
        // dd($cow);

        if(!empty($area)){
            return redirect()->route('areas.index')->with('success' ,'Your area has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $data['area'] = $area;
        return view('admin.areas.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaRequest  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $area->update([
            'name'=>$request->name,
        ]);
        // dd($area);
        if(!empty($area)){
            return redirect()->route('areas.index')->with('success' ,'Your area has been updated');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        if (!$area) {
            return redirect()->back()->with('error', 'area not found.');
        }
        // Delete associated stock records
        // $area->stocks()->delete();
        // $medicine->detach()->stocks();
        // Delete the medicine
        $area->delete();
        return redirect()->route('areas.index')->with('success','Your area has been successfully deleted');

    }
}
