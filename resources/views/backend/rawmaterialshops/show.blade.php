@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-actions">
                
            </div>    
        </div>
    </div>
    <div class="card-body">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th>Shope Name</th>
                <th>Raw-Materials</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $totalOfTotals = 0; // Initialize total of totals variable
                @endphp
                <tr>
                   
                    <th>
                        {{ $rawMaterialsShop->shopeName }}
                    </th>
                    <th>
                        <ul>
                            @foreach($rawMaterialsShop->rawmaterials as $rawmaterial)
                                <li style="none">{{ $rawmaterial->name }}</li>
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach($rawMaterialsShop->rawmaterials as $rawmaterial)
                                <li>{{ $rawmaterial->quantity }}</li>
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach($rawMaterialsShop->rawmaterials as $rawmaterial)
                                <li>{{ $rawmaterial->unit->name }}</li>
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach($rawMaterialsShop->rawmaterials as $rawmaterial)
                                <li>{{ $rawmaterial->unit_price }}</li>
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                           
                            @foreach($rawMaterialsShop->rawmaterials as $rawmaterial)
                                <li>{{ $rawmaterial->unit_price * $rawmaterial->quantity }}</li>
                            @endforeach
                            
                        </ul>
                    </th>
                </tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                {{-- <th>
                    @php
                    $total = $rawmaterial->unit_price * $rawmaterial->quantity;
                    $totalOfTotals += $total; // Add the current total to the total of totals
                @endphp
                    {{ $totalOfTotals }}</th> --}}
                
            </tbody>
        </table>
    </div>
</div>
@endsection
