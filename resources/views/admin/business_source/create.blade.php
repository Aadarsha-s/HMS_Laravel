@extends('layouts.admin')

@section('content')
<div class="container-fluid">
{{-- 
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h5 class="font-weight-bold text-primary">{{ __('Add Business Source') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.business_source.index') }}" class="btn btn-primary btn-sm">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.business_source.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="source">{{ __('Source') }}</label>
                        <input type="text" class="form-control" id="source" placeholder="" name="source" value="{{ old('source') }}" required/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="apply_commission">{{ __('Apply Commission') }}</label><br>
                        <input type="radio" name="apply_commission" id="yes" value="yes" required/> Yes
                        &nbsp;&nbsp;&nbsp;<input type="radio" name="apply_commission" id="no" value="no" required/> No
                    </div>
                 
                    <div class="form-row" style="margin-left: 7px">
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm ">{{ __('Save') }}</button>
                        
                            <button type="reset" class="btn btn-primary btn-sm ">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection