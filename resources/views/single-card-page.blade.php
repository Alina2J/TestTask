@extends('layout')

@section('title', 'Редактирование заявки')

@section('page-content')
    <section class="main-form container">
        <h2>Редактирование заявки №{{$card->id}}</h2>
        <form action="{{route('edit-application', $card->id)}}" method="post" class="needs-validation" id="edit-form">
            @csrf
            <div class="mb-3">
                <label for="status" class="form-label">Статус<sup>*</sup></label>
                <select name="status" class="form-select @error('email') is-invalid @enderror" id="status" autofocus
                        required>
                    <option value="1" @if($card->status->id == 1) selected @endif>Новый</option>
                    <option value="2" @if($card->status->id == 2) selected @endif>В работе</option>
                    <option value="3" @if($card->status->id == 3) selected @endif>Завершен</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="name" class="form-label">Имя<sup>*</sup></label>
                <input value="{{$card->name}}" type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror" id="name" required>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="surname" class="form-label">Фамилия<sup>*</sup></label>
                <input value="{{$card->surname}}" type="text" name="surname"
                       class="form-control @error('surname') is-invalid @enderror" id="surname" required>
                @error('surname')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="phone" class="form-label">Номер телефона<sup>*</sup></label>
                <input maxlength="11" minlength="11" value="{{$card->phone}}" type="text" name="phone"
                       class="form-control @error('phone') is-invalid @enderror" id="phone" required>
                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 validate-me">
                <label for="email" class="form-label">Адрес электронной почты<sup>*</sup></label>
                <input value="{{$card->email}}" type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror" id="email"
                       aria-describedby="emailHelp">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">Обращение<sup>*</sup></label>
                <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="textarea"
                          required>{{$card->application}}</textarea>
                @error('text')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <button type="submit" class="btn btn-primary" id="save-button" disabled>Сохранить</button>
            <a href="{{route('applications-list-page')}}" class="btn btn-primary">Назад</a>
        </form>
    </section>
    <script src="/js/form-changes.js"></script>
@endsection
