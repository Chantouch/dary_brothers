<div class="bd-example bd-example-tabs">
    <div class="form-group">
        {!! Form::label('name', __('forms.users.labels.name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('forms.users.placeholder.name'), 'required']) !!}

        @if ($errors->has('name'))
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('email', __('forms.users.labels.email')) !!}
        {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('forms.users.placeholder.email'), 'required']) !!}

        @if ($errors->has('email'))
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('password', __('users.attributes.password')) !!}
            {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.password')]) !!}

            @if ($errors->has('password'))
                <span class="invalid-feedback">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('password_confirmation', __('users.attributes.password_confirmation')) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.password_confirmation')]) !!}

            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('date_of_birth', __('forms.users.labels.date_of_birth')) !!}
        {!! Form::date('date_of_birth', null, ['class' => 'form-control' . ($errors->has('date_of_birth') ? ' is-invalid' : ''), 'placeholder' => __('forms.users.placeholder.date_of_birth')]) !!}

        @if ($errors->has('date_of_birth'))
            <span class="invalid-feedback">{{ $errors->first('date_of_birth') }}</span>
        @endif
    </div>

    <div class="form-group form-row">
        <div class="col-md-12">
            {!! Form::label('roles', __('users.attributes.roles')) !!}
        </div>
        @foreach($roles as $role)
            <div class="col-md-2">
                <div class="custom-control custom-checkbox mb-3">
                    @if(isset($user))
                        {!! Form::checkbox("roles[$role->id]", $role->id, $user->hasRole($role->name), ['class' => 'custom-control-input', 'id' => 'role_'.$role->id]) !!}
                    @else
                        {!! Form::checkbox("roles[$role->id]", $role->id, null, [$role->name, 'class' => 'custom-control-input', 'id' => 'role_'.$role->id]) !!}
                    @endif
                    <label class="custom-control-label" for="{{ 'role_'.$role->id }}">
                        @if (Lang::has('roles.' . $role->name))
                            {!! __('roles.' . $role->name) !!}
                        @else
                            {{ ucfirst($role->name) }}
                        @endif
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="custom-control custom-checkbox mb-3">
        {!! Form::hidden('status','0', false) !!}
        {!! Form::checkbox('status', '1', null,['class' => 'custom-control-input', 'id' => 'status']) !!}
        {!! Form::label('status', __('forms.users.labels.status'), ['class' => 'custom-control-label']) !!}
    </div>
</div>

<button type="submit" class="btn btn-primary">{!! __('forms.buttons.submit') !!}</button>
<a href="{!! route('admin.users.index') !!}" class="btn btn-default">{!! __('forms.buttons.back') !!}</a>
