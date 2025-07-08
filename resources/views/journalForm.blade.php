@extends ('layouts.app')

@section('title', isset($journal) ? 'Edit entry' : 'Create entry')

@section('content')
    <form method="post" action="{{isset($journal) ? route('journal.update', ['journal'=>$journal->id]): route ('journal.store') }}">
        @csrf
        @isset($journal)
            @method('PUT')
        @endisset
        <div>
            <label for="title">
                Title
                <input text="text" name='title' id="title" value="{{$journal->title ?? old('title')}}"/>
            </label>
            @error('title')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="description">
                description
            </label>
            <textarea name="description" id="description">{{$journal->description ?? old('description')}}</textarea>
            @error('description')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="long_description">
                long_description
            </label>
            <textarea name="long_description" id="long_description">{{$journal->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                {{$message}}
            @enderror
        </div>
        <button type="submit">
        @isset($journal)
            Update entry
            @else
            Add an Entry
        @endisset
        </button>
    </form>

@endsection