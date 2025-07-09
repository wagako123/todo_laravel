<!DOCTYPE html>
<html>

<head>
    <title>My lara app</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="container mx-auto mt-10 ">
    @if(session()->has('success'))
        <div>{{session('success')}}</div>
    @endif
    <h1 class="text-bold text-2xl">@yield('title')</h1>
    <div>@yield('content')</div>
</body>


</html>