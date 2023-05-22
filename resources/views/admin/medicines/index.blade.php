@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                   <div class="card">
                        <div class="card-header">
                            <h4>Medicine List
                            <a style="margin-right:5px" href="{{ route('medicines.create') }}" class="btn btn-sm btn-secondary float-right">Add Medicine</a>
                            </h4>
                        </div>
                        <div class="card-body">
                                                        <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Medicine</th>
                                            <th>Supplier</th>
                                            <th>Memo No</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                    $totalOfTotals = 0; // Initialize total of totals variable
                                @endphp
                                @foreach ($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->name }}</td>
                                        <td>{{ $medicine->suplier }}</td>
                                        <td>{{ $medicine->memo_no }}</td>
                                        <td>{{ $medicine->quantity }}</td>
                                        <td>{{ $medicine->unit_price }}</td>
                                        @php
                                            $total = $medicine->unit_price * $medicine->quantity;
                                            $totalOfTotals += $total; // Add the current total to the total of totals
                                        @endphp
                                        <td>{{ $total }}</td>
                                        <th>
                                            <a href="{{route ('medicines.edit',$medicine->id) }}" ><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{route ('medicines.stock',$medicine->id) }}" ><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{route ('medicines.destroy',$medicine->id) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="delete" style="border: 0ch ;background: transparent;" type="submit"><i style="color: red" class="fa-sharp fa-solid fa-trash"></i></button>
                                            </form>
                                        </th>
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
    <!-- Page Heading -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Cost of Medicine: {{ $totalOfTotals }}taka</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



