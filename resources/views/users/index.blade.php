@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Пользователи</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Блокировка</th>
                    <th scope="col">Редактировать</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @can('Заблокировать пользователя')
                                @if($user->active)
                                    <form class="d-inline-block" method="POST"
                                          action="{{ route('users.status', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="active" value="0">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Заблокировать
                                        </button>
                                    </form>
                                @else
                                    <form class="d-inline-block" method="POST"
                                          action="{{ route('users.status', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="active" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-success">Разблокировать
                                        </button>
                                    </form>
                                @endif
                            @endcan
                        </td>
                        <td>
                            @can('Редактировать пользователя')
                                <a class="btn btn-sm btn-outline-info" href="{{ route('users.edit', $user->id) }}">Редактировать</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
