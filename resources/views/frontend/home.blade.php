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
    @if(isset($video))
        <section class="parallax0 parallax100"
                 style="background-image: url({!! asset($video->getMedia('sliders')->first() ? $video->getMedia('sliders')->first()->getUrl() : 'images/bg-video-01.jpg') !!});">
            <div class="overlay0 p-t-190 p-b-200">
                <div class="flex-col-c-m p-l-15 p-r-15">
                    <span class="m-text9 p-t-45 fs-20-sm">
                        {!! $video->name !!}
                    </span>
                    <h3 class="l-text1 fs-35-sm">
                        {!! $video->text_link !!}
                    </h3>
                    <span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal"
                          data-target="#modal-video-01">
                        <i class="fa fa-play" aria-hidden="true"></i>
                        Play Video
				    </span>
                </div>
            </div>
        </section>
        <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-labelledby="video-01"
             aria-hidden="true">
            <div class="modal-dialog" role="document" data-dismiss="modal">
                <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>
                <div class="modal-content">
                    <div class="wrap-video-mo-01">
                        <div class="w-full wrap-pic-w op-0-0">
                            <img src="{!! asset('images/icons/video-16-9.jpg') !!}" alt="{!! $video->name !!}">
                        </div>
                        <div class="video-mo-01">
                            <iframe src="{!! $video->link !!}"
                                    allowfullscreen allowusermedia
                            >
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    Our Blog
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="{!! asset('images/blog-01.jpg') !!}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    Black Friday Guide: Best Sales & Discount Codes
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

                            <p class="s-text8 p-t-16">
                                Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id
                                euismod. Inter-dum et malesuada fames
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="{!! asset('images/blog-02.jpg') !!}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    The White Sneakers Nearly Every Fashion Girls Own
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>

                            <p class="s-text8 p-t-16">
                                Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex
                                nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="{!! asset('images/blog-03.jpg') !!}" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    New York SS 2018 Street Style: Annina Mislin
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>

                            <p class="s-text8 p-t-16">
                                Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed
                                hendrerit ligula porttitor. Fusce sit amet maximus nunc
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
