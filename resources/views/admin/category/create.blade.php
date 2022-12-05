@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> Create Category</h1>
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
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <h4>Category</h4>
                                <div class="mb-3 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Category Name">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
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
                
                