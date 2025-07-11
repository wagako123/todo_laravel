@extends ('layouts.app')

@section('title', isset($journal) ? 'Edit entry' : 'Create entry')

@section('content')
    <form method="post" action="{{isset($journal) ? route('journal.update', ['journal'=>$journal->id]): route ('journal.store') }}">
        @csrf
        @isset($journal)
            @method('PUT')
        @endisset
        <div class="text-2xl">
            <label for="title">
                Title
                <input text="text" name='title' id="title" value="{{$journal->title ?? old('title')}}"
                class="border-1 rounded-2xl"/>
            </label>
            @error('title')
                {{$message}}
            @enderror
        </div>

        <div class="text-2xl">
            <label for="description">
                description
            </label>
            <textarea name="description" id="description"
            class="border-1 rounded-2xl">{{$journal->description ?? old('description')}}</textarea>
            @error('description')
                {{$message}}
            @enderror
        </div>

        <div class="text-2xl">
            <label for="long_description">
                long_description
            </label>
            <textarea name="long_description" id="long_description"
             class="border-1 rounded-2xl">{{$journal->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                {{$message}}
            @enderror
        </div>
        <button type="submit" class="flex flex-col items-center px-4 text-2xl rounded-lg border-1 border-black shadow-sm">
        @isset($journal)
            Update entry
            @else
            Add an Entry
        @endisset
        </button>
    </form>

@endsection