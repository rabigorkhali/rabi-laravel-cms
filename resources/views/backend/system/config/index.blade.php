@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h6 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4> --}}
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            @php
                $route = route('configs.store');
                if (isset($thisData) && $thisData) {
                    $route = route('configs.update', $id);
                }
            @endphp
            <form class="card-body" action="{{ $route }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($thisData) && $thisData)
                    @method('PUT')
                @endif
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="company_name">{{ 'Company Name' }}</label> *
                        <input required value="{{ $thisData?->company_name ?? old('company_name') }}" type="text"
                               name="company_name" id="company_name"
                               class="form-control @if ($errors->first('company_name')) is-invalid @endif"
                               placeholder="Company Name"/>
                        <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"
                               for="all_rights_reserved_text">{{ 'All Rights Reserved Text' }}</label>
                        <input value="{{ $thisData?->all_rights_reserved_text ?? old('all_rights_reserved_text') }}"
                               type="text" name="all_rights_reserved_text" id="all_rights_reserved_text"
                               class="form-control @if ($errors->first('all_rights_reserved_text')) is-invalid @endif"
                               placeholder="All Rights Reserved Text"/>
                        <div class="invalid-feedback">{{ $errors->first('all_rights_reserved_text') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="address_line_1">{{ 'Address Line 1' }}</label> *
                        <input required value="{{ $thisData?->address_line_1 ?? old('address_line_1') }}" type="text"
                               name="address_line_1" id="address_line_1"
                               class="form-control @if ($errors->first('address_line_1')) is-invalid @endif"
                               placeholder="Address Line 1"/>
                        <div class="invalid-feedback">{{ $errors->first('address_line_1') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="address_line_2">{{ 'Address Line 2' }}</label>
                        <input value="{{ $thisData?->address_line_2 ?? old('address_line_2') }}" type="text"
                               name="address_line_2" id="address_line_2"
                               class="form-control @if ($errors->first('address_line_2')) is-invalid @endif"
                               placeholder="Address Line 2"/>
                        <div class="invalid-feedback">{{ $errors->first('address_line_2') }}</div>
                    </div>

                    {{-- <div class="col-md-6">
                            <label class="form-label" for="district">{{ 'District' }}</label>
                            <input value="{{ old('district') }}" type="text" name="district" id="district"
                                class="form-control @if ($errors->first('district')) is-invalid @endif"
                                placeholder="District" />
                            <div class="invalid-feedback">{{ $errors->first('district') }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="local_government">{{ 'Local Government' }}</label>
                            <input value="{{ old('local_government') }}" type="text" name="local_government"
                                id="local_government"
                                class="form-control @if ($errors->first('local_government')) is-invalid @endif"
                                placeholder="Local Government" />
                            <div class="invalid-feedback">{{ $errors->first('local_government') }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="state">{{ 'State' }}</label>
                            <input value="{{ old('state') }}" type="text" name="state" id="state"
                                class="form-control @if ($errors->first('state')) is-invalid @endif"
                                placeholder="State" />
                            <div class="invalid-feedback">{{ $errors->first('state') }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="postal_code">{{ 'Postal Code' }}</label>
                            <input value="{{ old('postal_code') }}" type="text" name="postal_code" id="postal_code"
                                class="form-control @if ($errors->first('postal_code')) is-invalid @endif"
                                placeholder="Postal Code" />
                            <div class="invalid-feedback">{{ $errors->first('postal_code') }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="country">{{ 'Country' }}</label>
                            <input value="{{ old('country') }}" type="text" name="country" id="country"
                                class="form-control @if ($errors->first('country')) is-invalid @endif"
                                placeholder="Country" />
                            <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                        </div> --}}

                    <div class="col-md-6">
                        <label class="form-label" for="primary_phone_number">{{ 'Primary Phone Number' }}</label>
                        <input value="{{ $thisData?->primary_phone_number ?? old('primary_phone_number') }}" type="text"
                               name="primary_phone_number" id="primary_phone_number"
                               class="form-control @if ($errors->first('primary_phone_number')) is-invalid @endif"
                               placeholder="Primary Phone Number"/>
                        <div class="invalid-feedback">{{ $errors->first('primary_phone_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="secondary_phone_number">{{ 'Secondary Phone Number' }}</label>
                        <input value="{{ $thisData?->secondary_phone_number ?? old('secondary_phone_number') }}"
                               type="text" name="secondary_phone_number" id="secondary_phone_number"
                               class="form-control @if ($errors->first('secondary_phone_number')) is-invalid @endif"
                               placeholder="Secondary Phone Number"/>
                        <div class="invalid-feedback">{{ $errors->first('secondary_phone_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="email">{{ 'Email' }}</label>
                        <input value="{{ $thisData?->email ?? old('email') }}" type="email" name="email" id="email"
                               class="form-control @if ($errors->first('email')) is-invalid @endif"
                               placeholder="Email"/>
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="website">{{ 'Website' }}</label>
                        <input value="{{ $thisData?->website ?? old('website') }}" type="url" name="website"
                               id="website" class="form-control @if ($errors->first('website')) is-invalid @endif"
                               placeholder="Website"/>
                        <div class="invalid-feedback">{{ $errors->first('website') }}</div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="description">{{ 'Description' }}</label>
                        <textarea rows="8" name="description" id="description"
                                  class="form-control @if ($errors->first('description')) is-invalid @endif"
                                  placeholder="Description">{{ $thisData?->description ?? old('description') }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="logo">{{ 'Logo' }}</label>
                        <input value="{{ $thisData?->logo ?? old('logo') }}" type="file" name="logo"
                               id="logo" class="form-control @if ($errors->first('logo')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('logo') }}</div>
                    </div>
                    @if($thisData?->logo)
                        <a target="_blank" href="{{ asset($thisData?->logo) }}"> <img
                                src="{{ asset($thisData?->logo) }}" style="width: auto; height:60px;" alt="Logo"
                                class="img-fluid"></a>
                    @endif
                    <div class="col-md-6">
                        <label class="form-label" for="logo">{{ 'Favicon' }}</label>
                        <input value="{{ $thisData?->favicon ?? old('favicon') }}" type="file" name="favicon"
                               id="logo" class="form-control @if ($errors->first('favicon')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('favicon') }}</div>
                    </div>
                    @if($thisData?->favicon)
                        <a target="_blank" href="{{ asset($thisData?->favicon) }}"> <img
                                src="{{ asset($thisData?->favicon) }}" style="width: auto; height:60px;" alt="Favicon"
                                class="img-fluid img-thumbnail"></a>
                    @endif
                </div>
                @if(hasPermission('/configs/*','put'))
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Update') }}</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
