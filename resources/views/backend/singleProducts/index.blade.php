@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
        <br>
        <div class="card-header">
            <a style="margin-right:5px" href="{{ route('singleProducts.create') }}" class="btn btn-sm btn-primary float-right">Add Product Ratio</a>
        </div>
            <div class="card-body">
                <table id="example" class="table table-hover  table-bordered responsive-table" >
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>RawMaterials</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($singleProduct as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            {{-- <td>{{ $product->description }}</td> --}}
                            <td>{{ $product->unit->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                @foreach ($product->rawMaterials as $rawMaterial)
                                    <ul>
                                        <li>{{ $rawMaterial->name }}</li>
                                        {{-- <li>{{ $rawMaterial->unit->name}}</li> --}}
                                        <li>{{ $rawMaterial->pivot->quantity }} {{ $rawMaterial->unit->name }}</li>
                                        <li style="list-style:none;">------------</li>
                                        <li>Raw cost: {{ $rawMaterial->pivot->quantity * $rawMaterial->unit_price }}</li>
                                    </ul>
                                @endforeach
                            </td>
                            <td></td>
                            <td>
                                @php
                                    $totalRawMaterialCost = 0; // Initialize the total cost for this product
                                @endphp

                                @foreach ($product->rawMaterials as $rawMaterial)
                                    @php
                                        $totalRawMaterialCost += ($rawMaterial->pivot->quantity * $rawMaterial->unit_price);
                                    @endphp
                                @endforeach

                                Total: {{ $totalRawMaterialCost }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection