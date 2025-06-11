@extends('layouts.app')

@section('title', $journal->title)

@section('content')

    <p>
        {{$journal->description}}
    </p>
    @if($journal->long_description)
        <p>
            {{$journal->long_description}}
        </p>
    @endif
    <p>
        {{$journal->created_at}}
    </p>
    <p>
        {{$journal->updated_at}}
    </p>

    <div>
        <button href="{{ route('journal.edit', [ 'journal' => $journal ->id] )}}">Edit</button>
        <form action="{{ route('journal.destroy', ['journal' => $journal->id] )}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
        </form>
        
    </div>
@endsection 