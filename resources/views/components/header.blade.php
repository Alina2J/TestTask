<header class="container">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('main-page')}}">Тестовое задание</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if(Auth::user())
                        <li class="nav-item">
                            <a class="nav-link {{Route::is('applications-list-page') ? 'active' : '' }}"
                               aria-current="page" href="{{route('applications-list-page')}}">Список</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::is('profile-page') ? 'active' : '' }}"
                               href="{{route('profile-page')}}">Профиль</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{Route::is('main-page') ? 'active' : '' }}" aria-current="page"
                               href="{{route('main-page')}}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{Route::is('login-page') ? 'active' : '' }}"
                               href="{{route('login-page')}}">Авторизация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::is('reg-page') ? 'active' : '' }}" href="{{route('reg-page')}}">Регистрация</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
