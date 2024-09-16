@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <form class="card-body" action="{{route('change.password.update')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label" for="password">{{ 'Current Password' }}</label> *
                        <input required value="" type="password" name="current_password" id="current_password"
                               class="form-control @if ($errors->first('current_password')) is-invalid @endif"
                               placeholder="Current Password"/>
                        <div class="invalid-feedback">{{ $errors->first('current_password') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="password">{{ 'Password' }}</label> *
                        <input required value="" type="password" name="password" id="password"
                               class="form-control @if ($errors->first('password')) is-invalid @endif"
                               placeholder="Password"/>
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="password_confirmation">{{ 'Confirm Password' }}</label> *
                        <input required value="" type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control @if ($errors->first('password_confirmation')) is-invalid @endif"
                               placeholder="Confirm Password"/>
                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                    </div>

                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection



