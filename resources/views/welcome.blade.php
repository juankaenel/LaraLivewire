<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<livewire:styles/>
<livewire:scripts/>

<body class="flex justify-center">
<div class="w-10/12 my-10 flex">
    <div class="w-5/12 rounded border p-2">
        <livewire:tickets/>
    </div>
    <div class="w-7/12 mx-2 rounded border p-2">
        <livewire:comments/>
    </div>

</div>
</body>
</html>
