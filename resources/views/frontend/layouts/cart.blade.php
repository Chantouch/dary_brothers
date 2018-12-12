<div class="header-cart header-dropdown">
    @if (sizeof(Cart::content()) > 0)
        <ul class="header-cart-wrapitem">
            @foreach (Cart::content() as $index => $product)
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        @if($product->model->hasMedia('product-images'))
                            {{ Html::image($product->model->getMedia('product-images')->first()->getUrl(), $product->model->getMedia('product-images')->first()->name) }}
                        @else
                            <img src="{{ asset('images/item-cart-01.jpg') }}"
                                 alt="{{ $product->model->name }}"
                                 width="40px">
                        @endif

                    </div>

                    <div class="header-cart-item-txt">
                        <a href="{{ route('products.show', $product->model->slug) }}" class="header-cart-item-name">
                            {!! $product->name !!}
                        </a>
                        <span class="header-cart-item-info">
                            {!! $product->qty !!} x ${!! $product->price !!}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="header-cart-total">
            Total: ${!! Cart::total() !!}
        </div>
        <div class="header-cart-buttons">
            <div class="header-cart-wrapbtn">
                <a href="{!! route('customer.carts.index') !!}"
                   class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    {{ __('app.fields.view_cart') }}
                </a>
            </div>

            <div class="header-cart-wrapbtn">
                <a href="{!! route('customer.carts.index') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    {{ __('app.fields.checkout') }}
                </a>
            </div>
        </div>
    @else
        <p>{{ __('app.fields.no_item_in_cart') }}</p>
    @endif
</div>
