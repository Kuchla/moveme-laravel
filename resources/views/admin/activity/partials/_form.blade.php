@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('activity.name') ? 'has-error' : '' }}">
                <label for="activity-name">{{ trans("adminlte::pages.activity.name") }}</label>
                <input type="text" name="activity[name]" class="form-control" id="activity-name" activityholder="{{ trans('adminlte::pages.activity.name') }}" value="{{ old('activity.name', @$activity->name) }}" />
                @if ($errors->has('activity.name'))
                <span class="help-block">
                    <strong>{{ $errors->first('activity.name') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('activity.description') ? 'has-error' : '' }}">
                <label for="activity-description">{{ trans("adminlte::pages.activity.description") }}</label>
                <textarea id="summernote" name="activity[description]">
                {{ old('activity.description', @$activity->description) }}
                </textarea>
                @if ($errors->has('activity.description'))
                <span class="help-block">
                    <strong>{{ $errors->first('activity.description') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('activity.image') ? 'has-error' : '' }}">
                <label for="activity-image">{{
                    trans("adminlte::pages.activity.image")
                }}</label>
                <input id="input-file" type="file" class="file" data-preview-file-type="text" name="activity[image]" value="{{ @$activity->image ? @url('storage/'.@$activity->image) : '' }}" />
                <p class="help-block">
                    <small>Example block-level help text here.</small>
                </p>
                @if ($errors->has('activity.image'))
                <span class="help-block">
                    <strong>{{ $errors->first('activity.image') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success">
        {{ trans("adminlte::pages.btn.save") }}
    </button>
    <a class="btn btn-primary" href="{{ route('admin.activities.index') }}">
        {{ trans("adminlte::pages.btn.cancel") }}
    </a>
</div>
