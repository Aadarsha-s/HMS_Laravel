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
            <h5 class="font-weight-bold text-primary">{{ __('Add Front Office Order') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.frontservice.index') }}" class="btn btn-dark btn-sm">
                        <i class="fa fa-plus"></i>
                        <span class="text">{{ __('Service') }}</span>
                    </a>

                    <a href="{{ route('admin.front_office_order.index') }}" class="btn btn-primary btn-sm">
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
                            <option value="">Select service</option>
                            @foreach($frontservices as $frontservice)
                                <option value="{{$frontservice->service}}">{{$frontservice->service}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- <div class="form-group col-md-6">
                        <label for="quantity">{{ __('Quantity') }}</label>
                        <input type="number" class="form-control" id="quantity" placeholder="" name="quantity" value="{{ old('quantity') }}" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rate">{{ __('Rate') }}</label>
                        <input type="number" class="form-control" id="rate" placeholder="" name="rate" value="{{ old('rate') }}" required/>
                    </div> --}}

                    
                    <div class="form-group col-md-6">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" placeholder="" name="description" value="{{ old('description') }}" required></textarea>
                    </div>

                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Save') }}</button>
                        
                            <button type="reset" class="btn btn-primary btn-sm ">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection