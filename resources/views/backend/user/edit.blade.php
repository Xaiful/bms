@extends('backend.layouts.app')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Edit User</h5>
        <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{route('users.update',$user->id)}}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="firstname">Name</label>
                <div>
                    <input type="text" class="form-control" id="firstname" name="name" placeholder="Enter Your Name" value="{{$user->name}}" />
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="{{$user->email}}" />
                </div>
            </div>

            <div class="form-group">
                <label for="exampleCustomSelect">Select Role</label>
                <select multiple="" type="select" id="exampleCustomMutlipleSelect" class="custom-select" name="roles[]" onchange="updateDropdowns(this)">
                    <option value="">Select</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleCustomSelect">Select Division</label>
                <select type="select" id="divisionDropdown" class="form-control" name="devision_id" disabled>
                    @foreach ($devisions as $devision)
                        <option value="{{ $devision->id }}">{{ $devision->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleCustomSelect">Select District</label>
                <select type="select" id="districtDropdown" class="form-control" name="district_id" disabled>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleCustomSelect">Select SubDistrict</label>
                <select type="select" id="subdistrictDropdown" class="form-control" name="sub_district_id" disabled>
                    @foreach ($subDistricts as $subDistrict)
                        <option value="{{ $subDistrict->id }}">{{ $subDistrict->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleCustomSelect">Select Area</label>
                <select type="select" id="areaDropdown" class="form-control" name="area_id" disabled>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleCustomSelect">Select Warehouse</label>
                <select type="select" id="warehouseDropdown" class="form-control" name="warehouse_id" disabled>
                    @foreach ($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Add similar divs for Sub-District and Area dropdowns -->
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
<script>
    function updateDropdowns(select) {
        // Get the selected role
        var selectedRole = select.value;

        // Disable all dropdowns by default
        document.getElementById('divisionDropdown').disabled = true;
        document.getElementById('districtDropdown').disabled = true;
        document.getElementById('subdistrictDropdown').disabled = true;
        document.getElementById('areaDropdown').disabled = true;
        document.getElementById('warehouseDropdown').disabled = true;
        // Add similar lines for Sub-District and Area dropdowns

        // Enable the relevant dropdown based on the selected role
        if (selectedRole === 'RSM') {
            document.getElementById('divisionDropdown').disabled = false;
        } else if (selectedRole === 'ASM') {
            document.getElementById('districtDropdown').disabled = false;
        }else if (selectedRole === 'SPO') {
            document.getElementById('subdistrictDropdown').disabled = false;
        }else if (selectedRole === 'ASPO') {
            document.getElementById('areaDropdown').disabled = false;
        }else if (selectedRole === 'WARE') {
            document.getElementById('warehouseDropdown').disabled = false;
        }
        // Add similar conditions for Sub-District and Area dropdowns
    }
</script>