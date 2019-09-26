@csrf
<div class="box-body" data-select2-id="14">
    <div class="row">
        <div class="col-md-12 has-feedback {{ $errors->has('city.name') ? 'has-error' : '' }}">
            <div class="form-group">
                <label for="city-name">{{ trans("adminlte::pages.city.name") }}</label>
                <input type="text" name="city[name]" class="form-control" id="city-name"
                    placeholder="{{ trans('adminlte::pages.city.name') }}"
                    value="{{ old('city.name', @$city->name) }}" />
                @if ($errors->has('city.name'))
                <span class="help-block">
                    <strong>{{ $errors->first('city.name') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 has-feedback {{ $errors->has('city.about') ? 'has-error' : '' }}">
            <div class="form-group">
                <label for="city-about">{{ trans("adminlte::pages.city.about") }}</label>
                <textarea id="summernote" name="city[about]">
                        {{ old('city.about', @$city->about) }}
                </textarea>
                @if ($errors->has('city.about'))
                <span class="help-block">
                    <strong>{{ $errors->first('city.about') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success btn-sm">
        {{ trans("adminlte::pages.btn.save") }}
    </button>
    <a class="btn btn-info btn-sm" href="{{ route('admin.cities.index') }}">
        {{ trans("adminlte::pages.btn.cancel") }}
    </a>
</div>

<script>
    $(document).ready(function () {
        $("#city-about").summernote();
    });
</script>
