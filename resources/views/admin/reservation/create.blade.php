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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Add Reservation') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.reservation.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <p> </p>
            <div class="card-body">
                <form action="{{ route('admin.reservation.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="reservation_for">{{ __('Reservation For ') }}</label>
                            <select class="form-control" aria-label="Default select example" id="reservation_for" name="reservation_for" required>
                                <option selected>Select Reservation For</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Triple">Triple</option>
                                <option value="For 4">For 4</option>
                                <option value="For 5">For 5</option>
                                <option value="5 above">5 above</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="reservation_type">{{ __('Reservation Type ') }}</label>
                            <select class="form-control" aria-label="Default select example" id="reservation_type" name="reservation_type" required>
                                <option selected>Select Reservation Type</option>
                                <option value="Guaranted">Guaranted</option>
                                <option value="Not Guaranted">Not Guaranted</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="request_type">{{ __('Room Type') }}</label>
                            <select class="form-control" aria-label="Default select example" id="room_type" name="room_type" required>
                                <option selected>Select Room Type</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Triple">Triple</option>
                                <option value="Quad">Quad</option>
                                <option value="Twin">Twin</option>
                                <option value="Cabana">Cabana</option>
                                <option value="Connecting Rooms">Connecting Rooms</option>
                            </select>
                        </div>

                    </div>
                    <br><br>
                    {{-- personal info --}}
                    <h4>Personal Info</h4><br>
                    <div class="form-row">
                        <div class="form-group col-md-3">    
                            <label for="first_name">{{ __('First Name ') }}</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="middle_name">{{ __('Middle Name ') }}</label>
                            <input type="text" class="form-control"  id="middle_name" name="middle_name">
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="last_name">{{ __('Last Name ') }}</label>
                            <input type="text" class="form-control"  id="last_name" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">    
                            <label for="address">{{ __('Address ') }}</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="contact">{{ __('Contact ') }}</label>
                            <input type="number" class="form-control"  id="contact" name="contact" required>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control"  id="email" name="email">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-3">    
                            <label for="passport_no">{{ __('Passport Number') }}</label>
                            <input type="number" class="form-control"  id="passport_no" name="passport_no">
                        </div>
                    </div>
                    <br><br>

                    <h4>Room Info</h4><br>
                    
                    {{-- <div class="form-row"> --}}
                        <table class="table">
                            <thead>
                              <tr>
                                
                                <th scope="col">Room No.</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Bed Type</th>
                                {{-- <th scope="col">Total No.</th> --}}
                                 <th scope="col">Pax</th>{{--number of person allowed per package --}}
                                <th scope="col">Rate</th>
                                <th scope="col">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach($reservations as $room)
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td>{{ $room->room_number }}</td> 
                                <td>{{ $room->room_type }}</td> 
                                <td>{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group"><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group"><input type="number" class="form-control col-md-4 total" readonly/></td>
                              </tr>
                              @endforeach
                              <tr>
                                <td></td>
                                <td></td>
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
                                <option selected>Select Request Type</option>
                                <option value="Direct Guest">Direct Guest</option>
                                <option value="Travel Agencies">Travel Agencies</option>
                                <option value="Central Reservation System">Central Reservation System</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="special_request_rate">{{ __('Special Request Rate') }}</label>
                            <input type="number" class="form-control special_request_rate" id="special_request_rate" name="special_request_rate" required/>
                        </div>
                    </div>
                    <br><br>

                    <h4>Reservation/ Payment Info</h4><br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="room_plan">{{ __('Room Plan') }}</label>
                            <select class="form-control" aria-label="Default select example" id="room_plan" name="room_plan" required>
                                <option selected>Select Room Plan</option>
                                <option value="American Plan">American Plan</option>
                                <option value="Modified American Plan">Modified American Plan</option>
                                <option value="Continental Plan">Continental Plan</option>
                                <option value="European Plan">European Plan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="room_plan_rate">{{ __('Room Plan Rate') }}</label>
                            <input type="number" class="form-control room_plan_rate" id="room_plan_rate" name="room_plan_rate" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="payment_mode">{{ __('Payment Mode') }}</label>
                            <select class="form-control" aria-label="Default select example" id="payment_mode" name="payment_mode" required>
                                <option selected>Select Payment Mode</option>
                                <option value="Cash in hand">Cash in hand</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Voucher">Voucher</option>
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
                                <td><input type="number" class="form-control col-md-3 room_plan_result " id="room_plan_result" readonly/></td>
                              </tr>
                              <tr>
                                <th scope="col">Grand Total</th>
                                <td><input type="number" class="form-control col-md-3" id="grandtotal" style="color:red;" name="total_rate"readonly/></td>
                              </tr>
                            </tbody>
                          </table>    
                    </div>
                    <br><br>

                    <h4>Stay Info</h4><br>
                    <div class="form-row">
                        <div class="form-group col-md-3">    
                            <label for="arrival_date">{{ __('Arrival Date ') }}</label>
                            <input type="date" class="form-control" id="arrival_date" name="arrival_date" required>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="arrival_time">{{ __('Arrival Time ') }}</label>
                            <input type="time" class="form-control"  id="arrival_time" name="arrival_time" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">    
                            <label for="departure_date">{{ __('Departure Date ') }}</label>
                            <input type="date" class="form-control" id="departure_date" name="departure_date" required>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="departure_time">{{ __('Departure Time ') }}</label>
                            <input type="time" class="form-control"  id="departure_time" name="departure_time" required>
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
    
    $('#arrival_date').attr('min', minDate);
    $('#departure_date').attr('min', minDate);
    });
</script>
@endsection
