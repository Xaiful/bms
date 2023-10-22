@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
       
        
        
            <div class="card-header">
            
            <br>
            <br>
                
                <a style="margin-right:5px" href="{{ route('finished.create') }}" class="btn btn-sm btn-primary float-right">Add Finished Goods</a>
                <a style="margin-right:5px" href="{{ route('products.send') }}" class="btn btn-sm btn-primary float-right">Warehouse</a>
                
            </div>
            <div class="card-body">

                <table id="example" class="table table-hover table-bordered responsive-table" >
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($finishedProducts as $finished)
                            <tr>
                                <td>{{ $finished->product->singleProduct->name }}</td>
                                <td>{{ $finished->unit->name }}</td>
                                <td>{{ $finished->quantity }}</td>
                                {{-- <td>{{ $product->description }}</td>
                                <td>{{ $product->unit->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @foreach ($product->singleProduct->rawMaterials as $rawMaterial)
                                        <ul>
                                            <li>{{ $rawMaterial->name }}</li>
                                            <li>{{ $rawMaterial->unit_price }}</li>
                                            <li>{{ $rawMaterial->pivot->quantity }} {{ $rawMaterial->unit->name }}</li>
                                            <li style="list-style:none;">------------</li>
                                            <li>Raw cost: {{ $rawMaterial->pivot->quantity * $rawMaterial->unit_price * $product->quantity }}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td></td>
                                <td>
                                    @php
                                        $totalRawMaterialCost = 0; // Initialize the total cost for this product
                                    @endphp

                                    @foreach ($product->singleProduct->rawMaterials as $rawMaterial)
                                        @php
                                            $totalRawMaterialCost += ($rawMaterial->pivot->quantity * $rawMaterial->unit_price);
                                        @endphp
                                    @endforeach

                                    Total: {{ $totalRawMaterialCost * $product->quantity }}
                                </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
      
        </div>
    </div>
@endsection