@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.sales.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.sales.store']]) !!}
    <input type="hidden" name="id" value="{{ $setup->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('system_date_time', trans('quickadmin.sales.fields.system-date-time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('system_date_time', old('system_date_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('system_date_time'))
                        <p class="help-block">
                            {{ $errors->first('system_date_time') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('volume_before_sales', trans('quickadmin.sales.fields.volume-before-sales').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('volume_before_sales', $setup->cvd, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'disabled' => true]) !!}
                    <input type="hidden" name="volume_before_sales" value="{{ $setup->cvd }}">
                    <p class="help-block"></p>
                    @if($errors->has('volume_before_sales'))
                        <p class="help-block">
                            {{ $errors->first('volume_before_sales') }}
                        </p>
                    @endif
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 form-group">--}}
                    {{--{!! Form::label('volume_after_sales', trans('quickadmin.sales.fields.volume-after-sales').'*', ['class' => 'control-label']) !!}--}}
                    {{--{!! Form::text('volume_after_sales', old('volume_after_sales'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}--}}
                    {{--<p class="help-block"></p>--}}
                    {{--@if($errors->has('volume_after_sales'))--}}
                        {{--<p class="help-block">--}}
                            {{--{{ $errors->first('volume_after_sales') }}--}}
                        {{--</p>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 form-group">--}}
                    {{--{!! Form::label('amount', trans('quickadmin.sales.fields.amount').'*', ['class' => 'control-label']) !!}--}}
                    {{--{!! Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}--}}
                    {{--<p class="help-block"></p>--}}
                    {{--@if($errors->has('amount'))--}}
                        {{--<p class="help-block">--}}
                            {{--{{ $errors->first('amount') }}--}}
                        {{--</p>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_per_liter', trans('quickadmin.sales.fields.price-per-liter').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('price_per_liter', $setup->price_per_liter, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'disabled' => true]) !!}
                    <input type="hidden" name="price_per_liter" value="{{ $setup->price_per_liter }}">
                    <p class="help-block"></p>
                    @if($errors->has('price_per_liter'))
                        <p class="help-block">
                            {{ $errors->first('price_per_liter') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('volume_sold', trans('quickadmin.sales.fields.volume-sold').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('volume_sold', old('volume_sold'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('volume_sold'))
                        <p class="help-block">
                            {{ $errors->first('volume_sold') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

@stop