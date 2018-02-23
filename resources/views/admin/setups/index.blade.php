@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.setup.title')</h3>
    @can('setup_create')
        <p>


        </p>
    @endcan



    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($setups) > 0 ? 'datatable' : '' }} ">
                <thead>
                <tr>

                    <th>@lang('quickadmin.setup.fields.cvd')</th>
                    <th>@lang('quickadmin.setup.fields.price-per-liter')</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>
                @if (count($setups) > 0)
                    @foreach ($setups as $setup)
                        <tr data-entry-id="{{ $setup->id }}">

                            <td field-key='cvd'>{{ $setup->cvd }}</td>
                            <td field-key='price_per_liter'>{{ $setup->price_per_liter }}</td>
                            <td>
                                @can('setup_view')
                                    <a href="{{ route('admin.setups.show',[$setup->id]) }}"
                                       class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                @endcan
                                @can('setup_edit')
                                    <a href="{{ route('admin.setups.edit',[$setup->id]) }}"
                                       class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                @endcan
                                {{--@can('setup_edit')--}}
                                {{--<a href="{{ route('admin.setups.edit',[$setup->id]) }}" class="btn btn-xs btn-info">stock--}}
                                {{--up</a>--}}
                                {{--@endcan--}}
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                                        data-target=".bs-example-modal-sm">stock up
                                </button>

                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                                     aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title">Stock Up</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal"
                                                      role="form" method="POST"
                                                      action = "{{ route('admin.setups.volume',[$setup->id]) }}">
                                                    <input type="hidden"
                                                           name="_token"
                                                           value="{{ csrf_token() }}">

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label"
                                                               for="volume">Volume</label>
                                                        <div class="col-sm-10">
                                                            <input type="float" min="0" class="form-control"
                                                                   name = "cvd" id="volume" placeholder="enter volume" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-default">Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
    </script>
@endsection