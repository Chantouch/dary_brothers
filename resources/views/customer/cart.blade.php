@extends('frontend.layouts.app')

@section('content')

    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url({!! asset('images/heading-pages-01.jpg') !!});">
        <h2 class="l-text2 t-center">
            {{ __('cart.title') }}
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            @if(count($carts) > 0)
                <div class="print-error-msg" style="display:none">
                    <ul class="list-group"></ul>
                </div>

                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">{{ __('cart.product.name') }}</th>
                                <th class="column-3">{{ __('cart.product.price') }}</th>
                                <th class="p-l-1">{{ __('cart.product.qty') }}</th>
                                <th class="column-5">{{ __('cart.product.total') }}</th>
                                <th class="column-5"></th>
                            </tr>
                            @foreach($carts as $index => $product)
                                <tr class="table-row">
                                    <td class="column-1">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">
                                            @if($product->model->hasMedia('product-images'))
                                                {{ Html::image($product->model->getMedia('product-images')->first()->getUrl('feature-product'), $product->model->getMedia('product-images')->first()->name, ['class' => 'img-thumbnail', 'width' => '40px']) }}
                                            @else
                                                <img src="{{ asset('images/item-10.jpg') }}"
                                                     alt="{{ $product->model->name }}" class="img-thumbnail"
                                                     width="40px">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $product->model->name }}</td>
                                    <td class="column-3">{{ $product->model->price }}</td>
                                    <td>
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <input class="m-text18 t-center num-product quantity form-control"
                                                   type="number"
                                                   name="quantity" value="{!! $product->qty !!}"
                                                   data-id="{!! $product->rowId !!}"
                                                   id="quantity"
                                            >
                                        </div>
                                    </td>
                                    <td class="column-5">{!! number_format($product->price * $product->qty, 2) !!}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            {!! Form::open(['route' => ['customer.carts.destroy', $product->rowId], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-outline-danger btn-sm" name="submit" type="submit"
                                                    value="cart">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            {!! Form::close() !!}
                                            {!! Form::open(['route' => ['customer.switch.wishlist', $product->rowId], 'method' => 'POST']) !!}
                                            <button type="submit" class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <div class="size11 bo4 m-r-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code"
                                   placeholder="Coupon Code">
                        </div>

                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                {{ __('cart.coupon.apply') }}
                            </button>
                        </div>
                    </div>

                    {!! Form::open(['route' => ['customer.carts.empty'], 'method' => 'DELETE']) !!}
                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            {{ __('cart.empty') }}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>

                {!! Form::open(['route' => ['customer.checkouts.store'], 'method' => 'POST']) !!}
                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        {{ __('cart.product.cart_total') }}
                    </h5>

                    <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						{{ __('cart.product.sub_total') }}:
					</span>

                        <span class="m-text21 w-size20 w-full-sm">
						${!! Cart::instance('default')->subtotal() !!}
					</span>
                    </div>

                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						{{ __('cart.product.shipping') }}:
					</span>

                        <div class="w-size28 w-full-sm">
                            <p class="s-text8 p-b-23">
                                There are no shipping methods available. Please double check your address, or contact us
                                if
                                you need any help.
                            </p>

                            <span class="s-text19">
							{{ __('cart.product.calculate_shipping') }}
						</span>

                            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size28 m-t-8 m-b-12">
                                <select class="selection-2" name="country">
                                    <option>Select a country...</option>
                                    <option>US</option>
                                    <option>UK</option>
                                    <option>Japan</option>
                                </select>
                            </div>

                            <div class="bo4 m-b-12">
                                <input class="sizefull s-text7 p-l-15 p-r-15 form-control" type="text" name="state"
                                       placeholder="State /  country">
                            </div>

                            <div class="bo4 m-b-12">
                                <input class="sizefull s-text7 p-l-15 p-r-15 form-control" type="text" name="postcode"
                                       placeholder="Postcode / Zip">
                            </div>

                            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size28 m-t-8 m-b-12">
                                {{ Form::select('payment_method', [
                                    '' => 'Select payment type',
                                    1 => 'Cash on delivery',
                                    2 => 'Pay now'
                                ], null, ['class' => 'selection-2']) }}
                            </div>

                            <div class="bo4 m-b-12">
                                {!! Form::text('address', null, ['placeholder' => 'Address of shipping','class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            {{ __('cart.product.total') }}:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            ${!! Cart::total() !!}
                        </span>
                    </div>

                    <div class="size15 trans-0-4">
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                            {{ __('cart.button.proceed_to_checkout') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}

            @else
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <p>There is no item in your cart.</p>
                        <div class="size15 trans-0-4">
                            <a href="{!! route('products.index') !!}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Go To Shopping
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        (function () {
            const toast = swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.quantity').on('change', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "PUT",
                    url: '{!! url("/customer/carts") !!}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    beforeSend: function () {
                        // swal('Updating....', 'success');
                    },
                    success(data) {
                        toast({
                            type: 'success',
                            title: data.message
                        })
                        $(".print-error-msg").css('display', 'none');
                    },
                    error: function (data) {
                        var errors = data.responseJSON;
                        printErrorMsg(errors.errors);
                    },
                    fail: function (xhr, textStatus, errorThrown) {
                        alert('request failed');
                    }
                });
            });
        })();

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li class="list-group-item list-group-item-danger">' + value + '</li>');
            });
        }
    </script>
@stop
