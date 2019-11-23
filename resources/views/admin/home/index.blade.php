@extends('adminlte::page') @section('title', trans("adminlte::pages.dashboard.crud"))
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
    <div class="col-lg-3 col-xs-6">
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
    <div class="col-lg-3 col-xs-6">
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
    <div class="col-lg-3 col-xs-6">
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
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans("adminlte::pages.dashboard.latest_users") }}</h3>
                <div class="box-tools pull-right">
                    <span class="label label-danger">{{ trans("adminlte::pages.dashboard.users_quantity") }}</span>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    @forelse ($siteUsers as $user)
                    <li>
                        <img src="{{ !is_null(@$user->profile->image)
                            ? url('storage/'.$user->profile->image)
                            : asset('assets/images/user-default.png')}}" alt="User Image">
                        <a class="users-list-name" href="#">{{ $user->name }}</a>
                        <span class="users-list-date">{{ dateToPtBr($user->created_at) }}</span>
                    </li>
                    @empty
                    <p class="text-center">Nenhum usuário cadastrado na área pública do sistema!</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
