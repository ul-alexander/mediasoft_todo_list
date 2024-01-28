@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Роли
            <a class="btn btn-sm btn-outline-success ml-3" href="{{ route('roles.create') }}">Создать роль</a>
            @if (session('status'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Роль</th>
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-info" href="{{ route('roles.edit', $role->id) }}">Редактировать</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">Разрешения <a class="btn btn-sm btn-outline-success ml-3"
                                               href="{{ route('permissions.create') }}">Создать разрешение</a></div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Роль</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>
<!--                            <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger disabled">Удалить</button>
                            </form>-->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
