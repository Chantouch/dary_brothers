@extends('frontend.layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('vendor/noui/nouislider.min.css') !!}">
@endsection

@section('content')
    @if(config('settings.product_list'))
        <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
                 style="background-image: url({!! asset(config('settings.product_list_background')) !!});">
            <h2 class="l-text2 t-center">
                All
            </h2>
            <p class="m-text13 t-center">
                New Arrivals Women Collection 2018
            </p>
        </section>
    @endif
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="{!! route('products.index') !!}" class="s-text13 active1">
                                    All
                                </a>
                            </li>
                            @if(count($categories))
                                @foreach($categories as $index => $category)
                                    <li class="p-t-4">
                                        <a href="{!! route('categories.show', $category->slug) !!}" class="s-text13">
                                            {!! $category->name !!}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>

                        <h4 class="m-text14 p-b-32">
                            Search
                        </h4>

                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                Price
                            </div>

                            <div class="wra-filter-bar">
                                <div id="filter-bar"></div>
                            </div>

                            <div class="flex-sb-m flex-w p-t-16">
                                <div class="w-size11">
                                    <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                        Filter
                                    </button>
                                </div>

                                <div class="s-text3 p-t-10 p-b-10">
                                    Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                                </div>
                            </div>
                        </div>

                        <div class="filter-color p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-12">
                                Color
                            </div>

                            <ul class="flex-w">
                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter1" type="checkbox"
                                           name="color-filter1">
                                    <label class="color-filter color-filter1" for="color-filter1"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter2" type="checkbox"
                                           name="color-filter2">
                                    <label class="color-filter color-filter2" for="color-filter2"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter3" type="checkbox"
                                           name="color-filter3">
                                    <label class="color-filter color-filter3" for="color-filter3"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter4" type="checkbox"
                                           name="color-filter4">
                                    <label class="color-filter color-filter4" for="color-filter4"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter5" type="checkbox"
                                           name="color-filter5">
                                    <label class="color-filter color-filter5" for="color-filter5"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter6" type="checkbox"
                                           name="color-filter6">
                                    <label class="color-filter color-filter6" for="color-filter6"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter7" type="checkbox"
                                           name="color-filter7">
                                    <label class="color-filter color-filter7" for="color-filter7"></label>
                                </li>
                            </ul>
                        </div>
                        {!! Form::open(array('route' => 'products.index','method'=>'GET')) !!}
                        <div class="search-product pos-relative bo4 of-hidden">
                            {!! Form::text('q', null, ['class' => 's-text7 size6 p-l-23 p-r-50', 'placeholder' => __('Search Products...')]) !!}

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                {!! Form::select('sort-price', [
                                    '' => 'Default Sorting',
                                    'asc' => 'Price: low to high',
                                    'desc' => 'Price: high to low'
                                ], $get_request['sort_price'], ['class' => 'selection-2' . ($errors->has('sort-price') ? ' is-invalid' : ''), 'id' => 'sorting-level']) !!}
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                {!! Form::select('price-level', [
                                    '' => 'Price',
                                    '0-50' => '$0.00 - $50.00',
                                    '50-100' => '$50.00 - $100.00',
                                    '100-150' => '$100.00 - $150.00',
                                    '150-200' => '$150.00 - $200.00',
                                    '200-' => '$200.00+'
                                ], $get_request['sorting_price'], ['class' => 'selection-2' . ($errors->has('sort-price') ? ' is-invalid' : ''), 'id' => 'sorting-price']) !!}
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing {!! $products->firstItem() !!}–{!! $products->lastItem() !!}
                            of {!! $products->total() !!} results
						</span>
                    </div>

                    @include('frontend.products.__list')
                    <div class="pagination flex-m flex-w p-t-26">
                        {!! $products->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('vendor/daterangepicker/moment.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('vendor/noui/nouislider.min.js') !!}"></script>
    <script src="{{ asset('js/frontend/product-list.js') }}"></script>
@endsection
