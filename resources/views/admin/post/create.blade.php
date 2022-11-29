
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
        <h1 class="h3 mb-4 text-gray-800"> Create Post</h1>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('post.index') }}" class="btn btn-sm btn-secondary float-end">Post List</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    
                                        <label value="">Select a Category</label><br>
                                        @foreach ($categories as $id => $value )
                                        <input type="checkbox" id="category_id" name="category_id[]" value="{{ $id }}">
                                        @isset($post) {{ $post->category->name ? "selected=true" : "" }} @endisset
                                            {{ $value }}
                                        @endforeach
                                    
                                    {{-- <select name="category_id" id="category_id">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $id => $value )
                                        <option value="{{ $id }}"
                                        @isset($post) {{ $post->category->name ? "selected=true" : "" }} @endisset>
                                            {{ $value }}
                                        </option>
                                        @endforeach
                                    </select> --}}
                                    <p style="color: red">{{ $errors->first('category_id') }}</p>
                                </div>
    
                                <h4>Post</h4>
                                <div class="mb-3">
                                    <input name="title" type="text" class="form-control" placeholder="Post Title">
                                    <p style="color: red">{{ $errors->first('title') }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    {{-- <label>Insert Category</label> --}}
                                    <textarea  name="description" type="text" class="form-control" placeholder="Product Description" row="5" col="200"></textarea> 
                                    {{-- <input name="description"> --}}
                                    <p style="color: red">{{ $errors->first('description') }}</p>
                                </div>

                                <div class="mb-3">
                                    <input name="price" type="number" class="form-control" placeholder="Product Price">
                                    <p style="color: red">{{ $errors->first('price') }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <input name="images[]" type="file" class="form-control"  multiple>
                                    <p style="color: red">{{ $errors->first('images') }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <button class="btn btn-sm btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
       