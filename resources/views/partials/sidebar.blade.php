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
    @canany(['permission-list', 'role-list', 'user-list'])
        <li class="nav-item dropdown no-arrow">
            {{-- <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="collapse" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span>{{ __('Access Management') }}</span><i class="fa fa-chevron-down" style="float: right;"></i>
        </a> --}}
            <a href="#" class="nav-link dropdown-btn" data-toggle="collapse">
                <i class="fas fa-users-cog"></i>
                <span>{{ __('Access Management') }}</span>
            </a>

            <div class="dropdown-menu">
                @can('permission-list')
                    <a class="dropdown-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}"
                        href="{{ route('admin.permissions.index') }}"> <i class="fa fa-lock mr-2"></i>
                        {{ __('Permissions') }}</a>
                @endcan
                @can('role-list')
                    <a class="dropdown-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}"
                        href="{{ route('admin.roles.index') }}"><i class="fa fa-tasks mr-2"></i> {{ __('Roles') }}</a>
                @endcan
                @can('user-list')
                    <a class="dropdown-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}"> <i class="fa fa-users mr-2"></i> {{ __('Users') }}</a>
                @endcan
            </div>
        </li>
    @endcanany

    @can('room1-list')
        <li class="nav-item dropdown no-arrow">
            {{-- <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="collapse" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span>{{ __('Room Management') }}</span><i class="fa fa-chevron-down" style="float: right;"></i>
        </a>
         --}}
            <a href="#" class="nav-link dropdown-btn" data-toggle="collapse">
                <i class="fas fa-door-closed"></i>
                <span>{{ __('Room Management') }}</span>
            </a>

            <div class="dropdown-menu">

                <a class="dropdown-item" href="{{ route('admin.rooms.index') }}">
                    <i class="fa fa-door-closed mr-2"></i><span>{{ __('Room') }}</span>
                </a>

                <a class="dropdown-item" href="{{ route('admin.room_position.show') }}">
                    <i class="fa fa-map-marker-alt mr-2"></i> <span>{{ __('Check Room Status') }}</span>
                </a>

            </div>
        </li>
    @endcan
    @can('booking-list')
        <li class="nav-item dropdown no-arrow">
            {{-- <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="collapse" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span>{{ __('Booking Management') }}</span><i class="fa fa-chevron-down" style="float: right;"></i>
        </a> --}}
            <a href="#" class="nav-link dropdown-btn" data-toggle="collapse">
                <i class="fas fa-hotel"></i>
                <span>{{ __('Booking Management') }}</span>
            </a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.reservation.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-hotel mr-2"></i><span>{{ __('Reservation') }}</span>
                </a>
                <a class="dropdown-item" href="{{ route('admin.room_calendar.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-calendar mr-2"></i> <span>{{ __('Reservation Calendar') }}</span>
                </a>
            </div>
        </li>
    @endcan

    <li class="nav-item dropdown no-arrow">
        {{-- <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="collapse" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span>{{ __('Service Management') }}</span><i class="fa fa-chevron-down" style="float: right;"></i>
        </a> --}}
        <a href="#" class="nav-link dropdown-btn" data-toggle="collapse">
            <i class="fa fa-wrench mr-2"></i><span>{{ __('Service Management') }}</span>
        </a>

        <div class="dropdown-menu">
            @can('frontoffice-list')
                <a class="dropdown-item" href="{{ route('admin.front_office_order.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-suitcase-rolling mr-2"></i><span>{{ __('FrontOffice Order') }}</span>
                </a>
            @endcan

            @can('lostcomplain-list')
                <a class="dropdown-item" href="{{ route('admin.lostcomplain.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-comment mr-2"></i><span>{{ __('Lost Complain') }}</span>
                </a>
            @endcan

            @can('founditems-list')
                <a class="dropdown-item" href="{{ route('admin.founditems.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-suitcase mr-2"></i><span>{{ __('Found Items') }}</span>
                </a>
            @endcan

            @can('wakeupcall-list')
                <a class="dropdown-item" href="{{ route('admin.wakeupcall.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-phone-alt mr-2"></i><span>{{ __('Wakeup Call') }}</span>
                </a>
            @endcan

            @can('business_source-list')
                <a class="dropdown-item" href="{{ route('admin.business_source.index') }}" data-toggle=""
                    data-target="#collapseRoom" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-credit-card mr-2"></i><span>{{ __('Business Source') }}</span>
                </a>
            @endcan

        </div>
    </li>
</ul>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
