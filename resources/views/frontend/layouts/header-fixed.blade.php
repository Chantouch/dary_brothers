<!-- header fixed -->
<div class="wrap_header fixed-header2 trans-0-4">
    <!-- Logo -->
    <a href="{!! route('frontend.home') !!}" class="logo">
        <img src="{{ asset('images/icons/logo.png') }}" alt="{{ config('app.name', 'Dary') }}">
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="{!! route('frontend.home') !!}">Home</a>
                    <ul class="sub_menu">
                        <li><a href="index.html">Homepage V1</a></li>
                        <li><a href="home-02.html">Homepage V2</a></li>
                        <li><a href="home-03.html">Homepage V3</a></li>
                    </ul>
                </li>

                <li>
                    <a href="product.html">Shop</a>
                </li>

                <li class="sale-noti">
                    <a href="product.html">Sale</a>
                </li>

                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">
        <a href="{!! route('customer.carts.index') !!}" class="header-wrapicon1 dis-block">
            <img src="{{ asset('images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
        </a>

        <a href="{!! route('customer.wish-lists.index') !!}" class="header-wrapicon1 dis-block m-l-30">
            <i class="fa fa-heart-o"></i>
        </a>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
            <img src="{{ asset('images/icons/icon-header-02.png') }}"
                 class="header-icon1 js-show-header-dropdown"
                 alt="ICON"
            >
            <span class="header-icons-noti">{!! count(Cart::content()) !!}</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                @if (sizeof(Cart::content()) > 0)
                    <ul class="header-cart-wrapitem">
                        @foreach (Cart::content() as $index => $product)
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    @if($product->model->hasMedia('product-images'))
                                        {{ Html::image($product->model->getMedia('product-images')->first()->getUrl('feature-product'), $product->model->getMedia('product-images')->first()->name) }}
                                    @else
                                        <img src="{{ asset('images/item-cart-01.jpg') }}"
                                             alt="{{ $product->model->name }}"
                                             width="40px">
                                    @endif

                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
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
                            <!-- Button -->
                            <a href="{!! route('customer.carts.index') !!}"
                               class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                View Cart
                            </a>
                        </div>

                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Check Out
                            </a>
                        </div>
                    </div>
                @else
                    <p>There is no item in cart</p>
                @endif
            </div>
        </div>
    </div>
</div>
