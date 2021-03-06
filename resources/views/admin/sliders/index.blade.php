@extends('layouts.app')

@section('content')
    @include('vendor.modal.delete')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('forms.sliders.list') !!}</strong>
                        <div class="card-actions">
                            <a href="{!! route('admin.sliders.create') !!}">
                                <small class="text-muted">{!! __('fields.attributes.types.new') !!}</small>
                            </a>
                        </div>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-xl table-bordered table-hover" data-toggle="dataTable"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{!! __('fields.attributes.types.name') !!}</th>
                            <th scope="col">{!! __('fields.attributes.types.description') !!}</th>
                            <th scope="col">{!! __('fields.attributes.sliders.type') !!}</th>
                            <th scope="col">{!! __('fields.attributes.types.status') !!}</th>
                            <th scope="col">{!! __('fields.attributes.actions.action') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $index => $slider)
                            <tr>
                                <th scope="row">{!! $loop->iteration !!}</th>
                                <td>{!! $slider->name !!}</td>
                                <td>{!! str_limit($slider->description,50) !!}</td>
                                <td>{!! ucfirst($slider->type) !!}</td>
                                <td>{!! status($slider->status) !!}</td>
                                <td>
                                    <div class='btn-group'>
                                        <a href="{!! route('admin.sliders.edit', $slider->id) !!}"
                                           class='btn btn-primary btn-sm'
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open(['route' => ['admin.sliders.destroy', $slider->id], 'method' => 'delete', 'class' => 'confirm']) !!}
                                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm confirm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $sliders->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('button.confirm').on('click', function (e) {
                e.preventDefault();
                var self = $(this);
                swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this imaginary file!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            self.parents('.confirm').submit();
                            return
                        }
                        swal('Your imaginary file is safe!');
                    });
            });
        });
    </script>
@endsection
