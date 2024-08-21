@extends('layout')

@section('title', 'Регистрация')

@section('page-content')
    <section class="main-form container">
        <h2>Регистрация</h2>
        <form action="{{route('registration')}}" method="post" class="needs-validation">
            @csrf
            <div class="mb-3 validate-me">
                <label for="name" class="form-label">Имя<sup>*</sup></label>
                <input value="{{old('name')}}" type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror" id="name" autofocus required>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="surname" class="form-label">Фамилия<sup>*</sup></label>
                <input value="{{old('surname')}}" type="text" name="surname"
                       class="form-control @error('surname') is-invalid @enderror" id="surname" required>
                @error('surname')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="phone" class="form-label">Номер телефона<sup>*</sup></label>
                <input maxlength="11" minlength="11" value="{{old('phone')}}" type="text" name="phone"
                       class="form-control @error('phone') is-invalid @enderror" id="phone" required>
                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="email" class="form-label">Адрес электронной почты<sup>*</sup></label>
                <input value="{{old('email')}}" type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror" id="email"
                       aria-describedby="emailHelp">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="password">Пароль<sup>*</sup></label>
                <input value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" type="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="password_confirmation">Повторите пароль<sup>*</sup></label>
                <input value="{{old('password_confirmation')}}" class="form-control" id="password_confirmation"
                       name="password_confirmation" type="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </section>
@endsection
