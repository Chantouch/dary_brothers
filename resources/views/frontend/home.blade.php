@extends('frontend.layouts.app')

@section('content')
    @if(count($sliders))
        <section class="slide1">
            <div class="wrap-slick1">
                <div class="slick1">
                    @foreach($sliders as $index => $slider)
                        <div class="item-slick1 item1-slick1"
                             style="background-image: url({!! asset($slider->getMedia('sliders')->first() ? $slider->getMedia('sliders')->first()->getUrl() : 'images/master-slide-07.jpg') !!});">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                                <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22"
                                    data-appear="fadeInUp">
                                    {!! $slider->name !!}
                                </h2>

                                <span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33"
                                      data-appear="fadeInDown">
                                    {!! $slider->description !!}
                                </span>

                                <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                                    <a href="{!! $slider->link !!}"
                                       class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                        {!! $slider->text_link !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if(count($banners))
        <div class="banner bgwhite p-t-40 p-b-40">
            <div class="container">
                @foreach($banners->chunk(3) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $banner)
                            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                                <div class="block1 hov-img-zoom pos-relative m-b-30">
                                    <img src="{!! asset('images/banner-05.jpg') !!}" alt="IMG-BENNER">
                                    <div class="block1-wrapbtn w-size2">
                                        <a href="{{$banner->link}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                            {{ $banner->text_link }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <section class="bgwhite p-t-45 p-b-58">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text5 t-center">
                    Our Products
                </h3>
                <hr>
            </div>
            @include('frontend.products.__list')
            <a href="{!! route('products.index') !!}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                <span>View all</span>
            </a>
        </div>
    </section>

    <section class="instagram p-t-20">
        <div class="sec-title p-b-52 p-l-15 p-r-15">
            <h3 class="m-text5 t-center">
                @ follow us on Instagram
            </h3>
        </div>

        <div class="flex-w">
            @if(isset($instagrams) && count($instagrams))
                @foreach($instagrams as  $key => $instagram)
                    <div class="block4 wrap-pic-w">
                        <img src="{!! asset($instagram) !!}" alt="IMG-INSTAGRAM">
                        <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                        <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                            <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                            <span class="p-t-2">39</span>
                        </span>
                            <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                                <p class="s-text10 m-b-15 h-size1 of-hidden">
                                    Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex
                                    nulla
                                    in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam
                                    eget
                                    metus elit.
                                </p>
                                <span class="s-text9">
                                    Photo by @nancyward
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Free Delivery Worldwide
                </h4>

                <a href="#" class="s-text11 t-center">
                    Click here for more info
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    30 Days Return
                </h4>

                <span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Store Opening
                </h4>

                <span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
            </div>
        </div>
    </section>
    @include('frontend.modal-popup')
@endsection
