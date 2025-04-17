@extends ('layouts.app')

@section('title', 'Add Entry')

@section('content')
    <form method="post" action="{{route ('journal.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
                <input text="text" name='title' id="title" value="{{old('title')}}"/>
            </label>
            @error('title')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="description">
                description
            </label>
            <textarea name="description" id="description" >{{old('description')}}</textarea>
            @error('description')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="long_description">
                long_description
            </label>
            <textarea name="long_description" id="long_description" >{{old('long_description')}}</textarea>
            @error('long_description')
                {{$message}}
            @enderror
        </div>
        <button type="submit">Add an Entry</button>
    </form>

@endsection