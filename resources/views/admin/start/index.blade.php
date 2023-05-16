@extends('admin.layouts.app')
@section('content')
<x-slot name="title">Cows</x-slot>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="{{ route('cows.create') }}" class="btn btn-sm btn-secondary float-right">Add Cow</a>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped responsive-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age/Days</th>
                        <th>Gender</th>
                        <th>Weight</th>
                        <th>Color</th>
                        <th>Importer</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cows as $cow)
                    <tr>
                        {{-- <td>{{ $about->id }}</td> --}}
                        <td>{{ $cow->id }}</td>
                        <td>{{ $cow->name }}</td>
                        <td>{{ $cow->age }}</td>
                        <td>{{ $cow->gender }}</td>
                        <td>{{ $cow->weight }}</td>
                        <td>{{ $cow->color }}</td>
                        <td>{{ $cow->importer }}</td>
                        <th>
                            <a href="{{route ('cows.edit',$cow->id) }}" ><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                            <form action="{{route ('cows.destroy',$cow->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="delete" style="border: 0ch ;background: transparent;" type="submit"><i style="color: red" class="fa-sharp fa-solid fa-trash"></i></button>
                                {{-- <button type="submit"class="fa-sharp fa-solid fa-trash"></button> --}}
                            </form>    
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
