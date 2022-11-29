@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection
<?php $menu = 'Dashboard';
$submenu = ''; ?>
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Show Post</h1>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                {{-- <a href="{{ route('category.index') }}" class="btn btn-sm btn-secondary float-end">Category List</a> --}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                @foreach ($post->images as $image)
                                
                                <img src="{{ asset($image) }}"style="height: 200px; width: 150px;">

                                @endforeach
                            </div>
                            <h3>
                                {{ $post->title }}
                            </h3>
                            <div class="mb-3">
                                <h6>{{ $post->price }} Taka</h6>
                            </div>
                            
                            <div class="mb-3">
                                <p>{{ $post->description }}
                                    {{-- <textarea name="description" type="text" class="form-control" placeholder="Product Description"value="{{old ('name',$post->description) }}"></textarea> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
                   