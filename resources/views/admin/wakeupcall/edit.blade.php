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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Wakeup Call') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.wakeupcall.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.wakeupcall.update', $wakeupcalls->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        <input type="number" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('room_number', $wakeupcalls->room_number) }}" />
                    </div>                    
                    
                    <div class="form-group col-md-6">
                        <label for="date">{{ __('Date') }}</label>
                        <input type="date" class="form-control" id="date" placeholder="" name="date" value="{{ old('date', $wakeupcalls->date) }}" />
                    </div>
                   
                   <div class="form-group col-md-6">
                        <label for="time">{{ __('Time') }}</label>
                        <input type="time" class="form-control" id="time" placeholder="" name="time" value="{{ old('time', $wakeupcalls->time) }}" />
                   </div>

                   <div class="form-group col-md-6">
                        <label for="remark">{{ __('Remark') }}</label>
                        <input type="text" class="form-control" id="remark" placeholder="" name="remark" value="{{ old('remark', $wakeupcalls->remark) }}" />
                   </div>

                   <div class="form-group col-md-6">
                        <label for="guest">{{ __('Guest') }}</label>
                        <input type="text" class="form-control" id="guest" placeholder="" name="guest" value="{{ old('guest', $wakeupcalls->guest) }}" />
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