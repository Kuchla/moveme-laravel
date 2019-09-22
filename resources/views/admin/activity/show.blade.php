@extends('adminlte::page') @section('title', 'AdminLTE')
@section('content_header')
<h1>
    {{ trans("adminlte::pages.activity.page") }}
    <small>{{ trans("adminlte::pages.show") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="#"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li>
        <a href="#">{{ trans("adminlte::pages.activity.page") }}</a>
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
                        <b>{{ trans("adminlte::pages.activity.name") }}</b>
                        <p class="text-muted">
                            {{ $activity->name }}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <b>{{ trans("adminlte::pages.activity.name") }}</b>
                        <p class="text-muted">
                            {!! $activity->description !!}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="box-footer">
                <a class="btn btn-warning btn-sm" href="{{ route('admin.activities.edit', $activity) }}">
                    <i class="fa fa-edit"> {{ trans('adminlte::pages.btn.edit') }}</i>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
