@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New RawMaterials Shop</h5>
        <form id="rawMaterialsShopsForm" class="col-md-10 mx-auto" method="post" action="{{route('rawmaterialshops.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Shope Name</label>
                <div>
                    <input type="text" class="form-control"name="shopeName" placeholder="Enter Your Shop" />
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <div>
                    <input type="text" class="form-control"name="address" placeholder="Enter Your Shop Address" />
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <div>
                    <input type="text" class="form-control"name="phone" placeholder="Enter Your ShopPhone" />
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
    $("#checkAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
</script>
@endpush