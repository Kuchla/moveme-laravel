@extends('site.layouts.app')

@section('title', 'Perfil')

@section('content')
<section id="profile" class="padd-section wow fadeInUp  page-height-default">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3">Perfil</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form form-vertical" action="{{ $route }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Auth::user()->profile)
                    @method('PATCH')
                    @endif
                    <div class="row">
                        <div class="col-md-3 text-center {{ $errors->has('profile.image') ? 'has-error' : '' }}">
                            <div class="kv-avatar">
                                <label for="fname">Imagem</label>
                                <div class="file-loading">
                                    <input id="profile-image" type="file" class="file" data-preview-file-type="text"
                                        name="profile[image]"
                                        value="{{ @Auth::user()->profile->image ? @url('storage/'.@Auth::user()->profile->image) : asset('assets/images/user-default.png') }}" />
                                    @if ($errors->has('profile.image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile.image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="kv-avatar-hint">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('profile.user.name') ? 'has-error' : '' }}">
                                        <label for="fname">Nome</label>
                                        <input type="text" class="form-control" name="profile[user][name]" required
                                            value="{{ old('user.name', Auth::user()->name) }}">
                                        @if ($errors->has('profile.user.name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile.user.name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('profile.user.email') ? 'has-error' : '' }}">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" name="profile[user][email]" required
                                            value="{{ old('user.email', Auth::user()->email) }}">
                                        @if ($errors->has('profile.user.email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile.user.email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('profile.user.password') ? 'has-error' : '' }}">
                                        <label for="pwd">Senha</span></label>
                                        <input type="text" class="form-control" name="profile[user][password]"
                                            value="{{ old('user.password')}}">
                                        @if ($errors->has('profile.user.password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile.user.password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lname">Atividades praticadas</label>
                                        <select id="profile-activity" class="form-control select2"
                                            name="profile[activity][]" multiple="multiple">
                                            @foreach ($activities as $key => $activity)
                                            <option value="{{ $key }}" @if(!is_null(@Auth::user())&&
                                                !old('profile.activity')){{ @Auth::user()->activities->contains('id', $key) ? "selected" : ''}}
                                                @endif
                                                {{ (collect(old('user.activity'))->contains($key)) ? "selected" : '' }}>
                                                {{ $activity }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('profile.info') ? 'has-error' : '' }}">
                                        <label for="lname">Informações</label>
                                        <textarea class="form-control" id="user[info]" name="profile[info]"
                                            rows="3" placeholder="Escreva algo sobre você ou compatilhe suas redes sociais.">{{ old('profile.info', @Auth::user()->profile->info) }}</textarea>
                                        @if ($errors->has('profile.info'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile.info') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            </div>
        </div>
    </div>
</section>
@endsection
