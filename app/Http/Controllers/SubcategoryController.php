<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:subcategories-list', ['only' => ['index','show']]);
         $this->middleware('permission:subcategories-create', ['only' => ['create','store']]);
         $this->middleware('permission:subcategories-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subcategories-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories'] = Subcategory::get();
        return view('backend.subcategories.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $data['categories'] = Category::get();
        return view('backend.subcategories.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $subcategory = Subcategory::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id')
        ]);
    //dd($subcategory);
        if(!empty($subcategory)){
            return redirect()->route('subcategories.index')->with('success' ,'Your SubCategories has been added');
            }
            return redirect()->back()->withInput();
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
    public function edit(Subcategory $subcategory)
    {
        $data['subcategory'] = $subcategory;
        $data['categories'] = Category::all();
        return view('backend.subcategories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Subcategory $subcategory)
    {
        $subcategory->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id')
        ]);
    
        if(!empty($subcategory)){
            return redirect()->route('subcategories.index')->with('success' ,'Your SubCategories has been updated');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success','Your SubCategory has been successfully deleted');
    }
}
