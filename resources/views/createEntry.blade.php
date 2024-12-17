@extends ('layouts.app')

@section('title', 'Add Entry')

@section('content')
    <form method="post" action="{{route ('journal.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
                <input text="text" name='title' id="title"/>
            </label>
        </div>

        <div>
            <label for="description">
                description
            </label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <label for="long_description">
                long_description
            </label>
            <textarea name="long_description" id="long_description"></textarea>
        </div>
        <button type="submit">Add an Entry</button>
    </form>

@endsection