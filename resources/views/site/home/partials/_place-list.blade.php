@foreach ( $places as $model)
<div class="col-md-4 mt-5">
    <div class="card text-center place-cardX" data-place="{{ $model->id }}" data-toggle="modal"
        data-target="#myModal{{$model->id}}" data-route="{{ route('site.place.show', $model) }}">
        <img class="card-img-top" src="{{ url('storage/'.$model->image) }}" alt="Card image cap">
        <div class="card-body" id="card">
            <h5 class="card-title">{{ $model->name }}</h5>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal{{$model->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h4 class="modal-title">{{ $model->name }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mt-5">
                    <div class=" mb-3">
                        <img style="max-width: 100%;" class="card-img-top" src="{{ url('storage/'.$model->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $model->description }}
                                <hr>
                            </p>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="h6 text-muted">
                                        Atividades
                                    </div>
                                    @foreach ($model->activities as $activity)
                                    <span class="badge badge-success">{{ $activity->name }}</span>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="h6 text-muted">
                                        Visitação: {{ $model->visitation ? 'Gratuita' : 'Paga'}}
                                    </div>
                                    <div class="text-muted h7">
                                        <i class="fa fa-clock-o"></i> Cidade: {{ $model->city->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <hr>
                                    <div class="h6 text-muted">
                                        <p>
                                            <a class="btn btn-success btn-sm" data-toggle="collapse"
                                                href="#collapseExample" role="button" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="fa fa-map"></i> Localização
                                            </a>
                                            <a class="btn btn-success btn-sm" data-toggle="collapse"
                                                href="#collapseExample2" role="button" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="fa fa-comment"></i> Comentarios
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977"
                                                width="100%" height="200" frameborder="0" style="border:0"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="collapse" id="collapseExample2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <div class="text-muted h7" id="place-{{$model->id}}">
                                                        @include('site.home.partials._comments', ['modelName' =>
                                                        'place'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
