@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>

            <form class="card-body" action="{{ route('users.update',$thisData->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="id" value="{{$thisData->id}}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">{{ __('Name') }}</label> *
                        <input  required value="{{ $thisData->name ?? '' }}" type="text" name="name" id="name" min="3"
                               class="form-control @if ($errors->first('name')) is-invalid @endif"
                               placeholder="Name"/>
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="email">{{ 'Email' }}</label> *
                        <input value="{{ $thisData->email ?? '' }}" type="email" name="email" id="email"
                               class="form-control @if ($errors->first('email')) is-invalid @endif" placeholder="Email"
                               required/>
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="country">{{ 'Country' }}</label> *
                        <select required name="country" class="form-control  @if ($errors->first('country')) is-invalid @endif">
                            <option value="">{{__('None')}}</option>
                            <option @if($thisData->country??old('country')=='nepal') selected @endif value="nepal">{{__('Nepal')}}</option>
                            <option @if($thisData->country??old('country')=='india') selected @endif value="india">{{__('India')}}</option>
                        </select>

                        <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="address">{{ 'Address' }}</label> *
                        <input required value="{{ $thisData->address ?? '' }}" type="text" name="address" id="address"
                               class="form-control @if ($errors->first('address')) is-invalid @endif"
                               placeholder="Address"/>
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="mobile_number">{{ __('Mobile Number') }}</label> *
                        <input required min="10" max="15" value="{{ $thisData->mobile_number ?? '' }}" type="text" name="mobile_number" max="15"
                               id="mobile_number"
                               class="form-control @if ($errors->first('mobile_number')) is-invalid @endif"
                               placeholder="Mobile Number"/>
                        <div class="invalid-feedback">{{ $errors->first('mobile_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="date_of_birth">{{ __('DOB') }}</label> *
                        <input required value="{{ $thisData->date_of_birth ?? '' }}" type="date" name="date_of_birth"
                               id="date_of_birth"
                               class="form-control @if ($errors->first('date_of_birth')) is-invalid @endif"
                               placeholder="Date of Birth"/>
                        <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="gender">{{ __('Gender') }}</label> *
                        <select required class="form-control @if ($errors->first('gender')) is-invalid @endif" name="gender">
                            <option value="">{{__('None')}}</option>
                            <option value="male"
                                    @if($thisData->gender == 'male') selected @endif>{{__('Male')}}</option>
                            <option value="female"
                                    @if($thisData->gender == 'female') selected @endif>{{__('Female')}}</option>
                            <option value="male" @if($thisData->gender??old('gender')=='other') selected @endif>{{__('Other')}}</option>

                        </select>
                        <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="roles">{{ 'Role' }}</label> *
                        <select @if($thisData->id==authUser()->id) disabled @endif required class="form-control @if ($errors->first('role_id')) is-invalid @endif"
                                name="role_id">
                            <option value="">{{__('None')}}</option>
                            @foreach($roles as $roleDatum)
                                <option @if($thisData->role_id==$roleDatum->id) selected
                                        @endif value="{{$roleDatum->id}}">{{ucfirst($roleDatum->name)}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Is user verified?') }}</label>
                        <div class="form-check-inline">
                            <input type="radio" id="is_user_verified_by_donatepur1" name="is_user_verified_by_donatepur"
                                   value="1" checked
                                   class="form-check-input @if ($errors->first('is_user_verified_by_donatepur')) is-invalid @endif"
                                   @if($thisData->is_user_verified_by_donatepur??old('is_user_verified_by_donatepur')=='1') checked @endif>
                            <label for="is_user_verified_by_donatepur1" class="form-check-label">{{ __('Yes') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" id="is_user_verified_by_donatepur0" name="is_user_verified_by_donatepur" value="0"
                                   class="form-check-input @if ($errors->first('is_user_verified_by_donatepur')) is-invalid @endif"
                                   @if($thisData->is_user_verified_by_donatepur??old('is_user_verified_by_donatepur')=='0') checked @endif>
                            <label for="is_user_verified_by_donatepur0" class="form-check-label">{{ __('No') }}</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('is_user_verified_by_donatepur') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input @if($thisData->id==authUser()->id) disabled @endif id="status1" type="radio" name="status" value="1"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if($thisData->status == '1') checked @endif>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input @if($thisData->id==authUser()->id) disabled @endif type="radio" id="status2" name="status" value="0"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if($thisData->status == '0') checked @endif>
                            <label for="status2" class="form-check-label">{{ __('Inactive') }}</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="image">{{ 'Image' }}</label>
                        <input value="" type="file" name="image" id="image"
                               class="form-control @if ($errors->first('image')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>

                    </div>
                    <div class="col-md-6 mt-2">
                        <a target="_blank" href="{{ asset($thisData?->image) }}">
                            <img src="{{ asset($thisData?->image) }}" width="100" alt="Logo" class="img-fluid"></a>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <label class="form-label" for="password">{{ 'Password' }}</label>
                        <input value="" type="password" name="password" id="password"
                               class="form-control @if ($errors->first('password')) is-invalid @endif"
                               placeholder="Password"/>
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        <span
                            class="text-muted small">{{ __('Leave empty if you don’t want to change the password.') }}</span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="password_confirmation">{{ 'Confirm Password' }}</label>
                        <input value="" type="password" name="password_confirmation"
                               id="password_confirmation"
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
