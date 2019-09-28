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
            <div class="form-group {{ $errors->has('event.date') ? 'has-error' : '' }}">
                <label for="event-date">{{
                    trans("adminlte::pages.event.date")
                }}</label>
                <div class='input-group date' id='datepickertime'>
                    <input id='event-date type=' text' name="event[date]" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                @if ($errors->has('event.date'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.date') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('event.place') ? 'has-error' : '' }}">
                <label for="event-place">{{
                            trans("adminlte::pages.event.place")
                        }}</label>
                <select id="event-place" class="form-control select2" name="event[place]">
                    <option>Selecione</option>
                    @foreach ($places as $key => $place)
                    <option value="{{ $key }}" @if ($key==old('event.place', @$event->place_id))
                        selected="selected"
                        @endif
                        >{{ $place }}</option>
                    @endforeach
                </select>
                @if ($errors->has('event.place'))
                <span class="help-block">
                    <strong>{{ $errors->first('event.place') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('event.activity') ? 'has-error' : '' }}">
                <label for="event-activity">{{
                                trans("adminlte::pages.event.activities")
                            }}</label>
                <select id="event-activity" class="form-control select2" name="event[activity][]" multiple="multiple">
                    <option>Selecione</option>
                    @foreach ($activities as $key => $activity)
                    <option value="{{ $key }}" @if(!is_null(@$event)&&
                        !old('event.activity')){{ @$event->activities->contains('id', $key) ? "selected" : ''}} @endif
                        {{ (collect(old('event.activity'))->contains($key)) ? "selected" : '' }}>
                        {{ $activity }}
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('event.description') ? 'has-error' : '' }}">
                <label for="event-description">{{ trans("adminlte::pages.event.description") }}</label>
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
        <div class="col-md-6">
            <div class="form-group">
                <label for="event-is_free">{{
                        trans("adminlte::pages.event.is_free")
                    }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event[is_free]" id="event-is_free-yes" value="1"
                        {{ old('event.visitation', @$event->visitation)==1 ? 'checked' : '' }} />
                    <label for="event-is_free-yes">{{
                            trans("adminlte::pages.event.yes")
                        }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event[visitation]" id="event-is_free-no"
                        value="0" {{ old('event.visitation', @$event->visitation)==0 ? 'checked' : '' }} />
                    <label for="event-is_free-no">{{
                            trans("adminlte::pages.event.no")
                        }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="event-is_limited">{{
                            trans("adminlte::pages.event.is_limited")
                        }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event[visitation]" id="event-is_limited-yes"
                        value="1" {{ old('event.visitation', @$event->visitation)==1 ? 'checked' : '' }} />
                    <label for="event-is_limited-yes">{{
                                trans("adminlte::pages.event.yes")
                            }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="event[visitation]" id="event-is_limited-no"
                        value="0" {{ old('event.visitation', @$event->visitation)==0 ? 'checked' : '' }} />
                    <label for="event-is_limited-no">{{
                                trans("adminlte::pages.event.no")
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
    <a class="btn btn-primary" href="{{ route('admin.events.index') }}">
        {{ trans("adminlte::pages.btn.cancel") }}
    </a>
</div>
