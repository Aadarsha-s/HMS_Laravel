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
    <h5 class="font-weight-bold text-primary">{{ __('Show reservations') }}</h5>
        <div class="ml-auto">
            <a href="{{ route('admin.reservation.index') }}" class="btn btn-primary btn-sm">
                <span class="text">{{ __('Go Back') }}</span>
            </a>
        </div>
    </div>
    <p> </p>
    <div class="card-body">
            <div class="form-row">
                {{-- <div class="form-group col-md-3">
                    <label for="reservation_for">{{ __('Reservations For ') }}</label>
                    <input type="text" class="form-control" id="reservation_for" name="reservation_for" value="{{ old('reservation_for', $reservations->reservation_for) }}" readonly>
                </div> --}}
                <div class="form-group col-md-3">    
                    <label for="reservation_type">{{ __('Reservations Type ') }}</label>
                    <input type="text" class="form-control" id="reservation_type" name="reservation_type" value="{{ old('reservation_type', $reservations->reservation_type) }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="room_type">{{ __('Room Type') }}</label>
                    <input type="text" class="form-control" id="room_type" name="room_type" value="{{ old('room_type', $reservations->room_type) }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="room_number">{{ __('Room Number') }}</label>
                    <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number', $reservations->room_number) }}" readonly>
                </div>
            </div>
            <br><br>
            {{-- personal info --}}
            <h5 class="font-weight-bold text-primary">Personal Info</h5><br>
            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="first_name">{{ __('First Name ') }}</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $reservations->first_name) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="middle_name">{{ __('Middle Name ') }}</label>
                    <input type="text" class="form-control"  id="middle_name" name="middle_name" value="{{ old('middle_name', $reservations->middle_name) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="last_name">{{ __('Last Name ') }}</label>
                    <input type="text" class="form-control"  id="last_name" name="last_name" value="{{ old('last_name', $reservations->last_name) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="address">{{ __('Address ') }}</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $reservations->address) }}" readonly>
                </div>
            </div>

            <div class="form-row">    
                <div class="form-group col-md-3">    
                    <label for="contact">{{ __('Contact ') }}</label>
                    <input type="number" class="form-control"  id="contact" name="contact" value="{{ old('contact', $reservations->contact) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control"  id="email" name="email" value="{{ old('email', $reservations->email) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="passport_no">{{ __('Passport Number') }}</label>
                    <input type="number" class="form-control"  id="passport_no" name="passport_no" value="{{ old('passport_no', $reservations->passport_no) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="country">{{ __('Country') }}</label>
                    <input type="text" class="form-control"  id="country" name="country" value="{{ old('country', $reservations->country) }}" readonly>
                </div>
            </div>
            
            <br><br>

            <h5 class="font-weight-bold text-primary">Stay Info</h5><br>
            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="arrival_date">{{ __('Arrival Date ') }}</label>
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date" value="{{ old('arrival_date', $reservations->arrival_date) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="arrival_time">{{ __('Arrival Time ') }}</label>
                    <input type="time" class="form-control"  id="arrival_time" name="arrival_time" value="{{ old('arrival_time', $reservations->arrival_time) }}" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="departure_date">{{ __('Departure Date ') }}</label>
                    <input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ old('departure_date', $reservations->departure_date) }}" readonly>
                </div>
                <div class="form-group col-md-3">    
                    <label for="departure_time">{{ __('Departure Time ') }}</label>
                    <input type="time" class="form-control"  id="departure_time" name="departure_time" value="{{ old('departure_time', $reservations->departure_time) }}" readonly>
                </div>
            </div>
            <br><br>
            <h5 class="font-weight-bold text-primary">Room Info</h5><br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="request_type">{{ __('Request Type') }}</label>
                    <input type="text" class="form-control" id="request_type" name="request_type" value="{{ old('request_type', $reservations->request_type) }}" readonly>
                </div>

                <div class="form-group col-md-3">
                    <label for="special_request_rate">{{ __('Special Request Rate') }}</label>
                    <input type="number" class="form-control special_request_rate" id="special_request_rate" name="special_request_rate" value="{{ old('special_request_rate', $reservations->special_request_rate) }}" readonly/>
                </div>
            </div>
            <br><br>

            <h5 class="font-weight-bold text-primary">Reservations/ Payment Info</h5><br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="room_plan">{{ __('Room Plan') }}</label>
                    <input type="text" class="form-control" id="room_plan" name="room_plan" value="{{ old('room_plan', $reservations->room_plan) }}" readonly>
                </div>

                <div class="form-group col-md-3">
                    <label for="room_plan_rate">{{ __('Room Plan Rate') }}</label>
                    <input type="number" class="form-control room_plan_rate" id="room_plan_rate" name="room_plan_rate" value="{{ old('room_plan_rate', $reservations->room_plan_rate) }}" readonly/>
                </div>
                <div class="form-group col-md-3">
                    <label for="payment_mode">{{ __('Payment Mode') }}</label>
                    <input type="text" class="form-control" id="payment_mode" name="payment_mode" value="{{ old('payment_mode', $reservations->payment_mode) }}" readonly/>
                </div>
            </div>
            <br><br>

            <h5 class="font-weight-bold text-primary">Rate Total</h5><br>
            <div class="form-row">
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <th scope="col">Grand Total</th>
                        <td><input type="number" class="form-control col-md-3" id="grandtotal" style="color:red;" name="total_rate" value="{{ old('total_rate', $reservations->total_rate) }}"readonly/></td>
                      </tr>
                    </tbody>
                  </table>    
            </div>
            <br><br>

    </div>
</div>
            
    <!-- Content Row -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
       $(".txtMult input").keyup(multInputs);
       function multInputs() {
           var mult = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.pax', this).val();
               var $val2 = $('.rate', this).val();
               var $total = ($val1 * 1) * ($val2 * 1)
               $('.total',this).val($total);
               mult += $total;
           });
           $("#totalamt").val(mult);
           $("#room_amt_result").val(mult);
       }
    });

    $('.table-group').on('input', '#pax',function(){
        var totalsum = 0;
        $('.table-group #pax').each(function(){
            var inputval = $(this).val();
            if($.isNumeric(inputval)){
                totalsum += parseFloat(inputval);
            }
        });
        $('#totalpax').val(totalsum);
    });
        
    $(document).ready(function () {
        $(".special_request_rate").keyup(function(event) {
            text1 = $(this).val();
            $("#special_request_result").val(text1);
        });
        
        $(".room_plan_rate").keyup(function(event) {
            text2 = $(this).val();
            $("#room_plan_result").val(text2);
        });
    });

    $('.room_amt_result, .special_request_result, .room_plan_result').on("paste keyup keydown",

        function () {

        var result = parseInt($(".room_amt_result").val()) + parseInt($(".special_request_result").val()) + parseInt($(".room_plan_result").val());
        
        //$("#grandtotal").val((isNaN(result) ? '' : result));
        $("#grandtotal").val(result);
        
        }
    );
</script>
@endsection