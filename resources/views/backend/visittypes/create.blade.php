@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New Visit Type</h5>
        <form id="unitForm" class="col-md-10 mx-auto" method="post" action="{{route('visitTypes.store')}}">
            @csrf
            <div class="form-group">
                <label for="firstname">Type</label>
                <div>
                    <input type="text" class="form-control" name="type"  />
                </div>
            </div>            
            <div class="form-group">
                <label for="firstname">Name </label>
                <div>
                    <input type="text" class="form-control" name="name"  />
                </div>
            </div>
            <div class="form-group">
                <label for="firstname">Owner</label>
                <div>
                    <input type="text" class="form-control" name="owner"  />
                </div>
            </div>
            <div class="form-group">
                <label for="firstname">Mobile</label>
                <div>
                    <input type="text" class="form-control" name="mobile"  />
                </div>
            </div>
            <div class="form-group">
                <label for="firstname">Address</label>
                <div>
                    <input type="text" class="form-control" name="address"  />
                </div>
            </div>
            <div class="form-group">
                <label for="firstname">Area</label>
                <div>
                    <select name="area_id" id="" class="form-control">
                        <option value="" hidden>Select</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
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