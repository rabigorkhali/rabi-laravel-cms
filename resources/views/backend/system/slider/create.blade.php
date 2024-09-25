@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')

        <div class="card mb-4">
            <h5 class="card-header">{{ __('Create Slider') }}</h5>

            <form class="card-body" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="title">{{ __('Title') }}</label> *
                        <input required type="text" name="title" id="title" value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                        <div class="invalid-feedback">@error('title') {{ $message }} @enderror</div>
                    </div>

                    <!-- Subtitle -->
                    <div class="col-md-6">
                        <label class="form-label" for="sub_title">{{ __('Sub Title') }}</label>
                        <input type="text" name="sub_title" id="sub_title" value="{{ old('sub_title') }}"
                               class="form-control @error('sub_title') is-invalid @enderror" placeholder="Sub Title">
                        <div class="invalid-feedback">@error('sub_title') {{ $message }} @enderror</div>
                    </div>

                    <!-- Position -->
                    <div class="col-md-6">
                        <label class="form-label" for="position">{{ __('Position') }}</label> *
                        <input required type="number" name="position" id="position" value="{{ old('position') }}"
                               class="form-control @error('position') is-invalid @enderror" placeholder="Position">
                        <div class="invalid-feedback">@error('position') {{ $message }} @enderror</div>
                    </div>

                    <!-- Button Text -->
                    <div class="col-md-6">
                        <label class="form-label" for="button_text">{{ __('Button Text') }}</label>
                        <input type="text" name="button_text" id="button_text" value="{{ old('button_text') }}"
                               class="form-control @error('button_text') is-invalid @enderror" placeholder="Button Text">
                        <div class="invalid-feedback">@error('button_text') {{ $message }} @enderror</div>
                    </div>

                    <!-- Go To Link -->
                    <div class="col-md-6">
                        <label class="form-label" for="go_to_link">{{ __('Go To Link') }}</label>
                        <input type="url" name="go_to_link" id="go_to_link" value="{{ old('go_to_link') }}"
                               class="form-control @error('go_to_link') is-invalid @enderror" placeholder="https://example.com">
                        <div class="invalid-feedback">@error('go_to_link') {{ $message }} @enderror</div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label class="form-label" for="description">{{ __('Description') }}</label> *
                        <textarea required name="description" id="description"
                                  class="form-control  @error('description') is-invalid @enderror"
                                  placeholder="Description">{{ old('description') }}</textarea>
                        <div class="invalid-feedback">@error('description') {{ $message }} @enderror</div>
                    </div>

                    <!-- Banner Image -->
                    <div class="col-md-6">
                        <label class="form-label" for="banner">{{ __('Banner Image') }}</label> *
                        <input type="file" name="banner" id="banner" accept="image/*"
                               class="form-control @error('banner') is-invalid @enderror">
                        <div class="invalid-feedback">@error('banner') {{ $message }} @enderror</div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input id="status1" type="radio" name="status" value="1"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   checked>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" id="status2" name="status" value="0"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   >
                            <label for="status2" class="form-check-label">{{ __('Inactive') }}</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

