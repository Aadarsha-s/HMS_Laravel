@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h5 class="font-weight-bold text-primary">{{ __('Add Room') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.roomtype.index') }}" class="btn btn-dark btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Room Type') }}</span>
                    </a>
                    <a href="{{ route('admin.bedtype.index') }}" class="btn btn-dark btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Bed Type') }}</span>
                    </a>
                    <a href="{{ route('admin.roomstatus.index') }}" class="btn btn-dark btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Room Status') }}</span>
                    </a>
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
                            @foreach($roomtypes as $roomtype)
                                <option value="{{$roomtype->room_type}}">{{$roomtype->room_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="bed_type">{{ __('Bed Type') }}</label>
                        <select class="form-control" aria-label="Default select example" id="bed_type" name="bed_type" required>
                            <option value="">Select Bed Type</option>
                            @foreach($bedtypes as $bedtype)
                                <option value="{{$bedtype->bed_type}}">{{$bedtype->bed_type}}</option>
                            @endforeach
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
                            @foreach($roomstatus as $room_status)
                                <option value="{{$room_status->room_status}}">{{$room_status->room_status}}</option>
                            @endforeach
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