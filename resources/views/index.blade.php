@extends('layouts.app');

@section('title', "Here are your todos")


@section('content')

<button><a href="{{route('journal.home') }}">Journal</a></button>
    @if(count($tasks))
        @foreach($tasks as $task)
        <div>
            
        </div>
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
