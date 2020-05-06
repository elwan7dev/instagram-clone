<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- custom styles --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
   
</head>
<body>
    @include('inc.navbar')

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>