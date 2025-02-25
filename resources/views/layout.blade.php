<!DOCTYPE html>
<html class="h-full bg-white" lang="en">
<head class="h-full">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
     @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    <div  class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <h1 class="text-center font-bold text-lg">@yield('title')</h1>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm ">
            @include('components.content')
        </div>
    </div>
</body>
</html>