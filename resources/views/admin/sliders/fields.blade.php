<div class="bd-example bd-example-tabs">
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active"
               id="pills-home-tab" data-toggle="pill"
               href="#pills-home" role="tab"
               aria-controls="pills-home"
               aria-expanded="true"
            >
                English
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab"
               data-toggle="pill" href="#pills-profile" role="tab"
               aria-controls="pills-profile" aria-expanded="true">
                Khmer
            </a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="form-group">
                <label for="name">{!! __('forms.types.labels.name') !!}</label>
                {!! Form::text('en_name', null, ['placeholder' => __('forms.categories.placeholders.name'),'class' => 'form-control']) !!}
                <div class="invalid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group">
                <label for="description">{!! __('forms.types.labels.description') !!}</label>
                {!! Form::textarea('en_description', null, ['placeholder' => __('forms.categories.placeholders.description'),'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="form-group">
                <label for="name">{!! __('forms.types.labels.name') !!}</label>
                {!! Form::text('kh_name', null, ['placeholder' => __('forms.categories.placeholders.name'),'class' => 'form-control']) !!}
                <div class="invalid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group">
                <label for="description">{!! __('forms.types.labels.description') !!}</label>
                {!! Form::textarea('kh_description', null, ['placeholder' => __('forms.categories.placeholders.description'),'class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="type" class="control-label">Link</label>
        {!! Form::text('link', null, ['placeholder' => __('forms.categories.placeholders.name'),'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="type" class="control-label">Type</label>
        {!! Form::select('type', ['banner' => 'Banner', 'slider' => 'Slider', 'video' => 'Video', 'popup' => 'Popup'], null, ['placeholder' => __('forms.categories.placeholders.description'),'class' => 'form-control']) !!}
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-file"></i> {!! __('forms.products.labels.images') !!}</h3>
            Maximum 30 files, all files together must have maximal 30MB and the extensions must be matched in
            the array ['jpg', 'png', 'gif'].
        </div>

        <div class="card-body">

            <input type="file" name="image" id="image_uploads">

            @if (isset($slider) && isset($image))
                <div class="row">
                    <div class="jFiler-items jFiler-row">
                        <ul class="jFiler-items-list jFiler-items-grid">
                            <li class="jFiler-item" data-jfiler-index="1" style="">
                                <div class="jFiler-item-container">
                                    <div class="jFiler-item-inner">
                                        <div class="jFiler-item-thumb">
                                            <div class="jFiler-item-status"></div>
                                            <div class="jFiler-item-info">
                                                <span class="jFiler-item-title">
                                                    <b title="2.jpg">{{$image->name}}</b>
                                                </span>
                                                <span class="jFiler-item-others">
                                                    {{ $image->human_readable_size }}
                                                </span>
                                            </div>
                                            <div class="jFiler-item-thumb-image">
                                                {{ Html::image($image->getUrl(), $image->name, ['class' => 'card-img-top']) }}
                                            </div>
                                        </div>
                                        <div class="jFiler-item-assets jFiler-row">
                                            <ul class="list-inline pull-left">
                                                <li>
                                                    <span class="jFiler-item-others">
                                                        <i class="icon-jfi-file-image jfi-file-ext-jpg"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="list-inline pull-right">
                                                <li>
                                                    <a class="icon-jfi-trash jFiler-item-trash-action"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="custom-control custom-checkbox mb-3">
        {!! Form::hidden('status','0', false) !!}
        {!! Form::checkbox('status', '1', null,['class' => 'custom-control-input', 'id' => 'status']) !!}
        {!! Form::label('status', __('forms.categories.labels.status'), ['class' => 'custom-control-label']) !!}
    </div>
</div>

<button type="submit" class="btn btn-primary">{!! __('forms.buttons.submit') !!}</button>
<a href="{!! route('admin.sliders.index') !!}" class="btn btn-default">{!! __('forms.buttons.back') !!}</a>
