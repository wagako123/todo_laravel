@extends('layouts.app')

@section('title', "welcome to your journal")


@section('content')

<button><a href="{{route('journal.create') }}">New entry</a></button>

    @if(count($entries))   
        @foreach($entries as $entry)
        <div>
            <h1><a href="{{route('journal.show', ['journal' => $entry->id]) }}">{{$entry->title}}</a></h1>

            <p>{{$entry->description}}</p>
        </div>
        @endforeach
        @else
        <div>
            <p>please make a joural entry to view your entries here</p>
        </div>
    @endif

    <button><a href="{{route('tasks.index') }}">Tasks</a></button>

    <!-- nav buttons -->
    @if($entries->count())
    <nav>
        {{$entries->links()}}
    </nav>
    @endif
@endsection
