@extends('adminlte::page') @section('title', 'AdminLTE')
@section('content_header')
<h1>
    {{ trans("adminlte::pages.places.page") }}
    <small>{{ trans("adminlte::pages.list") }}</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="#"
            ><i class="fa fa-dashboard"></i
            >{{ trans("adminlte::pages.home") }}</a
        >
    </li>
    <li>
        <a href="#">{{ trans("adminlte::pages.places.page") }}</a>
    </li>
    <li class="active">{{ trans("adminlte::pages.management") }}</li>
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
                    <div
                        class="input-group input-group-sm hidden-xs"
                        style="width: 150px;"
                    >
                        <input
                            type="text"
                            name="table_search"
                            class="form-control pull-right"
                            placeholder="{{
                                trans('adminlte::pages.management')
                            }}"
                        />

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>{{ trans("adminlte::pages.id") }}</th>
                            <th>{{ trans("adminlte::pages.places.name") }}</th>
                            <th>{{ trans("adminlte::pages.admin") }}</th>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>John Doe</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-eye">
                                        {{
                                            trans("adminlte::pages.btn.show")
                                        }}</i
                                    >
                                </a>
                                <a class="btn btn-warning btn-sm" href="#">
                                    <i class="fa fa-edit">
                                        {{
                                            trans("adminlte::pages.btn.edit")
                                        }}</i
                                    >
                                </a>
                                <form
                                    action="#"
                                    method="post"
                                    style="display: inline;"
                                >
                                    @csrf @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >
                                        <i class="fa fa-trash">
                                            {{
                                                trans(
                                                    "adminlte::pages.btn.delete"
                                                )
                                            }}</i
                                        >
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-eye">
                                        {{
                                            trans("adminlte::pages.btn.show")
                                        }}</i
                                    >
                                </a>
                                <a class="btn btn-warning btn-sm" href="#">
                                    <i class="fa fa-edit">
                                        {{
                                            trans("adminlte::pages.btn.edit")
                                        }}</i
                                    >
                                </a>
                                <form
                                    action="#"
                                    method="post"
                                    style="display: inline;"
                                >
                                    @csrf @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >
                                        <i class="fa fa-trash">
                                            {{
                                                trans(
                                                    "adminlte::pages.btn.delete"
                                                )
                                            }}</i
                                        >
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop
