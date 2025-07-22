<!DOCTYPE html>
<html>
    <script src="https://cdn.tailwindcss.com"></script>

<head>
    <title>My lara app</title>
</head>

<body>
    @if(session()->has('success'))
        <div>{{session('success')}}</div>
    @endif
    <div class="align-middle">
         <h1 class="py-12 bg-sky-500 text-white text-4xl text-center">@yield('title')</h1>
    </div>
   
    <div class="p-4">@yield('content')</div>
</body>


</html>