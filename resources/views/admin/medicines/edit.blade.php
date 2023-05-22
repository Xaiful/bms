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
                            <a href="{{ route('medicines.index') }}" class="btn btn-sm btn-secondary float-end">Medicine List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('medicines.update',$medicine->id) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <h6>Quantity</h6>
                                    <input name="quantity" type="number" class="form-control" placeholder="Quantity" value="{{old ('name',$medicine->quantity) }}">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6>Medicine</h6>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{old ('name',$medicine->name) }}">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>

                                <div class="mb-3">
                                    <h6>Subcategory</h6>
                                   <select id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" required>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $medicine->subcategory_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
    </div>
    <!-- Page Heading -->
    
</div>
@endsection