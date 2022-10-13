@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h3 class="m-0 font-weight-bold text-primary">
                    {{ __('Room Calendar') }}
                </h3>
            </div>
            <div class="card-body">
                <ul class="list">
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',1) }}">Jan</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',2) }}">Feb</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',3) }}">Mar</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',4) }}">Apr</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',5) }}">May</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',6) }}">Jun</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',7) }}">Jul</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',8) }}">Aug</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',9) }}">Sep</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',10) }}">Oct</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',11) }}">Nov</a></li>
                    <li class="list-items"><a href="{{ route('admin.room_calendar.show',12) }}">Dec</a></li>
                </ul>
                {{-- {{url()->current()}} <br>
                {{ Request::segment(3)}} --}}
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <th>Room No.</th>
                        <th>Room Type</th>
                        @for($i=1; $i<=$res; $i++)
                            <th>{{$i}}</th>
                        @endfor
                    </thead>
                       
                    <tbody>
                        @foreach($reservations as $reserve)
                            <?php 
                                $arr_day = date('d', strtotime($reserve->arrival_date));
                                $dep_day = date('d', strtotime($reserve->departure_date));
                                $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                            ?>
                          
                        @foreach($rooms as $room)
                            @if($room->room_type == "Single" && $reserve->room_type == "Single" && $room->room_number == $reserve->room_number && $month == $month_check)   
                                <tr data-entry-id="{{ $room->id }}">
                                    <td>{{$room->room_number}}</td>
                                    <td>{{$room->room_type}}</td>
                                        @for($i=1; $i<=$res; $i++)
                                            @if($i == $arr_day)
                                                @for($j=$i; $j<=$dep_day; $j++)
                                                    @if($room->room_status == "Occupied")
                                                            <td class="occupied"></td>
                                                        @elseif($room->room_status == "Vacant Dirty")
                                                            <td class="dirty"></td>
                                                        @elseif($room->room_status == "Vacant Clean")
                                                            <td class="clean"></td>
                                                        @elseif($room->room_status == "Reserved")
                                                            <td class="reserved"></td>
                                                        @elseif($room->room_status == "Out of Order")
                                                            <td class="out"></td>
                                                    @endif    
                                                @endfor
                                                <?php $i = $dep_day?>
                                            @else
                                                <td></td>
                                            @endif
                                        @endfor 
                                </tr>    
                                @endif
                                @endforeach
                        @endforeach

                        @foreach($rooms as $key => $room)
                            @foreach($reservations as $reserve)
                            <?php 
                                $arr_day = date('d', strtotime($reserve->arrival_date));
                                $dep_day = date('d', strtotime($reserve->departure_date));
                                $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                            ?>
                            @if($room->room_type == "Double" && $reserve->room_type == "Double" && $room->room_number == $reserve->room_number && $month == $month_check)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_type}}</td>
                                    @for($i=1; $i<=$res; $i++)
                                        @if($i == $arr_day)
                                            @for($j=$i; $j<=$dep_day; $j++)
                                                @if($room->room_status == "Occupied")
                                                    <td class="occupied"></td>
                                                @elseif($room->room_status == "Vacant Dirty")
                                                    <td class="dirty"></td>
                                                @elseif($room->room_status == "Vacant Clean")
                                                    <td class="clean"></td>
                                                @elseif($room->room_status == "Reserved")
                                                    <td class="reserved"></td>
                                                @elseif($room->room_status == "Out of Order")
                                                    <td class="out"></td>
                                                @endif    
                                            @endfor
                                            <?php $i = $dep_day?>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor 
                            </tr>    
                            @endif
                            @endforeach
                        @endforeach

                        @foreach($rooms as $key => $room)
                            @foreach($reservations as $reserve)
                            <?php 
                                $arr_day = date('d', strtotime($reserve->arrival_date));
                                $dep_day = date('d', strtotime($reserve->departure_date));
                                $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                            ?>
                            @if($room->room_type == "Triple" && $reserve->room_type == "Triple" && $room->room_number == $reserve->room_number && $month == $month_check)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_type}}</td>
                                    @for($i=1; $i<=$res; $i++)
                                        @if($i == $arr_day)
                                            @for($j=$i; $j<=$dep_day; $j++)
                                                @if($room->room_status == "Occupied")
                                                        <td class="occupied"></td>
                                                    @elseif($room->room_status == "Vacant Dirty")
                                                        <td class="dirty"></td>
                                                    @elseif($room->room_status == "Vacant Clean")
                                                        <td class="clean"></td>
                                                    @elseif($room->room_status == "Reserved")
                                                        <td class="reserved"></td>
                                                    @elseif($room->room_status == "Out of Order")
                                                        <td class="out"></td>
                                                @endif
                                            @endfor
                                            <?php $i = $dep_day?>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor 
                            </tr>    
                            @endif
                            @endforeach
                        @endforeach

                        @foreach($rooms as $room)
                            @foreach($reservations as $reserve)
                            <?php 
                                $arr_day = date('d', strtotime($reserve->arrival_date));
                                $dep_day = date('d', strtotime($reserve->departure_date));
                                $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                            ?>
                            @if($room->room_type == "Quad" && $reserve->room_type == "Quad" && $room->room_number == $reserve->room_number && $month == $month_check)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_type}}</td>
                                    @for($i=1; $i<=$res; $i++)            
                                        @if($i == $arr_day)
                                            @for($j = $i; $j <= $dep_day; $j++)
                                                @if($room->room_status == "Occupied")
                                                        <td class="occupied"></td>
                                                    @elseif($room->room_status == "Vacant Dirty")
                                                        <td class="dirty"></td>
                                                    @elseif($room->room_status == "Vacant Clean")
                                                        <td class="clean"></td>
                                                    @elseif($room->room_status == "Reserved")
                                                        <td class="reserved"></td>
                                                    @elseif($room->room_status == "Out of Order")
                                                        <td class="out"></td>
                                                @endif
                                            @endfor
                                            <?php $i = $dep_day?>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor 
                            </tr>    
                            @endif
                            @endforeach
                        @endforeach

                        @foreach($rooms as $key => $room)
                            @foreach($reservations as $reserve)
                            <?php 
                             $arr_day = date('d', strtotime($reserve->arrival_date));
                              $dep_day = date('d', strtotime($reserve->departure_date));
                              $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                             ?>
                             @if($room->room_type == "Twin" && $reserve->room_type == "Twin" && $room->room_number == $reserve->room_number && $month == $month_check)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_type}}</td>
                                        @for($i=1; $i<=$res; $i++)
                                            @if($i == $arr_day)
                                                @for($j = $i; $j <= $dep_day; $j++)
                                                    @if($room->room_status == "Occupied")
                                                            <td class="occupied"></td>
                                                        @elseif($room->room_status == "Vacant Dirty")
                                                            <td class="dirty"></td>
                                                        @elseif($room->room_status == "Vacant Clean")
                                                            <td class="clean"></td>
                                                        @elseif($room->room_status == "Reserved")
                                                            <td class="reserved"></td>
                                                        @elseif($room->room_status == "Out of Order")
                                                            <td class="out"></td>
                                                    @endif
                                                @endfor
                                                <?php $i = $dep_day?>
                                            @else
                                                <td></td>
                                            @endif
                                        @endfor 
                                    
                            </tr>    
                            @endif
                            @endforeach
                        @endforeach
                        
                        @foreach($rooms as $key => $room)
                        @foreach($reservations as $reserve)
                            <?php 
                            $arr_day = date('d', strtotime($reserve->arrival_date));
                            $dep_day = date('d', strtotime($reserve->departure_date));
                            $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                            ?>
                        
                            @if($room->room_type == "Cabana" && $reserve->room_type == "Cabana" && $room->room_number == $reserve->room_number && $month == $month_check)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_type}}</td>
                                        @for($i=1; $i<=$res; $i++)
                                            @if($i == $arr_day)
                                                @for($j = $i; $j <= $dep_day; $j++)
                                                    @if($room->room_status == "Occupied")
                                                            <td class="occupied"></td>
                                                        @elseif($room->room_status == "Vacant Dirty")
                                                            <td class="dirty"></td>
                                                        @elseif($room->room_status == "Vacant Clean")
                                                            <td class="clean"></td>
                                                        @elseif($room->room_status == "Reserved")
                                                            <td class="reserved"></td>
                                                        @elseif($room->room_status == "Out of Order")
                                                            <td class="out"></td>
                                                    @endif
                                                @endfor
                                                <?php $i = $dep_day?>
                                            @else
                                                <td></td>
                                            @endif
                                        @endfor 
                            </tr>    
                            @endif
                            @endforeach
                        @endforeach

                        @foreach($rooms as $key => $room)
                        @foreach($reservations as $reserve)
                                    <?php 
                                        $arr_day = date('d', strtotime($reserve->arrival_date));
                                        $dep_day = date('d', strtotime($reserve->departure_date));
                                        $month = date('m', strtotime($reserve->departure_date));
                                $month_check = Request::segment(3);
                                    ?>
                            @if($room->room_type == "Connecting Rooms" && $reserve->room_type == "Connecting Rooms" && $room->room_number == $reserve->room_number && $month == $month_check)
                            <tr data-entry-id="{{ $room->id }}">
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_type}}</td>
                                        @for($i=1; $i<=$res; $i++)
                                            @if($i == $arr_day)
                                                @for($j = $i; $j <= $dep_day; $j++)
                                                    @if($room->room_status == "Occupied")
                                                            <td class="occupied"></td>
                                                        @elseif($room->room_status == "Vacant Dirty")
                                                            <td class="dirty"></td>
                                                        @elseif($room->room_status == "Vacant Clean")
                                                            <td class="clean"></td>
                                                        @elseif($room->room_status == "Reserved")
                                                            <td class="reserved"></td>
                                                        @elseif($room->room_status == "Out of Order")
                                                            <td class="out"></td>
                                                    @endif
                                                @endfor
                                                <?php $i = $dep_day?>
                                            @else
                                                <td></td>
                                            @endif
                                        @endfor 
                            
                            </tr>    
                            @endif
                            @endforeach
                        @endforeach

                    </tbody>
                  </table>
                  <br>
                  <h6 class="boxed occupied" >Occupied</h6>
                  <h6 class="boxed dirty">Vacant Dirty</h6>
                  <h6 class="boxed clean">Vacant Clean</h6> 
                  <h6 class="boxed reserved">Reserved</h6> 
                  <h6 class="boxed out">Out of Order</h6> 
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection
<style>
    .boxed {
        border: 1px solid black ;
        width: 35%;
        padding-top: 1px;
        padding-bottom: 2px;
        padding-left: 20px;
        padding-right: 4px;
    }   

    .room{
        width: 15%;
    }
    .occupied {
        background-color: rgb(255, 0, 0);
        color: white;
    }
    .dirty {
        background-color: rgb(224, 192, 7);
        color: white;
    }.clean {
        background-color: rgb(52, 207, 38);
        color: white;
    }.reserved {
        background-color: #e76666;
        color: white;
    }.out {
        background-color: rgb(63, 16, 16);
        color: white;
    }

    .list{
    list-style-type: none;
    margin: 0;
    display: flex;    
    overflow: hidden;
    padding: 0;
    background-color: rgb(55, 87, 136);
    justify-content: space-evenly;
    }

    .list-items {
    border-right:1px solid #bbb;
    width: 100%;
    text-align: center;
    padding: 0;
    }

    .list-items:last-child {
    border-right: none;
    }

    .list-items a {
    display: block;
    color: rgb(255, 255, 255);
    text-align: center;
    text-decoration: none;
    padding: 15px 0;
    width: 100%;
    }

    .list-items a:hover:not(.active) {
    background-color: rgb(189, 188, 212);
    text-decoration: none;
    }
 

</style>
