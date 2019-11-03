@if(@$place){
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card mb-3">
                        <img style="max-width: 50%;" class="card-img-top" src="{{ url('storage/'.$place->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="h6 text-muted">{{ $place->name }}</h5>
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
                                    <div class="h6 text-muted">
                                        Localização:
                                        <div class="mapouter">
                                            <div class="gmap_canvas"><iframe width="909" height="500" id="gmap_canvas"
                                                    src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"></iframe><a
                                                    href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/">elementor
                                                    pro</a></div>
                                            <style>
                                                .mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    height: 500px;
                                                    width: 909px;
                                                }

                                                .gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    height: 500px;
                                                    width: 909px;
                                                }
                                            </style>
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
</div>
@endif
