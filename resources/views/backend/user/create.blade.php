@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Create New User</h5>
        <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{route('users.store')}}">
            @csrf
            <div class="form-group">
                <label for="firstname">Name</label>
                <div>
                    <input type="text" class="form-control" id="firstname" name="name" placeholder="Enter Your Name" />
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" />
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" />
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <div>
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Enter Confirm password" />
                </div>
            </div>

            <div class="form-group">
                <label for="exampleCustomSelect">Select Role</label>
                <select type="select" id="exampleCustomSelect" name="role" class="custom-select" id="roleSelect">
                    <option value="">Select</option>
                    @forelse ($roles as $role)
                        <option value="{{ $role->name }}" data-areas="{{ json_encode($role->areas) }}">{{ $role->name }}</option>
                    @empty
                        <option>No Role Found</option>
                    @endforelse
                </select>
            </div>
            

            <!-- Division Selection -->

            <div class="form-group">
                <label for="devision_id">Select a Devision</label>
                <select name="devision_id" id="devision_id" class="custom-select">
                    <option value="">Select a Devision</option>
                    @foreach ($devisions as $id => $value)
                        <option value="{{ $id }}" @isset($user) {{ $user->devision->id == $id ? 'selected' : '' }} @endisset>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            
            <!-- District Selection -->
            <div class="form-group">
                <label for="district_id">Select a District</label>
                <select name="district_id" id="district_id" class="custom-select">
                    <option value="">Select a District</option>
                    @foreach ($districts as $id => $value)
                        <option value="{{ $id }}" @isset($user) {{ $user->district->id == $id ? 'selected' : '' }} @endisset>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            
            
            <!-- SubDistrict Selection -->
            <div class="form-group">
                <label for="sub_district_id">Select a SubDistrict</label>
                <select name="sub_district_id" id="sub_district_id" class="custom-select">
                    <option value="">Select a SubDistrict</option>
                    @foreach ($subDistricts as $id => $value)
                        <option value="{{ $id }}" @isset($user) {{ $user->subDistrict->id == $id ? 'selected' : '' }} @endisset>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

             <!--Area Selection -->
             <div class="form-group">
                <label for="area_id">Select a Area</label>
                <select name="area_id" id="area_id" class="custom-select">
                    <option value="">Select a Area</option>
                    @foreach ($areas as $id => $value)
                        <option value="{{ $id }}" @isset($user) {{ $user->area->id == $id ? 'selected' : '' }} @endisset>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="warehouse_id">Select a Warehouse</label>
                <select name="warehouse_id" id="warehouse_id" class="custom-select">
                    <option value="">Select a warehouse</option>
                    @foreach ($warehouses as $id => $value)
                        <option value="{{ $id }}" @isset($user) {{ $user->warehouse->id == $id ? 'selected' : '' }} @endisset>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the selection elements
        const devisionSelect = document.getElementById('devision_id');
        const districtSelect = document.getElementById('district_id');
        const subDistrictSelect = document.getElementById('sub_district_id');
        const areaSelect = document.getElementById('area_id'); // Updated ID
        const warehouseSelect = document.getElementById('warehouse_id'); // Updated ID
        const roleSelect = document.getElementById('exampleCustomSelect'); // Updated ID

        // Add change event listener to role selection
        roleSelect.addEventListener('change', function () {
            const selectedRole = roleSelect.value;

            // Reset all selections
            devisionSelect.disabled = true;
            districtSelect.disabled = true;
            subDistrictSelect.disabled = true;
            areaSelect.disabled = true; // Updated variable name
            warehouseSelect.disabled = true; // Updated variable name

            // Enable/disable selections based on the selected role
            if (selectedRole === 'RSM') {
                devisionSelect.disabled = false;
            } else if (selectedRole === 'ASM') {
                districtSelect.disabled = false;
            } else if (selectedRole === 'SPO') {
                subDistrictSelect.disabled = false;
            } else if (selectedRole === 'ASPO') {
                areaSelect.disabled = false; // Updated variable name
            } else if (selectedRole === 'WARE') {
                warehouseSelect.disabled = false; // Updated variable name
            }
        });

        // Trigger the change event to set the initial state
        roleSelect.dispatchEvent(new Event('change'));
    });
</script>

