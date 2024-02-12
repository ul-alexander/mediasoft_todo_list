@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Чек лист: {{$checkList->name}}</h5>
            @can('Добавить задачу')
            <a class="btn btn-sm btn-outline-primary d-inline-block"
               href="{{ route('add.job', $checkList->id) }}">Добавить задачу</a>
            @endcan
        </div>
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
            <ul class="list-group list-group-flush">
                @isset($checkList->showListJobs)
                    @foreach($checkList->showListJobs as $job)
                        <li class="list-group-item @if($job->active) text-secondary @else text-success @endif ">
                            @if($job->active)
                                {{$job->name}}
                            @else
                                <del>{{$job->name}}</del>
                            @endif
                        </li>
                        <hr>
                        @can('Сменить статус задачи')
                        @if($job->active)
                            <form class="mt-1" method="POST"
                                  action="{{ route('status.job', $job->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="0" name="status">
                                <button type="submit" class="btn btn-sm btn-outline-success">Завершить задачу
                                </button>
                            </form>
                        @else
                            <form class="mt-1" method="POST"
                                  action="{{ route('status.job', $job->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="1" name="status">
                                <button type="submit" class="btn btn-sm btn-outline-success">Возобновить задачу
                                </button>
                            </form>
                        @endif
                        @endcan
                        @can('Удалить задачу')
                            <form class="mt-1 d-inline-block" method="POST"
                                  action="{{ route('destroy.job', $job->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Удалить задачу</button>
                            </form>
                        @endcan
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
@endsection
