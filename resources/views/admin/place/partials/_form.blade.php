@csrf
<div class="box-body" data-select2-id="14">
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group {{ $errors->has('place.name') ? 'has-error' : '' }}">
                <label for="place-name">{{ trans("adminlte::pages.place.name") }}</label>
                <input type="text" name="place[name]" class="form-control" id="place-name"
                    placeholder="{{ trans('adminlte::pages.place.name') }}"
                    value="{{ old('place.name', @$place->name) }}" />
                @if ($errors->has('place.name'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('place.city') ? 'has-error' : '' }}">
                <label for="place-city">{{
                    trans("adminlte::pages.place.city")
                }}</label>
                <select class="form-control select2" name="place[city]">
                    <option>Selecione</option>
                    @foreach ($cities as $key => $city)
                    <option value="{{ $key }}" @if ($key==old('place.city', @$place->city))
                        selected="selected"
                        @endif
                        >{{ $city }}</option>
                    @endforeach
                </select>
                @if ($errors->has('place.city'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.city') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('place.description') ? 'has-error' : '' }}">
                <label for="city-about">{{ trans("adminlte::pages.place.description") }}</label>
                <textarea id="city-about" name="place[description]">
                            {{ old('place.description', @$place->description) }}
                    </textarea>
                @if ($errors->has('place.description'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.description') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('place.location') ? 'has-error' : '' }}">
                <label for="place-location">{{ trans("adminlte::pages.place.location") }}</label>
                <textarea class="form-control" rows="2" id="place-location" name="place[location]">
                    {{ old('place.location', @$place->location) }}
                </textarea>
                @if ($errors->has('place.location'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.location') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{ $errors->has('place.image') ? 'has-error' : '' }}">
                <label for="place-image">{{
                    trans("adminlte::pages.place.image")
                }}</label>
                <input type="file" id="place-image" />
                <p class="help-block">
                    <small>Example block-level help text here.</small>
                </p>
                @if ($errors->has('place.location'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.image') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="place-visitation">{{
                        trans("adminlte::pages.place.visitation")
                    }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="place[visitation]" id="place-visitation-free"
                        value="free" {{ old('place.visitation')=='free' ? 'checked' : '' }} />
                    <label for="place_visitation_free">{{
                            trans("adminlte::pages.place.free")
                        }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="place[visitation]" id="place-visitation-paid"
                        value="paid" {{ old('place.visitation')=='paid' ? 'checked' : '' }}/>
                    <label for="place_visitation_paid">{{
                            trans("adminlte::pages.place.paid")
                        }}</label>
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

<script>
    $(document).ready(function () {
        $("#city-about").summernote();
    });
</script>
