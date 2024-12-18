<!DOCTYPE html>
<html>

<head>
    <title>My lara app</title>
</head>

<body>
    @if(session()->has('success'))
        <div>{{session('success')}}</div>
    @endif
    <h1>@yield('title')</h1>
    <div>@yield('content')</div>
</body>


</html>