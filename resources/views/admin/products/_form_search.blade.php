{!! Form::open(array('route' => 'admin.products.index','method'=>'GET')) !!}
<div class="form-group">
    {!! Form::label('name', __('products.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.name')]) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('cost', __('products.attributes.cost')) !!}
        {!! Form::number('cost', null, ['class' => 'form-control' . ($errors->has('cost') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.cost')]) !!}

        @if ($errors->has('cost'))
            <span class="invalid-feedback">{{ $errors->first('cost') }}</span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('price', __('products.attributes.price')) !!}
        {!! Form::number('price', null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.price')]) !!}

        @if ($errors->has('price'))
            <span class="invalid-feedback">{{ $errors->first('price') }}</span>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('qty', __('products.attributes.qty')) !!}
        {!! Form::number('qty', null, ['class' => 'form-control' . ($errors->has('qty') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.qty')]) !!}

        @if ($errors->has('qty'))
            <span class="invalid-feedback">{{ $errors->first('qty') }}</span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('type', __('forms.products.labels.type')) !!}
        {!! Form::select('type', $types, null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.type')]) !!}

        @if ($errors->has('type'))
            <span class="invalid-feedback">{{ $errors->first('type') }}</span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', __('products.attributes.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('products.placeholder.description'), 'rows' => 5]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="custom-control custom-checkbox mb-3">
            {!! Form::checkbox('status', '1', null,['class' => 'custom-control-input', 'id' => 'status']) !!}
            {!! Form::label('status', __('forms.products.labels.status'), ['class' => 'custom-control-label']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary pull-right">
            <i class="fa fa-search"></i> {{ __('products.search') }}
        </button>
    </div>
</div>

{!! Form::close() !!}
