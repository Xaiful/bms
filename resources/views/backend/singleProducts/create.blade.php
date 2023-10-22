{{-- @extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Product Ratio</h1>
        <form method="POST" action="{{ route('singleProducts.store') }}">
            @csrf
            <input name="name" type="text">
            <button type="submit" class="btn btn-primary">Create Product Ratio</button>
        </form>
    </div>
@endsection --}}
@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-header">Add Product</div>
    <div class="card-body">
        <form method="POST" action="{{ route('singleProducts.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" name="name" required>
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
            
            <div class="form-group">
                <label>Raw Materials:</label>
                <div id="raw-materials-list">
                    @foreach ($rawmaterials as $rawmaterial)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="raw_material_ids[]" value="{{ $rawmaterial->id }}">
                            <label class="form-check-label">{{ $rawmaterial->name }}</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" name="quantity_{{ $rawmaterial->id }}" id="quantity_{{ $rawmaterial->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Create Product</button>
        </form>
    </div>
</div>
<script>
    @foreach ($rawmaterials as $rawmaterial)
        var initialQuantity{{ $rawmaterial->id }} = {{ $rawmaterial->quantity }};
        var inputElement{{ $rawmaterial->id }} = document.getElementById('quantity_{{ $rawmaterial->id }}');
        var displayedQuantityElement{{ $rawmaterial->id }} = document.getElementById('displayed-quantity-{{ $rawmaterial->id }}');
        
        inputElement{{ $rawmaterial->id }}.addEventListener('input', function() {
            var enteredQuantity{{ $rawmaterial->id }} = parseFloat(inputElement{{ $rawmaterial->id }}.value);
            var remainingQuantity{{ $rawmaterial->id }} = initialQuantity{{ $rawmaterial->id }} - enteredQuantity{{ $rawmaterial->id }};
            displayedQuantityElement{{ $rawmaterial->id }}.textContent = remainingQuantity{{ $rawmaterial->id }} + ' {{ $rawmaterial->unit->name }}';
        });
    @endforeach
</script>

@endsection    
