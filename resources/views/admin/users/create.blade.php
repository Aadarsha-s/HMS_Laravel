@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Add User') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('') }}"
                            name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('') }}"
                            name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="text" class="form-control" id="password" placeholder="{{ __('') }}"
                            name="password" value="{{ old('password') }}" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="roles">{{ __('Role') }}</label> <br>
                            @foreach ($roles as $id => $roles)
                                <input type="checkbox" class="form-group" name="roles[]" id="roles" value="{{ $id }}"
                                    {{ in_array($id, old('roles', [])) || (isset($role) && $role->roles->contains($id)) ? 'selected' : '' }}>
                                    {{ $roles }} <br>
                            @endforeach
                    </div>
                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-primary btn-block ">{{ __('Save') }}</button>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="reset" class="btn btn-primary btn-block ">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Content Row -->

    </div>
@endsection
