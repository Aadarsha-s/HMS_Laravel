@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="font-weight-bold text-primary">Dashboard</h5>
    </div>

    <!-- Content Row -->
    <div class="row">   
        <div class="col-xl-3 col-md-4 mb-4">
            <a class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" style="text-decoration: none;"
                href="{{ route('admin.users.index') }}"> 
                <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users </div>
                                <strong>{{$user_count}}</strong>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>                               
        </div>
    

        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{ route('admin.rooms.index') }}" style="text-decoration: none;">    
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Room</div> <strong>{{$room_count}}</strong>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-door-closed fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{ route('admin.reservation.index') }}" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Guest</div> <strong>{{$reservation_count}}</strong>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-person fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <a style="text-decoration:none;" href="{{ route('admin.front_office_order.index') }}">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Front Office Order
                                </div> <strong>{{$frontoffice_count}}</strong>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase-rolling fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pending Requests Card Example -->
        
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-4 mb-4">
            <a style="text-decoration: none;" href="{{ route('admin.lostcomplain.index') }}">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Lost Complain</div> <strong>{{$lostcomplain_count}}</strong>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-4 mb-4">
            <a style="text-decoration: none;" href="{{ route('admin.founditems.index') }}">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Found Items</div> <strong>{{$founditem_count}}</strong>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-4 mb-4">
            <a style="text-decoration:none;" href="{{ route('admin.wakeupcall.index') }}">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Wakeup Call</div> <strong>{{$wakeupcall_count}}</strong>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-phone-alt fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-4 mb-4">
            <a style="text-decoration:none;" href="{{ route('admin.business_source.index') }}">
                <div class="card border-left-dark shadow h-100 py-2">   
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-daek text-uppercase mb-1">
                                    Business Source</div> <strong>{{$b_count}}</strong>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-credit-card fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Content Row -->
</div>
@endsection