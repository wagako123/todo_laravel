@extends ('layouts.app')

@section('content')
    @include('taskForm', ['task' =>$task])
@endsection

