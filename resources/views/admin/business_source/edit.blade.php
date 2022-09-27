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
            <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Business Source') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.business_source.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.business_source.update', $business_sources->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="source">{{ __('Source') }}</label>
                        <input type="text" class="form-control" id="source" placeholder="" name="source" value="{{ old('source', $business_sources->source) }}" />      
                    </div>     

                    <div class="form-group">
                        <label for="apply_commission">{{ __('Apply Commission') }}</label><br>
                        <input type="radio" name="apply_commission" value="Yes" {{ $business_sources->apply_commission == "Yes" ? 'checked' : '' }}/> Yes
                        &nbsp;&nbsp;&nbsp;<input type="radio" name="apply_commission" value="No" {{ $business_sources->apply_commission == "No" ? 'checked' : '' }}/> No
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection