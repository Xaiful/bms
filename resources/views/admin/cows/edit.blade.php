@extends('admin.layouts.app')
@section('content')
<x-slot name="title">Edit-Coe</x-slot>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Cow-edit</h1>
        {{-- <a style="margin-right:5px" href="{{ route('cow.create') }}" class="btn btn-sm btn-secondary float-right">Create Cow</a> --}}

        <div class="card-body">
            <form action="{{ route('cows.update',$cow->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{old ('name',$cow->name) }}">
                    <p style="color: red">{{ $errors->first('name') }}</p>
                </div>
                <div class="mb-3">
                <div class="mb-3">
                    <input name="age" type="text" class="form-control" placeholder="Days" value="{{old ('age',$cow->age) }}">
                    <p style="color: red">{{ $errors->first('age') }}</p>
                </div>
                <div class="mb-3">
                    <select name="gender" id="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <p style="color: red">{{ $errors->first('gender') }}</p>
                </div>
                <div class="mb-3">
                    <input name="weight" type="number" class="form-control" placeholder="KG" value="{{old ('weight',$cow->weight) }}">
                    <p style="color: red">{{ $errors->first('weight') }}</p>
                </div>
                <div class="mb-3">
                    <input name="color" type="text" class="form-control" placeholder="Color" value="{{old ('color',$cow->color) }}">
                    <p style="color: red">{{ $errors->first('color') }}</p>
                </div>
                <div class="mb-3">
                    <input name="importer" type="text" class="form-control" placeholder="Importer" value="{{old ('importer',$cow->importer) }}">
                    <p style="color: red">{{ $errors->first('importer') }}</p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
