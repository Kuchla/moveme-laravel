@extends('site.layouts.app')

@section('title', 'Atividades')

@section('content')
<section id="activity" class="padd-section wow fadeInUp page-height-default">
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
                    <p>
                        {{ $activities->links() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
