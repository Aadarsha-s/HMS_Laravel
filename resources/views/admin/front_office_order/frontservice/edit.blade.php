@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h5 class=" mb-0 font-weight-bold text-primary">{{ __('Edit FrontService') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.frontservice.index') }}" class="btn btn-primary btn-sm">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.frontservice.update', $frontservices->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group col-md-6">
                        <label for="service">{{ __('Service') }}</label>
                        <input type="text" class="form-control" id="service" placeholder="" name="service" value="{{ old('service', $frontservices->service) }}" />
                    </div>
                    <div class="form-row" style="margin-left: 7px">
                       <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-primary btn-sm ">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection