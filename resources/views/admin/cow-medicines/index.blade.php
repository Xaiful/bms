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
                            Feeding List
                            <a href="{{ route('cow-medicines.create') }}" class="btn btn-sm btn-secondary float-right">Create Feedings</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cow Name</th>
                                    <th>Medicine Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0; // Initialize total price variable
                                @endphp
                                @foreach ($cows as $cow)
                                    @foreach ($cow->medicines as $medicine)
                                        <tr>
                                            <td>{{ $cow->name }}</td>
                                            <td>{{ $medicine->name }}</td>
                                            <td>{{ $medicine->pivot->quantity }}</td>
                                            @php
                                                $price = $medicine->pivot->quantity * $medicine->unit_price;
                                                $totalPrice += $price; // Add the current price to the total
                                            @endphp
                                            <td>{{ $price }}</td>
                                            <td>{{ $medicine->pivot->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                {{-- {{ $totalRows}} --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Price: ${{ $totalPrice }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
