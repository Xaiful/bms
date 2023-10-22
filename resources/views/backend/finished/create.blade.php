@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-header">Add Product</div>
    <div class="card-body">
        <form method="POST" action="{{ route('finished.store') }}">
            @csrf
            <div class="form-group">
                <select id="product_id" class="form-control @error('product_id') is-invalid @enderror" name="product_id" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected' : '' }}>{{ $product->singleProduct->name }}</option>
                    @endforeach
                </select>
                
                @error('single_product_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>

            <div class="form-group">
                <select id="packaging_id" class="form-control @error('packaging_id') is-invalid @enderror" name="packaging_id" required>
                    <option value="">Select Package</option>
                    @foreach($packagings as $packaging)
                        <option value="{{ $packaging->id }}" {{ old('packaging') == $packaging->id ? 'selected' : '' }}>{{ $packaging->name }}</option>
                    @endforeach
                </select>
                
                @error('packaging_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <select id="unit_id" class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" required>
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('district') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
                
                @error('unit_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Create Product</button>
        </form>
    </div>
</div>
@endsection    
