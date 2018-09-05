@extends('layouts.app')

@section('content')
    @include('vendor.modal.delete')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('forms.users.list') !!}</strong>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-xl table-bordered table-hover" data-toggle="dataTable"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{!! __('forms.users.labels.name') !!}</th>
                            <th scope="col">{!! __('forms.users.labels.email') !!}</th>
                            <th scope="col">{!! __('forms.users.labels.dob') !!}</th>
                            <th scope="col">{!! __('users.attributes.last_login_at') !!}</th>
                            <th scope="col" class="text-center">{!! __('forms.users.labels.status') !!}</th>
                            <th scope="col" class="text-center">{!! __('fields.attributes.actions.action') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <th scope="row">{!! $loop->iteration !!}</th>
                                <td>{{ link_to_route('admin.users.edit', $user->name, $user) }}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->date_of_birth !!}</td>
                                <td>{!! $user->last_login_at !!}</td>
                                <td class="text-center">{!! status($user->status) !!}</td>
                                <td class="text-center">
                                    <div class='btn-group'>
                                        <a href="{!! route('admin.users.edit', $user->id) !!}"
                                           class='btn btn-primary btn-sm'
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete', 'class' => 'confirm']) !!}
                                        @if(Auth::user()->id != $user->id)
                                            {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                        @endif
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $users->render() !!}
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
