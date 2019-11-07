@csrf
<div class="box-body" data-select2-id="14">
    <div class="row">
        <div class="col-md-4 has-feedback {{ $errors->has('admin.name') ? 'has-error' : '' }}">
            <div class="form-group">
                <label for="admin-name">{{ trans("adminlte::pages.account.name") }}</label>
                <input type="text" name="admin[name]" class="form-control" id="admin-name"
                    placeholder="{{ trans('adminlte::pages.account.name') }}"
                    value="{{ old('admin.name', @$admin->name) }}" />
                @if ($errors->has('admin.name'))
                <span class="help-block">
                    <strong>{{ $errors->first('admin.name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-4 has-feedback {{ $errors->has('admin.email') ? 'has-error' : '' }}">
            <div class="form-group">
                <label for="admin-email">{{ trans("adminlte::pages.account.email") }}</label>
                <input type="text" name="admin[email]" class="form-control" id="admin-email"
                    placeholder="{{ trans('adminlte::pages.account.email') }}"
                    value="{{ old('admin.email', @$admin->email) }}" />
                @if ($errors->has('admin.email'))
                <span class="help-block">
                    <strong>{{ $errors->first('admin.email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-4 has-feedback {{ $errors->has('admin.password') ? 'has-error' : '' }}">
            <div class="form-group">
                <label for="admin-password">{{ trans("adminlte::pages.account.password") }}</label>
                <input type="password" name="admin[password]" class="form-control" id="admin-password"
                    placeholder="{{ trans('adminlte::pages.account.password') }}"
                    value="{{ old('admin.password') }}" />
                @if ($errors->has('admin.password'))
                <span class="help-block">
                    <strong>{{ $errors->first('admin.password') }}</strong>
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
    <a class="btn btn-info btn-sm" href="{{ route('admin.admins.index') }}">
        {{ trans("adminlte::pages.btn.cancel") }}
    </a>
</div>

<script>
    $(document).ready(function () {
        $("#admin-about").summernote();
    });
</script>
