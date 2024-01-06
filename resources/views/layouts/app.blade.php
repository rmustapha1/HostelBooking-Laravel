<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuellHub</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">





    <!-- Other CSS and JavaScript imports as needed -->

</head>

<body class="bg-white">
    <header class="bg-white fixed inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5 logo items-center justify-center">
                    <span class="sr-only">QuellHub</span>
                    <img class="h-14 w-auto" src="{{ asset('images/quellhub_logo.png') }}" alt="logo">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 open-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-700">Home</a>
                <a href="{{ route('about') }}" class="text-sm font-semibold leading-6 text-gray-700">About</a>
                <a href="{{ route('hostels.index') }}" class="text-sm font-semibold leading-6 text-gray-700">Find Rooms</a>
                <a href="{{ route('contact') }}" class="text-sm font-semibold leading-6 text-gray-700">Contact</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @if(auth()->check())
                <div class="relative inline-block text-left">
                    <span class="rounded-md shadow-sm">
                        <button type="button"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50"
                            id="userDropdown" data-open="false">
                            Welcome, {{ auth()->user()->fname }} <span aria-hidden="true">&darr;</span>
                        </button>
                    </span>

                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" id="dropdownMenu"
                        style="display: none;">
                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                            aria-labelledby="options-menu">
                            <a href="{{route('user.show', ['user_id' => auth()->user()->id])}}"
                                class="block px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100"
                                role="menuitem">My Profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100"
                                role="menuitem">Change Password</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100 text-left"
                                    role="menuitem">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-700">Log in <span
                        aria-hidden="true">&rarr;</span></a>
                @endif

            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden mobile-menu" role="dialog" aria-modal="true" style="display: none;">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-700/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5 logo">
                        <span class="sr-only">QuellHub</span>
                        <img class="h-8 w-auto" src="{{ asset('images/quellhub_logo.png') }}" alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 close-menu-button">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="{{ route('home') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Home</a>
                            <a href="{{ route('about') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">About</a>
                            <a href="{{ route('hostels.index') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Find Rooms</a>
                            <a href="{{ route('contact') }}"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Contact</a>
                        </div>
                        <div class="py-6">
                            @if(auth()->check())
                            <div class="relative inline-block text-left">
                                <span class="rounded-md shadow-sm">
                                    <button type="button"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50"
                                        id="userDropdown" data-open="false">
                                        Welcome, {{ auth()->user()->fname }}
                                    </button>
                                </span>

                                <div class="origin-top-right absolute left-0 mt-2 w-48 rounded-md shadow-lg"
                                    id="dropdownMenu" style="display: block;">
                                    <div class="py-1 rounded-md bg-white shadow-xs" role="menu"
                                        aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="{{route('user.show', ['user_id' => auth()->user()->id])}}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">My Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Change Password</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left"
                                                role="menuitem">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                            <a href="{{ route('login') }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Log
                                in</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="content-wrap">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer mx-auto pt-8 pb-5 min-h-50 bg-blue-100">
        <div class="container">

            <div class="text-center font-black text-gray-950 my-3 text-sm">
                <p class="avl awc awo axr">© 2023 QuellHub, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>




    <!-- Scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const openMenuButton = document.querySelector('.open-menu-button');
        const closeMenuButton = document.querySelector('.close-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        // Event listeners
        openMenuButton.addEventListener('click', function() {
            mobileMenu.style.display = 'block';
        });

        closeMenuButton.addEventListener('click', function() {
            mobileMenu.style.display = 'none';
        });
    });
    </script>

    <!-- User DropDown Scripts -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const userDropdownButton = document.getElementById("userDropdown");
        const dropdownMenu = document.getElementById("dropdownMenu");

        userDropdownButton.addEventListener("click", function() {
            const isOpen = userDropdownButton.getAttribute("data-open") === "true";
            if (isOpen) {
                // Close the dropdown
                dropdownMenu.style.display = "none";
                userDropdownButton.setAttribute("data-open", "false");
            } else {
                // Open the dropdown
                dropdownMenu.style.display = "block";
                userDropdownButton.setAttribute("data-open", "true");
            }
        });
    });
    </script>

    <!-- User DropDown Scripts -->



    <!-- Include Bootstrap JavaScript and jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>