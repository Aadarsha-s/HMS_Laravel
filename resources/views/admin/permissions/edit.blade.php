@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    
    <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h5 class="font-weight-bold text-primary">{{ __('Edit Permission') }}</h5>
                    <div class="ml-auto">
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary btn-sm">{{ __('Go Back') }}</a>
                    </div>
            </div>
            <div class="card-body">
                {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission->id], 'method'=>'PATCH']) !!}
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 12px;">Save</button>
                <button type="reset" class="btn btn-primary btn-sm">Cancel</button>
            {!! Form::close() !!}
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection