@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> Add Medicine</h1>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('medicines.index') }}" class="btn btn-sm btn-secondary float-end">Medicine List</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4>Mddicine</h4>
                                <div class="mb-3 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Medicine Name">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="mb-3 form-group">
                                    <input name="quantity" type="number" class="form-control" placeholder="quantity">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                
                                <div class="mb-3 form-group">
                                    <select name="subcategory_id" id="subcategory_id">
                                        <option value="">Select a Category</option>
                                        @foreach ($subcategories as $id => $value )
                                        <option value="{{ $id }}"
                                        @isset($medicine) {{ $medicine->subcategory->name ? "selected=true" : "" }} @endisset>
                                            {{ $value }}
                                        </option>
                                        @endforeach
                                    </select>
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
                
                