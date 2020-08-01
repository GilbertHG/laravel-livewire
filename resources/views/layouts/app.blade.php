<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <title>Livewire</title>
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="flex-warp justify-center">
    {{-- <div class="flex w-full justify-center"> --}}
        <div class="flex w-full justify-left px-4 bg-purple-900 text-white">
            <a class="mx-3 py-4" href="/">Home</a>
            <a class="mx-3 py-4" href="/login">Login</a>
        </div>
    {{-- </div> --}}
    <div class="my-10 flex justify-center">
        @yield('content')
    </div>
</body>
</html>
