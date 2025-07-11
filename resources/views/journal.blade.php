@extends('layouts.app')

@section('title', "welcome to your journal")


@section('content')



<button class="flex flex-col items-center px-4 text-2xl rounded-lg border-1 border-black shadow-sm">
    <a href="{{route('journal.create') }}">New entry</a>
</button>

    @if(count($entries))   
        @foreach($entries as $entry)
        <div class="border-b-1 border-gray-300 shadow-sm shadow-white bg-slate-200 px-4 py-4 rounded-md">
            <h1 class="text-2xl text-sky-700">
                <a href="{{route('journal.show', ['journal' => $entry->id]) }}">
                 {{$entry->title}}
                </a>
            </h1>

            <p class="text-gray-800">
                {{$entry->description}}
            </p>
        </div>
        @endforeach
        @else
        <div>
            <p>please make a joural entry to view your entries here</p>
        </div>
    @endif

    <button class="flex flex-col items-center px-4 text-2xl rounded-lg border-1 border-black shadow-sm">
    <a href="{{route('tasks.index') }}">Tasks</a>
</button>

    

    <!-- nav buttons -->
    @if($entries->count())
    <nav>
        {{$entries->links()}}
    </nav>
    @endif
@endsection
