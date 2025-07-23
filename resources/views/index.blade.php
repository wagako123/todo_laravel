@extends('layouts.app')

@section('title', "Here are your todos")


@section('content')
<div class="bg-slate-100">
    
        <button class=" py-2 text-2xl px-2 bg-white rounded-md shadow-sm outline-2">
            <a href="{{route('journal.home') }}">Journal</a>
        </button>
    @if(count($tasks))
        @foreach($tasks as $task)
        
        <div>
                <a href="{{route('tasks.show', ['task' => $task->id]) }}">{{$task->title}}</a>
            <div>
                {{$task->description}}
            </div>
        </div>

        @endforeach
    @else
    <div>There are no tasks</div>
    @endif 
        <div class="flex">
            <button class=" py-2 text-4xl px-2 bg-white rounded-md shadow-sm outline-2 text-sky-500 right-0">
            <a href="{{route('tasks.create') }}">+</a>
            </button>
        </div>
        
    
    </div>
    @if($tasks->count())
    <nav class=""> 
        {{$tasks->links()}}
    </nav>
    @endif
    
</div>

@endsection
