@extends('layouts.app')

@section('content')
    @include('vendor.modal.delete')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('fields.attributes.users.title') !!}</strong>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-xl table-bordered table-hover" data-toggle="dataTable"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{!! __('fields.attributes.users.name') !!}</th>
                            <th scope="col">{!! __('fields.attributes.users.email') !!}</th>
                            <th scope="col">{!! __('fields.attributes.users.dob') !!}</th>
                            <th scope="col">{!! __('fields.attributes.users.last_login') !!}</th>
                            <th scope="col">{!! __('fields.attributes.users.status') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <th scope="row">{!! $loop->iteration !!}</th>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->date_of_birth !!}</td>
                                <td>{!! $user->user_reference !!}</td>
                                <td>{!! $user->status !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $users->render() !!}
                </div>
            </div><!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            const toast = swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });
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

            $('.payment_status').on('change', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "PUT",
                    url: '/{!! app()->getLocale()!!}/admin/users/' + id,
                    data: {
                        'status': this.value,
                    },
                    beforeSend: function () {
                        // swal('Updating....', 'success');
                    },
                    success(data) {
                        toast({
                            type: 'success',
                            title: data.message
                        })
                    },
                    error: function (data) {
                        // var errors = data.responseJSON;
                    },
                    fail: function (xhr, textStatus, errorThrown) {
                        alert('request failed');
                    }
                });
            });
        });
    </script>
@endsection
