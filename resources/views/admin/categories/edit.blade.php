@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"> Edit Category</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary float-end">Category List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <h4>Category</h4>
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Category Name" value="{{old ('name',$category->name) }}">
                                <p style="color: red">{{ $errors->first('name') }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Heading -->
    
</div>
@endsection