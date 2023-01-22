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
            <h5 class=" mb-0 font-weight-bold text-primary">{{ __('Edit Room') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary btn-sm">
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
                            @foreach($roomtypes as $item)
                                <option value="{{ $item->room_type }}"
                                    @if(old('room_type',$rooms->room_type) == $item->room_type) selected @endif >
                                    {{ $item->room_type }}
                                </option>
                            @endforeach     
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bed_type">{{ __('Bed Type') }}</label>
                        <select class="form-control" aria-label="Default select example" id="bed_type" name="bed_type">
                            {{-- <option selected>Select Bed Type</option> --}}
                            @foreach($bedtypes as $item)
                                <option value="{{ $item->bed_type }}"
                                @if(old('bed_type',$rooms->bed_type) == $item->bed_type) selected @endif>
                                    {{ $item->bed_type }}
                                </option>
                            @endforeach     
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="room_rate">{{ __('Room Rate') }}</label>
                        <input type="number" class="form-control" id="room_rate" placeholder="" name="room_rate" value="{{ old('room_rate', $rooms->room_rate) }}" />
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="room_status">{{ __('Room Status') }}</label>
                        
                        <select class="form-control" aria-label="Default select example" id="room_status" name="room_status">
                            @foreach($roomstatus as $item)
                                <option value="{{ $item->room_status }}"
                                    @if(old('roomstatus',$rooms->room_status) == $item->room_status) selected @endif >
                                    {{ $item->room_status }}
                                </option>
                            @endforeach     
                        </select>
                    </div>
                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-primary btn-sm ">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection