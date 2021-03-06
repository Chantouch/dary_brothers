@foreach($products->chunk(4) as $chunk)
    <div class="row">
        @foreach ($chunk as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="block2">
                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">

                        @if($product->hasMedia('product-images'))
                            {{ Html::image($product->getMedia('product-images')->first()->getUrl(), $product->getMedia('product-images')->first()->name, ['class' => 'img-thumbnail', 'width' => '40px']) }}
                        @else
                            <img src="{{ asset('images/item-02.jpg') }}" alt="{{ $product->name }}"
                                 class="img-thumbnail" width="40px">
                        @endif

                        {!! Form::open(['route' => ['carts.store'], 'method' => 'POST']) !!}
                        <div class="block2-overlay trans-0-4">
                            <button class="block2-btn-addwishlist hov-pointer trans-0-4"
                                    name="submit"
                                    type="submit"
                                    value="wishlist">
                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                            </button>
                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="qty" value="1" id="sub_qty">
                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"
                                        name="submit"
                                        type="submit"
                                        value="cart"
                                >
                                    <span>{{ __('cart.add_cart') }}</span>
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="block2-txt p-t-20">
                        <a href="{{ route('products.show', $product->getRouteKey()) }}"
                           class="block2-name dis-block s-text3 p-b-5">
                            {{ $product->name }}
                        </a>
                        <span class="block2-price m-text6 p-r-5">
                            ${{ $product->price }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
