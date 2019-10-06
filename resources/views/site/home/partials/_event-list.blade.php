@foreach ( $events as $event)
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ml-0 mb-1">
                    <p class="card-text title">
                        {{ $event->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ url('storage/'.$event->image) }}" class="event-img" />
                <p class="card-text event-text">
                    {{ $event->description }}
                </p>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="h6 text-muted">
                            Atividades
                        </div>
                        @foreach ( $event->activities as $activity)
                        <span class="badge badge-success">{{$activity->name}}</span>
                        @endforeach
                    </div>
                    <br>
                    <div class="col-md-6 mb-2">
                        <div class="h6 text-muted">
                            Informações
                        </div>

                        <span
                            class="badge badge-success">{{ $event->is_free ? 'Com taxa para participar' : 'Gratuito' }}</span>
                        <span
                            class="badge badge-warning">{{ $event->is_limited ? 'Com limite de participantes' : 'Sem limite de participantes' }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="h6 text-muted">
                            Local: {{ $event->place->name }}
                        </div>
                        <div class="text-muted h7">
                            <i class="fa fa-clock-o"></i> {{ $event->date }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row"></div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
    </div>
</div>
@endforeach
