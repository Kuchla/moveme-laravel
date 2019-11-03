@forelse ($users as $user)
<div class="col-md-3 col-lg-3 col-sm-6">
    <br>
    <div class="text-center">
        <img data-toggle="modal" data-target="#myModal{{$user->id}}" style="border:1px solid rgb(221, 218, 218); border-radius:10px; max-width: 150px;
        " src="{{ !is_null(@$user->profile->image)
                    ? url('storage/'.@$user->profile->image)
                    : asset('assets/images/user-default.jpg')}} " class="img-responsive" alt="img">
        <br>
        <h5>{{$user->name}}</h5>
        <br>
    </div>
</div>
<div class="modal fade" id="myModal{{$user->id}}">
    <div class="modal-dialog modal-md">
        <div class="modal-content card">
            <div class="modal-header">
                <h4 class="modal-title">{{ $user->name }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mt-5">
                    <div class=" mb-3">
                        <div class="card-body">
                            <div class="h6 text-muted">
                                Info
                            </div>
                            <p class="card-text">
                                {{ @$user->profile->info?: 'Sem informação' }}
                                <hr>
                            </p>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="h6 text-muted">
                                        Atividades
                                    </div>
                                    @forelse ($user->activities as $activity)
                                    <span class="badge badge-success">{{ $activity->name }}</span>
                                    @empty
                                    <p class="card-text">
                                        Sem atividades!
                                    </p>
                                    @endforelse
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
@empty
<h5>
    <br>
    <p> Nenhum pessoa encontra com os termos de busca!</p>
</h5>
@endforelse
