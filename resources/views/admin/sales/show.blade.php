@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.sales.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.sales.fields.system-date-time')</th>
                            <td field-key='system_date_time'>{{ $sale->system_date_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.volume-sold')</th>
                            <td field-key='volume_sold'>{{ $sale->volume_sold }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.volume-before-sales')</th>
                            <td field-key='volume_before_sales'>{{ $sale->volume_before_sales }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.volume-after-sales')</th>
                            <td field-key='volume_after_sales'>{{ $sale->volume_after_sales }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.amount')</th>
                            <td field-key='amount'>{{ $sale->amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.price-per-liter')</th>
                            <td field-key='price_per_liter'>{{ $sale->price_per_liter }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.sales.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
