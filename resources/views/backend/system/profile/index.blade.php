@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <form class="card-body" action="{{route('profile.update', authUser()->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($thisData) && $thisData)
                    @method('PUT')
                @endif
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">{{ __('Name') }}</label> *
                        <input required value="{{ $thisData?->name ?? old('name') }}" type="text"
                               name="name" id="name" min="3"
                               class="form-control @if ($errors->first('name')) is-invalid @endif"
                               placeholder="Name"/>
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="email">{{ 'Email' }}</label> *
                        <input value="{{ $thisData?->email ?? old('email') }}" type="email" name="email" id="email"
                               class="form-control @if ($errors->first('email')) is-invalid @endif"
                               placeholder="Email" required/>
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="address">{{ 'Address' }}</label>
                        <input value="{{ $thisData?->address ?? old('address') }}" type="text"
                               name="address" id="address"
                               class="form-control @if ($errors->first('address')) is-invalid @endif"
                               placeholder="Address"/>
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                        <input value="{{ $thisData?->phone_number ?? old('phone_number') }}" type="text"
                               name="phone_number" max="15" id="phone_number"
                               class="form-control @if ($errors->first('phone_number')) is-invalid @endif"
                               placeholder="Phone Number"/>
                        <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="date_of_birth">{{ __('DOB') }}</label>
                        <input value="{{ $thisData?->date_of_birth ?? old('date_of_birth') }}" type="date"
                               name="date_of_birth" id="date_of_birth"
                               class="form-control @if ($errors->first('date_of_birth')) is-invalid @endif"
                               placeholder="Date of Birth"/>
                        <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="gender">{{ __('Gender') }}</label>
                        <select class="form-control @if ($errors->first('gender')) is-invalid @endif" name="gender">
                            <option value="">{{__('None')}}</option>
                            <option value="male"
                                    @if($thisData?->gender == 'male') selected @endif>{{__('Male')}}</option>
                            <option value="female"
                                    @if($thisData?->gender == 'female') selected @endif>{{__('Female')}}</option>
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                    </div>

                    <div class="col-md-6 ">
                        <label class="form-label" for="image">{{ 'Image' }}</label>
                        <input value="{{ $thisData?->image ?? old('image') }}" type="file" name="image"
                               id="image" class="form-control @if ($errors->first('image')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                    </div>
                    @if($thisData?->image)
                        <div class="col-md-6 mt-2">
                            <a target="_blank" href="{{ asset($thisData?->image) }}">
                                <img src="{{ asset($thisData?->image) }}" width="100" alt="Image"
                                     class="img-fluid"></a>
                        </div>
                    @endif

                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection



