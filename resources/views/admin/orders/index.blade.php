@extends('layouts.app')

@section('content')
    @include('vendor.modal.delete')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('fields.attributes.orders.title') !!}</strong>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-xl table-bordered table-hover" data-toggle="dataTable"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{!! __('fields.attributes.orders.customer_name') !!}</th>
                            <th scope="col">{!! __('fields.attributes.orders.total') !!}</th>
                            <th scope="col">{!! __('fields.attributes.orders.payment_method') !!}</th>
                            <th scope="col">{!! __('fields.attributes.orders.order_reference') !!}</th>
                            <th scope="col">{!! __('fields.attributes.orders.status') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $index => $order)
                            <tr>
                                <th scope="row">{!! $loop->iteration !!}</th>
                                <td>{!! $order->customer->full_name !!}</td>
                                <td>{!! $order->total !!}</td>
                                <td>{!! $order->payment_method !!}</td>
                                <td>{!! $order->order_reference !!}</td>
                                <td>
                                    {{ Form::select('status', [
                                        '1' => 'Awaiting payment',
                                        '2' => 'Canceled',
                                        '3' => 'Delivered',
                                        '4' => 'Payment accepted',
                                        '5' => 'Processing in progress',
                                        '6' => 'Shipped'
                                    ], $order->status, [
                                     'class' => 'form-control select2 payment_status', 'data-id' => $order->id
                                    ]) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $orders->render() !!}
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
                    url: '/admin/api/orders/' + id,
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
