@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    <a class="btn btn-lg btn-transition btn btn-outline-success" href="{{route('warehouses.create')}}">
                        Create 
                    </a>
                </div>    
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Warehouse Name</th>
                        <th>Warehouse Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($warehouses as $warehouse)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            
                            <th>
                            <a href="{{ route('warehouse.list', $warehouse->id) }}"> {{ $warehouse->name }}</a>

                               
                            </th>
                            <td>
                                {{ $warehouse->location }}
                            </td>
                            <td>
                                <a class="mb-2 mr-2 btn-transition btn btn-outline-success" href="{{route('warehouses.edit',$warehouse->id)}}">Edit</a>
                                <a class="delete-row mb-2 mr-2 btn-transition btn btn-outline-danger" href="{{route('warehouses.destroy',$warehouse->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection