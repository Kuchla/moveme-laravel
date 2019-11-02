@extends('adminlte::page') @section('title', 'AdminLTE')
@section('content_header')
<h1>
    {{ trans("adminlte::pages.account.crud") }}
    <small>{{ trans("adminlte::pages.index") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans("adminlte::pages.home") }}</a>
    </li>
    <li>
        <a href="{{ route('admin.admins.index') }}">{{ trans("adminlte::pages.account.crud") }}</a>
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
                    <a class="btn btn-info btn-sm" href="{{ route('admin.admins.create') }}">
                        <i class="fa fa-plus"> {{ trans('adminlte::pages.btn.new') }}</i>
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                @if($admins->isNotEmpty())
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>{{ trans("adminlte::pages.id") }}</th>
                            <th>{{ trans("adminlte::pages.account.name") }}</th>
                            <th>{{ trans("adminlte::pages.account.email") }}</th>
                            <th>{{ trans("adminlte::pages.management") }}</th>
                        </tr>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.admins.show', $admin) }}">
                                    <i class="fa fa-eye">
                                        {{
                                            trans("adminlte::pages.btn.show")
                                        }}</i>
                                </a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.admins.edit', $admin) }}">
                                    <i class="fa fa-edit">
                                        {{
                                            trans("adminlte::pages.btn.edit")
                                        }}</i>
                                </a>
                                <form action="{{ route('admin.admins.destroy', $admin) }}" method="post"
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
                <h5 class="text-center">{{ trans("adminlte::pages.account.empty") }}</h5>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
