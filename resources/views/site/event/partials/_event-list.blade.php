@forelse ( $events as $model)
<div class="card event-list">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ml-0 mb-1">
                    <p class="card-text title">
                        {{ $model->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ url('storage/'.$model->image) }}" class="event-img" />
                <p class="card-text event-text">
                    {!! $model->description !!}
                </p>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="h6 text-muted">
                            Atividades
                        </div>
                        @foreach ( $model->activities as $activity)
                        <span class="badge badge-success">{{$activity->name}}</span>
                        @endforeach
                    </div>
                    <br>
                    <div class="col-md-6 mb-2">
                        <div class="h6 text-muted">
                            Informações
                        </div>

                        <span
                            class="badge badge-success">{{ $model->is_free ? 'Gratuíto' : 'Com taxa para participar' }}</span>
                        <span
                            class="badge badge-secondary">{{ $model->is_limited ? 'Com limite de participantes' : 'Sem limite de participantes' }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="h6 text-muted">
                            Local: {{ $model->place->name }}
                        </div>
                        <div class="text-muted h7">
                            <i class="fa fa-clock-o"></i> {{ dateToPtBr($model->date) }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <div class="h6 text-muted">
                        </div>
                    <div class="text-muted h7" id="event-{{$model->id}}">
                            @include('site.comment._comments', ['modelName' => 'event'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>
@empty
<p>
    <h5>Nenhum evento encontrado com os termos de busca!</h5>
</p>
@endforelse
