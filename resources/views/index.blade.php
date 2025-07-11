@extends('layouts.app')

@section('title', "Here are your todos")


@section('content')



<button class=" flex flex-col items-center px-4 text-2xl rounded-lg border-1 border-black shadow-sm">
    <a ahref="{{route('tasks.create') }}">New entry</a>
</button>
    @if(count($tasks))
        @foreach($tasks as $task)
        
        <div class="border-b-1 border-gray-300 shadow-sm shadow-white bg-slate-200 px-4 py-4 rounded-md">
                <a href="{{route('tasks.show', ['task' => $task->id]) }}"
                 class="text-2xl text-sky-700">
                    {{$task->title}}</a>
            <div class="text-gray-800">
                {{$task->description}}
            </div>
        </div>
        @endforeach
    @else
    <div>There are no tasks</div>
    @endif

    <button class=" flex flex-col items-center px-4 text-2xl rounded-lg border-1 border-black shadow-sm">
    <a href="{{route('journal.home') }}">Journal</a>
</button>

    @if($tasks->count())
    <nav>
        {{$tasks->links()}}
    </nav>
    @endif
@endsection
