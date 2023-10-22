@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    <a class="btn btn-lg btn-transition btn btn-outline-success" href="{{route('devisions.create')}}">
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
                        <th>Division List</th>
                        <th>RSM List</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devisions as $devision)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <th>
                                <a href="{{ route('devisions.districts', $devision) }}">{{$devision->name}}</a>
                            </th>
                            <th>
                                @foreach ($devision->users as $user)
                                    {{ $user->name }}
                                @endforeach
                                {{-- Add debugging statement --}}
                                @if ($devision->users->isEmpty())
                                    <span class="badge badge-danger">No Users</span>
                                @endif
                            </th>
                            <td>
                                <a class="mb-2 mr-2 btn-transition btn btn-outline-success" href="{{route('devisions.edit',$devision->id)}}">Edit</a>
                                <a class="delete-row mb-2 mr-2 btn-transition btn btn-outline-danger" href="{{route('devisions.destroy',$devision->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection