@extends ('layouts.app')

@section('title', isset($task) ?'Edit Task' : 'Add Task')

@section('content')
    <form method="post" action="{{isset($task) ? route('tasks.update', ['task'=>$task->id]): route ('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">
                Title
                <input text="text" name='title' id="title" value="{{$task->title ?? old('title')}}"/>
            </label>
            @error('title')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="description">
                description
            </label>
            <textarea name="description" id="description">{{$task->description ?? old('description')}}</textarea>
            @error('description')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="long_description">
                long_description
            </label>
            <textarea name="long_description" id="long_description">{{$task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                {{$message}}
            @enderror
        </div>
        <button type="submit">
        @isset($task)
            Update entry
            @else
            Add an Entry
        @endisset
        </button>
    </form>

@endsection