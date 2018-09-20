@extends('frontend.layouts.app')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url({!! asset('images/heading-pages-01.jpg') !!})"
    >
        <h2 class="l-text2 t-center">
            {{ __('cart.title') }}
        </h2>
    </section>
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
                                <tr class="table-row" id="{{ $product->rowId }}">
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
                                    <td class="column-3 rate">{{ $product->model->price }}</td>
                                    <td>
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <input class="m-text18 t-center num-product quantity form-control"
                                                   type="number"
                                                   name="quantity" value="{!! $product->qty !!}"
                                                   data-id="{!! $product->rowId !!}"
                                                   data-action="{!! url('customer/carts', $product->rowId) !!}"
                                                   data-lang="{!! app()->getLocale() !!}"
                                                   id="quantity"
                                            >
                                        </div>
                                    </td>
                                    <td class="column-5 subtotal">{!! number_format($product->price * $product->qty, 2) !!}</td>
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
                <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        {{ __('cart.product.cart_total') }}
                    </h5>

                    <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						{{ __('cart.product.sub_total') }}:
					</span>

                        <span class="m-text21 w-size20 w-full-sm" id="subtotal">
						${!! Cart::instance('default')->subtotal() !!}
					</span>
                    </div>

                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						{{ __('cart.product.shipping') }}:
					</span>

                        <div class="w-100">
                            <span class="s-text19">
                                {{ __('cart.product.calculate_shipping') }}
                            </span>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    {!! Form::label('first_name', __('checkout.attributes.first_name')) !!}
                                    {!! Form::text('first_name', null, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.first_name')]) !!}

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    {!! Form::label('last_name', __('checkout.attributes.last_name')) !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.last_name')]) !!}

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                    {!! Form::label('phone_number', __('checkout.attributes.phone_number')) !!}
                                    {!! Form::number('phone_number', null, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.phone_number')]) !!}

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::label('email', __('checkout.attributes.email')) !!}
                                    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.email')]) !!}

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div
                                    class="form-group col-md-6{{ $errors->has('payment_method') ? ' has-error' : '' }}">
                                    {!! Form::label('payment_method', __('checkout.attributes.payment_method')) !!}
                                    {{ Form::select('payment_method', [
                                    1 => 'Cash on delivery',
                                    2 => 'Pay by electronic cash'
                                    ], null, ['class' => 'form-control' . ($errors->has('payment_method') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.payment_method')]) }}

                                    @if ($errors->has('payment_method'))
                                        <span class="invalid-feedback">{{ $errors->first('payment_method') }}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                    {!! Form::label('date_of_birth', __('checkout.attributes.date_of_birth')) !!}
                                    {!! Form::date('date_of_birth', null, ['class' => 'form-control' . ($errors->has('date_of_birth') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.date_of_birth')]) !!}

                                    @if ($errors->has('date_of_birth'))
                                        <span class="invalid-feedback">{{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12{{ $errors->has('address') ? ' has-error' : '' }}">
                                    {!! Form::label('address', __('checkout.attributes.address')) !!}
                                    {!! Form::textarea('address', null, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => __('checkout.placeholder.address')]) !!}

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            {{ __('cart.product.total') }}:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm" id="total">
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
                            <a href="{!! route('products.index') !!}"
                               class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
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
    <script type="text/javascript" src="{{ asset('js/frontend/cart.js') }}"></script>
@stop
