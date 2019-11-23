@extends('site.layouts.app')

@section('title', 'Eventos')

@section('content')

<section id="event" class="padd-section wow fadeInUp page-height-default">
    <div class="container">
        <div class="section-title text-center">
            <h2>Eventos</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="ml-0 mb-1">
                                            <p class="card-text title">
                                                Filtros
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-inline-item ml-4 mb-2">
                                        <div class="h6 text-muted">Gratuíto</div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="event-is-free" value="1" name="event-is-free"
                                                class="form-check-input" checked="checked" />
                                            <label class="form-check-label" for="event-is-free">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="event-is-not-free" value="0" name="event-is-free"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="event-is-not-free">Não</label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item ml-4 mb-2">
                                        <div class="h6 text-muted">Limitado</div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="event-is-limited" value="1" name="event-is-limited"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="event-is-limited">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="event-is-not-limited" value="0"
                                                name="event-is-limited" class="form-check-input" checked="checked" />
                                            <label class="form-check-label" for="event-is-not-limited">Não</label>
                                        </div>
                                    </li>

                                    <li class="list-inline-item ml-4 mb-2">
                                        <div class="h6 text-muted">Mês</div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="event-actual-month" value="0" name="event-month"
                                                class="form-check-input" checked="checked" />
                                            <label class="form-check-label" for="event-actual-month">Atual</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="event-next-month" value="1" name="event-month"
                                                class="form-check-input" />
                                            <label class="form-check-label" for="event-next-month">Próximo</label>
                                        </div>
                                    </li>

                                    <li class="list-inline-item ml-4 mb-2">
                                        <div class="form-group">
                                            <label for="event_activity" class="h6 text-muted">Atividade</label>
                                            <select class="form-control" id="event-activity" name="activity">
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
                                    <li class="list-group-item">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <p class="separator">
                                                    <button data-route="{{ route('site.event.filter')}}"
                                                        id="event_search" class="btn btn-success">Buscar</button>
                                                </p>
                                                <p class="separator ml-2">
                                                    <a href="{{route('site.event.index')}}" id="event_search_reset"
                                                        class="btn btn-secondary">Resetar</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="event-list">
                            @include('site.event.partials._event-list')
                        </div>
                        <p>
                            {{ $events->links() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
