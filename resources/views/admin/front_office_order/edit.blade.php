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
            <h5 class="font-weight-bold text-primary">{{ __('Edit Front Office Order') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.front_office_order.index') }}" class="btn btn-primary btn-sm">
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
                        {{-- <input type="text" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('room_number', $frontoffices->room_number) }}" /> --}}
                        <select class="form-control" aria-label="Default select example" id="room_number" name="room_number" required>
                            @foreach($rooms as $room)
                                <option value="{{$room->room_number}}" {{ $frontoffices->room_number == $room->room_number ? 'selected' : '' }}>{{$room->room_number}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="service">{{ __('Service') }}</label>
                        <select class="form-control" aria-label="Default select example" id="service" name="service">
                            @foreach($frontservices as $item)
                            <option value="{{ $item->service }}"
                                @if(old('service',$frontoffices->service) == $item->service) selected @endif >
                                {{ $item->service }}
                            </option>
                        @endforeach     
                        </select>
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label for="quantity">{{ __('Quantity') }}</label>
                        <input type="number" class="form-control" id="quantity" placeholder="" name="quantity" value="{{ old('quantity', $frontoffices->quantity) }}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rate">{{ __('Rate') }}</label>
                        <input type="number" class="form-control" id="rate" placeholder="" name="rate" value="{{ old('rate', $frontoffices->rate) }}" />
                    </div> --}}

                    
                    <div class="form-group col-md-6">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" name="description" placeholder="" >{{ old('description',$frontoffices->description) }}</textarea>
                    </div>
                    
                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm ">{{ __('Save') }}</button>
                        
                            <button type="reset" class="btn btn-primary btn-sm  ">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection