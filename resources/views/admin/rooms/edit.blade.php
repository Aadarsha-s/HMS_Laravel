@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Room') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rooms.update', $rooms->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        <input type="text" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('room_number', $rooms->room_number) }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="room_type">{{ __('Room Type') }}</label>
                        <select class="form-control" aria-label="Default select example" id="room_type" name="room_type">
                            {{-- <option>Select Room Type</option> --}}
                            <option value="Single"{{ $rooms->room_type == "Single" ? 'selected' : '' }}>Single</option>
                            <option value="Double"{{ $rooms->room_type == "Double" ? 'selected' : '' }}>Double</option>
                            <option value="Triple"{{ $rooms->room_type == "Triple" ? 'selected' : '' }}>Triple</option>
                            <option value="Quad"{{ $rooms->room_type == "Quad" ? 'selected' : '' }}>Quad</option>
                            <option value="Twin"{{ $rooms->room_type == "Twin" ? 'selected' : '' }}>Twin</option>
                            <option value="Cabana"{{ $rooms->room_type == "Cabana" ? 'selected' : '' }}>Cabana</option>
                            <option value="Connecting Rooms"{{ $rooms->room_type == "Connecting Rooms" ? 'selected' : '' }}>Connecting Rooms</option>
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bed_type">{{ __('Bed Type') }}</label>
                        <select class="form-control" aria-label="Default select example" id="bed_type" name="bed_type">
                            {{-- <option selected>Select Bed Type</option> --}}
                            <option value="Full"{{ $rooms->bed_type == "Full" ? 'selected' : '' }}>Full</option>
                            <option value="Double"{{ $rooms->bed_type == "Double" ? 'selected' : '' }}>Double</option>
                            <option value="Four Poster"{{ $rooms->bed_type == "Four Poster" ? 'selected' : '' }}>Four Poster</option>
                            <option value="Murphy"{{ $rooms->bed_type == "Murphy" ? 'selected' : '' }}>Murphy</option>
                            <option value="Twin"{{ $rooms->bed_type == "Twin" ? 'selected' : '' }}>Twin</option>
                            <option value="King"{{ $rooms->bed_type == "King" ? 'selected' : '' }}>King</option>
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="room_rate">{{ __('Room Rate') }}</label>
                        <input type="number" class="form-control" id="room_rate" placeholder="" name="room_rate" value="{{ old('room_rate', $rooms->room_rate) }}" />
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="room_status">{{ __('Room Status') }}</label>
                        
                        <select class="form-control" aria-label="Default select example" id="room_status" name="room_status">
                            {{-- <option selected>Select Room Status</option> --}}
                            <option value="Occupied" {{ $rooms->room_status == "Occupied" ? 'selected' : '' }}>Occupied</option>
                            <option value="Vacanat Dirty" {{ $rooms->room_status == "Vacant Dirty" ? 'selected' : '' }}>Vacant Dirty</option>
                            <option value="Vacant Clean" {{ $rooms->room_status == "Vacant Clean" ? 'selected' : '' }}>Vacant Clean</option>
                            <option value="Reserved" {{ $rooms->room_status == "Reserved" ? 'selected' : '' }}>Reserved</option>
                            <option value="Out od Order"{{$rooms->room_status == "Out of Order" ? 'selected' : '' }}>Out of Order</option>
                          </select>
                    </div>
                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-primary btn-block ">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection