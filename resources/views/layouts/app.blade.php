<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <title>Livewire</title>
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="flex justify-center">
    <div class="flex w-full justify-center">
        <a href="/">Home</a>
        <a href="/login">Login</a>
    </div>
    @yield('content')
    <div class="w-10/12 my-10 flex">
        {{-- <div class="w-5/12 rounded border p-2">
            <livewire:tickets />
        </div>
        <div class="w-7/12 mx-2 rounded border p-2">
            <livewire:comments />
        </div> --}}
    </div>
    
</body>
</html>
