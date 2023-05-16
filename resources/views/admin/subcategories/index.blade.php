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
                            <h4>SubCategory List
                            {{-- <a href="{{ route('product.create') }}" class="btn btn-sm btn-secondary float-end">Create Product</a> --}}
                            <a style="margin-right:5px" href="{{ route('subcategories.create') }}" class="btn btn-sm btn-secondary float-right">Create SubCategory</a>
                            {{-- <a style="margin-right:5px" href="{{ route('post.create') }}" class="btn btn-sm btn-secondary float-right">Create Post</a> --}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->category->name }}
                                        <td>{{ $subcategory->name }}</td>
                                        <th>
                                            <a href="{{route ('subcategories.edit',$subcategory->id) }}" ><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{route ('subcategories.destroy',$subcategory->id) }}" method="POST" style="display:inline-block">
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
