@extends('backend.layouts.app')

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Edit RawMaterials Shop</h5>
        <form id="rawMaterialsShopsForm" class="col-md-10 mx-auto" method="post" action="{{ route('rawmaterialshops.update', $rawMaterialsShop->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Shop Name</label>
                <div>
                    <input type="text" class="form-control" name="shopeName" value="{{ $rawMaterialsShop->shopeName }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="address">Shop Address</label>
                <div>
                    <input type="text" class="form-control" name="address" value="{{ $rawMaterialsShop->address }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Shop Phone</label>
                <div>
                    <input type="text" class="form-control" name="phone" value="{{ $rawMaterialsShop->phone }}" />
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
