@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('create permission') }}</h1>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
    </div> --}}

    <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Add Permission') }}</h1>
                    <div class="ml-auto">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">{{ __('Go Back') }}</a>
                    </div>
                </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="title" placeholder="{{ __('') }}" name="title" value="{{ old('title') }}" />
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