@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h5 class="font-weight-bold text-primary">{{ __('Add Room Type') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.roomtype.index') }}" class="btn btn-primary btn-sm">
                        
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roomtype.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="room_type">{{ __('Room Type') }}</label>
                        <input type="text" class="form-control" id="room_type" placeholder="" name="room_type" value="{{ old('room_type') }}" required/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 12px">Save</button>
                    <button type="reset" class="btn btn-primary btn-sm" style="">Cancel</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection