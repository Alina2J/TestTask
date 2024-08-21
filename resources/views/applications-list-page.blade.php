@extends('layout')

@section('title', 'Список заявок')

@section('page-content')
    <section class="applications-list container">
        <p>Общее количество заявок: <b>{{$cards->count()}}</b></p>
        <p>Количество заявок со статусом <span class="status-new">"Новый"</span>:
            <b>{{ $cards->where('status_id', 1)->count() }}</b></p>
        <p>Количество заявок со статусом <span class="status-work">"В работе"</span>:
            <b>{{ $cards->where('status_id', 2)->count() }}</b></p>
        <p>Количество заявок со статусом <span class="status-end">"Завершен"</span>:
            <b>{{ $cards->where('status_id', 3)->count() }}</b></p>
        <h2>Список заявок: </h2>
        @if($cards->isNotEmpty())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($cards->reverse() as $card)
                    <x-card :card="$card"></x-card>
                @endforeach
            </div>
        @else
            <p>Нет заявок</p>
        @endif
    </section>
@endsection
