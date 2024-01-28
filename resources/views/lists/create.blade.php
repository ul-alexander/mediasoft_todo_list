@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Создать лист задач</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('lists.store') }}">
                @csrf
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Название </span>
                    </div>
                    <input type="text" name="name" class="form-control"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-sm">
                </div>
                <p>Пользователи:</p>
                <select class="form-control" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <hr>
                <button type="submit" class="btn btn-sm btn-outline-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection
