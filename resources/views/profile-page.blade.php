@extends('layout')

@section('title', 'Профиль')

@section('page-content')
    <section class="profile container">
        <div>
            <h2>Профиль пользователя: {{Auth::user()->name}} {{Auth::user()->surname}}</h2>
            <p>
                <b>Email:</b> {{Auth::user()->email}}
                @if(Auth::user()->hasVerifiedEmail())
                    <b>подтверждён</b>
                @else
                    <b>не подтверждён</b>
                @endif
            </p>
            <p><b>Номер телефона:</b> {{Auth::user()->phone}}</p>
        </div>
        <ul class="functions-list">
            <li><a class="btn btn-primary" href="{{route('update-password-page')}}">Сменить пароль</a></li>
            @if(Auth::user()->hasVerifiedEmail())
            @else
                <li><a class="btn btn-primary" href="{{route('verification.notice')}}">Подтвердить адрес электронной
                        почты</a></li>
            @endif
            <li><a class="btn btn-primary" href="{{route('logout')}}">Выход</a></li>
        </ul>
    </section>
@endsection
