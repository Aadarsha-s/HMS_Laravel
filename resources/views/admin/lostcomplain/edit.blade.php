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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Lost Complain') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.lostcomplain.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.lostcomplain.update', $lostcomplain->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group col-md-6">
                        <label for="item_name">{{ __('Item Name') }}</label>
                        <input type="text" class="form-control" id="item_name" placeholder="" name="item_name" value="{{ old('item_name', $lostcomplain->item_name) }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        <input type="number" class="form-control" id="room_number" placeholder="" name="room_number" value="{{ old('Room_number', $lostcomplain->room_number) }}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">{{ __('Date') }}</label>
                        <input type="date" class="form-control" id="date" placeholder="" name="date" value="{{ old('date', $lostcomplain->date) }}" required/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" name="description" placeholder="" >{{ old('description',$lostcomplain->description) }}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="complain_received">{{ __('Complain Received By') }}</label>
                        <input type="text" class="form-control" id="complain_received" placeholder="" name="complain_received" value="{{ old('complain_received', $lostcomplain->complain_received) }}" required/>
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