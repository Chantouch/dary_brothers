<form class="mb-3">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEnName">En Name</label>
            <input type="text" class="form-control" id="inputEnName" placeholder="English name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputKhName">Kh Name</label>
            <input type="text" class="form-control" id="inputKhName" placeholder="Kh Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputDescription">Description</label>
        <input type="text" class="form-control" id="inputDescription" placeholder="Something about product...">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputDiscount">Discount</label>
            <input type="number" class="form-control" id="inputDiscount" placeholder="0.43">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCost">Cost</label>
            <input type="number" class="form-control" id="inputCost">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputPrice">Price</label>
            <input type="number" class="form-control" id="inputPrice">
        </div>
        <div class="form-group col-md-3">
            <label for="inputType">Type</label>
            <select id="inputType" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputCategories">Categories</label>
            <select id="inputCategories" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputQty">Qty</label>
            <input type="number" class="form-control" id="inputQty">
        </div>
    </div>
    <hr>
    <div class="form-row">
        <div class="form-group col-md-6">
            <div class="custom-control custom-checkbox mb-3">
                {!! Form::hidden('status','0', false) !!}
                {!! Form::checkbox('status', '1', null,['class' => 'custom-control-input', 'id' => 'status']) !!}
                {!! Form::label('status', __('forms.products.labels.status'), ['class' => 'custom-control-label']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary pull-right">Search</button>
        </div>
    </div>
</form>
