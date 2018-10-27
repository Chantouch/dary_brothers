@extends('frontend.layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('vendor/noui/nouislider.min.css') !!}">
@endsection

@section('content')
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
             style="background-image: url({!! asset(config('settings.contact_page_background')) !!});">
        <h2 class="l-text2 t-center">
            {!! $category->name !!}
        </h2>
        <p class="m-text13 t-center">
            {!! $category->description !!}
        </p>
    </section>

    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <h4 class="m-text14 p-b-7">
                            {{ __('app.fields.categories') }}
                        </h4>
                        <hr>
                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="#" class="s-text13 active1">
                                    All
                                </a>
                            </li>
                            @if(isset($categories) && count($categories))
                                @foreach($categories as $index => $category)
                                    <li class="p-t-4">
                                        <a href="{!! route('categories.show', $category->slug) !!}"
                                           class="s-text13 {!! html_class([ route('categories.show', $category->slug) ]) !!}">
                                            {!! $category->name !!}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>

                        <h4 class="m-text14 p-b-32">
                            {{ __('app.fields.search') }}
                        </h4>

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
                                ], null, ['class' => 'selection-2' . ($errors->has('sort-price') ? ' is-invalid' : ''), 'id' => 'sorting-level']) !!}
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                {!! Form::select('price-level', [
                                    '' => 'Price',
                                    '0-50' => '$0.00 - $50.00',
                                    '50-100' => '$50.00 - $100.00',
                                    '100-150' => '$100.00 - $150.00',
                                    '150-200' => '$150.00 - $200.00',
                                    '200-' => '$200.00+'
                                ], null, ['class' => 'selection-2' . ($errors->has('sort-price') ? ' is-invalid' : ''), 'id' => 'sorting-price']) !!}
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing {!! $products->firstItem() !!}–{!! $products->lastItem() !!}
                            of {!! $products->total() !!} results
						</span>
                    </div>

                    @include('frontend.products.__list')
                    <div class="pagination flex-m flex-w p-t-26">
                        {!! $products->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('js/frontend/product-list.js') }}"></script>
@endsection
