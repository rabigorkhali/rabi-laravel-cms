@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>

            <form class="card-body" action="{{ route('sliders.update', $thisData->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $thisData->id }}">
                <div class="row g-3">
                    <!-- Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="title">{{ __('Title') }}</label> *
                        <input required value="{{ $thisData->title }}" type="text" name="title" id="title"
                               class="form-control @if ($errors->first('title')) is-invalid @endif"
                               placeholder="Title"/>
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>

                    <!-- Sub Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="sub_title">{{ __('Sub Title') }}</label>
                        <input type="text" name="sub_title" id="sub_title" value="{{ $thisData->sub_title }}"
                               class="form-control @if ($errors->first('sub_title')) is-invalid @endif"
                               placeholder="Sub Title"/>
                        <div class="invalid-feedback">{{ $errors->first('sub_title') }}</div>
                    </div>

                    <!-- Position -->
                    <div class="col-md-6">
                        <label class="form-label" for="position">{{ __('Position') }}</label> *
                        <input required type="number" name="position" id="position" value="{{ $thisData->position }}"
                               class="form-control @if ($errors->first('position')) is-invalid @endif"
                               placeholder="Position"/>
                        <div class="invalid-feedback">{{ $errors->first('position') }}</div>
                    </div>

                    <!-- Button Text -->
                    <div class="col-md-6">
                        <label class="form-label" for="button_text">{{ __('Button Text') }}</label>
                        <input type="text" name="button_text" id="button_text" value="{{ $thisData->button_text }}"
                               class="form-control @if ($errors->first('button_text')) is-invalid @endif"
                               placeholder="Button Text"/>
                        <div class="invalid-feedback">{{ $errors->first('button_text') }}</div>
                    </div>

                    <!-- Go To Link -->
                    <div class="col-md-6">
                        <label class="form-label" for="go_to_link">{{ __('Go To Link') }}</label>
                        <input type="url" name="go_to_link" id="go_to_link" value="{{ $thisData->go_to_link }}"
                               class="form-control @if ($errors->first('go_to_link')) is-invalid @endif"
                               placeholder="https://example.com"/>
                        <div class="invalid-feedback">{{ $errors->first('go_to_link') }}</div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label class="form-label" for="description">{{ __('Description') }}</label> *
                        <textarea required name="description" id="description" rows="4"
                                  class="form-control  @if ($errors->first('description')) is-invalid @endif"
                                  placeholder="Description">{{ $thisData->description }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    </div>

                    <!-- Banner Image -->
                    <div class="col-md-6">
                        <label class="form-label" for="banner">{{ __('Banner Image') }}</label> *
                        <input type="file" name="banner" id="banner"
                               class="form-control @if ($errors->first('banner')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('banner') }}</div>
                        @if ($thisData->banner)
                            <div class="col-md-6 mt-2">
                                <a target="_blank" href="{{ asset($thisData->banner) }}">
                                    <img src="{{ asset($thisData->banner) }}" width="100" alt="Image" class="img-fluid">
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input id="status1" type="radio" name="status" value="1"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if($thisData->status == 1) checked @endif>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" id="status2" name="status" value="0"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if($thisData->status == 0) checked @endif>
                            <label for="status2" class="form-check-label">{{ __('Inactive') }}</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
