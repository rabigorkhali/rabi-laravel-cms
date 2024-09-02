@extends('backend.public.layouts.master')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Reset Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="{{route('login')}}" class="app-brand-link gap-2">
                                @if(getConfigTableData()?->logo)
                                    <span class="app-brand-logo demo">
                                     <img src="{{getConfigTableData()?->logo}}" width="32" height="22">
                                    </span>
                                @endif
                                <span
                                    class="app-brand-text demo text-body fw-bold ms-1">{{getConfigTableData()?->company_name}}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 pt-2">Reset Password 🔒</h4>
                        <p class="mb-4">for <span class="fw-medium">{{request('email')}}</span></p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="email"
                                        id="email"
                                        class="form-control @error('email') is-invalid @enderror "
                                        name="password"
                                        placeholder="Email"
                                        required
                                        value="{{$email??old('email')}}"
                                        aria-describedby="email"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror "
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="confirm-password"
                                        class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"/>
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100 mb-3">Set new password</button>
                            <div class="text-center">
                                <a href="{{route('login')}}">
                                    <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                                    Back to login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Reset Password -->
            </div>
        </div>
    </div>
@endsection
