<div class="topbar-language rs1-select2 ml-2">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropDownLanguage"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        >
            {{ check_lang(app()->getLocale()) }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropDownLanguage">
            @foreach (config('translatable.locales') as $lang => $language)
                @if ($lang != app()->getLocale())
                    <a class="dropdown-item"
                       href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>

@auth
    <div class="header-wrapicon2 dis-block m-l-30">
        <img src="{{ asset('images/icons/icon-header-01.png') }}"
             class="header-icon1 js-show-header-dropdown"
             alt="{{ Auth::user()->name }}"
        >
        <span class="header-icons-noti">2</span>

        <div class="header-cart header-dropdown">
            <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="{{ asset('images/icons/icon-header-01.png') }}"
                             alt="{{ Auth::user()->fullname }}">
                    </div>

                    <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name">
                            {{ Auth::user()->fullname }}
                        </a>

                        <span class="header-cart-item-info">
                            {{ Auth::user()->created_at }}
                        </span>
                    </div>
                </li>

            </ul>

            <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                    <a href="{{ route('customer.orders.history') }}"
                       class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Ordered
                    </a>
                </div>

                <div class="header-cart-wrapbtn">
                    <a href="{{ route('logout') }}"
                       class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <a href="{!! route('login') !!}" class="header-wrapicon1 dis-block m-l-30">
        <img src="{{ asset('images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
    </a>
@endauth
<div class="header-wrapicon2 dis-block m-l-30">
    <a href="{!! route('customer.wish-lists.index') !!}">
        <img src="{{ asset('images/1200px-Heart_corazon.png') }}" class="header-icon1 js-show-header-dropdown"
             alt="Heart_corazon"
        >
    </a>
    <span class="header-icons-noti">{{ Cart::instance('wishlist')->count() }}</span>
</div>

<span class="linedivide1"></span>

<div class="header-wrapicon2 m-r-13">
    <img src="{!! asset('images/icons/icon-header-02.png') !!}"
         class="header-icon1 js-show-header-dropdown" alt="ICON">
    <span class="header-icons-noti">{!! Cart::instance('shopping')->count() !!}</span>

    @include('frontend.layouts.cart')
</div>
