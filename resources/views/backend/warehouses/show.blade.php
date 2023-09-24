@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            {{-- {{ $warehouse->name}} --}}
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Damage</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warehouse_products as $product)
                    <form action="{{ route('warehouse.updateQuantity',$product->id) }}" method="post"> @csrf @method('put')
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product->name }}</td>
                        <td>
                            <input type="number" name="quantity" value="{{ $product->quantity }}" {{ $product->status ? 'disabled' : '' }}>
                        </td>
                        <td>
                            <input type="number" name="damage" value="{{ $product->damage }}" {{ $product->status ? 'disabled' : '' }}>
                        </td>
                        
                        <td>
                            @if($product->status == 0)
                            <span style="color: red">pending</span>
                            @else
                            <span style="color: green">updated</span>
                            @endif
                        </td>
                        <td>{{ $product->created_at }}</td>
                        <td class="text-center">
                            @if($product->status == 0)
                            <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                            @endif
                        </td>
                    </tr>
                </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



{{-- 
@foreach($warehouse->products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        @php
            $pivotData = $product->pivot;
        @endphp
        <form action="{{ route('products.updateQuantity', ['warehouse' => $warehouse->id, 'product' => $product->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <td><input type="number" class="form-control" name="quantity" value="{{ old('quantity', $pivotData->quantity) }}"></td>
            <td><input type="number" class="form-control" name="damage" value="{{ old('damage', $pivotData->damage) }}"></td>
            <td>{{ $pivotData->status }}</td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>    
        </form>
    </tr>
@endforeach --}}