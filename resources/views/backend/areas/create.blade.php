@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New Area</h5>
        
            <table style="width: 100%;" id="example" class="table table-bordered">
                <form id="unitForm" class="col-md-10 mx-auto" method="post" action="{{route('areas.store')}}">
                    @csrf
                <tr>
                    <th><label for="name">Area Name</label>
                        <input name="name" class="excel-input" type="text" placeholder="Enter Your Area Name"></th>
                    <th>
                    <th><label for="name">Area Start</label>
                        <input name="start" class="excel-input" type="text" placeholder="Enter Your Start Point"></th>
                    <th>
                    <th><label for="name">Area End</label>
                        <input name="end" class="excel-input" type="text" placeholder="Enter Your End Point"></th>
                    <th>
                        <select id="sub_district_id" class="excel-input @error('sub_district_id') is-invalid @enderror" name="sub_district_id" required>
                            <option value="">SubDistrict</option>
                            @foreach($subDistricts as $subDistrict)
                                <option value="{{ $subDistrict->id }}" {{ old('devision') == $subDistrict->id ? 'selected' : '' }}>{{ $subDistrict->name }}</option>
                            @endforeach
                        </select>
                        
                        @error('devision_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </th>
                    <th>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>

                    </th>
                </tr>
                
            </form>
            </table>
            
    </div>
</div>
<style>
    .excel-input {
        border: 0 solid #ccc ;
        border-bottom: 1px solid #ccc ;
        width: 100%;
        padding: 4px;
        font-size: 14px;
        /* outline: none; */
    }

    .excel-input:focus {
        border: 1px solid #007bff;
    }
</style>
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