@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{ route('subcategories.index') }}" class="btn btn-sm btn-secondary float-end">SubCategory List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcategories.update',$subcategory->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <h6>Category</h6>
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('actegory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <h6>SubCategory</h6>
                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old ('name',$subcategory->name) }}">
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