@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection
<?php $menu = 'Dashboard';
$submenu = ''; ?>
@section('content')
    {{-- Main Content Start --}}
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> Edit Category</h1>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('category.index') }}" class="btn btn-sm btn-secondary float-end">Category List</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                
                                <div class="mb-3">
                                    {{-- <input name="name" type="text" class="form-control" placeholder="Category Name" value="{{old ('name',$category->name) }}"> --}}
                                </div>
                                <div class="mb-3">
                                    <input name="title" type="text" class="form-control" placeholder="Post Title"value="{{old ('name',$post->title) }}">
                                    <p style="color: red">{{ $errors->first('title') }}</p>
                                </div>
                                
                                <div class="mb-3 ">
                                    {{-- <textarea name="" id="" cols="30" rows="10"> --}}
                                    <textarea name="description" type="text" class="form-control" placeholder="Product Description" value="{{old ('name',$post->description) }}"  rows="5">{{ $post->description }}</textarea>
                                    
                                    <p style="color: red">{{ $errors->first('description') }}</p>
                                    
                                </div>

                                <div class="mb-3">
                                        <input name="price" type="text" class="form-control" placeholder="Product Price"value="{{old ('name',$post->price) }}">
                                    <p style="color: red">{{ $errors->first('price') }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <input id="images"  name="images[]" type="file" class="form-control" multiple>
                                    <p style="color: red">{{ $errors->first('images') }}</p>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </div>
                                <div class="row" id="deleted-images">
                                    <div class="col">
                                        <div class="box">
                                            <div class="row recipe__instructions">
                                                <div class="my-3 min-w-lg-350">
                                                    <div>
                                                        @foreach ($post->images as $image )
                                                        <div class="img-wraps">
                                                            <img src="{{asset($image)}}" width="200" height="180" alt="Sheep" id="image" class="image mt-2 mr-2">
                                                            <span id="cross" class="cross cursor-pointer closes">
                                                                <i onclick="removeImage(this)" data-src="{{explode(env("APP_URL")."/",$image)[1]}}"
                                                                class="far fa-lg fa-fw me-2 fa-trash-alt text-theme" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

    