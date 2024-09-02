@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h6 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4> --}}
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>

            <form class="card-body" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">{{ __('Name') }}</label> *
                        <input required value="{{ old('name') }}" type="text" name="name" id="name" min="3"
                               class="form-control @if ($errors->first('name')) is-invalid @endif"
                               placeholder="Name"/>
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="email">{{ 'Email' }}</label> *
                        <input value="{{ old('email') }}" type="email" name="email" id="email"
                               class="form-control @if ($errors->first('email')) is-invalid @endif" placeholder="Email"
                               required/>
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="address">{{ 'Address' }}</label>
                        <input value="{{ old('address') }}" type="text" name="address" id="address"
                               class="form-control @if ($errors->first('address')) is-invalid @endif"
                               placeholder="Address"/>
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                        <input min="6" value="{{ old('phone_number') }}" type="text" name="phone_number" max="15"
                               id="phone_number"
                               class="form-control @if ($errors->first('phone_number')) is-invalid @endif"
                               placeholder="Phone Number"/>
                        <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="date_of_birth">{{ __('DOB') }}</label>
                        <input value="{{ old('date_of_birth') }}" type="date" name="date_of_birth"
                               id="date_of_birth"
                               class="form-control @if ($errors->first('date_of_birth')) is-invalid @endif"
                               placeholder="Date of Birth"/>
                        <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="gender">{{ __('Gender') }}</label>
                        <select class="form-control @if ($errors->first('gender')) is-invalid @endif" name="gender">
                            <option value="">{{__('None')}}</option>
                            <option value="male" @if(old('gender')=='male') selected @endif>{{__('Male')}}</option>
                            <option value="female"
                                    @if(old('gender')=='female') selected @endif>{{__('Female')}}</option>
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="roles">{{ 'Role' }}</label> *
                        <select required class="form-control @if ($errors->first('role_id')) is-invalid @endif" name="role_id">
                            <option value="">{{__('None')}}</option>
                            @foreach($roles as $roleDatum)
                                <option  @if(old('role_id')==$roleDatum->id) selected @endif value="{{$roleDatum->id}}">{{ucfirst($roleDatum->name)}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input type="radio" id="status1" name="status" value="1" checked
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if(old('status')=='1') checked @endif>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input  type="radio" id="status2" name="status" value="0"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if(old('status')=='0') checked @endif>
                            <label for="status2" class="form-check-label">{{ __('Inactive') }}</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="image">{{ 'image' }}</label>
                        <input value="" type="file" name="image" id="image"
                               class="form-control @if ($errors->first('image')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <label class="form-label" for="password">{{ 'Password' }}</label> *
                        <input min="6" required value="{{ old('password') }}" type="password" name="password" id="password"
                               class="form-control @if ($errors->first('password')) is-invalid @endif"
                               placeholder="Password"/>
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="password_confirmation">{{ 'Confirm Password' }}</label> *
                        <input min="6" required value="{{ old('password_confirmation') }}" type="password" name="password_confirmation"
                               id="password_confirmation"
                               class="form-control @if ($errors->first('password_confirmation')) is-invalid @endif"
                               placeholder="Confirm Password"/>
                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                    </div>

                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
