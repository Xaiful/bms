{{-- 
@foreach ($districts as $district)
<tr>
    <td>{{$loop->index+1}}</td>
    <td>{{$district->name}}</td>
    <td>
        @foreach ($district->users as $user)
            <span class="badge badge-info mr-1">
                {{ $user->name }}
            </span>
        @endforeach
    </td>
</tr>
@endforeach
 --}}

@extends('backend.layouts.app')
@section('content')
    <div class="main-card mb-3 card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    
                </div>    
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>District</th>
                    <th>ASM List</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($subdistricts as $subdistrict)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="{{ route('subdistricts.areas', $subdistrict) }}">{{$subdistrict->name}}</a></td>
                        <th>
                            @foreach ($subdistrict->users as $user)
                                {{ $user->name }}
                            @endforeach
                           
                        </th>
                       
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
