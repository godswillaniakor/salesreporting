@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.sales.title')</h3>
    @can('sale_create')
    <p>
        <a href="{{ route('admin.sales.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

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
                                                <th>&nbsp;</th>

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
                                                                <td>
                                    @can('sale_view')
                                    <a href="{{ route('admin.sales.show',[$sale->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('sale_edit')
                                    <a href="{{ route('admin.sales.edit',[$sale->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
</td>

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
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection