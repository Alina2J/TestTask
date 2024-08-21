@extends('layout')

@section('title', 'Подтверждение адреса электронной почты')

@section('page-content')
    <section class="main-form container">
        <h2>Подтверждение адреса электронной почты</h2>
        @if(session('message'))
            <p style="margin: 20px 0; text-align: center;">{{session('message')}}</p>
        @endif
        <form action="{{route('verification.send')}}" method="post" class="needs-validation">
            @csrf
            <div style="text-align: center">
                <button style="text-align: center" type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </section>
@endsection
