@extends('layout.master')
@section('content')
    @include('layout.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layout.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800"> Edit Category</h1>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-secondary float-end">Category List</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <h4>Category</h4>
                                        <div class="mb-3">
                                            <input name="name" type="text" class="form-control" placeholder="Category Name" value="{{old ('name',$category->name) }}">
                                            <p style="color: red">{{ $errors->first('name') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Heading -->
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
@endsection