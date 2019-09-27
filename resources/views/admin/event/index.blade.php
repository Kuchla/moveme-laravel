@extends('adminlte::page') @section('title', 'AdminLTE')
@section('content_header')
<h1>
    {{ trans("adminlte::pages.event.index") }}
    <small>{{ trans("adminlte::pages.index") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="#"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li>
        <a href="#">{{ trans("adminlte::pages.event.index") }}</a>
    </li>
    <li class="active">{{ trans("adminlte::pages.index") }}</li>
</ol>
@stop @section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    {{ trans("adminlte::pages.management") }}
                </h3>
                <div class="box-tools">
                    <a class="btn btn-info btn-sm" href="{{ route('admin.events.create') }}">
                        <i class="fa fa-plus"> {{ trans('adminlte::pages.btn.new') }}</i>
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($events->isNotEmpty())
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>{{ trans("adminlte::pages.id") }}</th>
                            <th>{{ trans("adminlte::pages.event.name") }}</th>
                            <th>{{ trans("adminlte::pages.admin") }}</th>
                        </tr>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->name }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.events.show', $event) }}">
                                    <i class="fa fa-eye">
                                        {{
                                            trans("adminlte::pages.btn.show")
                                        }}</i>
                                </a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.events.edit', $event) }}">
                                    <i class="fa fa-edit">
                                        {{
                                            trans("adminlte::pages.btn.edit")
                                        }}</i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="post"
                                    style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash">
                                            {{
                                                trans(
                                                    "adminlte::pages.btn.delete"
                                                )
                                            }}</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h5 class="text-center">{{ trans("adminlte::pages.event.empty") }}</h5>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
