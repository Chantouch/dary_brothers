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
                {!! Form::textarea('en_description', null, ['placeholder' => 'Category description (En)','class' => 'form-control']) !!}
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
                {!! Form::textarea('kh_description', null, ['placeholder' => 'Category description (Kh)','class' => 'form-control']) !!}
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
<a href="{!! route('admin.categories.index') !!}" class="btn btn-default">Back</a>