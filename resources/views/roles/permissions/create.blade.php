@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Создать Разрешение</div>
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
            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Имя </span>
                    </div>
                    <input type="hidden" name="guard_name" value="web">
                    <input type="text" name="name" class="form-control"
                           aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-sm">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-primary">Создать</button>
            </form>
        </div>
    </div>
@endsection
