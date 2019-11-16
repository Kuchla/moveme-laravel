@extends('adminlte::page') @section('title', trans("adminlte::pages.event.crud"))
@section('content_header')
<h1>
    {{ trans("adminlte::pages.event.page") }}
    <small>{{ trans("adminlte::pages.show") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li>
        <a href="{{ route('admin.events.index') }}">{{ trans("adminlte::pages.event.crud") }}</a>
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
                        <b>{{ trans("adminlte::pages.event.name") }}</b>
                        <p class="text-muted">
                            {{ $event->name }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.place") }}</b>
                        <p class="text-muted">
                            {{ $event->place->name }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.date") }}</b>
                        <p class="text-muted">
                            {{ $event->date }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.activities") }}</b>
                        <p class="text-muted">
                            @foreach ( $event->activities as $activity)
                            {{ $activity->name }}<br>
                            @endforeach
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.is_free") }}</b>
                        <p class="text-muted">
                            {{ $event->is_free ? trans("adminlte::pages.event.yes") : trans("adminlte::pages.event.no") }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.is_limited") }}</b>
                        <p class="text-muted">
                            {{ $event->is_limited ? trans("adminlte::pages.event.yes") : trans("adminlte::pages.event.no") }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.description") }}</b>
                        <p class="text-muted">
                            {!! $event->description !!}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.event.image") }}</b>
                        <p>
                            <div class="row margin-bottom">
                                <div class="col-sm-3">
                                    <img class="img-responsive" src="{{ url('storage/'.$event->image) }}" alt="Photo">
                                </div>
                            </div>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="box-footer">
                <a class="btn btn-warning btn-sm" href="{{ route('admin.events.edit', $event) }}">
                    <i class="fa fa-edit"> {{ trans('adminlte::pages.btn.edit') }}</i>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
