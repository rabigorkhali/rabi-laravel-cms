@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ __('Create Post') }}</h5>

            <form class="card-body" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- Post Category -->
                    <div class="col-md-6">
                        <label class="form-label" for="post_category_id">{{ __('Post Category') }}</label> *
                        <select required class="form-control @error('post_category_id') is-invalid @enderror" name="post_category_id">
                            <option value="">{{ __('None') }}</option>
                            @foreach($categories as $category)
                                <option @if(old('post_category_id') == $category->id) selected @endif value="{{ $category->id }}">
                                    {{ ucfirst($category->name) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('post_category_id') {{ $message }} @enderror</div>
                    </div>

                    <!-- Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="title">{{ __('Title') }}</label> *
                        <input required type="text" name="title" id="title" value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror" placeholder="Title" />
                        <div class="invalid-feedback">@error('title') {{ $message }} @enderror</div>
                    </div>

                    <!-- Slug -->
                    <div class="col-md-6">
                        <label class="form-label" for="slug">{{ __('Slug') }}</label> *
                        <input readonly required type="text" name="slug" id="slug" value="{{ old('slug') }}"
                               class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" />
                        <div class="invalid-feedback">@error('slug') {{ $message }} @enderror</div>
                    </div>

                    <!-- SEO Title -->
                    <div class="col-md-6">
                        <label class="form-label" for="seo_title">{{ __('SEO Title') }}</label>
                        <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}"
                               class="form-control @error('seo_title') is-invalid @enderror" placeholder="SEO Title" />
                        <div class="invalid-feedback">@error('seo_title') {{ $message }} @enderror</div>
                    </div>

                    <!-- Body -->
                    <div class="col-md-12">
                        <label class="form-label" for="body">{{ __('Body') }}</label> *
                        <textarea required name="body" id="body"
                                  class="form-control text-editor @error('body') is-invalid @enderror"
                                  placeholder="Body">{{ old('body') }}</textarea>
                        <div class="invalid-feedback">@error('body') {{ $message }} @enderror</div>
                    </div>

                    <!-- Image -->
                    <div class="col-md-6">
                        <label class="form-label" for="image">{{ __('Image') }}</label>
                        <input type="file" name="image" id="image"
                               class="form-control @error('image') is-invalid @enderror" />
                        <div class="invalid-feedback">@error('image') {{ $message }} @enderror</div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input type="radio" id="status1" name="status" value="1" checked
                                   class="form-check-input @error('status') is-invalid @enderror"
                                   @if(old('status') == '1') checked @endif>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" id="status2" name="status" value="0"
                                   class="form-check-input @error('status') is-invalid @enderror"
                                   @if(old('status') == '0') checked @endif>
                            <label for="status2" class="form-check-label">{{ __('Inactive') }}</label>
                        </div>
                        <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('Create') }}</button>
                </div>

            </form>
        </div>
    </div>
@endsection
