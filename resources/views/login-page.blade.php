@extends('layout')

@section('title', 'Авторизация')

@section('page-content')
    <section class="main-form container">
        <h2>Авторизация</h2>
        @if(session('status'))
            <p style="margin-top: 20px;">Пароль был успешно изменён!</p>
        @endif
        <form action="{{route('login')}}" method="post" class="needs-validation">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Адрес электронной почты<sup>*</sup></label>
                <input value="{{old('email')}}" name="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
                       required autofocus>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Пароль<sup>*</sup></label>
                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                       type="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="login-footer">
                <button type="submit" class="btn btn-primary">Войти</button>
                <a href="{{route('forgot-password-page')}}">Забыли пароль?</a>
            </div>
        </form>
    </section>
@endsection
