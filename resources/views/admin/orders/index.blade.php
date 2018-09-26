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
                                <td>{!! $order->customer ? $order->customer->full_name : '' !!}</td>
                                <td>{!! $order->total !!}</td>
                                <td>{!! $order->payment_method !!}</td>
                                <td>{!! $order->order_reference !!}</td>
                                <td>
                                    {!! Form::model($order, ['method' => 'PATCH','route' => ['admin.api.orders.update', $order->id], 'class' => 'payment']) !!}
                                    {{ Form::select('status', [
                                        1 => 'Awaiting payment',
                                        2 => 'Canceled',
                                        3 => 'Delivered',
                                        4 => 'Payment accepted',
                                        5 => 'Processing in progress',
                                        6 => 'Shipped'
                                    ], $order->status, [
                                     'class' => 'form-control select2 payment_status form-control-sm', 'data-id' => $order->id
                                    ]) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $orders->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin/order.js') }}"></script>
@endsection
