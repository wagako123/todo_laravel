@extends ('layouts.app')

@section('content')
    @include('journalForm', ['journal'=>$journal])

@endsection