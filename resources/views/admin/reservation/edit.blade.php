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
    <h1 class="h3 mb-0 text-gray-800">{{ __('Add reservations') }}</h1>
        <div class="ml-auto">
            <a href="{{ route('admin.reservation.index') }}" class="btn btn-primary">
                <span class="text">{{ __('Go Back') }}</span>
            </a>
        </div>
    </div>
    <p> </p>
    <div class="card-body">
        <form action="{{ route('admin.reservation.update', $reservations->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="reservation_for">{{ __('Reservations For ') }}</label>
                    <select class="form-control" aria-label="Default select example" id="reservation_for" name="reservation_for" required>
                        
                        <option value="Single" {{ $reservations->reservation_for == "Single" ? 'selected' : '' }}>Single</option>
                        <option value="Double"  {{ $reservations->reservation_for == "Double" ? 'selected' : '' }}>Double</option>
                        <option value="Triple"  {{ $reservations->reservation_for == "Triple" ? 'selected' : '' }}>Triple</option>
                        <option value="For 4"  {{ $reservations->reservation_for == "For 4" ? 'selected' : '' }}>For 4</option>
                        <option value="For 5"  {{ $reservations->reservation_for == "For 5" ? 'selected' : '' }}>For 5</option>
                        <option value="5 above"  {{ $reservations->reservation_for == "5 above" ? 'selected' : '' }}>5 above</option>
                    </select>
                </div>
                <div class="form-group col-md-3">    
                    <label for="reservation_type">{{ __('Reservations Type ') }}</label>
                    <select class="form-control" aria-label="Default select example" id="reservation_type" name="reservation_type" required>
                        <option value="Guaranted"  {{ $reservations->reservation_for == "Guaranted" ? 'selected' : '' }}>Guaranted</option>
                        <option value="Not Guaranted"  {{ $reservations->reservation_for == "Not Guaranted" ? 'selected' : '' }}>Not Guaranted</option>
                    </select>
                </div>
            </div>
            <br><br>
            {{-- personal info --}}
            <h4>Personal Info</h4><br>
            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="first_name">{{ __('First Name ') }}</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $reservations->first_name) }}" required>
                </div>
                <div class="form-group col-md-3">    
                    <label for="middle_name">{{ __('Middle Name ') }}</label>
                    <input type="text" class="form-control"  id="middle_name" name="middle_name" value="{{ old('middle_name', $reservations->middle_name) }}">
                </div>
                <div class="form-group col-md-3">    
                    <label for="last_name">{{ __('Last Name ') }}</label>
                    <input type="text" class="form-control"  id="last_name" name="last_name" value="{{ old('last_name', $reservations->last_name) }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="address">{{ __('Address ') }}</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $reservations->address) }}" required>
                </div>
                <div class="form-group col-md-3">    
                    <label for="contact">{{ __('Contact ') }}</label>
                    <input type="number" class="form-control"  id="contact" name="contact" value="{{ old('contact', $reservations->contact) }}" required>
                </div>
                <div class="form-group col-md-3">    
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control"  id="email" name="email" value="{{ old('email', $reservations->email) }}">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="passport_no">{{ __('Passport Number') }}</label>
                    <input type="number" class="form-control"  id="passport_no" name="passport_no" value="{{ old('passport_no', $reservations->passport_no) }}">
                </div>
            </div>
            <br><br>

            <h4>Room Info</h4><br>
            
            {{-- <div class="form-row"> --}}
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Room Type</th>
                        {{-- <th scope="col">Total No.</th> --}}
                         <th scope="col">Pax</th>{{--number of person allowed per package --}}
                        <th scope="col">Rate</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($rooms as $room)
                      <tr data-entry-id="{{ $room->id }}" class="txtMult">
                        <td>{{ $room->room_type }}</td> 
                        {{-- <td>
                            <div class="col-md-4">    
                                <input type="number" class="form-control" id="total_no" name="total_no"/>
                            </div>
                        </td>  --}}
                        <td class="table-group"><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                        <td class="table-group">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                        <td class="table-group"><input type="number" class="form-control col-md-4 total" readonly/></td>
                      </tr>
                      @endforeach
                      <tr>
                        <td></td>
                        <th scope="row" colspan="2">Total Pax <input type="number" class="form-control col-md-2" id="totalpax" name="totalpax" readonly/>                  
                        </th>
                        <th scope="row" class="table-group">Total Amount<input type="number" class="form-control col-md-4 totalamt" id="totalamt" name="totalamt" readonly/>                  
                      </tr>
                    
                    </tbody>
                
                  </table>    
            {{-- </div> --}}

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="request_type">{{ __('Request Type') }}</label>
                    <select class="form-control" aria-label="Default select example" id="request_type" name="request_type" required>
                        
                        <option value="Direct Guest" {{ $reservations->request_type == "Direct Guest" ? 'selected' : '' }}>Direct Guest</option>
                        <option value="Travel Agencies" {{ $reservations->request_type == "Travel Agencies" ? 'selected' : '' }}>Travel Agencies</option>
                        <option value="Central reservations System" {{ $reservations->request_type == "Central reservations System" ? 'selected' : '' }}>Central reservations System</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="special_request_rate">{{ __('Special Request Rate') }}</label>
                    <input type="number" class="form-control special_request_rate" id="special_request_rate" name="special_request_rate" value="{{ old('special_request_rate', $reservations->special_request_rate) }}" required/>
                </div>
            </div>
            <br><br>

            <h4>Reservations/ Payment Info</h4><br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="room_plan">{{ __('Room Plan') }}</label>
                    <select class="form-control" aria-label="Default select example" id="room_plan" name="room_plan" required>
                        
                        <option value="American Plan" {{ $reservations->room_plan == "American Plan" ? 'selected' : '' }}>American Plan</option>
                        <option value="Modified American Plan" {{ $reservations->room_plan == "Modified American Plan" ? 'selected' : '' }}>Modified American Plan</option>
                        <option value="Continental Plan" {{ $reservations->room_plan == "Continental Plan" ? 'selected' : '' }}>Continental Plan</option>
                        <option value="European Plan" {{ $reservations->room_plan == "European Plan" ? 'selected' : '' }}>European Plan</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="room_plan_rate">{{ __('Room Plan Rate') }}</label>
                    <input type="number" class="form-control room_plan_rate" id="room_plan_rate" name="room_plan_rate" value="{{ old('room_plan_rate', $reservations->room_plan_rate) }}" required/>
                </div>
                <div class="form-group col-md-3">
                    <label for="payment_mode">{{ __('Payment Mode') }}</label>
                    <select class="form-control" aria-label="Default select example" id="payment_mode" name="payment_mode" required>
                        
                        <option value="Cash in hand" {{ $reservations->payment_mode == "Cash in hand" ? 'selected' : '' }}>Cash in hand</option>
                        <option value="Credit Card" {{ $reservations->payment_mode == "Credit Card" ? 'selected' : '' }}>Credit Card</option>
                        <option value="Debit Card" {{ $reservations->payment_mode == "Debit Card" ? 'selected' : '' }}>Debit Card</option>
                        <option value="Voucher" {{ $reservations->payment_mode == "Voucher" ? 'selected' : '' }}>Voucher</option>
                    </select>
                </div>
            </div>
            <br><br>

            <h4>Rate Total</h4><br>
            <div class="form-row">
                <table class="table table-sm">
                    <tbody>
                        
                      <tr class="txttotal">
                        <th scope="col">Room Charge</th>
                        <td><input type="number" class="form-control col-md-3 room_amt_result" id="room_amt_result" readonly/></td>
                      </tr>
                      <tr class="txttotal">
                        <th scope="col">Special Request Charge</th>
                        <td><input type="number" class="form-control col-md-3 special_request_result" id="special_request_result" readonly/></td>
                      </tr>
                      <tr class="txttotal">
                        <th scope="col">Room Plan Charge</th>
                        <td><input type="number" class="form-control col-md-3 room_plan_result " id="room_plan_result"value="{{ old('room_plan_result') }}" readonly/></td>
                      </tr>
                      <tr>
                        <th scope="col">Grand Total</th>
                        <td><input type="number" class="form-control col-md-3" id="grandtotal" style="color:red;" name="total_rate" value="{{ old('total_rate', $reservations->total_rate) }}"readonly/></td>
                      </tr>
                    </tbody>
                  </table>    
            </div>
            <br><br>

            <h4>Stay Info</h4><br>
            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="arrival_date">{{ __('Arrival Date ') }}</label>
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date" value="{{ old('arrival_date', $reservations->arrival_date) }}" required>
                </div>
                <div class="form-group col-md-3">    
                    <label for="arrival_time">{{ __('Arrival Time ') }}</label>
                    <input type="time" class="form-control"  id="arrival_time" name="arrival_time" value="{{ old('arrival_time', $reservations->arrival_time) }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">    
                    <label for="departure_date">{{ __('Departure Date ') }}</label>
                    <input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ old('departure_date', $reservations->departure_date) }}" required>
                </div>
                <div class="form-group col-md-3">    
                    <label for="departure_time">{{ __('Departure Time ') }}</label>
                    <input type="time" class="form-control"  id="departure_time" name="departure_time" value="{{ old('departure_time', $reservations->departure_time) }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
        </form>
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