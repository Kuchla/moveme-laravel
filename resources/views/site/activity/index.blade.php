@extends('site.layouts.app')

@section('title', 'Index')

@section('content')
<section id="activity" class="padd-section wow fadeInUp ">
    <div id="place-container">
        <div class="container">
            <div class="section-title text-center">
                <h2>Atividades esportivas</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="row place-list">
                        @include('site.activity.partials._activities-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
