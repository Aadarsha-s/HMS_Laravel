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
            <h5 class="font-weight-bold text-primary">{{ __('Add Lost Complain') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.lostcomplain.index') }}" class="btn btn-primary btn-sm">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.lostcomplain.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="item_name">{{ __('Item Name') }}</label>
                        <input type="text" class="form-control" id="item_name" placeholder="" name="item_name" value="{{ old('item_name') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="room_number">{{ __('Room Number') }}</label>
                        <select class="form-control" aria-label="Default select example" id="room_number" name="room_number" required>
                            <option value="">Select Room Number</option>
                            @foreach($rooms as $room)
                                <option value="{{$room->room_number}}">{{$room->room_number}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">{{ __('Date') }}</label>
                        <input type="date" class="form-control" id="lostdate" placeholder="" name="date" value="{{ old('date') }}" required/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control" id="your_summernote" rows="4" placeholder="" name="description"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="complain_received">{{ __('Complain Received By') }}</label>
                        <input type="text" class="form-control" id="complain_received" placeholder="" name="complain_received" value="{{ old('complain_received') }}" required/>
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
    $('#lostdate').attr('max', minDate);
        });
</script>
@endsection
