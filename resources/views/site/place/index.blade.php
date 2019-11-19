@extends('site.layouts.app')

@section('title', 'Pontos Turísticos')

@section('content')
<section id="place" class="padd-section wow fadeInUp page-height-default">
    <div id="place-container">
        <div class="container">
            <div class="section-title text-center">
                <h2>Pontos Turísticos</h2>
            </div>
        </div>
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
                                                    Filtro de Pontos Turísticos
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-inline">
                                        <li class="list-inline-item ml-4 mb-2">
                                            <div class="h6 text-muted">Gratuíto</div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="visitation_free" value="1" name="visitation"
                                                    class="form-check-input" checked="checked" />
                                                <label class="form-check-label" for="visitation_free">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="visitation_paid" value="0" name="visitation"
                                                    class="form-check-input" />
                                                <label class="form-check-label" for="visitation_paid">Não</label>
                                            </div>
                                        </li>
                                        <li class="list-inline-item ml-4 mb-2">
                                            <div class="form-group">
                                                <label for="place_activity" class="h6 text-muted">Atividade</label>
                                                <select class="form-control" id="place_activity" name="activity">
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
                                                <label for="place_city" class="h6 text-muted">Cidade</label>
                                                <select class="form-control" id="place_city" name="city">
                                                    <option value="0">Todas</option>
                                                    @foreach ($cities as $key => $city)
                                                    <option value="{{ $city->id }}" @if ($key==old('city', @$city->id))
                                                        selected="selected"
                                                        @endif
                                                        >{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                        <li class="list-inline-item ml-4 mb-2">
                                            <div class="form-group">
                                                <p class="separator">
                                                    <button id="search_place"
                                                        data-route="{{ route('site.place.filter') }}"
                                                        data-identifier="0"
                                                        data-route-paginate="{{ route('site.place.index') }}"
                                                        class="btn btn-success scrollto">Buscar</button>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item ml-4 mb-2">
                                            <div class="form-group">
                                                <p class="separator">
                                                    <a href="{{route('site.place.index')}}" id="search_place_reset"
                                                        class="btn btn-secondary">Resetar</a>
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
                    <div class="row place-list">
                        @include('site.place.partials._place-list')
                    </div>
                    <p>
                        {{ $places->links() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
