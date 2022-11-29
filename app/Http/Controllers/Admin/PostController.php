<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::get();
        // dd($data);
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name','id');
 
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        // if($request->hasFile('imgs')){
        //     foreach($request->file('imgs') as $img){
        //         $pathName = Str::snake($request->get('title')).'.'.$img->getClientOriginalName();
        //         $path[] = Storage::putFileAs('images',$img, $pathName);
        //     }

        // }
        $path = [];
        if($request->hasFile("images")) {
            foreach($request->file('images') as $file) {
                // $pathName = Str::snake($request->get('title')).'.'.$file->getClientOriginalName();
                // $path[] = $file->store("images/post".$pathName);
                $path[] = $file->store("images/post");
            }
        }
        $storeData = [
            'title'=> $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'images' => $path,
        ];
        if (auth()->user()->is_admin == 1) {
            $storeData['status'] = 1;
        }
 
        $post = Post::create($storeData);
        
        if(!empty($post)){
            $post->categories()->attach($request->category_id);
            return redirect()->route('post.index')->with('success','Your post has been successfully created');
            }
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $data['post'] = $post;
        return view('admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['post'] = $post;
        return view('admin.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {   

        // if($request->hasFile('imgs')){
        //     if($post->imgs){
        //         Storage::delete($post->imgs);
        //     }
        //     $fileName = $request->file('imgs')->getClientOriginalName(0);
        //     $post->imgs = Storage::putFileAs('images',$request->file('imgs'), $fileName);
        // }
        $images = json_decode($post->getRawOriginal('images'), true);
        if($request->has('deleted_images') && count($request->get('deleted_images'))) {
            $files = $request->get('deleted_images');
            foreach($files as $file) {
                $deleteImages[] = substr($file, 8);
            }

            Storage::delete($deleteImages);
            $images = array_diff($images, $deleteImages);
        }

        if($request->hasFile('images')) {
            foreach($request->file('images') as $file) {
                $images[] = $file->store('images/post');
            }
        }
        $storeData = [
            'title'=> $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'images' => $images,


        ];
        // if (auth()->user()->is_admin != 1) {
        //     $post['status'] = 0;
        //     $post->update($storeData);
        //     return redirect()->route('post.index')->with('success','Your post has been Pending for Published');
        // }
        if (auth()->user()->is_admin == 1) {
            $post['status'] = 1;
            $post->update($storeData);
            return redirect()->route('post.index')->with('success','Your post has been successfully updated');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   if($post->images){
        Storage::delete($post->images);
    }
        $post->delete();
        return redirect()->route('post.index')->with('success','Your post has been successfully deleted');
    }

    public function status($id){
        $post = Post::where(['id'=>$id])->first();
        if($post->status== 0){
            Post::where(['id'=>$id])->update(['status'=>'1']);
            return redirect()->route('post.index')->with('success','Your post has been Pending for Published');
        }
        if($post->status== 1){
            Post::where(['id'=>$id])->update(['status'=>'0']);
        }
        return redirect()->route('post.index')->with('success','Your post has been Pending for Published');
    }
}