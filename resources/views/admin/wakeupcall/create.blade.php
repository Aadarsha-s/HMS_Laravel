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
            <h5 class="font-weight-bold text-primary">{{ __('Add Wakeup Call') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.wakeupcall.index') }}" class="btn btn-primary btn-sm">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.wakeupcall.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="room_nuumber">{{ __('Room Number') }}</label>
                        <select class="form-control" aria-label="Default select example" id="room_number" name="room_number" required>
                            <option value="">Select Room Number</option>
                            @foreach($rooms as $room)
                                <option value="{{$room->room_number}}">{{$room->room_number}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">{{ __('Date') }}</label>
                        <input type="date" class="form-control" id="date" placeholder="" name="date" value="{{ old('date') }}" required/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="time">{{ __('Time') }}</label>
                        <input type="time" class="form-control" id="time" placeholder="" name="time" value="{{ old('time') }}" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="remark">{{ __('Remark') }}</label>
                        <input type="text" class="form-control" id="remark" placeholder="" name="remark" value="{{ old('remark') }}" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="guest">{{ __('Guest') }}</label>
                        <input type="text" class="form-control" id="guest" placeholder="" name="guest" value="{{ old('guest') }}" required/>
                    </div>
                    
                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm ">{{ __('Save') }}</button>
                        
                            <button type="reset" class="btn btn-primary btn-sm ">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
        $(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    var minDate= year + '-' + month + '-' + day;
    $('#date').attr('min', minDate);
        });
</script>

@endsection