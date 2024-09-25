@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>

            <form class="card-body" action="{{ route('posts.update', $thisData->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $thisData->id }}">
                <div class="row g-3">
                    <!-- Post Category -->
                    <div class="col-md-6">
                        <label class="form-label" for="post_category_id">{{ __('Post Category') }}</label> *
                        <select required class="form-control @if ($errors->first('post_category_id')) is-invalid @endif"
                                name="post_category_id">
                            <option value="">{{__('None')}}</option>
                            @foreach($categories as $category)
                                <option @if($thisData->post_category_id == $category->id) selected
                                        @endif value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('post_category_id') }}</div>
                    </div>

                    <!-- Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="title">{{ __('Title') }}</label> *
                        <input required value="{{ $thisData->title }}" type="text" name="title" id="title"
                               class="form-control @if ($errors->first('title')) is-invalid @endif"
                               placeholder="Title"/>
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>

                    <!-- Slug -->
                    <div class="col-md-6">
                        <label class="form-label" for="slug">{{ __('Slug') }}</label> *
                        <input required value="{{ $thisData->slug }}" type="text" name="slug" id="slug"
                               class="form-control @if ($errors->first('slug')) is-invalid @endif"
                               placeholder="Slug"/>
                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                    </div>

                    <!-- SEO Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="seo_title">{{ __('SEO Title') }}</label>
                        <input value="{{ $thisData->seo_title }}" type="text" name="seo_title" id="seo_title"
                               class="form-control @if ($errors->first('seo_title')) is-invalid @endif"
                               placeholder="SEO Title"/>
                        <div class="invalid-feedback">{{ $errors->first('seo_title') }}</div>
                    </div>

                    <!-- Body -->
                    <div class="col-md-12">
                        <label class="form-label" for="body">{{ __('Body') }}</label> *
                        <textarea required name="body" id="body" rows="4"
                                  class="form-control text-editor @if ($errors->first('body')) is-invalid @endif"
                                  placeholder="Body">{{ $thisData->body }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                    </div>

                    <!-- Image -->
                    <div class="col-md-6">
                        <label class="form-label" for="image">{{ __('Image') }}</label> *
                        <input type="file" name="image" id="image"
                               class="form-control @if ($errors->first('image')) is-invalid @endif"/>
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @if ($thisData->image)
                            <div class="col-md-6 mt-2">
                                <a target="_blank" href="{{ asset($thisData->image) }}">
                                    <img src="{{ asset($thisData->image) }}" width="100" alt="Image" class="img-fluid">
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
