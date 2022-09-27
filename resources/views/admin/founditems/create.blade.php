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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Found Items') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.founditems.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.founditems.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="item_name">{{ __('Item Name') }}</label>
                        <input type="text" class="form-control" id="item_name" placeholder="" name="item_name" value="{{ old('item_name') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="room_number">{{ __('Room_Number') }}</label>
                        <input type="text" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('room_number') }}" required/>
                    </div>
                    
                    <div class="form-group">
                        <label for="found_date">{{ __('Found Date') }}</label>
                        <input type="date" class="form-control" id="found_date" placeholder="" name="found_date" value="{{ old('found_date') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" placeholder="" name="description"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="found_by">{{ __('Found By') }}</label>
                        <input type="text" class="form-control" id="found_by" placeholder="" name="found_by" value="{{ old('found_by') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="reported_to">{{ __('Reported To') }}</label>
                        <input type="text" class="form-control" id="reported_to" placeholder="" name="reported_to" value="{{ old('reported_to') }}" required/>
                    </div>

                    
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection