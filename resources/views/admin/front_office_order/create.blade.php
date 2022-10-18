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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Add Front Office Order') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.front_office_order.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.front_office_order.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        {{-- <input type="number" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('Room_number') }}" required/> --}}
                        <select class="form-control" aria-label="Default select example" id="room_number" name="room_number" required>
                            <option value="">Select Room Number</option>
                            @foreach($rooms as $room)
                                <option value="{{$room->room_number}}">{{$room->room_number}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="service">{{ __('Service') }}</label>
                        <select class="form-control" aria-label="Default select example" id="service" name="service" required>
                            <option value="">Select Service</option>
                            <option value="Reservation">Reservation</option>
                            <option value="Reception">Reception</option>
                            <option value="Registration">Registration</option>
                            <option value="Cashier">Cashier</option>
                            <option value="Travel Desk">Travel Desk</option>
                            <option value="Bell Desk">Bell Desk</option>
                            <option value="Lobby">Lobby</option>
                            <option value="Night Auditor">Night Auditor</option>
                            <option value="Telephone Operator">Telephone Operator</option>
                          </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="quantity">{{ __('Quantity') }}</label>
                        <input type="number" class="form-control" id="quantity" placeholder="" name="quantity" value="{{ old('quantity') }}" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rate">{{ __('Rate') }}</label>
                        <input type="number" class="form-control" id="rate" placeholder="" name="rate" value="{{ old('rate') }}" required/>
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" placeholder="" name="description" value="{{ old('description') }}" required></textarea>
                    </div>

                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-primary btn-block ">{{ __('Save') }}</button>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="reset" class="btn btn-primary btn-block ">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection