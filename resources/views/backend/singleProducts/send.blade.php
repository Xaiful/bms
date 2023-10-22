@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="main-card mb-3 card">
        <div class="card-header">Send Products to Warehouse</div>
        <div class="card-body">
            <form action="{{ route('products.sendToWarehouse') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Products:</label>
                    <div id="products-list">
                        @foreach ($products as $product)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="product_ids[]" value="{{ $product->id }}" id="product_{{ $product->id }}">
                                <label class="form-check-label" for="product_{{ $product->id }}">{{ $product->name }}</label>
                            </div>
                            <div class="form-group">
                                Quantity: <span id="displayed-quantity-{{ $product->id }}">{{ $product->quantity }}</span>
                                <input class="form-control" type="number" name="quantity_{{ $product->id }}" id="quantity_{{ $product->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="warehouse">Select Warehouse:</label>
                    <select name="warehouse" class="form-control">
                        @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Send to Warehouse</button>
            </form>
        </div>
    </div>
</div>
@endsection
