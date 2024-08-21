<div class="col">
    <div class="card h-100">
        <div class="card-body flex-grow-1">
            <h5 class="card-title">ID: {{$card->id}}</h5>
            <div class="card-content">
                <p class="card-text">Статус: <span @if($card->status->id === 1) class="status-new"
                                                   @elseif($card->status->id === 2) class="status-work"
                                                   @else class="status-end" @endif >"{{$card->status->status}}"</span>
                </p>
                <p class="card-text">Имя: {{$card->name}}</p>
                <p class="card-text">Фамилия: {{$card->surname}}</p>
                <p class="card-text">Номер: {{$card->phone}}</p>
                <p class="card-text">Email: {{$card->email}}</p>
                <p class="card-text">{{$card->application}}</p>
                <p class="card-text">Дата создания: {{ Carbon\Carbon::parse($card->created_at)->format('Y.m.d') }}</p>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('single-card-page', $card->id)}}" class="btn btn-primary">Редактировать</a>
            <form style="margin-left: 20px" action="{{ route('delete-card', $card->id )}}" method="post"
                  onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Удалить</button>
            </form>
        </div>
    </div>
</div>
