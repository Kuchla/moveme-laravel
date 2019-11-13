@extends('site.layouts.app')

@section('title', 'Index')

@section('content')
<section id="people" class="padd-section wow fadeInUp">
    <div id="place-container">
        <div class="container">
            <div class="section-title text-center">
                <h2>Pessoas</h2>
            </div>
        </div>
        <div class="container page-height-default">
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="ml-0 mb-1">
                                                    <p class="card-text title">
                                                        Filtro de Pessoas
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-inline">
                                            <li class="list-inline-item ml-4 mb-2">
                                                <div class="form-group">
                                                    <label for="user-activity" class="h6 text-muted">Atividade</label>
                                                    <select class="form-control" id="user-activity" name="activity">
                                                        <option value="0">Todas</option>
                                                        @foreach ($activities as $key => $activity)
                                                        <option value="{{ $activity->id }}" @if ($key==old('activity',
                                                            @$activity->id))
                                                            selected="selected"
                                                            @endif
                                                            >{{ $activity->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="list-inline-item ml-4 mb-2">
                                                <div class="form-group">
                                                    <p class="separator">
                                                        <a href="#get-started" id="search-user"
                                                            data-route="{{ route('site.user.filter') }}"
                                                            class="btn-get-green scrollto">Buscar</a>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container-fluid">
                        <br>
                        <div class="row d-flex justify-content-center" id="people-list">
                            @include('site.user.partials._user-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
