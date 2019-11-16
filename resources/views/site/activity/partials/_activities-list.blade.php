@foreach ( $activities as $activity)
<div class="col-md-4 mt-5">
    <div class="card text-center place-cardX" data-place="{{ $activity->id }}" data-toggle="modal"
        data-target="#myModal{{$activity->id}}" data-route="{{ route('site.place.show', $activity) }}">
        <img class="card-img-top" src="{{ url('storage/'.$activity->image) }}" alt="Card image cap">
        <div class="card-body" id="card">
            <h5 class="card-title">{{ $activity->name }}</h5>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal{{$activity->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h4 class="modal-title">{{ $activity->name }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mt-5">
                    <div class=" mb-3">
                        <img style="max-width: 100%;" class="card-img-top" src="{{ url('storage/'.$activity->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                {!! $activity->description !!}
                                <hr>
                            </p>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="h6 text-muted">
                                        <i class="fa fa-map"></i> Lugares para praticar
                                    </div>
                                    @foreach ($activity->places as $place)
                                    <span class="badge badge-success">{{$place->name}}</span>
                                    @endforeach
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
@endforeach
