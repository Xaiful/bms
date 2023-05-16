@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> Create SubCategory</h1>
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
                            <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4>SubCategory</h4>
                                <div class="mb-3 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="SubCategory Name">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="mb-3 form-group">
                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Main Content Start --}}
                
                