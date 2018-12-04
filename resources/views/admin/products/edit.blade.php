@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    <link href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins/jquery.filer/css/jquery.filer.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}"
          rel="stylesheet"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> {!! __('forms.products.edit') !!}</h3>
                </div>
                <div class="card-body">
                    {!! Form::model($product, ['method' => 'PATCH','route' => ['admin.products.update', $id], 'files' => true]) !!}
                    @include('admin.products.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/plugins/trumbowyg/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('js/admin/product-editor.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
