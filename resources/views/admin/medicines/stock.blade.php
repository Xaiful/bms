@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                   <div class="card">
                        <div class="card-header">
                            <h4>
                                {{-- @foreach ( $medicines as $medicine )
                                    
                                @endforeach --}}
                            {{-- <a href="{{ route('product.create') }}" class="btn btn-sm btn-secondary float-end">Create Product</a> --}}
                            <a style="margin-right:5px" href="{{ route('medicines.create') }}" class="btn btn-sm btn-secondary float-right">Add Medicine</a>
                            {{-- <a style="margin-right:5px" href="{{ route('post.create') }}" class="btn btn-sm btn-secondary float-right">Create Post</a> --}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Medicine</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicineStocks as $medicineStock)
                                        <tr>
                                            <td>{{ $medicineStock->medicine->name }}</td>
                                            <td>{{ $medicineStock->quantity }}</td>
                                            <td>{{ $updatedTotal }}</td>
                                            <td>
                                                {{-- <form method="POST" action="{{ route('medicines.stock.delete', $medicineStock->id) }}" onsubmit="return confirm('Are you sure you want to delete this stock record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
    

    {{-- <h2>Add New Stock:</h2>
    <form method="POST" action="{{ route('medicines.stock.add', $medicine->id) }}">
        @csrf

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required>

        <label for="expiration_date">Expiration Date:</label>
        <input type="date" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}" required>

        <button type="submit">Add</button>
    </form> --}}
@endsection
