@extends('frontend.layouts.app')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url({!! asset('images/heading-pages-06.jpg') !!});">
        <h2 class="l-text2 t-center">
            {{ __('app.menu.contact') }}
        </h2>
    </section>
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-b-30">
                    <div class="p-r-20 p-r-0-lg">
                        <div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781"
                             data-pin="images/icons/icon-position-map.png" data-scrollwhell="0"
                             data-draggable="1"></div>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    {!! Form::open(array('route' => 'contact.store','method'=>'POST' , 'class' => 'leave-comment', 'files' => true)) !!}
                    <h4 class="m-text26 p-b-36 p-t-15">
                        {{ __('contact.header') }}
                    </h4>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', __('contact.attributes.name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('contact.placeholder.name')]) !!}

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', __('contact.attributes.phone')) !!}
                        {!! Form::number('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => __('contact.placeholder.phone')]) !!}

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', __('contact.attributes.email')) !!}
                        {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('contact.placeholder.email')]) !!}

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        {!! Form::label('subject', __('contact.attributes.subject')) !!}
                        {!! Form::select('subject', [
                            'Feedback' => 'Feedback',
                            'Contact' => 'Contact',
                            'Request' => 'Request',
                        ], null, ['class' => 'form-control' . ($errors->has('subject') ? ' is-invalid' : ''), 'placeholder' => __('contact.placeholder.subject')]) !!}
                        @if ($errors->has('subject'))
                            <span class="invalid-feedback">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        {!! Form::label('message', __('contact.attributes.message')) !!}
                        {!! Form::textarea('message', null, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => __('contact.placeholder.message')]) !!}

                        @if ($errors->has('message'))
                            <span class="invalid-feedback">{{ $errors->first('message') }}</span>
                        @endif
                    </div>

                    <div class="w-size25">
                        <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            {{ __('contact.buttons.send') }}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc_erCbo17QtZUiw1Fcha9fIw0Pb4L-J0"></script>
    <script src="{{ asset('js/frontend/map-custom.js') }}"></script>
@endsection
