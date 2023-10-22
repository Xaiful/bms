@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Edit Role</h5>
        <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{route('roles.update',$role->id)}}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="firstname">Role name</label>
                <div>
                    <input type="text" class="form-control" id="firstname" name="name" placeholder="Enter Your Role" value="{{$role->name}}" />
                </div>
            </div>
            <div class="form-group">
                <label for="firstname">Permissions</label>
                <div>
                @foreach($permissions as $permission)
                <div class="position-relative form-check">
                    <label class="form-check-label">
<input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}" {{$role->hasPermissionTo($permission->name) ? 'checked' : '' }}> {{$permission->name}}
                    </label>
                </div>
                @endforeach
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection