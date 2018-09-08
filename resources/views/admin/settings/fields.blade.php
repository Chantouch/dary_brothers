<div class="form-group">
    {!! Form::label('name', __('settings.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('settings.placeholder.name'), 'disabled']) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('description', __('settings.attributes.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('settings.placeholder.description')]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="col-md-12">
    @if(isset($json))
        {!! Form::label($json->name, $json->label . ':') !!}
    @endif
    <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        @if($json->type == 'image')
            {!! Form::file('value', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'accept' => 'image/*']) !!}
        @elseif($json->type == 'checkbox')
            {{ Form::hidden('value', '0') }}
            {!! Form::checkbox('value', '1', null, ['class' => 'filled-in', 'id'=> 'value']) !!}
        @elseif($json->type =='select_from_array')
            {!! Form::select('value', $json->options, null, ['class' => 'form-control']) !!}
        @else
            {!! Form::text('value',null , ['class' => 'form-control', 'placeholder' => 'Enter value']) !!}
        @endif

        @if ($errors->has('value'))
            <span class="invalid-feedback">{{ $errors->first('value') }}</span>
        @endif
    </div>
</div>
