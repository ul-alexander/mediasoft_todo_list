@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Создать Задачу</div>
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
            <form method="POST" action="{{ route('store.job') }}">
                @csrf
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Задача </span>
                    </div>
                    <input type="text" name="name" class="form-control"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-sm">
                </div>
                <p>Чек лист: {{$checkList->name}}</p>
                <input type="hidden" name="check_list_id" value="{{$checkList->id}}">
                <button type="submit" class="btn btn-sm btn-outline-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection
