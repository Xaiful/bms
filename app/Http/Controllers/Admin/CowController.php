<?php

namespace App\Http\Controllers\Admin;


use App\Models\Cow;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCowRequest;
use App\Http\Requests\UpdateCowRequest;

class CowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cows'] = Cow::get();
        return view('admin.cows.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCowRequest $request)
    {
        $data = [
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'weight'=>$request->weight,
            'color'=>$request->color,
            'importer'=>$request->importer,
        ];
        $cow = Cow::create($data);
        // dd($cow);
        if(!empty($cow)){
            return redirect()->route('cows.index')->with('success' ,'Your Cow has been added');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function show(Cow $cow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function edit(Cow $cow)
    {
        $data['cow'] = $cow;
        return view('admin.cows.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCowRequest  $request
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCowRequest $request, Cow $cow)
    {
        $data = $request->all();
        $cow->update($data);
        // dd($cow);
        if(!empty($cow)){
            return redirect()->route('cows.index')->with('success','Your cow has been successfully updated');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cow $cow)
    {
        $cow->medicines()->detach();
        // Delete the cow record
        $cow->delete();
        return redirect()->route('cows.index')->with('success','Your cow has been successfully deleted');
    }
}
