@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    <a class="btn btn-lg btn-transition btn btn-outline-success" href="{{route('areas.create')}}">
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
                    <th>Type</th>
                    <th>ASPO Name</th>
                    
                </tr>
                </thead>
                <tbody>
                    <tbody>
                        {{-- @foreach ($visitTypes as $visitType)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$visitType->name}}</td>
                            
                            <th>
                                @foreach ($visitType->users as $user)
                                    {{ $user->name }}
                                @endforeach
                               
                            </th>
                           
                        </tr>
                        
                        @endforeach --}}
                    </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection