@extends('layouts.app')
@section('styles')
    <link href="{{ asset('admin/plugins/jquery.filer/css/jquery.filer.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> {!! __('forms.sliders.edit') !!}</h3>
                </div>
                <div class="card-body">
                    {!! Form::model($slider, ['method' => 'PATCH','route' => ['admin.sliders.update', $slider['id']],'files' => true]) !!}
                    @include('admin.sliders.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/plugins/jquery.filer/js/jquery.filer.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            'use strict';
            $('#image_uploads').filer({
                limit: 1,
                maxSize: 30,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                changeInput: true,
                showThumbs: true,
                addMore: false
            });

        });
    </script>
@endsection
