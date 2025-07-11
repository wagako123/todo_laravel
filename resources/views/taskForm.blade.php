@extends ('layouts.app')

@section('title', isset($task) ?'Edit Task' : 'Add Task')

@section('content')
    <form method="post" action="{{isset($task) ? route('tasks.update', ['task'=>$task->id]): route ('tasks.store') }}" >
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="text-2xl">
            <label for="title">
                Title
                <input text="text" name='title' id="title" value="{{$task->title ?? old('title')}}"
                class="border-1 rounded-2xl"/>
            </label>
            @error('title')
                {{$message}}
            @enderror
        </div>

        <div class="text-2xl flex">
            <label for="description">
                description
            </label>
            <textarea name="description" id="description" class="border-1 rounded-2xl">
                {{$task->description ?? old('description')}}
            </textarea>
            @error('description')
                {{$message}}
            @enderror
        </div>

        <div class="text-2xl flex">
            <label for="long_description">
                long_description
            </label>
            <textarea name="long_description" id="long_description" class="border-1 rounded-2xl">
                {{$task->long_description ?? old('long_description')}}
            </textarea>
            @error('long_description')
                {{$message}}
            @enderror
        </div>
        <button type="submit" class="flex items-center px-4 text-2xl rounded-lg border-1 border-black shadow-sm">
        @isset($task)
            Update entry
            @else
            Add an Entry
        @endisset
        </button>
    </form>

@endsection