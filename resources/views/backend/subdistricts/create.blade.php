@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New SubDistrict</h5>
        <form  id="unitForm" action="{{ route('subdistricts.store')}}" class="col-md-10 mx-auto" method="POST" >
            @csrf
            <h4>Sub District</h4>
            <div class="mb-3 form-group">
                <input name="name" type="text" class="form-control" placeholder="Sub District Name">
                <p style="color: red">{{ $errors->first('name') }}</p>
            </div>
            <div class="mb-3 form-group">
                <select id="district_id" class="form-control @error('district_id') is-invalid @enderror" name="district_id" required>
                    <option value="">Select District</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}" {{ old('district') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                    @endforeach
                </select>
                
                @error('district_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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