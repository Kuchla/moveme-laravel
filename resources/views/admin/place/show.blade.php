@extends('adminlte::page') @section('title', trans("adminlte::pages.place.crud"))
@section('content_header')
<h1>
    {{ trans("adminlte::pages.place.page") }}
    <small>{{ trans("adminlte::pages.show") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li>
        <a href="{{ route('admin.places.index') }}">{{ trans("adminlte::pages.place.crud") }}</a>
    </li>
    <li class="active">{{ trans("adminlte::pages.show") }}</li>
</ol>
@stop @section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    {{ trans("adminlte::pages.info") }}
                </h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;"></div>
                </div>
            </div>
            <div class="box-body">

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.name") }}</b>
                        <p class="text-muted">
                            {{ $place->name }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.city") }}</b>
                        <p class="text-muted">
                            {{ $place->city->name }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.location") }}</b>
                        <p class="text-muted">
                            {!! $place->location !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.activities") }}</b>
                        <p class="text-muted">
                            @foreach ( $place->activities as $activity)
                            {{ $activity->name }}<br>
                            @endforeach
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.visitation") }}</b>
                        <p class="text-muted">
                            {{ $place->visitation ? 'Gratuita' : 'Paga' }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.description") }}</b>
                        <p class="text-muted">
                            {!! $place->description !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.place.image") }}</b>
                        <p>
                            <div class="row margin-bottom">
                                <div class="col-sm-3">
                                    <img class="img-responsive" src="{{ url('storage/'.$place->image) }}" alt="Photo">
                                </div>
                            </div>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="box-footer">
                <a class="btn btn-warning btn-sm" href="{{ route('admin.places.edit', $place) }}">
                    <i class="fa fa-edit"> {{ trans('adminlte::pages.btn.edit') }}</i>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
