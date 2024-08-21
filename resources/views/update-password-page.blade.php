@extends('layout')

@section('title', 'Сменить пароль')

@section('page-content')
    <section class="main-form container">
        <h2>Сменить пароль</h2>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <form action="{{route('update-password')}}" method="post" class="needs-validation">
            @csrf
            <div class="mb-3 validate-me">
                <label for="current-password">Старый пароль<sup>*</sup></label>
                <input class="form-control @error('password') is-invalid @enderror" id="current-password"
                       name="current-password" type="password" required autofocus>
                @error('current-password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                @if (session('error'))
                    <div style="margin-top: 20px" class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
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
                <label for="password_confirmation">Повторите новый пароль<sup>*</sup></label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                       required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Сменить пароль</button>
        </form>
    </section>
@endsection
