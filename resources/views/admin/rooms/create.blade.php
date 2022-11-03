@extends('layouts.admin')

@section('content')
<div class="container-fluid">
{{-- 
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h5 class="font-weight-bold text-primary">{{ __('Add Room') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary btn-sm">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rooms.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        <input type="number" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('Room_number') }}" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="room_type">{{ __('Room Type') }}</label>
                        <select class="form-control" aria-label="Default select example" id="room_type" name="room_type" required>
                            <option value="">Select Room Type</option>
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                            <option value="Quad">Quad</option>
                            <option value="Twin">Twin</option>
                            <option value="Cabana">Cabana</option>
                            <option value="Connecting Rooms">Connecting Rooms</option>
                          </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="bed_type">{{ __('Bed Type') }}</label>
                        <select class="form-control" aria-label="Default select example" id="bed_type" name="bed_type" required>
                            <option value="">Select Bed Type</option>
                            <option value="Full">Full</option>
                            <option value="Double">Double</option>
                            <option value="Four Poster">Four Poster</option>
                            <option value="Murphy">Murphy</option>
                            <option value="Twin">Twin</option>
                            <option value="King">King</option>
                          </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="room_rate">{{ __('Room Rate') }}</label>
                        <input type="number" class="form-control" id="room_rate" placeholder="" name="room_rate" value="{{ old('Room_rate') }}" required/>
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="room_status">{{ __('Room Status') }}</label>
                        <select class="form-control" aria-label="Default select example" id="room_status" name="room_status" required>
                            <option value="">Select Room Status</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Vacant Dirty">Vacant Dirty</option>
                            <option value="Vacant Clean">Vacant Clean</option>
                            <option value="Reserved">Reserved</option>
                            <option value="Out of Order">Out of Order</option>
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 12px">Save</button>
                    <button type="reset" class="btn btn-primary btn-sm" style="">Cancel</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection