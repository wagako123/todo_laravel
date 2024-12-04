@extends('layouts.app');

@section('title', "Here are your todos")


@section('content')
    @if(count($tasks))
        @foreach($tasks as $task)
        <div>
                <a href="{{route('tasks.show', ['id' => $task->id]) }}">{{$task->title}}</a>
            <div>
                {{$task->description}}
            </div>
        </div>
        @endforeach
    @else
    <div>There are no tasks</div>
    @endif
@endsection
