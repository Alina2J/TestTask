@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <section class="main-form container">
        <h2>Отправьте нам сообщение</h2>
        <form action="{{route('add-application')}}" method="post" class="needs-validation">
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
                       class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
                       required>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">Обращение<sup>*</sup></label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="textarea"
                          required>{{old('text')}}</textarea>
                @error('text')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </section>
@endsection
