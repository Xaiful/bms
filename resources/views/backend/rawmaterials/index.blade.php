@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
       
        
        
            <div class="card-header">
            {{-- <form action="{{ route('medicinestock.report') }}" method="get">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Generate Report</button>
            </form>                --}}
            <br>
            <br>
                
                <a style="margin-right:5px" href="{{ route('rawmaterials.create') }}" class="btn btn-sm btn-primary float-right">Add Raw-Materials</a>
                
            </div>
            <div class="card-body">

                <table id="example" class="table table-hover table-striped table-bordered responsive-table" >
                    <thead>
                        <tr>
                            <th>Raw-Materilas</th>
                            <th>Memo No</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Shop</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalOfTotals = 0; // Initialize total of totals variable
                        @endphp
                        @foreach ($rawmaterials as $rawmaterial)
                            <tr>
                                <td>{{ $rawmaterial->name }}</td>
                                <td>{{ $rawmaterial->memo_no }}</td>
                                <td>{{ $rawmaterial->quantity }}</td>
                                <td>{{ $rawmaterial->unit->name }}</td>
                                <td>{{ $rawmaterial->unit_price }}</td>
                                <td>
                                  @foreach($rawmaterial->rawmaterialShops as $rawmaterialShop)
                                    {{ $rawmaterialShop->shopeName }}
                                  @endforeach
                                    <a href="{{ route('rawmaterialShop.list', $rawmaterial) }}">{{ $rawmaterial->shopeName }}</a>
                                </td>
                                @php
                                    $total = $rawmaterial->unit_price * $rawmaterial->quantity;
                                    $totalOfTotals += $total; // Add the current total to the total of totals
                                @endphp
                                <td>{{ $total }}</td>
                                <td>{{ $rawmaterial->created_at->format('d-M-y') }}</td>
                                <th>
                                <a href="{{route ('rawmaterials.edit',$rawmaterial->id) }}" ><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('rawmaterials.destroy', ['rawmaterial' => $rawmaterial->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete" style="border: 0;background: transparent;">
                                            <i style="color: red" class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </th> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
           
               
            <!-- Page Heading -->
            {{-- <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Total Cost of Medicine: {{ $totalOfTotals }}taka</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection