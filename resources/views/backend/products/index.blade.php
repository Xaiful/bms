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
                
                <a style="margin-right:5px" href="{{ route('products.create') }}" class="btn btn-sm btn-primary float-right">Add Medicine</a>
                <a style="margin-right:5px" href="{{ route('products.send') }}" class="btn btn-sm btn-primary float-right">Warehouse</a>
                
            </div>
            <div class="card-body">

                <table id="example" class="table table-hover table-striped table-bordered responsive-table" >
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{$product->unit->name }}</td>
                                
                                <td>{{ $product->quantity }}</td>

                                {{-- <td><a href="{{route('rawmaterialshops.show')}}">{{ $rawmaterial->rawmaterialShops->shopeName }}</a></td> --}}
                                {{-- <td><a href="{{ route('rawmaterialshops.show', ['rawmaterialshop' => $rawmaterial->rawmaterialShops->id]) }}">{{ $rawmaterial->rawmaterialShops->shopeName }}</a></td> --}}
                                {{-- <th>
                                <a href="{{route ('rawmaterials.edit',$rawmaterial->id) }}" ><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('rawmaterials.destroy', ['rawmaterial' => $rawmaterial->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete" style="border: 0;background: transparent;">
                                            <i style="color: red" class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </th>  --}}
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