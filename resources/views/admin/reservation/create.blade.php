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
            <h5 class="font-weight-bold text-primary">{{ __('Add Reservation') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.reservation.index') }}" class="btn btn-primary btn-sm">
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
                                <option value="">Select Reservation For</option>
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
                                <option value="">Select Reservation Type</option>
                                <option value="Guaranted">Guaranted</option>
                                <option value="Not Guaranted">Not Guaranted</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="room_type">{{ __('Room Type') }}</label>
                            <select class="form-control" aria-label="Default select example" id="room_type" name="room_type" required>
                                <option value="">Select Room Type</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Triple">Triple</option>
                                <option value="Quad">Quad</option>
                                <option value="Twin">Twin</option>
                                <option value="Cabana">Cabana</option>
                                <option value="Connecting Rooms">Connecting Rooms</option>
                            </select>
                        </div>        
                        <div class="form-group col-md-3">
                            <label for="room_number">{{ __('Room Number') }}</label>
                            <select class="form-control" aria-label="Default select example" id="room_number" name="room_number" required>
                                <option value="">Select Room Number</option>
                                @foreach($reservations as $room)
                                    @if ($room->room_type == "Single")
                                        <option class="Single" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @elseif ($room->room_type == "Double")
                                        <option class="Double" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @elseif ($room->room_type == "Triple")
                                        <option class="Triple" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @elseif ($room->room_type == "Quad")
                                        <option class="Quad" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @elseif ($room->room_type == "Twin")
                                        <option class="Twin" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @elseif ($room->room_type == "Cabana")
                                        <option class="Cabana" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @elseif ($room->room_type == "Connecting Rooms")
                                        <option class="ConnectingRooms" value="{{$room->room_number}}">{{$room->room_number}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> 
                    </div>
                    <br><br>
                    {{-- personal info --}}
                    <h5>Personal Info</h5><br>
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
                        <div class="form-group col-md-3">    
                            <label for="address">{{ __('Address ') }}</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">    
                            <label for="contact">{{ __('Contact ') }}</label>
                            <input type="number" class="form-control"  id="contact" name="contact" required>
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control"  id="email" name="email">
                        </div>
                        <div class="form-group col-md-3">    
                            <label for="passport_no">{{ __('Passport Number') }}</label>
                            <input type="number" class="form-control"  id="passport_no" name="passport_no">
                        </div>
                    </div>
                    
                    <br><br>

                    <h5>Room Info</h5><br>
                    
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
                               @if ($room->room_type == "Single")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="Single">{{ $room->room_number }}</td> 
                                <td class="Single">{{ $room->room_type }}</td> 
                                <td class="Single">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group Single "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group Single ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group Single "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                          
                              @if ($room->room_type == "Double")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="Double">{{ $room->room_number }}</td> 
                                <td class="Double">{{ $room->room_type }}</td> 
                                <td class="Double">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group Double "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group Double ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group Double "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                          
                              @if ($room->room_type == "Triple")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="Triple">{{ $room->room_number }}</td> 
                                <td class="Triple">{{ $room->room_type }}</td> 
                                <td class="Triple">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group Triple "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group Triple ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group Triple "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                          
                              @if ($room->room_type == "Quad")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="Quad">{{ $room->room_number }}</td> 
                                <td class="Quad">{{ $room->room_type }}</td> 
                                <td class="Quad">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group Quad "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group Quad ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group Quad "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                          
                              @if ($room->room_type == "Twin")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="Twin">{{ $room->room_number }}</td> 
                                <td class="Twin">{{ $room->room_type }}</td> 
                                <td class="Twin">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group Twin "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group Twin ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group Twin "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                          
                              @if ($room->room_type == "Cabana")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="Cabana">{{ $room->room_number }}</td> 
                                <td class="Cabana">{{ $room->room_type }}</td> 
                                <td class="Cabana">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group Cabana "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group Cabana ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group Cabana "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                          
                               @if ($room->room_type == "Connecting Rooms")
                              <tr data-entry-id="{{ $room->id }}" class="txtMult">
                                <td class="ConnectingRooms">{{ $room->room_number }}</td> 
                                <td class="ConnectingRooms">{{ $room->room_type }}</td> 
                                <td class="ConnectingRooms">{{ $room->bed_type }}</td>
                                {{-- <td>
                                    <div class="col-md-4">    
                                        <input type="number" class="form-control" id="total_no" name="total_no"/>
                                    </div>
                                </td> --}}
                                <td class="table-group ConnectingRooms "><input type="number" class="form-control col-md-3 pax" id="pax"/></td>
                                <td class="table-group ConnectingRooms ">Rs. <input type="hidden" readonly class="rate" value="{{ old('room_rate', $room->room_rate) }}"/>{{ $room->room_rate }}</td>
                                <td class="table-group ConnectingRooms "><input type="number" class="form-control col-md-5 total" readonly/></td>
                              </tr>
                              @endif
                              @endforeach


                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th scope="row" colspan="2">Total Pax <input type="number" class="form-control col-md-2" id="totalpax" name="totalpax" readonly/>                  
                                </th>
                                <th scope="row" class="table-group">Total Amount<input type="number" class="form-control col-md-5 totalamt" id="totalamt" name="totalamt" readonly/>                  
                              </tr>
                            </tbody>
                        
                          </table>    
                    {{-- </div> --}}

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="request_type">{{ __('Request Type') }}</label>
                            <select class="form-control" aria-label="Default select example" id="request_type" name="request_type" required>
                                <option value="">Select Request Type</option>
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

                    <h5>Reservation/ Payment Info</h5><br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="room_plan">{{ __('Room Plan') }}</label>
                            <select class="form-control" aria-label="Default select example" id="room_plan" name="room_plan" required>
                                <option value="">Select Room Plan</option>
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
                                <option value="">Select Payment Mode</option>
                                <option value="Cash in hand">Cash in hand</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Voucher">Voucher</option>
                            </select>
                        </div>
                    </div>
                    <br><br>

                    <h5>Rate Total</h5><br>
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

                    <h5>Stay Info</h5><br>
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
                    
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 0px">Save</button>
                    <button type="reset" class="btn btn-primary btn-sm" style="">Cancel</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
      $("select#room_type").on('change', function () {
         if ($(this).val() == "Single") {
         // Default show the Choose Size Option
          $('#room_number option:first').attr('selected', 'selected'); 
          $(".Single").show();
          $(".Double").hide();
          $(".Triple").hide();
          $(".Quad").hide();
          $(".Twin").hide();
          $(".Cabana").hide();
          $(".ConnectingRooms").hide();
          
         } else if ($(this).val() == "Double") {
          $('#room_number option:first').attr('selected', 'selected');
          $(".Double").show();
          $(".Single").hide();
          $(".Triple").hide();
          $(".Quad").hide();
          $(".Twin").hide();
          $(".Cabana").hide();
          $(".ConnectingRooms").hide();
         } else if ($(this).val() == "Triple") {
          $('#room_number option:first').attr('selected', 'selected');
          $(".Triple").show();
          $(".Single").hide();
          $(".Double").hide();
          $(".Quad").hide();
          $(".Twin").hide();
          $(".Cabana").hide();
          $(".ConnectingRooms").hide();
        } else if ($(this).val() == "Quad") {
          $('#room_number option:first').attr('selected', 'selected');
          $(".Quad").show();
          $(".Single").hide();
          $(".Double").hide();
          $(".Triple").hide();
          $(".Twin").hide();
          $(".Cabana").hide();
          $(".ConnectingRooms").hide();
         } else if ($(this).val() == "Twin") {
          $('#room_number option:first').attr('selected', 'selected');
          $(".Twin").show();
          $(".Single").hide();
          $(".Double").hide();
          $(".Triple").hide();
          $(".Quad").hide();
          $(".Cabana").hide();
          $(".ConnectingRooms").hide();
         } else if ($(this).val() == "Cabana") {
          $('#room_number option:first').attr('selected', 'selected');
          $(".Cabana").show();
          $(".Single").hide();
          $(".Double").hide();
          $(".Triple").hide();
          $(".Twin").hide();
          $(".Quad").hide();
          $(".ConnectingRooms").hide();
         } else if ($(this).val() == "Connecting Rooms") {
          $('#room_number option:first').attr('selected', 'selected');
          $(".ConnectingRooms").show();
          $(".Quad").hide();
          $(".Single").hide();
          $(".Double").hide();
          $(".Triple").hide();
          $(".Twin").hide();
          $(".Cabana").hide();
         
         } 

      });
  });

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
