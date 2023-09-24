{{-- @extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="main-card mb-3 card">
        <div class="card-header">
            Warehouse:Product
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Warehouse</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Damage</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pivotDatas as $pivotData)
                        <tr>
                            <td>{{ $pivotData->id }}</td>
                            <td>{{ $pivotData->warehouse->name }}</td>
                            <td>{{ $pivotData->product->name }}</td>
                            <td>{{ $pivotData->quantity }}</td>
                            <td>{{ $pivotData->product->unit->name }}</td>
                            <td>{{ $pivotData->damage }}</td>
                            <td>{{ $pivotData->status }}</td>
                            <td>{{ $pivotData->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}

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
                        <th>ID</th>
                        <th>Warehouse</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Damage</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pivotDatas as $pivotData)
                        <tr>
                            <td>{{ $pivotData->id }}</td>
                            <td>{{ $pivotData->warehouse->name }}</td>
                            <td>{{ $pivotData->product->name }}</td>
                            <td>{{ $pivotData->quantity }}</td>
                            <td>{{ $pivotData->product->unit->name }}</td>
                            <td>{{ $pivotData->damage }}</td>
                            <td>{{ $pivotData->status }}</td>
                            <td>{{ $pivotData->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection