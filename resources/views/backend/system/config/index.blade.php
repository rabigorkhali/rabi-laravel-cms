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
                    <div class="col-md-6">
                        <label class="form-label" for="sub_title">{{ 'Sub Title' }}</label>
                        <input value="{{ $thisData?->sub_title ?? old('sub_title') }}"
                               type="text" name="sub_title" id="sub_title"
                               class="form-control @if ($errors->first('sub_title')) is-invalid @endif"
                               placeholder="Sub Title"/>
                        <div class="invalid-feedback">{{ $errors->first('sub_title') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="mobile_number">{{ 'Mobile Number' }}</label>
                        <input value="{{ $thisData?->mobile_number ?? old('mobile_number') }}"
                               type="text" name="mobile_number" id="mobile_number"
                               class="form-control @if ($errors->first('mobile_number')) is-invalid @endif"
                               placeholder="Mobile Number"/>
                        <div class="invalid-feedback">{{ $errors->first('mobile_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="twitter_url">{{ 'Twitter URL' }}</label>
                        <input value="{{ $thisData?->twitter_url ?? old('twitter_url') }}"
                               type="text" name="twitter_url" id="twitter_url"
                               class="form-control @if ($errors->first('twitter_url')) is-invalid @endif"
                               placeholder="Twitter URL"/>
                        <div class="invalid-feedback">{{ $errors->first('twitter_url') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="facebook_url">{{ 'Facebook URL' }}</label>
                        <input value="{{ $thisData?->facebook_url ?? old('facebook_url') }}"
                               type="text" name="facebook_url" id="facebook_url"
                               class="form-control @if ($errors->first('facebook_url')) is-invalid @endif"
                               placeholder="Facebook URL"/>
                        <div class="invalid-feedback">{{ $errors->first('facebook_url') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="instagram_url">{{ 'Instagram URL' }}</label>
                        <input value="{{ $thisData?->instagram_url ?? old('instagram_url') }}"
                               type="text" name="instagram_url" id="instagram_url"
                               class="form-control @if ($errors->first('instagram_url')) is-invalid @endif"
                               placeholder="Instagram URL"/>
                        <div class="invalid-feedback">{{ $errors->first('instagram_url') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="linkedin_url">{{ 'LinkedIn URL' }}</label>
                        <input value="{{ $thisData?->linkedin_url ?? old('linkedin_url') }}"
                               type="text" name="linkedin_url" id="linkedin_url"
                               class="form-control @if ($errors->first('linkedin_url')) is-invalid @endif"
                               placeholder="LinkedIn URL"/>
                        <div class="invalid-feedback">{{ $errors->first('linkedin_url') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="top_donors_text">{{ 'Top Donors Text' }}</label>
                        <input value="{{ $thisData?->top_donors_text ?? old('top_donors_text') }}"
                               type="text" name="top_donors_text" id="top_donors_text"
                               class="form-control @if ($errors->first('top_donors_text')) is-invalid @endif"
                               placeholder="Top Donors Text"/>
                        <div class="invalid-feedback">{{ $errors->first('top_donors_text') }}</div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="key_words">{{ 'Keywords' }}</label>
                        <textarea rows="8" name="keywords" id="keywords"
                                  class="form-control @if ($errors->first('keywords')) is-invalid @endif"
                                  placeholder="Keywords">{{ $thisData?->keywords ?? old('keywords') }}</textarea>

                        <div class="invalid-feedback">{{ $errors->first('key_words') }}</div>
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
                    <hr>
                    {{__('Bank Details')}}
                    <hr>
                    <div class="col-md-6">
                        <label class="form-label" for="bank_name">{{ 'Bank Name' }}</label>
                        <input value="{{ $thisData?->bank_name ?? old('bank_name') }}"
                               type="text" name="bank_name" id="bank_name"
                               class="form-control @if ($errors->first('bank_name')) is-invalid @endif"
                               placeholder="Bank Name"/>
                        <div class="invalid-feedback">{{ $errors->first('bank_name') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="bank_account_number">{{ 'Bank Account Number' }}</label>
                        <input value="{{ $thisData?->bank_account_number ?? old('bank_account_number') }}"
                               type="text" name="bank_account_number" id="bank_account_number"
                               class="form-control @if ($errors->first('bank_account_number')) is-invalid @endif"
                               placeholder="Bank Account Number"/>
                        <div class="invalid-feedback">{{ $errors->first('bank_account_number') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="bank_account_name">{{ 'Bank Account Name' }}</label>
                        <input value="{{ $thisData?->bank_account_name ?? old('bank_account_name') }}"
                               type="text" name="bank_account_name" id="bank_account_name"
                               class="form-control @if ($errors->first('bank_account_name')) is-invalid @endif"
                               placeholder="Bank Account Name"/>
                        <div class="invalid-feedback">{{ $errors->first('bank_account_name') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="bank_qr">{{ 'Bank QR Code' }}</label>
                        <input type="file" name="bank_qr" id="bank_qr"
                               class="form-control @if ($errors->first('bank_qr')) is-invalid @endif"
                               accept="image/*"/>
                        <div class="invalid-feedback">{{ $errors->first('bank_qr') }}</div>
                        @if($thisData?->bank_qr)
                            <a target="_blank" href="{{ asset($thisData?->bank_qr) }}"> <img
                                    src="{{ asset($thisData?->bank_qr) }}" style="width: auto; height:60px;" alt="Favicon"
                                    class="img-fluid img-thumbnail"></a>
                        @endif
                    </div>
                    <hr>
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
