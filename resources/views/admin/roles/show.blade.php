@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h5 class="font-weight-bold text-primary">{{ __('Show Roles') }}</h5>
                    <div class="ml-auto">
                        @can('role-create')
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">{{ __('Go Back') }}</a>
                        @endcan
                    </div>
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
                <div class="lead">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $permission)
                            <label class="badge badge-info">{{ $permission->name }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection