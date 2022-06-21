<!doctype html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @else
                    @if(Auth::user()->getModelType() == '管理者')
                        <a class="navbar-brand" href="{{ route('semester.select_at_admin') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @elseif(Auth::user()->getModelType() == '教師')
                        <a class="navbar-brand" href="{{ route('teacher.home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ route('student.home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @endif
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                            @if(Auth::user()->getModelType() == '管理者')
                                <li class="nuv-item mr-3">
                                    <a id="navbarDropdown" class="nav-link" href="{{ route('semester.create') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                        学期追加
                                    </a>
                                </li>
                                <li class="nuv-item mx-5">
                                    <a id="navbarDropdown" class="nav-link" href="{{ route('teacher.manage') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                        教師アカウント一覧
                                    </a>
                                </li>
                            @elseif(Auth::user()->getModelType() == '教師')
                                @php
                                    $semester_model = new \App\Models\Semester;
                                    $semesters_app = $semester_model->getSemesters();
                                @endphp
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    年度
                                </a>
                                <div class="dropdown-menu dropdown-menu-end mx-5" aria-labelledby="navbarDropdown">
                                    @foreach($semesters_app as $semester_app)
                                        <a class="dropdown-item" href="{{ route('class.select', $semester_app->id) }}">
                                            {{ $semester_app->getSentence() }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if( Auth::user()->getModelType() == '管理者' )
                                        {{ Auth::user()->getModelType() }}
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if( Auth::user()->getModelType() == '教師' )
                                        <a class="dropdown-item" href="{{ route('teacher.edit_profile') }}">
                                            {{ __('プロフィール') }}
                                        </a>

                                        <a class="dropdown-item" href="{{ route('teacher.edit_password') }}">
                                            {{ __('パスワード') }}
                                        </a>
                                    @elseif( Auth::user()->getModelType() == '生徒' )
                                        <a class="dropdown-item" href="{{ route('student.edit_profile') }}">
                                            {{ __('プロフィール') }}
                                        </a>

                                        <a class="dropdown-item" href="{{ route('student.edit_password') }}">
                                            {{ __('パスワード') }}
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
