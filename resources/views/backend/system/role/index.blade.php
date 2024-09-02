@extends('backend.system.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('backend.system.partials.errors')
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card">

                <div class="card-datatable table-responsive">
                    <form method="get" action="{{ route('roles.index') }}">
                        <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row me-2">
                                <div class="col-md-2">
                                    <div class="me-3">
                                        <div class="dataTables_length">
                                            <label>
                                                <select name="show" class="form-select">
                                                    <option value="10"
                                                            @if (request('show') == 10) selected @endif>10
                                                    </option>
                                                    <option value="25"
                                                            @if (request('show') == 25) selected @endif>25
                                                    </option>
                                                    <option value="50"
                                                            @if (request('show') == 50) selected @endif>50
                                                    </option>
                                                    <option value="100"
                                                            @if (request('show') == 100) selected @endif>100
                                                    </option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div
                                        class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                        <div class="dataTables_filter">
                                            <label>
                                                <input type="text" value="{{ request('keyword') }}" name="keyword"
                                                       class="form-control" placeholder="Search..">
                                            </label>
                                        </div>
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary  mx-3 " type="button">
                                                    <span><i class="ti ti-filter me-1 ti-xs"></i>{{__('Filter')}}</span>
                                                </button>
                                                @if(hasPermission('/roles','post'))
                                                    <a class="btn add-new btn-primary text-white"
                                                       href="{{ route('roles.create') }}">
                                                        <i class="ti ti-plus me-0 me-sm-1 ti-xs "></i>
                                                        <span class="d-none d-sm-inline-block ">{{__('Add')}}</span>
                                                    </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="datatables-roles table dataTable no-footer dtr-column" id="DataTables_Table_0"
                                   aria-describedby="DataTables_Table_0_info">
                                <thead class="border-top">
                                <tr>
                                    <th>{{ __('SN') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @if (!$thisDatas->count())
                                    <tr>
                                        <td class="text-center" colspan="7">{{ __('No data found.') }}</td>
                                    </tr>
                                @endif
                                @foreach ($thisDatas as $thisDatasKey => $thisDatasDatum)
                                    <tr>
                                        <td>{{ $thisDatasKey = $thisDatasKey + 1 }}</td>
                                        <td>{{ $thisDatasDatum->name }}</td>
                                        <td><span
                                                class="badge  @if ($thisDatasDatum->status) bg-label-primary
                                                @else
                                                    bg-label-secondary @endif me-1">
                                                    @if ($thisDatasDatum->status)
                                                    {{ __('Active') }}
                                                @else
                                                    {{ __('Inactive') }}
                                                @endif
                                                </span></td>
                                        <td>
                                            @if($thisDatasDatum->name!=='superuser')
                                                @if(hasPermission('/roles/*','put') || hasPermission('/roles/*','delete'))
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if(hasPermission('/roles/*','put'))
                                                                <a class="dropdown-item"
                                                                   href="{{route('roles.edit',$thisDatasDatum->id)}}"><i
                                                                        class="ti ti-pencil me-1"></i>{{__('Edit')}}</a>
                                                            @endif
                                                            @if(hasPermission('/roles/*','delete'))
                                                                <a href="#" class="dropdown-item delete-button"
                                                                   data-bs-toggle="modal"
                                                                   data-actionurl="{{ route('roles.destroy',$thisDatasDatum->id) }}"
                                                                   data-bs-target="#deleteModal">
                                                                    <i class="ti ti-trash me-1"></i>{{__('Delete')}}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <div class="row mx-2">
                                <div class="row">
                                    <div class="col">
                                        <nav>
                                            {{ $thisDatas->appends(request()->query())->links('pagination::bootstrap-4') }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
