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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Wakeup Call') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.wakeupcall.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.wakeupcall.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="room_nuumber">{{ __('Room Number') }}</label>
                        <input type="number" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('room_number') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="date">{{ __('Date') }}</label>
                        <input type="date" class="form-control" id="date" placeholder="" name="date" value="{{ old('date') }}" required/>
                    </div>
                    
                    <div class="form-group">
                        <label for="time">{{ __('Time') }}</label>
                        <input type="time" class="form-control" id="time" placeholder="" name="time" value="{{ old('time') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="remark">{{ __('Remark') }}</label>
                        <input type="text" class="form-control" id="remark" placeholder="" name="remark" value="{{ old('remark') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="guest">{{ __('Guest') }}</label>
                        <input type="text" class="form-control" id="guest" placeholder="" name="guest" value="{{ old('guest') }}" required/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection