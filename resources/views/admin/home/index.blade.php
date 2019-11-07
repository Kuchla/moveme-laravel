@extends('adminlte::page') @section('title', 'AdminLTE')
@section('content_header')
<h1>
    {{ trans("adminlte::pages.dashboard.crud") }}
    <small>{{ trans("adminlte::pages.index") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li class="active">{{ trans("adminlte::pages.index") }}</li>
</ol>
@stop
@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $events }}</h3>

                <p>{{ trans("adminlte::pages.dashboard.events") }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="{{ route('admin.events.index') }}" class="small-box-footer"><i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $places }}<sup style="font-size: 20px"></sup></h3>

                <p>{{ trans("adminlte::pages.dashboard.places") }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <a href="{{ route('admin.places.index') }}" class="small-box-footer"><i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $activities }}</h3>

                <p>{{ trans("adminlte::pages.dashboard.activities") }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-running"></i>
            </div>
            <a href="{{ route('admin.activities.index') }}" class="small-box-footer"><i
                    class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $users }}</h3>

                <p>{{ trans("adminlte::pages.dashboard.users") }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@stop
