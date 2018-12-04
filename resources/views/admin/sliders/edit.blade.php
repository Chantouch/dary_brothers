@extends('layouts.app')
@section('styles')
    <link href="{{ asset('admin/plugins/jquery.filer/css/jquery.filer.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}"
          rel="stylesheet"/>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            'use strict';
            $('#image_uploads').filer({
                limit: 1,
                maxSize: 2,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                changeInput: true,
                showThumbs: true,
                addMore: false
            });
            let $slider_type = $('.slider-type').val()
            $('.slider-type').change(function (e) {
                e.preventDefault()
                if ($(this).val() === 'slider') {
                    $('#slider-image').removeClass('d-none')
                } else if ($(this).val() === 'banner') {
                    $('#slider-image').removeClass('d-none')
                } else {
                    $('#slider-image').addClass('d-none')
                }
            })

            if ($slider_type === 'slider') {
                $('#slider-image').removeClass('d-none')
            } else if ($slider_type === 'banner') {
                $('#slider-image').removeClass('d-none')
            } else {
                $('#slider-image').addClass('d-none')
            }

        });

        $('a.delete-image').click(function (e) {
            e.preventDefault()
            let con = confirm("{{ __('forms.confirm') }}")
            if (!con) return
            $.ajax({
                url: $(this).data("url"),
                type: 'DELETE',
                success: function (result) {
                    location.reload();
                }
            })
        })
    </script>
@endsection
