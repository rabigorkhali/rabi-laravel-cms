@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>

            <form class="card-body" action="{{ route('roles.update',$thisData->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="id" value="{{$thisData->id}}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="name">{{ __('Name') }}</label> *
                        <input required value="{{ $thisData->name ?? '' }}" type="text" name="name" id="name" min="3"
                               class="form-control @if ($errors->first('name')) is-invalid @endif"
                               placeholder=" Name"/>
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>
                    <hr>
                    <div class="col-md-12" style=" font-size: 0.8125rem;">
                        <label class="form-label" for="name">{{ __('Permission') }}</label> *
                        @foreach(modules() as $module)
                            @if($module['name'] !== 'Dashboard')
                                @if(!$module['hasSubmodules'])
                                    <h6>
                                        <input id="{{$module['name']}}" type="checkbox"
                                               class="{{str_replace('/','',$module['permissions'][0]['route']['url'])}} module"
                                               data-module="{{str_replace('/','',$module['permissions'][0]['route']['url'])}}"
                                               @if(in_array(['url' => $module['permissions'][0]['route']['url'], 'method' => 'get'], $thisData->permissions)) checked @endif>
                                        <label for="{{ $module['name'] }}">{{ __($module['name']) }}</label>
                                    </h6>
                                @endif
                                @if($module['hasSubmodules'])
                                    @foreach($module['submodules'] as $submodule)
                                        <h6 class="mb-0 mt-2" ><label class="checkbox-inline">
                                                <input type="checkbox"
                                                       class="{{str_replace('/','',$submodule['permissions'][0]['route']['url'])}} module"
                                                       data-module="{{str_replace('/','',$submodule['permissions'][0]['route']['url'])}}"
                                                       @if(in_array(['url' => $submodule['permissions'][0]['route']['url'], 'method' => 'get'], $thisData->permissions)) checked @endif>
                                                {{ __($submodule['name']) }}
                                            </label>
                                        </h6>
                                        @foreach($submodule['permissions'] as $permission)
                                            <label class="checkbox-inline m-1">
                                                <input type="checkbox"
                                                       class="{{str_replace('/','',$submodule['permissions'][0]['route']['url'])}}-sub permission"
                                                       data-module="{{str_replace('/','',$submodule['permissions'][0]['route']['url'])}}-sub"
                                                       value="{{json_encode($permission['route'], JSON_UNESCAPED_SLASHES)}}"
                                                       name="permissions[]"
                                                       @if(isPermissionSelected(json_encode($permission['route'], JSON_UNESCAPED_SLASHES), json_encode($thisData->permissions, JSON_UNESCAPED_SLASHES)))
                                                           checked
                                                       @endif
                                                       @if(in_array(json_encode($permission['route'], JSON_UNESCAPED_SLASHES), old('permissions',[])))
                                                           checked
                                                    @endif> {{ __($permission['name']) }}
                                            </label>
                                        @endforeach
                                    @endforeach
                                @else
                                    @if($module['permissions'])
                                        @foreach($module['permissions'] as $permission)
                                            <label class="checkbox-inline">
                                                <input type="checkbox"
                                                       class="{{str_replace('/','',$module['permissions'][0]['route']['url'])}}-sub permission"
                                                       data-module="{{str_replace('/','',$module['permissions'][0]['route']['url'])}}-sub"
                                                       value="{{json_encode($permission['route'], JSON_UNESCAPED_SLASHES)}}"
                                                       name="permissions[]"
                                                       @if(isPermissionSelected(json_encode($permission['route'], JSON_UNESCAPED_SLASHES), json_encode($thisData->permissions, JSON_UNESCAPED_SLASHES)))
                                                           checked
                                                       @endif
                                                       @if(in_array(json_encode($permission['route'], JSON_UNESCAPED_SLASHES), old('permissions',[])))
                                                           checked
                                                    @endif> {{ __($permission['name']) }}
                                            </label>
                                        @endforeach
                                    @endif
                                @endif
                                <hr>
                            @endif
                        @endforeach
                        <div class="invalid-feedback" style="display: block;">{{ $errors->first('permissions') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label w-100" for="status">{{ __('Status') }}</label>
                        <div class="form-check-inline">
                            <input type="radio" id="status1" name="status" value="1"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if($thisData->status == '1') checked @endif>
                            <label for="status1" class="form-check-label">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check-inline">
                            <input id="status2" type="radio" name="status" value="0"
                                   class="form-check-input @if ($errors->first('status')) is-invalid @endif"
                                   @if($thisData->status == '0') checked @endif>
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
