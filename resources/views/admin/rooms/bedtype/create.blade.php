@extends('layouts.admin')

@section('content')
<div class="container-fluid">

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h5 class="font-weight-bold text-primary">{{ __('Add Bed Type') }}</h5>
                <div class="ml-auto">
                    <a href="{{ route('admin.bedtype.index') }}" class="btn btn-primary btn-sm">
                        
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bedtype.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="bed_type">{{ __('Bed Type') }}</label>
                        <input type="text" class="form-control" id="bed_type" placeholder="" name="bed_type" value="{{ old('bed_type') }}" required/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 12px">Save</button>
                    <button type="reset" class="btn btn-primary btn-sm" style="">Cancel</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection