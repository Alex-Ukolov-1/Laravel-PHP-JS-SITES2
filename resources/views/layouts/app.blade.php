<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($page_title) ? $page_title : config('app.name', 'Laravel') }}</title>

    <!-- The following can be cleaned up. Don't always need to include certain files. -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tags.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/editable.css') }}" rel="stylesheet"/>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/editable.js') }}"></script>
    <script src="{{ asset('js/tags.js') }}"></script>
    <script src="{{ asset('js/upvote.js') }}"></script>

    <!-- x-editable -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <!-- Bootstrap tags input -->
    <script src="{{asset('/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Type aheaed -->
    <script src="{{ asset('/js/typeahead/dist/typeahead.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/typeahead/dist/bloodhound.min.js') }}" type="text/javascript"></script>

    <!-- UpVote -->
    <script src="{{asset('/plugins/jquery-upvote/jquery.upvote.js')}}"></script>
    <link href="{{ asset('plugins/jquery-upvote/jquery.upvote.css') }}" rel="stylesheet"/>

    <!-- Materialize Bootstrap JS -->
    <script src="{{ asset('js/mdb.min.js') }}"></script>

    <!-- Best way to load -->
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body>
    <div id="app">
        <div class="container">
            <!--Navbar-->
            <nav class="navbar navbar-default fixed-top navbar-light #42a5f5 blue">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Переключить навигацию</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home" fa-lg></i></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/questions/top"> ТОП </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/questions/new"> Новое </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/question/ask">Задать вопрос</a></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Войти</a></li>
                                <li><a href="{{ route('register') }}">Регистрация</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}

                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/user/{{ Auth::user()->id }}/questions">Мои вопросы</a></li>
                                        <li><a href="/user/{{ Auth::user()->id }}/answers">Мои ответы</a></li>
                                        <li>
                                            <a href="/user/{{ Auth::user()->id }}/notifications">Подтверждения</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="/user/{{ Auth::user()->id }}">Профиль</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Войти
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @php
                                    // todo clean this up
                                    $notif_cnt = count(Auth::user()->unreadnotifications);
                                    if ($notif_cnt > 0) echo "<li><a href='/user/".Auth::user()->id."/notifications' title='Show Notifications' style='padding: 13px 0px;'><span class='badge' style='background-color:#fff;color: #333;'>$notif_cnt Notifications</span></a></li>";
                                @endphp
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!--/.Navbar-->
        </div>
        @yield('content')

        <p>
        <center>
            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <!-- Place this tag where you want the button to render. -->

            <!-- Place this tag where you want the button to render. -->

            <br>
            <a href="">Powered by Laravel</a>

        </center>
        </p>

    </div>
    @include('modals.login')
</body>
</html>