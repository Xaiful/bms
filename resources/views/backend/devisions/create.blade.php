@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New Devision</h5>
        <form  id="unitForm" action="{{ route('devisions.store')}}" class="col-md-10 mx-auto" method="POST" >
            @csrf
            <div class="form-group">
                <label for="firstname">Devision name</label>
                <div>
                    <input type="text" class="form-control"name="name" placeholder="Enter Your Devision" />
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