@extends('backend.layouts.app')
@section('content')
<<div class="container-fluid">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{ route('medicines.index') }}" class="btn btn-sm btn-info float-end">Medicine List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('medicines.update',$medicine->id) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <h6><strong>Quantity</strong></h6>
                                    <input name="quantity" type="number" class="form-control" placeholder="Quantity" value="{{old ('name',$medicine->quantity) }}">
                                    <p style="color: red">{{ $errors->first('quantity') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6><strong>Medicine</strong></h6>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{old ('name',$medicine->name) }}">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6><strong>Supplier</strong></h6>
                                    <input name="supplier" type="text" class="form-control" placeholder="Supplier" value="{{old ('name',$medicine->supplier) }}">
                                    <p style="color: red">{{ $errors->first('supplier') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6><strong>Memo No</strong></h6>
                                    <input name="memo_no" type="number" class="form-control" placeholder="Memo No" value="{{old ('name',$medicine->memo_no) }}">
                                    <p style="color: red">{{ $errors->first('memo_no') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6><strong>Unit Price</strong></h6>
                                    <input name="unit_price" type="number" class="form-control" placeholder="Unit Price" value="{{old ('name',$medicine->unit_price) }}">
                                    <p style="color: red">{{ $errors->first('unit_price') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6><strong>Subcategory</strong> </h6>
                                   <select id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" required>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $medicine->subcategory_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="update btn btn-sm btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection