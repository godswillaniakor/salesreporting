@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.setup.title')</h3>
    
    {!! Form::model($setup, ['method' => 'PUT', 'route' => ['admin.setups.update', $setup->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_per_liter', trans('quickadmin.setup.fields.price-per-liter').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('price_per_liter', old('price_per_liter'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_per_liter'))
                        <p class="help-block">
                            {{ $errors->first('price_per_liter') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

