@extends('backend.layouts.app')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-header">
            <a href="{{ route('rawmaterials.create') }}" class="btn btn-sm btn-primary float-right">Add Raw-Materials</a>
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('rawmaterials.saveAll') }}" method="POST" id="rawmaterialForm" enctype="multipart/form-data">
                @csrf
                <table id="test" class="table table-hover table-bordered responsive-table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Raw Materials</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Memo No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input name="rawmaterials[0][type]" type="text" class="form-control" placeholder="Raw Material Type" required>
                                <p style="color: red">{{ $errors->first('rawmaterials.0.type') }}</p>
                            </td>
                            <td>
                                <div class="input-group">
                                    <div id="raw_material_dropdown" style="display: none;">
                                        <select class="form-control" id="raw_material_select">
                                            <option value="">Select Raw Material</option>
                                            @foreach($rawmaterials as $previousRawMaterial)
                                                <option value="{{ $previousRawMaterial->id }}">{{ $previousRawMaterial->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-outline-primary" type="button" id="add_new_button">Add New</button>
                                    <input type="text" class="form-control" id="raw_material" name="rawmaterials[0][name]" placeholder="Raw Material" required>
                                </div>
                                <p style="color: red">{{ $errors->first('raw_material') }}</p>
                            </td>
                            <td>
                                <input name="rawmaterials[0][quantity]" type="number" class="form-control" placeholder="Quantity" required>
                                <p style="color: red">{{ $errors->first('rawmaterials.0.quantity') }}</p>
                            </td>
                            <td>
                                <select style="margin-bottom:15px;" id="unit_id" class="form-control @error('rawmaterials.0.unit_id') is-invalid @enderror" name="rawmaterials[0][unit_id]" required>
                                    <option value=""></option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ old('rawmaterials.0.unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('rawmaterials.0.unit_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                            <td>
                                <input name="rawmaterials[0][size]" type="text" class="form-control" placeholder="If it is a 'Pack' Type" required>
                                <p style="color: red">{{ $errors->first('rawmaterials.0.size') }}</p>
                            </td>
                            <td>
                                <input type="number" step="0.01" class="form-control" id="unit_price" name="rawmaterials[0][unit_price]" placeholder="Unit per taka" required>
                                <p style="color: red">{{ $errors->first('rawmaterials.0.unit_price') }}</p>
                            </td>
                            <td>
                                <input name="rawmaterials[0][memo_no]" type="number" class="form-control" placeholder="Memo No" required>
                                <p style="color: red">{{ $errors->first('rawmaterials.0.memo_no') }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <button type="button" class="btn btn-sm btn-primary" onclick="saveAllForms()">Save All</button>
            </form> --}}
            
            <table id="example" class="table table-hover table-bordered responsive-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Raw Materials</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Shop</th>
                        <th>Total</th>
                        <th>Memo No</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalOfTotals = 0; // Initialize total of totals variable
                    @endphp
                    @foreach ($rawmaterials as $rawmaterial)
                        <tr>
                            <td>{{ $rawmaterial->type }}</td>
                            <td>{{ $rawmaterial->name }}</td>
                            <td>{{ $rawmaterial->quantity }}</td>
                            <td>{{ $rawmaterial->unit->name }}</td>
                            <td>{{ $rawmaterial->size }}</td>
                            <td>{{ $rawmaterial->unit_price }}</td>
                            <td>
                                @foreach($rawmaterial->rawMaterialShops as $rawMaterialShop)
                                    {{ $rawMaterialShop->shopeName }},
                                @endforeach
                            </td>

                            @php
                                $total = $rawmaterial->unit_price * $rawmaterial->quantity;
                                $totalOfTotals += $total; // Add the current total to the total of totals
                            @endphp
                            <td>{{ $total }}</td>
                            <td>{{ $rawmaterial->memo_no }}</td>
                            <td>{{ $rawmaterial->created_at->format('d-M-y') }}</td>
                            <td>
                                <a href="{{ route('rawmaterials.edit', $rawmaterial->id) }}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('rawmaterials.destroy', ['rawmaterial' => $rawmaterial->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" style="border: 0;background: transparent;">
                                        <i style="color: red" class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var table = document.getElementById('test').getElementsByTagName('tbody')[0];

        function addNewRow() {
            // Clone the last row in the table
            var lastRow = table.rows[table.rows.length - 1];
            var newRow = lastRow.cloneNode(true);

            // Clear the input values in the new row
            var inputs = newRow.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }

            // Append the new row to the table
            table.appendChild(newRow);
        }

        // Add an event listener to the table to detect clicks on both old and new input fields
        table.addEventListener('click', function (event) {
            var target = event.target;
            if (target.tagName === 'INPUT') {
                addNewRow();
            }
        });
    </script>
@endsection
