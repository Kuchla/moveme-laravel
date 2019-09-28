@extends('adminlte::page') @section('title', 'AdminLTE')
@section('content_header')
<h1>
    {{ trans("adminlte::pages.activity.page") }}
    <small>{{ trans("adminlte::pages.create") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li>
        <a href="{{ route('admin.activities.index') }}">{{ trans("adminlte::pages.activity.crud") }}</a>
    </li>
    <li class="active">{{ trans("adminlte::pages.new") }}</li>
</ol>
@stop @section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    {{ trans("adminlte::pages.form") }}
                </h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;"></div>
                </div>
                <form method="POST" action="{{ route('admin.activities.store') }}" role="form" enctype="multipart/form-data">
                    @include('admin.activity.partials._form')
                </form>
            </div>
            @stop
        </div>
    </div>
</div>
