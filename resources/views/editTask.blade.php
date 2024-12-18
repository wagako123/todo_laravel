@extends ('layouts.app')

@section ('title', 'Edit task')

@section('content')
    <form method="post" action="{{route ('tasks.update', ['id'=> $task ->id]) }}">
        @csrf
        @method('PUT')
            <div>
                <label for="Title">
                    Title
                </label>
                <input text="text" name="title" id="title" value="{{$task->title}}"/>
                @error('title')
                    <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="description">
                    Description
                </label>
                <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
                @error('description')
                    <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="long_description">
                    Long Description
                </label>
                <textarea name="long_description" id="long_description" rows="5">{{$task->long_description}}</textarea>
                @error('long_description')
                    <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <button type="submit">Edit Task</button>
            </div>
    </form>
@endsection

