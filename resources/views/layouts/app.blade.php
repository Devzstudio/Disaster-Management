<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ url('images/favicon.png') }}">

    <title>{{ config('app.name', 'Disaster') }} @isset($title) - {{$title}} @endisset</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/lib/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/lib/jquery.dataTables.min.css') }}"> @yield('css')
</head>
<style>
    #google_translate_element {

        margin-top: 0.35em;
    }

    .goog-te-menu-frame {
        -webkit-box-shadow: 0 3px 8px 2px #e3e5e7;
        box-shadow: 0 3px 8px 2px #e3e5e7
    }

    .goog-te-menu2 {
        border: 1px solid #f8fafc;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Disaster Management
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->



                        @guest @else
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ url('home') }}">Volunteer Dashboard</a>
                        </li>
                        @if (Auth::user()->isAdmin == 1)
                        <li class="nav-item px-3">
                            <a class="nav-link font-semibold" href="{{ url('admin') }}">Admin</a>
                        </li>
                        @endif


                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ url('profile') }}">Profile</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest

                        <li class="nav-item px-3">
                            <div id="google_translate_element"></div>

                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{ url('js/lib/jquery.min.js') }}"></script>


    <script type="text/javascript" src="{{ url('js/lib/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/lib/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    @yield('js')

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        (function (){
                feather.replace() ;
            })();

            function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.9/index.js"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    @include('flashy::message')


</body>

</html>