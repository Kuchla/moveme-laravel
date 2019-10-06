@foreach ( $places as $place)
<div class="col-md-4 mt-5">
    <div class="card text-center place-cardX" data-place="{{ $place->id }}" data-toggle="modal"
        data-target="#myModal{{$place->id}}" data-route="{{ route('site.place.show', $place) }}">
        <img class="card-img-top" src="{{ url('storage/'.$place->image) }}" alt="Card image cap">
        <div class="card-body" id="card">
            <h5 class="card-title">{{ $place->name }}</h5>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal{{$place->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ $place->name }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col-md-12 mt-5">
                    <div class=" mb-3">
                        <img style="max-width: 100%;" class="card-img-top" src="{{ url('storage/'.$place->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <!-- <h5 class="h6 text-muted">{{ $place->name }}</h5> -->
                            <p class="card-text">
                                {{ $place->description }}
                                <hr>
                            </p>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="h6 text-muted">
                                        Atividades
                                    </div>
                                    @foreach ($place->activities as $activity)
                                    <span class="badge badge-success">{{ $activity->name }}</span>
                                    @endforeach
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="h6 text-muted">
                                        Visitação: {{ $place->visitation ? 'Gratuita' : 'Paga'}}
                                    </div>
                                    <div class="text-muted h7">
                                        <i class="fa fa-clock-o"></i> Cidade: {{ $place->city->name }}
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
                                                <i class="fas fa-map"></i> Localização
                                            </a>
                                        </p>
                                        <a data-toggle="collapse" href="#collapseExample2" class="card-link"><i
                                                class="fa fa-comment"></i> Comment</a>
                                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                                        <div class="collapse" id="collapseExample">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977"
                                                width="100%" height="200" frameborder="0" style="border:0"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="collapse" id="collapseExample2">
                                            <br>
                                            <br>
                                            <br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</div>

@endforeach
