@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Чек Листы
            @can('Создать чек лист')
            <a class="btn btn-sm btn-outline-success ml-3" href="{{ route('lists.create') }}">Создать чек лист</a>
            @endcan
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @isset($lists)
                @foreach($lists as $list)
                    <div class="card ml-3 mt-1 d-inline-block" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$list->name}}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            @isset($list['jobs'])
                                @foreach($list['jobs'] as $job)
                                    <li class="list-group-item @if($job->active) text-secondary @else text-success @endif ">
                                        @if($job->active)
                                            {{$job->name}}
                                        @else
                                            <del>{{$job->name}}</del>
                                        @endif
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                        <div class="card-body">
                            @can('Добавить задачу')
                            <a class="btn btn-sm btn-outline-primary d-inline-block"
                               href="{{ route('add.job', $list->id) }}">Добавить задачу</a>
                            @endcan
                            <a class="btn btn-sm btn-outline-info d-inline-block"
                               href="{{ route('lists.edit', $list->id) }}">Редактировать</a>
                                @can('Удалить чек лист')
                            <form class="mt-1" method="POST" action="{{ route('lists.destroy', $list->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Удалить чек лист</button>
                            </form>
                                @endcan
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
