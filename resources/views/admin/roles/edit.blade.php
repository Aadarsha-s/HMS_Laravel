@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Roles') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group col-md-6">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                            value="{{ old('title', $role->title) }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="permissions">{{ __('Permission') }}</label> <br>
                        @foreach ($permissions as $id => $permissions)
                            <input type="checkbox" name="permissions[]" id="permissions" class="form-group"
                                value="{{ $id }}"
                                {{ in_array($id, old('permissions', [])) || (isset($role) && $role->permissions->contains($id)) ? 'checked' : '' }}>
                            {{ $permissions }} <br>
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
