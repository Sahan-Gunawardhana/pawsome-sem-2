<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsome Pet Care - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="header">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/pawsome.png') }}" alt="Pawsome Logo" class="w-12 h-8">
                <span class="ml-2 text-xl font-semibold text-black">Pawsome Pet Care</span>
            </div>
            <div class="flex space-x-6">
                @if (Auth::check())
                <a href="{{ url('/dashboard') }}" class="link">Home</a>
                @else
                <a href="{{ url('/') }}" class="link">Home</a>
                @endif
                <a href="{{ url('/store') }}" class="link">Shop</a>
                @auth
                <a href="/appointments" class="link">Services</a>
                @endauth
                @guest

                <a href="{{ route('login') }}" class="link">Services</a>
                @endguest
                <a href="#" class="link">Wishlist</a>
                <a href="#" class="link">Cart</a>
                <a href="#" class="link">My Profile</a>
            </div>

        </nav>
    </header>


    @yield('content')

    <div class="flex justify-end p-24">
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="warning-error">
                {{ __('Logout') }}
            </button>
        </form>
        @endauth
    </div>
    <footer class="bg-gray-800 mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-white">
                <div>
                    <h3 class="font-semibold mb-2 text-lg">About Us</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="link">Our Story</a></li>
                        <li><a href="#" class="link">Our Team</a></li>
                        <li><a href="#" class="link">Sustainability</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 text-lg">FAQs</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="link">Shipping</a></li>
                        <li><a href="#" class="link">Returns</a></li>
                        <li><a href="#" class="link">Warranty</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 text-lg">Important Links</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="link">Privacy Policy</a></li>
                        <li><a href="#" class="link">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 text-lg">Technical Support</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="link">Contact Us</a></li>
                        <li><a href="#" class="link">Help Center</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-400 mt-8">
            <p>&copy; {{ date('Y') }} Pawsome Pet Care. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>