@extends('layouts.app');

@section('title', $entry->title)

@section('content')

    <p>
        {{$entry->description}}
    </p>
    @if($entry->long_description)
        <p>
            {{$entry->long_description}}
        </p>
    @endif
    <p>
        {{$entry->created_at}}
    </p>
    <p>
        {{$entry->updated_at}}
    </p>
@endsection 