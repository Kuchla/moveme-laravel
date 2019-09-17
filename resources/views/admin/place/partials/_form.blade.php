@csrf
<div class="box-body" data-select2-id="14">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ trans("adminlte::pages.places.name") }}</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Enter ..."
                />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">{{
                    trans("adminlte::pages.places.city")
                }}</label>
                <select class="form-control" id="select2-x1ao-container">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ trans("adminlte::pages.places.description") }}</label>
                <textarea
                    class="form-control"
                    rows="3"
                    placeholder="Enter ..."
                ></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ trans("adminlte::pages.places.location") }}</label>
                <textarea
                    class="form-control"
                    rows="1"
                    placeholder="Enter ..."
                ></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputFile">{{
                        trans("adminlte::pages.places.image")
                    }}</label>
                    <input type="file" id="exampleInputFile" />

                    <p class="help-block">
                        <small>Example block-level help text here.</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success">
        {{ trans("adminlte::pages.btn.save") }}
    </button>
    <a class="btn btn-primary" href="{{ route('admin.places.index') }}">
        {{ trans("adminlte::pages.btn.cancel") }}
    </a>
</div>
