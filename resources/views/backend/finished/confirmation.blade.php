@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h2>Confirm and Edit Products Before Sending to Warehouse</h2>
    
    <form action="{{ route('products.confirmSend') }}" method="POST">
        @csrf
        <div class="form-group">
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if ($product->warehouses && !$product->warehouses->isEmpty())
                            {{ $product->warehouses->first()->pivot->quantity }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($product->warehouses && !$product->warehouses->isEmpty())
                            {{ $product->warehouses->first()->pivot->status }}
                        @else
                            Pending
                        @endif
                    </td>
                    <td>
                        <!-- Edit quantity form -->
                        <form action="{{ route('products.editQuantity', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            @foreach ($products as $product)
                                <input type="number" name="quantity" value="{{ $product->warehouses->first()->pivot->quantity ?? '' }}">
                            @endforeach
                            <button type="submit">Update Quantity</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        
        {{-- <button type="submit" class="btn btn-primary">Confirm and Send to Warehouse</button> --}}
    </form>
    
</div>
@endsection
