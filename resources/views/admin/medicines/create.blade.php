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
                                    <select id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" required>
                                        <option value="">Select subCategory</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Medicine Name">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="mb-3 form-group">
                                    <input name="quantity" type="number" class="form-control" placeholder="quantity">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>

                                <div class="mb-3 form-group">
                                    <input name="suplier" type="text" class="form-control" placeholder="Suplier">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>

                                <div class="mb-3 form-group">
                                    <input name="memo_no" type="number" class="form-control" placeholder="Memo No">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="unit_price">Unit per taka</label> --}}
                                    <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" placeholder="Unit per taka">
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
                
                