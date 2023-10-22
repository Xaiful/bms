@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New Package</h5>
        <form method="POST" action="{{ route('packagings.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Package Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="size">Package Size</label>
                <input type="number" class="form-control" name="size" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>

            <div class="form-group">
                <select id="unit_id" class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" required>
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('district') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
                
                @error('unit_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Raw Materials:</label>
                <div id="raw-materials-list">
                    @foreach ($rawmaterials as $rawmaterial)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="raw_material_ids[]" value="{{ $rawmaterial->id }}">
                            <label class="form-check-label">{{ $rawmaterial->name }}</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" name="quantity_{{ $rawmaterial->id }}" id="quantity_{{ $rawmaterial->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Create Package</button>
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