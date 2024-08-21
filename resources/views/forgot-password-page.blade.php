@extends('layout')

@section('title', 'Забыли пароль?')

@section('page-content')
    <section class="main-form container">
        <h2>Забыли пароль?</h2>
        <form action="{{route('forgot-password')}}" method="post" class="needs-validation">
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
            <button type="submit" class="btn btn-primary">Отправить</button>
            @if(session('status'))
                <p style="margin-top: 20px;">Письмо для сброса пароля отправлено на указанную почту!</p>
            @endif
        </form>
    </section>
@endsection
