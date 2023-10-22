<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Hostels Booking</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    <!-- Include Bootstrap JavaScript and jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Other CSS and JavaScript imports as needed -->

</head>

<body class="bg-white">
    <header class="bg-white fixed inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5 logo items-center justify-center">
                    <span class="sr-only">Private Hostels Booking</span>
                    <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" width="54" height="54" alt="">
                    <p>Private<span>Hostels</span></p>

                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 open-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-700">Home</a>
                <a href="{{ route('about') }}" class="text-sm font-semibold leading-6 text-gray-700">About</a>
                <a href="{{ route('hostels.index') }}" class="text-sm font-semibold leading-6 text-gray-700">Hostels</a>
                <a href="{{ route('contact') }}" class="text-sm font-semibold leading-6 text-gray-700">Contact</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @if(auth()->check())
                <div class="relative inline-block text-left">
                    <span class="rounded-md shadow-sm">
                        <button type="button" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50" id="userDropdown" data-open="false">
                            Welcome, {{ auth()->user()->fname }} <span aria-hidden="true">&darr;</span>
                        </button>
                    </span>

                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" id="dropdownMenu" style="display: none;">
                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="#" class="block px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100" role="menuitem">My Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100" role="menuitem">Change Password</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100 text-left" role="menuitem">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-700">Log in <span aria-hidden="true">&rarr;</span></a>
                @endif

            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden mobile-menu" role="dialog" aria-modal="true" style="display: none;">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-700/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5 logo">
                        <span class="sr-only">Private Hostels Booking</span>
                        <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="">
                        <p>Private<span>Hostels</span></p>
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 close-menu-button">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="{{ route('home') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Home</a>
                            <a href="{{ route('about') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">About</a>
                            <a href="{{ route('hostels.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Hostels</a>
                            <a href="{{ route('contact') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Contact</a>
                        </div>
                        <div class="py-6">
                            @if(auth()->check())
                            <div class="relative inline-block text-left">
                                <span class="rounded-md shadow-sm">
                                    <button type="button" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50" id="userDropdown" data-open="false">
                                        Welcome, {{ auth()->user()->fname }}
                                    </button>
                                </span>

                                <div class="origin-top-right absolute left-0 mt-2 w-48 rounded-md shadow-lg" id="dropdownMenu" style="display: block;">
                                    <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">My Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Change Password</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left" role="menuitem">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                            <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Log
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
    <footer class="footer mx-auto">
        <div class="container">
            <div class="icons">
                <!-- Social media links and icons -->
                <ul class="flex flex-row justify-center items-center">
                    <li class="mr-6">
                        <a href="#" class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                            </svg>
                        </a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-gray-500 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-gray-500 hover:text-pink-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                        </a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-gray-500 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="text-center text-gray-700 my-3">
                <p class="avl awc awo axr">© 2023 Private Hostels Booking, Inc. All rights reserved.</p>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>