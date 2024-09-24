@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>

            <form class="card-body" action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- Title Field -->
                    <div class="col-md-6">
                        <label class="form-label" for="title">{{ __('Title') }}</label> *
                        <input required value="{{ old('title') }}" type="text" name="title" id="title"
                               class="form-control @if ($errors->first('title')) is-invalid @endif"
                               placeholder="Title"/>
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>

                    <!-- Slug Field -->
                    <div class="col-md-6">
                        <label class="form-label" for="slug">{{ __('Slug') }}</label> *
                        <input required readonly value="{{ old('slug') }}" type="text" name="slug" id="slug"
                               class="form-control @if ($errors->first('slug')) is-invalid @endif"
                               placeholder="Slug" />
                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                    </div>

                    <!-- Body Field (Text Area) -->
                    <div class="col-md-12">
                        <label class="form-label" for="body">{{ __('Body') }}</label> *
                        <textarea required name="body" id="body" rows="4"
                                  class="form-control text-editor @if ($errors->first('body')) is-invalid @endif"
                                  placeholder="Body">{{ old('body') }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                    </div>

                    <!-- Status Field -->
                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input type="radio" id="status1" name="status" value="1" checked
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if(old('status') == '1') checked @endif>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" id="status2" name="status" value="0"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if(old('status') == '0') checked @endif>
                            <label for="status2" class="form-check-label">{{ __('Inactive') }}</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
