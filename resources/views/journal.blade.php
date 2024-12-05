@extends('layouts.app')

@section('title', "welcome to your journal")


@section('content')
    @if(count($entries))   
        @foreach($entries as $entry)
        <div>
            <h1><a href="{{route('journal.show', ['id' => $entry->id]) }}">{{$entry->title}}</a></h1>

            <p>{{$entry->description}}</p>
        </div>
        @endforeach
        @else
        <div>
            <p>please make a joural entry to view your entries here</p>
        </div>
    @endif
@endsection
