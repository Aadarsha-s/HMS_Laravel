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
                <h5 class="mb-0 font-weight-bold text-primary">{{ __('Add Permission') }}</h5>
                    <div class="ml-auto">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary btn-sm">{{ __('Go Back') }}</a>
                    </div>
                </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'admin.permissions.store','method'=>'POST')) !!}
                <div class="form-group col-md-6">
                    <label for="name">{{ __('Name') }}</label>
                    {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 12px">Save</button>
                <button type="reset" class="btn btn-primary btn-sm" style="">Cancel</button>
            {!! Form::close() !!}
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection