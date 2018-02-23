@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">

        @if(Session::has('message'))
            <div class="row">'
                <div class="col-xs-12">
                    <div class="alert @if(Session::get('messageType') == 1) alert-success @else alert-danger @endif">
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>&#8358;{{ $data['totalAmount'] }}</h3>

                        <p>Total Amount</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    {{--<a href="/stock/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $data['currentVolumeSold'] }}L</h3>

                        <p>Current Volume of Diesel</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tint"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $data['totalVolumeSold'] }}L </h3>

                        <p>Total Volume Sold Per Day</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('quickadmin.qa_list')
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped {{ count($sales) > 0 ? 'datatable' : '' }} ">
                        <thead>
                        <tr>

                            <th>@lang('quickadmin.sales.fields.system-date-time')</th>
                            <th>@lang('quickadmin.sales.fields.volume-sold')</th>
                            <th>@lang('quickadmin.sales.fields.volume-before-sales')</th>
                            <th>@lang('quickadmin.sales.fields.volume-after-sales')</th>
                            <th>@lang('quickadmin.sales.fields.amount')</th>
                            <th>@lang('quickadmin.sales.fields.price-per-liter')</th>
                            {{--<th>&nbsp;</th>--}}

                        </tr>
                        </thead>

                        <tbody>
                        @if (count($sales) > 0)
                            @foreach ($sales as $sale)
                                <tr data-entry-id="{{ $sale->id }}">

                                    <td field-key='system_date_time'>{{ $sale->system_date_time }}</td>
                                    <td field-key='volume_sold'>{{ $sale->volume_sold }}</td>
                                    <td field-key='volume_before_sales'>{{ $sale->volume_before_sales }}</td>
                                    <td field-key='volume_after_sales'>{{ $sale->volume_after_sales }}</td>
                                    <td field-key='amount'>{{ $sale->amount }}</td>
                                    <td field-key='price_per_liter'>{{ $sale->price_per_liter }}</td>
                                    {{--<td>--}}
                                        {{--@can('sale_view')--}}
                                            {{--<a href="{{ route('admin.sales.show',[$sale->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>--}}
                                        {{--@endcan--}}
                                        {{--@can('sale_edit')--}}
                                            {{--<a href="{{ route('admin.sales.edit',[$sale->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>--}}
                                        {{--@endcan--}}
                                    {{--</td>--}}

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
