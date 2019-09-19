@csrf
<div class="box-body" data-select2-id="14">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ trans("adminlte::pages.place.name") }}</label>
                <input type="text" class="form-control" placeholder="Enter ..." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">{{
                    trans("adminlte::pages.place.city")
                }}</label>
                <select class="form-control select2" name="places[city]">
                    <option>Selecione</option>
                    @foreach ($cities as $key => $city)
                    <option value="{{ $key }}" @if ($key==old('places.city', @$places->city))
                        selected="selected"
                        @endif
                        >{{ $city }}</option>
                    @endforeach
                </select>
                @if ($errors->has('news.category'))
                <span class="help-block">
                    <strong>{{ $errors->first('news.category') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ trans("adminlte::pages.place.description") }}</label>
                <script>
                    $(document).ready(function() {
                        $("#summernote").summernote();
                    });
                </script>
                <div id="summernote">
                    <p>Hello Summernote</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ trans("adminlte::pages.place.location") }}</label>
                <textarea class="form-control" rows="1" placeholder="Enter ..."></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputFile">{{
                    trans("adminlte::pages.place.image")
                }}</label>
                <input type="file" id="exampleInputFile" />

                <p class="help-block">
                    <small>Example block-level help text here.</small>
                </p>
            </div>
            <script>
                $("#input-id").fileinput();
            </script>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputFile">{{
                        trans("adminlte::pages.place.visitation")
                    }}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="option1" checked />
                        <label for="exampleInputFile">{{
                            trans("adminlte::pages.place.free")
                        }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option2" />
                        <label for="exampleInputFile">{{
                            trans("adminlte::pages.place.paid")
                        }}</label>
                    </div>
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
