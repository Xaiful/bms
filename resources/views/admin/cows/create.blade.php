@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Cow</h1>
    <div class="card">
        <div class="card-header">
            <h4>
                <a href="{{ route('cows.index') }}" class="btn btn-sm btn-secondary float-end">Cow List</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('cows.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Name">
                    <p style="color: red">{{ $errors->first('name') }}</p>
                </div>
                <div class="mb-3">
                <div class="mb-3">
                    <input name="age" type="number" class="form-control" placeholder="Days">
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
                    <input name="weight" type="number" class="form-control" placeholder="KG">
                    <p style="color: red">{{ $errors->first('weight') }}</p>
                </div>
                <div class="mb-3">
                    <input name="color" type="text" class="form-control" placeholder="Color">
                    <p style="color: red">{{ $errors->first('color') }}</p>
                </div>
                <div class="mb-3">
                    <input name="importer" type="text" class="form-control" placeholder="Importer">
                    <p style="color: red">{{ $errors->first('importer') }}</p>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-success">Add The Cow</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

                
                