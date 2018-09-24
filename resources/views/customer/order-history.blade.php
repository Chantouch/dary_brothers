@extends('frontend.layouts.app')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url({!! asset('images/heading-pages-01.jpg') !!})"
    >
        <h2 class="l-text2 t-center">
            Orders History
        </h2>
    </section>
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($orders))
                            @foreach($orders as $index => $order)
                                <tr>
                                    <td>{{ $loop->iteration  }}</td>
                                    <td>{{ $order->customer->fullname }}</td>
                                    <td>{{ $order->customer->email }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td>{!! payment_status($order->status) !!}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
