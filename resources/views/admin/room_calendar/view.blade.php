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
                    <li class="list-items"><a href="#home">Jan</a></li>
                    <li class="list-items"><a href="#news">Feb</a></li>
                    <li class="list-items"><a href="#contact">Mar</a></li>
                    <li class="list-items"><a href="#contact">Apr</a></li>
                    <li class="list-items"><a href="#contact">May</a></li>
                    <li class="list-items"><a href="#contact">Jun</a></li>
                    <li class="list-items"><a href="#contact">Jul</a></li>
                    <li class="list-items"><a href="#contact">Aug</a></li>
                    <li class="list-items"><a href="#contact">Sep</a></li>
                    <li class="list-items"><a href="#contact">Oct</a></li>
                    <li class="list-items"><a href="#contact">Nov</a></li>
                    <li class="list-items"><a href="#contact">Dec</a></li>
                  </ul>
                  
                  <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <th>Room No.</th>
                        <th>Room Type</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th>29</th>
                        <th>30</th>
                        <th>31</th>
                    </thead>
                    <tbody>
                        
                        @foreach($rooms as $key => $room)
                        
                            @if($room->room_type == "Single")
                        <tr data-entry-id="{{ $room->id }}">
                            <td>
                                {{$room->room_number}}
                            </td>
                            <td>Single</td>
                            
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>    
                        @endif
                        @endforeach

                        @foreach($rooms as $key => $room)
                        
                        @if($room->room_type == "Quad")
                    <tr data-entry-id="{{ $room->id }}">
                        <td>
                            {{$room->room_number}}
                        </td>
                        <td>Quad</td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>    
                    @endif
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
