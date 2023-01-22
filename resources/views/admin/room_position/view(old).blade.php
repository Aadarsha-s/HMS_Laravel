@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary">
                    {{ __('Check Room Status') }}
                </h5>
            </div>
            <div class="card-body container">
            
                <div>
                    <h6>Single</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Single")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                            <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div>    
                
                    
                <div>  
                    
                    <h6>Double</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Double")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                                <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div>        

                <div>
                    <h6>Triple</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Triple")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean"> Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                                <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div>
                
                <div>
                    <h6>Quad</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Quad")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                                <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div> 
                
                
                <div>
                    <h6>Twin</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Twin")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                                <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div>
                    
                <div>
                    <h6>Cabana</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Cabana")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                                <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div>    

                <div>
                    <h6>Connecting Rooms</h6>
                    @foreach ($rooms as $room)
                        @if($room->room_type == "Connecting Rooms")
                            @if($room->room_status == "Occupied")
                                <h6 class="boxed room occupied">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Dirty")
                                <h6 class="boxed room dirty">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Vacant Clean")
                                <h6 class="boxed room clean">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Reserved")
                                <h6 class="boxed room reserved">Room {{$room->room_number}}</h6>
                            @endif
                            @if($room->room_status == "Out of Order")
                                <h6 class="boxed room out">Room {{$room->room_number}}</h6>
                            @endif  
                        @endif
                    @endforeach <br>
                </div>
               
             </div>
        <h6 class="boxed occupied" >Occupied</h6>
        <h6 class="boxed dirty">Vacant Dirty</h6>
        <h6 class="boxed clean">Vacant Clean</h6> 
        <h6 class="boxed reserved">Reserved</h6> 
        <h6 class="boxed out">Out of Order</h6> 
    <!-- Content Row -->
    </div>
</div>
@endsection
<style>
    .card-body div{
        display: flex;
        flex-direction: column;
    }

    .card-body{
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .boxed {
        border: 1px solid black ;
        width: 35%;
        padding-top: 1px;
        padding-bottom: 2px;
        padding-left: 20px;
        padding-right: 4px;
    }   

    .room{
        width: 100px;
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
</style>