@extends('site.layouts.app')

@section('title', 'Index')

@section('content')

{{-- @include('site.home.partials._intro') --}}


{{-- @include('site.home.partials._events') --}}
<!-- @include('site.home.partials._show-place') -->

@include('site.home.partials._places')
@endsection
