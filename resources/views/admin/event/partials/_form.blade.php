@csrf
<div class="box-body" data-select2-id="14">
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group {{ $errors->has('event.name') ? 'has-error' : '' }}">
                <label for="event-name">{{ trans("adminlte::pages.event.name") }}</label>
                <input type="text" name="event[name]" class="form-control" id="event-name"
                    placeholder="{{ trans('adminlte::pages.event.name') }}"
                    value="{{ old('event.name', @$event->name) }}" />
                @if ($errors->has('event.name'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('event.city') ? 'has-error' : '' }}">
                <label for="event-city">{{  }}
                    trans("adminlte::pages.event.city")
                }}</label>
                <select id="event-city" class="form-control select2" name="event[city]">
                    <option>Selecione</option>
                    @foreach ($cities as $key => $city)
                    <option value="{{ $key }}" @if ($key==old('event.city', @$event->city_id))
                        selected="selected"
                        @endif
                        >{{ $city }}</option>
                    @endforeach
                </select>
                @if ($errors->has('event.city'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.city') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('event.description') ? 'has-error' : '' }}">
                <label for="city-about">{{ trans("adminlte::pages.event.description") }}</label>
                <textarea id="summernote" name="event[description]">
                {{ old('event.description', @$event->description) }}
                </textarea>
                @if ($errors->has('event.description'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.description') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('event.image') ? 'has-error' : '' }}">
                <label for="event-image">{{
                    trans("adminlte::pages.event.image")
                }}</label>
                <input id="input-file" type="file" class="file" data-preview-file-type="text" name="event[image]"
                    value="{{ @url('storage/'.$event->image) }}" />
                <p class="help-block">
                    <small>Example block-level help text here.</small>
                </p>
                @if ($errors->has('event.image'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.image') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group {{ $errors->has('event.location') ? 'has-error' : '' }}">
                <label for="event-location">{{ trans("adminlte::pages.event.location") }}</label>
                <textarea class="form-control" rows="2" id="event-location" name="event[location]">
                {{ old('event.location', @$event->location) }}
                </textarea>
                @if ($errors->has('event.location'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.location') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="event-visitation">{{
                        trans("adminlte::pages.event.visitation")
                    }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event[visitation]" id="event-visitation-free"
                        value="0" {{ old('event.visitation', $event->visitation)==0 ? 'checked' : '' }} />
                    <label for="place_visitation_free">{{
                            trans("adminlte::pages.event.free")
                        }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event[visitation]" id="event-visitation-paid"
                        value="1" {{ old('event.visitation', $event->visitation)==1 ? 'checked' : '' }} />
                    <label for="place_visitation_paid">{{
                            trans("adminlte::pages.event.paid")
                        }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('event.activity') ? 'has-error' : '' }}">
                <label for="event-activity">{{
                    trans("adminlte::pages.event.activities")
                }}</label>
                <select id="event-activities" class="form-control select2" name="event[activity][]" multiple="multiple">
                    <option>Selecione</option>
                    @foreach ($activities as $key => $activity)
                    <option value="{{ $key }}" @if(!is_null(@$event)&&
                        !old('event.activity')){{ @$event->activities->contains('id', $key) ? "selected" : ''}} @endif
                        {{ (collect(old('event.activity'))->contains($key)) ? "selected" : '' }}>{{ $activity }}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('event.activity'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.activity') }}</strong>
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
    <a class="btn btn-primary" href="{{ route('admin.events.index') }}">
        {{ trans("adminlte::pages.btn.cancel") }}
    </a>
</div>
