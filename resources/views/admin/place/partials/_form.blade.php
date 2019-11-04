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
                <select id="place-city" class="form-control select2" name="place[city]">
                    <option>Selecione</option>
                    @foreach ($cities as $key => $city)
                    <option value="{{ $key }}" @if ($key==old('place.city', @$place->city_id))
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
                <textarea id="summernote" name="place[description]">
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
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('place.image') ? 'has-error' : '' }}">
                <label for="place-image">{{
                    trans("adminlte::pages.place.image")
                }}</label>
                <input id="input-file" type="file" class="file" data-preview-file-type="text" name="place[image]"
                    value="{{ @$place->image ? @url('storage/'.@$place->image) : '' }}" />
                <p class="help-block">
                    <small>{{ trans("adminlte::pages.place.image_info") }}</small>
                </p>
                @if ($errors->has('place.image'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.image') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group {{ $errors->has('place.location') ? 'has-error' : '' }}">
                <label for="place-location">{{ trans("adminlte::pages.place.location") }}</label>
                <textarea class="form-control" rows="2" id="place-location" name="place[location]">
                {{ old('place.location', @$place->location) }}
                </textarea>
                <p class="help-block">
                    <small>{{ trans("adminlte::pages.place.location_info") }}</small>
                </p>
                @if ($errors->has('place.location'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.location') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="place-visitation">{{
                        trans("adminlte::pages.place.visitation")
                    }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="place[visitation]" id="place-visitation-free"
                        value="1" {{ old('place.visitation', @$place->visitation)==1 ? 'checked' : '' }} />
                    <label for="place_visitation_free">{{
                            trans("adminlte::pages.place.free")
                        }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="place[visitation]" id="place-visitation-paid"
                        value="0" {{ old('place.visitation', @$place->visitation)==0 ? 'checked' : '' }} />
                    <label for="place_visitation_paid">{{
                            trans("adminlte::pages.place.paid")
                        }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('place.activity') ? 'has-error' : '' }}">
                <label for="place-activity">{{
                    trans("adminlte::pages.place.activities")
                }}</label>
                <select id="place-activities" class="form-control select2" name="place[activity][]" multiple="multiple">
                    <option>Selecione</option>
                    @foreach ($activities as $key => $activity)
                    <option value="{{ $key }}" @if(!is_null(@$place)&&
                        !old('place.activity')){{ @$place->activities->contains('id', $key) ? "selected" : ''}} @endif
                        {{ (collect(old('place.activity'))->contains($key)) ? "selected" : '' }}>{{ $activity }}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('place.activity'))
                <span class="help-block">
                    <strong>{{ $errors->first('place.activity') }}</strong>
                </span>
                @endif
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
