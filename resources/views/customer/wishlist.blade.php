@extends('frontend.layouts.app')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url({!! asset('images/heading-pages-01.jpg') !!});"
    >
        <h2 class="l-text2 t-center">
            {{ __('wishlist.title') }}
        </h2>
    </section>
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">{{ __('wishlist.product.name') }}</th>
                            <th class="column-3">{{ __('wishlist.product.price') }}</th>
                            <th class="column-4 p-l-70">{{ __('wishlist.product.qty') }}</th>
                            <th class="column-5">{{ __('wishlist.product.total') }}</th>
                            <th class="column-5"></th>
                        </tr>
                        @if(count($wishlists) > 0)
                            @foreach($wishlists as $index => $product)
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
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number"
                                                   name="num-product1" value="1">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5">{!! number_format($product->price * $product->qty, 2) !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['customer.wish-lists.destroy', $product->rowId], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-outline-danger" name="submit" type="submit" value="cart">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>

            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        {{ __('wishlist.update') }}
                    </button>
                </div>

                {!! Form::open(['route' => ['customer.wish-lists.empty'], 'method' => 'DELETE']) !!}
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        {{ __('wishlist.empty') }}
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
