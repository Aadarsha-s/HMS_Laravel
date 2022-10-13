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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Front Office Order') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.front_office_order.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.front_office_order.update', $frontoffices->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        <input type="text" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('room_number', $frontoffices->room_number) }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="service">{{ __('Service') }}</label>
                        <select class="form-control" aria-label="Default select example" id="service" name="service">
                            <option value="Reservation" {{ $frontoffices->service == "Reservation" ? 'selected' : '' }}>Reservation</option>
                            <option value="Reception" {{ $frontoffices->service == "Reception" ? 'selected' : '' }}>Reception</option>
                            <option value="Registration" {{ $frontoffices->service == "Registration" ? 'selected' : '' }}>Registration</option>
                            <option value="Cashier" {{ $frontoffices->service == "Cashier" ? 'selected' : '' }}>Cashier</option>
                            <option value="Travel Desk" {{ $frontoffices->service == "Travel Desk" ? 'selected' : '' }}>Travel Desk</option>
                            <option value="Bell Desk" {{ $frontoffices->service == "Bell Desk " ? 'selected' : '' }}>Bell Desk</option>
                            <option value="Lobby" {{ $frontoffices->service == "Lobby" ? 'selected' : '' }}>Lobby</option>
                            <option value="Night Auditor" {{ $frontoffices->service == "Night Auditor" ? 'selected' : '' }}>Night Auditor</option>
                            <option value="Telephone Operator" {{ $frontoffices->service == "Telephone Operator" ? 'selected' : '' }}>Telephone Operator</option>
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantity">{{ __('Quantity') }}</label>
                        <input type="number" class="form-control" id="quantity" placeholder="" name="quantity" value="{{ old('quantity', $frontoffices->quantity) }}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rate">{{ __('Rate') }}</label>
                        <input type="number" class="form-control" id="rate" placeholder="" name="rate" value="{{ old('rate', $frontoffices->rate) }}" />
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" name="description" placeholder="" >{{ old('description',$frontoffices->description) }}</textarea>
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