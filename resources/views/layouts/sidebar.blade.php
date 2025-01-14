<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="flex w-full">

    <div class="fixed w-1/6 h-screen p-4 space-y-6 text-white bg-gray-800">
        <!-- Sidebar Container -->
        <div class="w-full h-full px-1 py-4 space-y-6 text-white bg-gray-800 shadow-lg ">
            <!-- Sidebar Header -->
            <div class="px-4 py-6 text-left">

                <h3 class="text-xl font-semibold">Admin Panel</h3>
                @auth
                <a href="{{ route('profile.show') }}" class="text-yellow-300 transition duration-300 hover:underline">
                    {{ auth()->user()?->name }}
                </a>
                @endauth
            </div>
            <!-- Sidebar Navigation -->
            <nav class="sidebar-nav">
                <ul class="space-y-10">
                    <li>
                        <a href="{{ url('admin/dashboard') }}"
                            class="flex items-center px-4 py-3 text-gray-300 transition duration-300 rounded-lg hover:bg-teal-600 hover:text-white @if(request()->is('admin/dashboard')) bg-teal-600 text-white @else hover:bg-teal-600 hover:text-white @endif">
                            <span class="mr-3 material-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#e8eaed">
                                    <path
                                        d="M280-280h80v-200h-80v200Zm320 0h80v-400h-80v400Zm-160 0h80v-120h-80v120Zm0-200h80v-80h-80v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
                                </svg></span>
                            Analytics
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/users') }}"
                            class="flex items-center px-4 py-3 text-gray-300 transition duration-300 rounded-lg hover:bg-teal-600 hover:text-white @if(request()->is('admin/users')) bg-teal-600 text-white @else hover:bg-teal-600 hover:text-white @endif">
                            <span class="mr-3 material-icons"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                </svg></span>
                            Manage Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/orders') }}"
                            class="flex items-center px-4 py-3 text-gray-300 transition duration-300 rounded-lg hover:bg-teal-600 hover:text-white @if(request()->is('admin/orders')) bg-teal-600 text-white @else hover:bg-teal-600 hover:text-white @endif">
                            <span class="mr-3 material-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#e8eaed">
                                    <path
                                        d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                                </svg>
                            </span>
                            Manage Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/products') }}"
                            class="flex items-center px-4 py-3 text-gray-300 transition duration-300 rounded-lg hover:bg-teal-600 hover:text-white @if(request()->is('admin/products')) bg-teal-600 text-white @else hover:bg-teal-600 hover:text-white @endif">
                            <span class="mr-3 material-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#e8eaed">
                                    <path
                                        d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z" />
                                </svg></span>
                            Manage Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/appointments') }}"
                            class="flex items-center px-4 py-3 text-gray-300 transition duration-300 rounded-lg hover:bg-teal-600 hover:text-white @if(request()->is('admin/appointments')) bg-teal-600 text-white @else hover:bg-teal-600 hover:text-white @endif">
                            <span class="mr-3 material-icons"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                    <path
                                        d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm80 240v-80h400v80H280Zm0 160v-80h280v80H280Z" />
                                </svg></span>
                            Manage Appointments
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="absolute px-2 py-6 bottom-4 left-6">
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#fcd34d">
                            <path
                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="w-5/6 h-screen ml-auto overflow-y-auto">
        @yield('content')
    </div>
</body>
</html>