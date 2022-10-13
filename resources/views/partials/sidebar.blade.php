<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">{{ __('Hotel Admin Page') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <li class="nav-item">
            
            
            
                        <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Permissions') }}</a>
                        <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="fa fa-briefcase mr-2"></i> {{ __('Roles') }}</a>
                        <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Users') }}</a>
            
            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.rooms.index') }}" data-toggle="" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Room') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.front_office_order.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('FrontOffice Order') }}</span>
                </a>
            </li>
            
            {{-- <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="collapse" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span>{{ __('Lost and Found') }}</span>
                    
                </a>
                
                <div class="dropdown-menu">
                    
                        <a class="dropdown-item {{ request()->is('admin/lostcomplain') || request()->is('admin/lostcomplain/*') ? 'active' : '' }}" href="{{ route('admin.lostcomplain.index') }}"> {{ __('Lost Complain') }}</a>
                        <a class="dropdown-item {{ request()->is('admin/founditems') || request()->is('admin/founditems/*') ? 'active' : '' }}" href="{{ route('admin.founditems.index') }}"> {{ __('Found Items') }}</a>
                    </div>
                
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.lostcomplain.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Lost Complain') }}</span>
                </a>
            </li>
            
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.founditems.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Found Items') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.wakeupcall.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Wakeup Call') }}</span>
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business_source.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Business Source') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.reservation.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Reservation') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.room_position.show') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Check Room Position') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.room_calendar.index') }}" data-toggle="" data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Room Calendar') }}</span>
                </a>
            </li>
            
            <!-- Nav Item  -->
            {{-- <li class="nav-item {{ request()->is('admin/system_calendars') || request()->is('admin/system_calendars') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.system_calendars.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>{{ __('Calendar') }}</span></a>
            </li> --}}


        </ul>