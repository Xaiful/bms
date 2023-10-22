@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4>SubCategory</h4>
            <div class="mb-3 form-group">
                <input name="name" type="text" class="form-control" placeholder="SubCategory Name">
                <p style="color: red">{{ $errors->first('name') }}</p>
            </div>
            <div class="mb-3 form-group">
                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-success">Save</button>
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