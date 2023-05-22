@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> Add Medicine</h1>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                {{-- <a href="{{ route('feedings.index') }}" class="btn btn-sm btn-secondary float-end">Feeding List</a> --}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cow-medicines.store') }}" method="POST">
                                @csrf
                    
                                <div class="mb-3 form-group">
                                    <select name="cow_id" id="cow_id">
                                        <option value="">Select a cow</option>
                                        @foreach ($cows as $id => $value )
                                        <option value="{{ $id }}"
                                        @isset($cow) {{ $cow->name ? "selected=true" : "" }} @endisset>
                                            {{ $value }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                

                                <div class="mb-3 form-group">
                                    <select name="medicine_id" id="medicine_id">
                                        <option value="">Select a medicine</option>
                                        @foreach ($medicines as $id => $value )
                                        <option value="{{ $id }}"
                                        @isset($medicine) {{ $medicine->name ? "selected=true" : "" }} @endisset>
                                            {{ $value }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                    
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>
                    
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Main Content Start --}}
                
                