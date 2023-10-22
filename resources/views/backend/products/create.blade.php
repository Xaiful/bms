@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-header">Add Product</div>
    <div class="card-body">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <select id="single_product_id" class="form-control @error('single_product_id') is-invalid @enderror" name="single_product_id" required>
                    <option value="">Select Product</option>
                    @foreach($singleProducts as $unit)
                        <option value="{{ $unit->id }}" {{ old('district') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
                
                @error('single_product_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" required>
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
