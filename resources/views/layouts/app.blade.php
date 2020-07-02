<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <livewire:styles/>
    <livewire:scripts/>
    <!--agregamos el js donde está el enlace a turbolink-->
    <script src="{{asset('js/app.js')}}"></script>

</head>


<body class="flex flex-wrap justify-center">
<div class="flex w-full justify-left px-4 bg-purple-900 text-white">
    <a class="mx-3 py-4" href="/">Home</a>
    <a class="mx-3 py-4" href="/login">Login</a>
</div>

<div class="my-10 flex justify-center" >
    @yield('content')
</div>



</body>
</html>




