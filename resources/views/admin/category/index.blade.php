@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                   <div class="card">
                        <div class="card-header">
                            <h4>Category List
                            {{-- <a href="{{ route('product.create') }}" class="btn btn-sm btn-secondary float-end">Create Product</a> --}}
                            <a style="margin-right:5px" href="{{ route('category.create') }}" class="btn btn-sm btn-secondary float-right">Create Category</a>
                            {{-- <a style="margin-right:5px" href="{{ route('post.create') }}" class="btn btn-sm btn-secondary float-right">Create Post</a> --}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <th>
                                            <a href="{{route ('category.edit',$category->id) }}" ><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{route ('category.destroy',$category->id) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="delete" style="border: 0ch ;background: transparent;" type="submit"><i style="color: red" class="fa-sharp fa-solid fa-trash"></i></button>
                                                {{-- <button type="submit"class="fa-sharp fa-solid fa-trash"></button> --}}
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Heading -->
</div>
@endsection


{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> --}}
