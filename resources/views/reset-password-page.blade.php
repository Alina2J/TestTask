@extends('layout')

@section('title', 'Восстановление пароля')

@section('page-content')
    <section class="main-form container">
        <h2>Восстановление пароля</h2>
        <form action="{{route('password.update')}}" method="post" class="needs-validation">
            @csrf
            <input type="hidden" name="token" value="{{ $request->token }}">
            <div class="mb-3">
                <label for="email" class="form-label">Адрес электронной почты<sup>*</sup></label>
                <input readonly value="{{old('email', $request->email)}}" name="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
                       required>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="password">Новый пароль<sup>*</sup></label>
                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                       type="password" required autofocus>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="password_confirmation">Повторите пароль<sup>*</sup></label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                       required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Сбросить пароль</button>
        </form>
        @if(session('status'))
            <p style="margin-top: 20px">Письмо для сброса пароля отправлено на указанную почту!</p>
        @endif
    </section>
@endsection
