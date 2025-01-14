<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="flex flex-col items-center min-h-screen bg-gray-100">
    <div class="mb-6 text-center">
        <a href="{{ url('/home') }}"><img src="{{ asset('images/pawsome.png') }}" alt="" class="mx-auto max-w-s max-h-28"></a>
    </div>
    <div class="mb-6 text-center">
        <p class="text-4xl font-bold">
            Admin Dashboard
        </p>
    </div>
    @if(!Request::is('home'))
    <div class="p-5 nav-links">
        <a class="p-2 text-xl link" href="{{ url('admin/manageU') }}">Users</a>
        <a class="p-2 text-xl link" href="{{ url('admin/manageO') }}">Orders</a>
        <a class="p-2 text-xl link" href="{{ url('admin/manageP') }}">Products</a>
        <a class="p-2 text-xl link" href="{{ url('admin/manageA') }}">Appointments</a>
    </div>
    @endif
    @yield('content')

   
</body>

</html>