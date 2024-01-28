@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Создать Роль</div>
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
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Имя </span>
                    </div>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-sm">
                </div>
                <p>Разрешения:</p>
                @foreach($permissions as $permission)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               @if($role->hasPermissionTo($permission->name)) checked @endif
                               name="permissions[]" type="checkbox"
                               id="inlineCheckbox{{$permission->id}}"
                               value="{{$permission->id}}">
                        <label class="form-check-label"
                               for="inlineCheckbox{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                @endforeach
                <hr>
                <button type="submit" class="btn btn-sm btn-outline-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
