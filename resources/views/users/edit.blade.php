@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Редактирование Пользователя</div>
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
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="name">Имя</span>
                    </div>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Username"
                           aria-label="Username" aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="name">Email </span>
                    </div>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}"
                           placeholder="Username" aria-label="Username" aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="check_list_count">Максимальное количество чек листов </span>
                    </div>
                    <input type="number" name="check_list_count" class="form-control"
                           value="{{$user->check_list_count}}"
                           placeholder="Username" aria-label="Username" aria-describedby="check_list_count">
                </div>
                <p>Роль:</p>
                <select class="form-control mb-3" name="role">
                    @foreach($roles as $role)
                        <option value="{{$role->name}}"
                                @if($user->hasRole($role->name)) selected @endif>
                            {{$role->name}}
                        </option>
                    @endforeach
                </select>
                <p>Блокировка:</p>
                <select class="form-control mb-3" name="active">
                    <option value="1" @if($user->active) selected @endif>Активен</option>
                    <option value="0" @if(!$user->active) selected @endif>Заблокирован</option>
                </select>
                <button type="submit" class="btn btn-sm btn-outline-info">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
