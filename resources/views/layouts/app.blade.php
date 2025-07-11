<!DOCTYPE html>
<html>

<head>
    <title>My lara app</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="bg-slate-100">
    @if(session()->has('success'))
        <div>{{session('success')}}</div>
    @endif
    <div class="flex mt-0 h-32 bg-sky-800 mb-2">
        <div class="mt-4">
            <h1 class="text-bold text-4xl p-4">@yield('title')</h1>
        </div>
    </div>
    
    <div class="p-4 ">
        @yield('content')
    </div>
</body>


</html>