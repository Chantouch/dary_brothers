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
                    @include('admin.settings.table')
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $('.ajax-request').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var value = $(this).data('value');
                if (value) {
                    $(this).data('value', 0);
                    element = 0;
                } else {
                    $(this).data('value', 1);
                    element = 1;
                }
                $.ajax({
                    type: "PUT",
                    url: $(this).attr("href"),
                    data: {'value': element},
                    success: function (rrr) {
                        if (rrr.value === '1') {
                            $('#value' + id).removeClass('fa-square-o');
                            $('#value' + id).addClass('fa-check-square-o');
                        } else {
                            $('#value' + id).removeClass('fa-check-square-o');
                            $('#value' + id).addClass('fa-square-o');
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
        })
    </script>
@stop
