@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> {!! __('settings.edit') !!}</h3>
                </div>
                <div class="card-body">
                    {!! Form::model($setting, ['route' => ['admin.settings.update', $setting->id], 'method' => 'patch', 'files'=> true]) !!}
                    @include('admin.settings.fields')
                    {!! Form::close() !!}
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary m-t-15 waves-effect">{!! __('settings.attributes.submit') !!}</button>
                    <a href="{!! route('admin.settings.index') !!}" class="btn btn-outline-warning m-t-15 waves-effect">{!! __('settings.attributes.cancel') !!}</a>
                </div>
            </div>
        </div>
    </div>
@stop
