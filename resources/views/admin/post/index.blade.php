@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    {{-- Main Content Start --}}
    <div class="container-fluid">
        <!-- Page Heading -->
        
        <div class="container">
            <div class="mb-3">
                <div class="card">
                       
                    <div class="card-header">
                        <h4>Post List
                            <a href="{{ route('post.create') }}" class="btn btn-sm btn-secondary float-right">Create Post</a>
                            <a style="margin-right:5px" href="{{ route('category.create') }}" class="btn btn-sm btn-secondary float-right">Create Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>price</th>
                                <th>Images</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <th>{{ $post->categories->pluck('name')->join(',',', and')}}</th>
                                <th>{{ $post->title }}</th>
                                <th> 
                                    {{-- <textarea> --}}
                                        {{ $post->description }}
                                    {{-- </textarea> --}}
                                </th>
                                <th>{{ $post->price }}</th>
                                <th>
                                    @if($post->images)
                                    <a href="{{route ('post.show',$post->id) }}" > <img src="{{ asset($post->images[0]) }}"style="height: 200px; width: 150px;"></a>
                                    @endif
                    
                                </th> 
                                <th>
                                    <div style="width: max-content">
                                        <a href="{{route ('post.show',$post->id) }}" ><i style="color: green;padding-right: 5px;" class="fa-sharp fa-solid fa-eye"></i></a>
                                        <a href="{{route ('post.edit',$post->id) }}" ><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{route ('post.destroy',$post->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete" style="border: 0ch ;background: transparent;" type="submit"><i style="color: red" class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                        @if($post->status=='1')
                                            <a class="pending" href="{{route('status',$post->id)}}"> <i style="color: red;" class="fa-solid fa-xmark"></i> </a>
                                        @endif
                                        @if($post->status=='0')
                                            <a class="confirm" href="{{route('status',$post->id)}}"> <i style="color: green" class="fa-solid fa-check"></i> </a>
                                        @endif
                                    </div>
                                </th>
                                <th>
                                    {{ ($post->status=='0') ? 'Pending' : 'Published' }}
                                </th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
