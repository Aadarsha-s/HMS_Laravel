@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary">
                    {{ __('Reservation Calendar') }}
                </h5>
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
