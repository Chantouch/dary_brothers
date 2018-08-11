<div class="bd-example bd-example-tabs">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="type">Price</label>
            {!! Form::number('price', null, ['placeholder' => 'Product price','class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4">
            <label for="type">Cost</label>
            {!! Form::number('cost', null, ['placeholder' => 'Product cost','class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4">
            <label for="type">Discount</label>
            {!! Form::number('discount', null, ['placeholder' => 'Product discount (%)','class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-12">
            <label for="type">Type</label>
            {{ Form::select('type_id', $types, null, ['placeholder' => 'Pick a type...', 'class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-12">
            <label for="categories">Categories</label>
            @if(isset($product_categories))
                {{ Form::select('categories[]', $categories, $product_categories, [
                 'class' => 'form-control select2',
                 'multiple'
                ]) }}
            @else
                {{ Form::select('categories[]', $categories, [], [
                 'class' => 'form-control select2',
                 'multiple'
                ]) }}
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-file"></i> Images</h3>
                    Maximum 30 files, all files together must have maximal 30MB and the extensions must be matched in
                    the array ['jpg', 'png', 'gif'].
                </div>

                <div class="card-body">

                    <input type="file" name="images[]" id="image_uploads" multiple="multiple">

                    @if (isset($product) && isset($images))
                        <div class="row">
                            @foreach($images as $image)
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
                            @endforeach
                        </div>
                    @endif

                </div>

            </div>
        </div>

    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="form-group">
                <label for="name">Category Name (En)</label>
                {!! Form::text('en_name', null, ['placeholder' => 'Category name (En)','class' => 'form-control']) !!}
                <div class="invalid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description (En)</label>
                {!! Form::textarea('en_description', null, ['placeholder' => 'Category description (En)','class' => 'form-control editor']) !!}
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="form-group">
                <label for="name">Category Name (Kh)</label>
                {!! Form::text('kh_name', null, ['placeholder' => 'Category name (Kh)','class' => 'form-control']) !!}
                <div class="invalid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description (Kh)</label>
                {!! Form::textarea('kh_description', null, ['placeholder' => 'Category description (Kh)','class' => 'form-control editor']) !!}
            </div>
        </div>
    </div>

    <div class="custom-control custom-checkbox mb-3">
        {!! Form::hidden('status','0', false) !!}
        {!! Form::checkbox('status', '1', null,['class' => 'custom-control-input', 'id' => 'status']) !!}
        {!! Form::label('status', 'Status', ['class' => 'custom-control-label']) !!}
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{!! route('admin.products.index') !!}" class="btn btn-default">Back</a>
