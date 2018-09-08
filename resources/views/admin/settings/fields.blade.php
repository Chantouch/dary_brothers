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
        <div class="form-line">
            @if($json->type == 'image')
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput">
                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                        <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="value" accept="image/*">
                        </span>
                    <a href="javascript:void (0)" class="input-group-addon btn btn-default fileinput-exists"
                       data-dismiss="fileinput">Remove</a>
                </div>
            @elseif($json->type == 'checkbox')
                {{ Form::hidden('value', '0') }}
                {!! Form::checkbox('value', '1', null, ['class' => 'filled-in', 'id'=> 'value']) !!}
            @elseif($json->type =='select_from_array')
                {!! Form::select('value', $json->options, null, ['class' => 'form-control']) !!}
            @else
                {!! Form::text('value',null , ['class' => 'form-control', 'placeholder' => 'Enter value']) !!}
            @endif
        </div>
        @if ($errors->has('value'))
            <span class="help-block">
                    <strong>{{ $errors->first('value') }}</strong>
                </span>
        @endif
    </div>
</div>
