@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    <a class="btn btn-lg btn-transition btn btn-outline-success" href="{{route('users.create')}}">
                        Create 
                    </a>
                </div>    
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Zone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                        @foreach ($user->roles as $role)
                            <span class="badge badge-info mr-1">
                                {{ $role->name }}
                            </span>
                        @endforeach
                        </td>
                        <td>
                            @foreach ($user->devisions as $devision)
                                <span class="badge badge-info mr-1">
                                    {{ $devision->name }}
                                </span>
                            @endforeach
                            @foreach ($user->districts as $district)
                                <span class="badge badge-info mr-1">
                                    {{ $district->name }}
                                </span>
                            @endforeach
                            @foreach ($user->subDistricts as $subDistrict)
                                <span class="badge badge-info mr-1">
                                    {{ $subDistrict->name }}
                                </span>
                            @endforeach
                            @foreach ($user->areas as $area)
                                <span class="badge badge-info mr-1">
                                    {{ $area->name }}
                                </span>
                            @endforeach
                            @foreach ($user->warehouses as $warehouse)
                                <span class="badge badge-info mr-1">
                                    {{ $warehouse->name }}
                                </span>
                            @endforeach
                        </td>
                        
                        <td>{{$user->email}}</td>
                        <td>
                            <a class="mb-2 mr-2 btn-transition btn btn-outline-success" href="{{route('users.edit',$user->id)}}">Edit</a>
                            <a class="delete-row mb-2 mr-2 btn-transition btn btn-outline-danger" href="{{route('users.destroy',$user->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection