<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MoveMe | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{asset('site-assets/img/favicon.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
        rel="stylesheet">

    <!-- Bootstrap css -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link href="{{asset('site-assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('site-assets/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- File Input -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <!-- select 2     -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">

    {{-- <link href="{{asset('assets/css/public-profile.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/comment.css')}}" rel="stylesheet"> --}}

</head>

<body>
    <header id="header" class="header header-hide">
        <div class="container">
            <div id="logo" class="pull-left">
                <h1><a href="/" class="scrollto"><span>Move</span>ME</a></h1>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li id="events"><a href="{{ route('site.event.index') }}">Eventos</a></li>
                    <li id="places"><a href="{{ route('site.place.index')}}">Pontos Turísticos</a></li>
                    <li id="activities"><a href="{{ route('site.activity.index')}}">Atividades Esportivas</a></li>
                    <li id="users"><a href="{{ route('site.user.index')}}">Pessoas</a></li>
                    @if ( Auth::user() )
                    <li id="profiles" class="menu-has-children">
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('site.profile')}}">
                                    Perfil
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('site.profile.destroy', Auth::id()) }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete Perfil
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @if(config('adminlte.logout_method'))
                            {{ method_field(config('adminlte.logout_method')) }}
                            @endif
                            {{ csrf_field() }}
                        </form>
                        @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->
    @yield('content')

    <footer class="footer">
        <div class="copyrights">
            <div class="container">
                <p>&copy; MoveME</p>
                <div class="credits">
                    Designed by <a href="#">Josni Kuchla</a>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('site-assets/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('site-assets/lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('site-assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site-assets/lib/superfish/hoverIntent.js') }}"></script>
    <script src="{{ asset('site-assets/lib/superfish/superfish.min.js') }}"></script>

    <script src="{{ asset('site-assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site-assets/lib/wow/wow.min.js') }}"></script>

    <!-- File Input -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/locales/pt-BR.js"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="{{ asset('js/select2.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    <!-- Mix -->
    <script src="{{ mix('assets/js/app.js') }}"></script>

</body>

</html>
