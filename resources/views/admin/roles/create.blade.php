@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
                <h5 class="font-weight-bold text-primary">{{ __('Add Roles') }}</h5>
                    <div class="ml-auto">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">{{ __('Go Back') }}</a>
                    </div>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="permission[]">Permission</label>
                        <br/>
                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
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