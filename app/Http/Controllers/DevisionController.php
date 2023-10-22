<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devision;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDevisionRequest;
use App\Http\Requests\UpdateDevisionRequest;

class DevisionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:devisions-list', ['only' => ['index','show']]);
         $this->middleware('permission:devisions-create', ['only' => ['create','store']]);
         $this->middleware('permission:devisions-districts', ['only' => ['showDevisionDistricts','show']]);
         $this->middleware('permission:devisions-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:devisions-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['devisions'] = Devision::get();
        $data['devisions'] = Devision::whereIn('id', function ($query) {
            $query->select('devision_id')
                ->from('roles_devisions')
                ->whereIn('user_id', [Auth::user()->id]);
                
        })->get();
        $data['user'] = Auth::user();
        return view('backend.devisions.index',$data);

    }

    public function devision()
    {
        $data['devisions'] = Devision::all();
        return view('backend.devisions.devisions',$data);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.devisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDevisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDevisionRequest $request)
    {
        $devision = Devision::create([
            'name'=>$request->name,
        ]);
        if(!empty($devision)){
            return redirect()->route('devisions.devisions')->with('success' ,'Your Devisions has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    
    public function show(Devision $devision)
    {
        //
    }

    public function showDevisionDistricts(Devision $devision)
    {   
        // $data['districts'] = Devision::whereIn('id', function ($query) {
        //     $query->select('devision_id')
        //         ->from('roles_devisions')
        //         ->where('user_id', Auth::user()->id); // Compare with the authenticated user's ID
        // })->get();
        $data['districts'] = $devision->districts()->get();

        // $data['users'] = User::all();
        return view('backend.devisions.districts',$data);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function edit(Devision $devision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevisionRequest  $request
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevisionRequest $request, Devision $devision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devision  $devision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devision $devision)
    {
        //
    }
}
