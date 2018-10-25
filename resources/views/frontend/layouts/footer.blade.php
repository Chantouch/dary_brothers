<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                GET IN TOUCH
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    {{ config('settings.company_address') }}
                </p>
                @if(config('settings.social_activated'))
                    <div class="flex-m p-t-30">
                        @if(config('settings.facebook_page_url'))
                            <a target="_blank" href="{!! config('settings.facebook_page_url') !!}"
                               class="fs-18 color1 p-r-20 fa fa-facebook"
                            ></a>
                        @endif
                        @if(config('settings.instagram_url'))
                            <a target="_blank" href="{!! config('settings.instagram_url') !!}"
                               class="fs-18 color1 p-r-20 fa fa-instagram"
                            ></a>
                        @endif
                        @if(config('settings.vimeo_url'))
                            <a target="_blank" href="{!! config('settings.vimeo_url') !!}"
                               class="fs-18 color1 p-r-20 fa fa-vimeo"
                            ></a>
                        @endif
                        @if(config('settings.g_plus_url'))
                            <a target="_blank" href="{!! config('settings.g_plus_url') !!}"
                               class="fs-18 color1 p-r-20 fa fa-google-plus"
                            ></a>
                        @endif
                        @if(config('settings.youtube_url'))
                            <a target="_blank" href="{!! config('settings.youtube_url') !!}"
                               class="fs-18 color1 p-r-20 fa fa-youtube-play"
                            ></a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Categories
            </h4>

            <ul>
                @if(isset($shared_categories))
                    @foreach($shared_categories as $index  => $category)
                        <li class="p-b-9">
                            <a href="{!! route('categories.show', $category->slug) !!}" class="s-text7">
                                {!! $category->name !!}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                {{ __('Links') }}
            </h4>
            <ul>
                <li class="p-b-9">
                    <a href="{!! route('products.index') !!}" class="s-text7">{{ __('app.menu.shop') }}</a>
                </li>
                <li class="p-b-9">
                    <a href="{!! route('about.index') !!}" class="s-text7">{{ __('app.menu.about') }}</a>
                </li>
                <li class="p-b-9">
                    <a href="{!! route('contact.index') !!}" class="s-text7">{{ __('app.menu.contact') }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
        <a href="#">
            <img class="h-size2" src="{!! asset('images/icons/paypal.png') !!}" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="{!! asset('images/icons/visa.png') !!}" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="{!! asset('images/icons/mastercard.png') !!}" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="{!! asset('images/icons/express.png') !!}" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="{!! asset('images/icons/discover.png') !!}" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            Copyright © {{ \Carbon\Carbon::now()->format('Y') }} All rights reserved. | This template is made with
            <i class="fa fa-heart-o text-danger" aria-hidden="true"></i> by
            <a href="https://bookingkh.com" target="_blank">BookingKH</a>
        </div>
    </div>
</footer>
