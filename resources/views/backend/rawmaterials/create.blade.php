@extends('backend.layouts.app')

@section('content')
<div class="main-card mb-3 card">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('rawmaterials.index') }}" class="btn btn-sm btn-primary">Raw-Material List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('rawmaterials.saveAll') }}" method="POST" id="rawmaterialForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div id="raw_material_field" class="col-md-4 form-group">
                        <label for="raw_material">Raw Material:</label>
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
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="type">Raw Material Type:</label>
                        <input name="rawmaterials[0][type]" type="text" class="form-control" placeholder="Raw Material Type" required>
                        <p style="color: red">{{ $errors->first('rawmaterials.0.type') }}</p>
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="size">Raw Material Size:</label>
                        <input name="rawmaterials[0][size]" type="size" class="form-control" placeholder="If it is a 'Pack' Type" required>
                        <p style="color: red">{{ $errors->first('rawmaterials.0.size') }}</p>
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="quantity">Quantity:</label>
                        <input name="rawmaterials[0][quantity]" type="number" class="form-control" placeholder="Quantity" required>
                        <p style="color: red">{{ $errors->first('rawmaterials.0.quantity') }}</p>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="unit_id">Select Unit:</label>
                        <select id="unit_id" class="form-control @error('rawmaterials.0.unit_id') is-invalid @enderror" name="rawmaterials[0][unit_id]" required>
                            <option value="">Select Unit</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('rawmaterials.0.unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        @error('rawmaterials.0.unit_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="memo_no">Memo No:</label>
                        <input name="rawmaterials[0][memo_no]" type="number" class="form-control" placeholder="Memo No" required>
                        <p style="color: red">{{ $errors->first('rawmaterials.0.memo_no') }}</p>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="unit_price">Unit Price:</label>
                        <input type="number" step="0.01" class="form-control" id="unit_price" name="rawmaterials[0][unit_price]" placeholder="Unit per taka" required>
                        <p style="color: red">{{ $errors->first('rawmaterials.0.unit_price') }}</p>
                    </div>

                    <div class="col-md-12 card-header">
                        Add Raw-Materials Shop
                    </div>

                    
                    <div class="col-md-6 form-group">
                        <label for="shop_option">Shop Option:</label>
                        <select id="shop_option" class="form-control" name="shop_option">
                            <option value="new">Create New Shop</option>
                            <option value="existing">Select Existing Shop</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group" id="existing_shop">
                        <label for="shop_id">Select Existing Shop:</label>
                        <select id="shop_id" class="form-control @error('rawmaterials.0.shop_id') is-invalid @enderror" name="rawmaterials[0][shop_id]" required>
                            <option value="">Select Shop</option>
                            @foreach($shops as $shop)
                                <option value="{{ $shop->id }}">{{ $shop->shopeName }}</option>
                            @endforeach
                        </select>
                        @error('rawmaterials.0.shop_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group" id="new_shop">
                        <label>Create New Shop Name:</label>
                        <input type="text" class="form-control" name="shopeName" required>
                        <label>Create Address:</label>
                        <input type="text" class="form-control" name="address" required>
                        <label>Create Phone number:</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>
                <br>
                <div id="clonedForms">

                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-success" onclick="cloneForm()">+</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeForm()">-</button>
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="saveAllForms()">Save All</button>
            </form>
        </div>
    </div>
</div>
<script>
    // Toggle visibility of existing/new shop inputs based on selection
    document.getElementById('shop_option').addEventListener('change', function() {
        const existingShop = document.getElementById('existing_shop');
        const newShop = document.getElementById('new_shop');
        
        if (this.value === 'existing') {
            existingShop.style.display = 'block';
            newShop.style.display = 'none';
        } else if (this.value === 'new') {
            existingShop.style.display = 'none';
            newShop.style.display = 'block';
        } else {
            existingShop.style.display = 'none';
            newShop.style.display = 'none';
        }
    });
</script>

<script>
    var formIndex = 0; // Variable to track the index of the cloned forms

    // Function to clone the form
    function cloneForm() {
        var clonedForm = $('#rawmaterialForm').find('.row:first').clone(); // Clone the first form row

        formIndex++; // Increment the form index

        // Update the name attributes of the input fields in the cloned form
        clonedForm.find('[name^="rawmaterials[0]"]').each(function () {
            var originalName = $(this).attr('name');
            var updatedName = originalName.replace('[0]', '[' + formIndex + ']');
            $(this).attr('name', updatedName);
        });

        clonedForm.find('input').val(''); // Clear the input values in the cloned form
        clonedForm.find('.invalid-feedback').remove(); // Remove any error messages in the cloned form

        clonedForm.appendTo('#clonedForms'); // Append the cloned form to the container

        // Show the remove button for the cloned form
        clonedForm.find('.btn-danger').show();
    }

    // Function to remove the form
    function removeForm() {
        var clonedFormsCount = $('#clonedForms .row').length;

        if (clonedFormsCount > 0) {
            $('#clonedForms .row:last').remove(); // Remove the last cloned form row
        }

        if (clonedFormsCount === 1) {
            $('#clonedForms .btn-danger'); // Hide the remove button if there is only one form
        }
    }

    // Function to save all the forms
    function saveAllForms() {
        $('#rawmaterialForm').submit(); // Submit the main form
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('dynamic-input-container');
        const addButton = document.getElementById('add-input');

        addButton.addEventListener('click', function () {
            const inputField = document.createElement('div');
            inputField.classList.add('input-field');
            container.appendChild(inputField);
        });
    });
</script>
<script>
    // Toggle between text input and dropdown when clicking "Add New" button
    const rawMaterialField = document.getElementById('raw_material_field');
    const rawMaterialInput = document.getElementById('raw_material');
    const addNewButton = document.getElementById('add_new_button');
    const rawMaterialDropdown = document.getElementById('raw_material_dropdown');
    const rawMaterialSelect = document.getElementById('raw_material_select');

    addNewButton.addEventListener('click', () => {
        if (rawMaterialInput.style.display === 'none') {
            rawMaterialInput.style.display = 'block';
            rawMaterialDropdown.style.display = 'none';
            rawMaterialInput.value = ''; // Clear text input value
        } else {
            rawMaterialInput.style.display = 'none';
            rawMaterialDropdown.style.display = 'block';
        }
    });
    rawMaterialSelect.addEventListener('change', () => {
        if (rawMaterialSelect.value !== '') {
            rawMaterialInput.value = rawMaterialSelect.options[rawMaterialSelect.selectedIndex].text;
            rawMaterialInput.style.display = 'block'; // Show text input
            rawMaterialDropdown.style.display = 'none'; // Hide dropdown
        }
    });
</script>
@endsection
