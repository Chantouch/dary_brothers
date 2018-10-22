@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('settings.list') !!}</strong>
                    </div>
                </header>
                <div class="card-body">
                    {!! Form::open(array('route' => 'admin.settings.index','method'=>'GET')) !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('name', __('settings.attributes.name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('settings.placeholder.name')]) !!}

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('description', __('settings.attributes.description')) !!}
                            {!! Form::text('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('settings.placeholder.description')]) !!}

                            @if ($errors->has('description'))
                                <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('settings.search') }}</button>
                    {!! Form::close() !!}
                    <hr>
                    @include('admin.settings.table')
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/admin/settings.js') }}" async></script>
@stop
