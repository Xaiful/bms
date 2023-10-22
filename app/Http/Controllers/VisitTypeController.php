<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\VisitType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitTypeRequest;
use App\Http\Requests\UpdateVisitTypeRequest;

class VisitTypeController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:visittypes-list', ['only' => ['index','show']]);
         $this->middleware('permission:visittypes-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:districts-subdistricts', ['only' => ['showDistrictsSubDistricts','show']]);
         $this->middleware('permission:visittypes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:visittypes-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['visitTypes'] = VisitType::get();
        return view('backend.visittypes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['areas'] = Area::get();
        return view('backend.visittypes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVisitTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visitType = VisitType::create([
            'type'=>$request->type,
            'name'=>$request->name,
            'owner'=>$request->owner,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'area_id' => $request->input('area_id')
        ]);
        // dd($cow);

        if(!empty($visitType)){
            return redirect()->route('visitTypes.index')->with('success' ,'Your area has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitType  $visitType
     * @return \Illuminate\Http\Response
     */
    public function show(VisitType $visitType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitType  $visitType
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitType $visitType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisitTypeRequest  $request
     * @param  \App\Models\VisitType  $visitType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitTypeRequest $request, VisitType $visitType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitType  $visitType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitType $visitType)
    {
        //
    }
}
