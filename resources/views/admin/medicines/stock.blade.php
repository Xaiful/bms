@extends('admin.layouts.app')

@section('content')
    {{-- <h1>Stock Management - {{ $medicine->name }}</h1> --}}

    <h2>Current Stock:</h2>
    <table>
        <thead>
            <tr>

                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicineStocks as $medicineStock)
                <tr>
                    <td>{{ $medicineStock->quantity }}</td>
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
