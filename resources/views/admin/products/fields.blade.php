<div class="bd-example bd-example-tabs">
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active"
               id="pills-home-tab" data-toggle="pill"
               href="#pills-home" role="tab"
               aria-controls="pills-home"
               aria-expanded="true"
            >
                {{__('app.languages.en')}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab"
               data-toggle="pill" href="#pills-profile" role="tab"
               aria-controls="pills-profile" aria-expanded="true"
            >
                {{__('app.languages.kh')}}
            </a>
        </li>
    </ul>
    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('price', __('forms.products.labels.price')) !!}
            {!! Form::number('price', null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.price'), 'step' => '0.01']) !!}

            @if ($errors->has('price'))
                <span class="invalid-feedback">{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('cost', __('forms.products.labels.cost')) !!}
            {!! Form::number('cost', null, ['class' => 'form-control' . ($errors->has('cost') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.cost'), 'step' => '0.01']) !!}

            @if ($errors->has('cost'))
                <span class="invalid-feedback">{{ $errors->first('cost') }}</span>
            @endif
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('discount', __('forms.products.labels.discount')) !!}
            {!! Form::number('discount', null, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.discount'), 'step' => '0.01']) !!}

            @if ($errors->has('discount'))
                <span class="invalid-feedback">{{ $errors->first('discount') }}</span>
            @endif
        </div>

        <div class="form-group col-md-7">
            {!! Form::label('type_id', __('forms.products.labels.type')) !!}
            {!! Form::select('type_id', $types, null, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.type')]) !!}

            @if ($errors->has('type_id'))
                <span class="invalid-feedback">{{ $errors->first('type_id') }}</span>
            @endif
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('qty', __('products.labels.qty')) !!}
            {!! Form::number('qty', null, ['class' => 'form-control' . ($errors->has('qty') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.qty')]) !!}

            @if ($errors->has('qty'))
                <span class="invalid-feedback">{{ $errors->first('qty') }}</span>
            @endif
        </div>

        <div class="form-group col-md-12">
            {!! Form::label('categories', __('forms.products.labels.categories')) !!}
            @if(isset($product_categories))
                {!! Form::select('categories[]', $categories, $product_categories, ['class' => 'form-control select2' . ($errors->has('categories') ? ' is-invalid' : ''), 'multiple']) !!}
            @else
                {{ Form::select('categories[]', $categories, [], [
                 'class' => 'form-control select2',
                 'multiple'
                ]) }}
            @endif
            @if ($errors->has('categories'))
                <span class="invalid-feedback">{{ $errors->first('categories') }}</span>
            @endif
        </div>

    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="form-group">
                {!! Form::label('en_name', __('forms.products.labels.name')) !!}
                {!! Form::text('en_name', null, ['class' => 'form-control' . ($errors->has('en_name') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.name')]) !!}

                @if ($errors->has('en_name'))
                    <span class="invalid-feedback">{{ $errors->first('en_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('en_description', __('forms.products.labels.description')) !!}
                {!! Form::textarea('en_description', null, ['class' => 'form-control' . ($errors->has('en_description') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.description')]) !!}

                @if ($errors->has('en_description'))
                    <span class="invalid-feedback">{{ $errors->first('en_description') }}</span>
                @endif
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="form-group">
                {!! Form::label('kh_name', __('forms.products.labels.name')) !!}
                {!! Form::text('kh_name', null, ['class' => 'form-control' . ($errors->has('kh_name') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.name')]) !!}

                @if ($errors->has('kh_name'))
                    <span class="invalid-feedback">{{ $errors->first('kh_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('kh_description', __('forms.products.labels.description')) !!}
                {!! Form::textarea('kh_description', null, ['class' => 'form-control' . ($errors->has('kh_description') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.description')]) !!}

                @if ($errors->has('kh_description'))
                    <span class="invalid-feedback">{{ $errors->first('kh_description') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-file"></i> {!! __('forms.products.labels.images') !!}</h3>
                    Maximum 30 files, all files together must have maximal 30MB and the extensions must be matched in
                    the array ['jpg', 'png', 'gif'].
                </div>

                <div class="card-body">

                    <div class="row"><input type="file" name="images[]" id="image_uploads" multiple="multiple"></div>

                    @include('admin.products.__images')

                </div>

            </div>
        </div>
    </div>
    <hr>
    <div class="custom-control custom-checkbox mb-3">
        {!! Form::hidden('status','0', false) !!}
        {!! Form::checkbox('status', '1', null,['class' => 'custom-control-input', 'id' => 'status']) !!}
        {!! Form::label('status', __('forms.products.labels.status'), ['class' => 'custom-control-label']) !!}
    </div>
</div>

<button type="submit" class="btn btn-primary">{!! __('forms.buttons.submit') !!}</button>
<a href="{!! route('admin.products.index') !!}" class="btn btn-default">{!! __('forms.buttons.back') !!}</a>
