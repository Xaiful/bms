@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New Permission</h5>
        <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{route('permission.store')}}">
            @csrf
            <div class="form-group">
                <label for="firstname">Permission name</label>
                <div>
                    <input type="text" class="form-control" id="firstname" name="name" placeholder="Enter Your Permission" />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Permission Group</label>
                <div>
                    <input type="text" class="form-control" name="group_name" placeholder="Enter Permission Group" required />
                    @if ($errors->has('group_name'))
                        <span class="text-danger">{{ $errors->first('group_name') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection