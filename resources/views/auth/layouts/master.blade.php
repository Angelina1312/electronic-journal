<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Электронный журнал: @yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            @guest
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Панель администратора</a>
                    </li>
                </ul>
            @endguest


            @auth
                <ul class="navbar-nav navbar-right">
                    <!--<li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Администратор</a>
                    </li>-->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Выйти</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>

                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                        <ul class="navbar-nav navbar-right ml-5">
                            <li class="nav-item"><a class="nav-link" href="{{ route('raspisanie.index') }}">Расписание</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('journal.index') }}">Журнал</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('plan.index') }}">Методический план</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('student.index') }}">Список студентов</a></li>
                        </ul>
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item"></li>
                            <li class="nav-item"></li>
                            <li class="nav-item"></li>
                        </ul>
                    <ul class="navbar-nav navbar-right ml-5">
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Роли пользователей</a></li>
                    </ul>
                    @else
                        <ul class="navbar-nav navbar-right ml-5">
                            <li class="nav-item"><a class="nav-link" href="{{ route('raspisanie.index') }}">Расписание</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('journal.index') }}">Журнал</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('plan.index') }}">Методический план</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('student.index') }}">Список студентов</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('report.index') }}">Отчет</a></li>
                        </ul>
                    @endif
            @endauth
        </div>
    </nav>


    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
