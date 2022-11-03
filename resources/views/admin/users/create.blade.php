@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h5 class="font-weight-bold text-primary">{{ __('Add User') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    {!! Form::text('email', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    {!! Form::password('password', ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirm Password</label>
                    {!! Form::password('password_confirmation', ['placeholder' => '', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="roles[]">Roles</label> <br/>
                    {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}

                    @foreach ($roles as $value)
                        <label>{{ Form::checkbox('roles[]', $value, [], ['class' => 'name']) }}
                            {{ $value }}</label>
                        <br />
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 12px">Save</button>
                <button type="reset" class="btn btn-primary btn-sm" style="">Cancel</button>
                {!! Form::close() !!}
            </div>
        </div>


        <!-- Content Row -->

    </div>
@endsection
