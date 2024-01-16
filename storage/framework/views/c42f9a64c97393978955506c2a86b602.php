<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuellHub</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('images/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('images/site.webmanifest')); ?>">
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
                    <img class="h-14 w-auto" src="<?php echo e(asset('images/quellhub_logo.png')); ?>" alt="logo">
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
                <a href="<?php echo e(route('home')); ?>" class="text-sm font-semibold leading-6 text-gray-700">Home</a>
                <a href="<?php echo e(route('about')); ?>" class="text-sm font-semibold leading-6 text-gray-700">About</a>
                <a href="<?php echo e(route('hostels.index')); ?>" class="text-sm font-semibold leading-6 text-gray-700">Find
                    Rooms</a>
                <a href="<?php echo e(route('contact')); ?>" class="text-sm font-semibold leading-6 text-gray-700">Contact</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <?php if(auth()->check()): ?>
                <div class="relative inline-block text-left">
                    <span class="rounded-md shadow-sm">
                        <button type="button"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50"
                            id="userDropdown" data-open="false">
                            Welcome, <?php echo e(auth()->user()->fname); ?> <span aria-hidden="true">&darr;</span>
                        </button>
                    </span>

                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" id="dropdownMenu"
                        style="display: none;">
                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                            aria-labelledby="options-menu">
                            <a href="<?php echo e(route('user.show', ['user_id' => auth()->user()->id])); ?>"
                                class="block px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100"
                                role="menuitem">My Profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100"
                                role="menuitem">Change Password</a>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-100 text-left"
                                    role="menuitem">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="text-sm font-semibold leading-6 text-gray-700">Log in <span
                        aria-hidden="true">&rarr;</span></a>
                <?php endif; ?>

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
                        <img class="h-8 w-auto" src="<?php echo e(asset('images/quellhub_logo.png')); ?>" alt="">
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
                            <a href="<?php echo e(route('home')); ?>"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Home</a>
                            <a href="<?php echo e(route('about')); ?>"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">About</a>
                            <a href="<?php echo e(route('hostels.index')); ?>"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Find
                                Rooms</a>
                            <a href="<?php echo e(route('contact')); ?>"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Contact</a>
                        </div>
                        <div class="py-6">
                            <?php if(auth()->check()): ?>
                            <div class="relative inline-block text-left">
                                <span class="rounded-md shadow-sm">
                                    <button type="button"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50"
                                        id="userDropdown" data-open="false">
                                        Welcome, <?php echo e(auth()->user()->fname); ?>

                                    </button>
                                </span>

                                <div class="origin-top-right absolute left-0 mt-2 w-48 rounded-md shadow-lg"
                                    id="dropdownMenu" style="display: block;">
                                    <div class="py-1 rounded-md bg-white shadow-xs" role="menu"
                                        aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="<?php echo e(route('user.show', ['user_id' => auth()->user()->id])); ?>"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">My Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Change Password</a>
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left"
                                                role="menuitem">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-700 hover:bg-gray-50">Log
                                in</a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="content-wrap">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Footer -->
    <div class="bg-blue-400">
  <div class="container mx-auto px-5 pt-[40px] pb-[48px] lg:px-[60px] lg:pt-[70px]">
    <a class="inline-flex" href="#">
    <img class="h-14 w-auto rounded mt-4" src="<?php echo e(asset('images/quellhub_bg.jpg')); ?>" alt="logo">
    </a>
    <div class="mt-8 grid grid-cols-1 gap-12 lg:grid-cols-4">
      <div class="text-white">
        <p>QuellHub revolutionalizes students and individual housing accommodation problems by offering an app and a web-based system that addresses the challenges in hostel booking and management systems as well as real estate rentals challenges.</p>

        <p class="mt-4">Emphasizing efficiency, transparency, and user-centricity, </p>

        <p class="mt-4">We transform the entire housing and accommodation process </p>
        </div>
      <div class="line-height-[24px] text-white">
        <p class="font-medium">Contact Us:</p>
        <div class="mt-4">
          Head Office / Registered Office: <br />
          Tamale Technical University,<br />
          Tamale - NR,<br />
          Ghana
        </div>
        <a href="tel:00-00000000" class="mt-3 block">Tel:<span class="ml-1 text-white">0543214796</span></a
        ><a href="tel:00-00000000" class="mt-3 block">Fax:<span class="ml-1 text-white">+233-207728823</span></a>
        <a href="mailto:#" target="_blank" rel="noreferrer" class="mt-3 block">Email:<span class="ml-1 text-white">privatehostels21@gmail.com</span></a>
      </div>
      <div class="col-span-1">
        <h3 class="font-medium text-white">Supported by QuellHub</h3>
        <div class="mt-4">
        <img class="h-16 w-auto rounded" src="<?php echo e(asset('images/quellhub_icon.jpg')); ?>" alt="logo"> 
        </div>
      </div>
      <div class="col-span-1">
        <h3 class="font-medium text-white">Get the app</h3>
        <div class="mt-4 flex space-x-6 lg:flex-col lg:space-x-0 lg:space-y-4">
          <div class="flex">
            <a rel="noreferrer" target="_blank" href="https://play.google.com">
              <svg width="135" height="40" viewBox="0 0 135 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M68.137 21.7511C65.785 21.7511 63.868 23.5401 63.868 26.0041C63.868 28.4531 65.785 30.2571 68.137 30.2571C70.49 30.2571 72.407 28.4531 72.407 26.0041C72.406 23.5401 70.489 21.7511 68.137 21.7511ZM68.137 28.5831C66.848 28.5831 65.737 27.5201 65.737 26.0051C65.737 24.4741 66.849 23.4271 68.137 23.4271C69.426 23.4271 70.537 24.4741 70.537 26.0051C70.537 27.5191 69.426 28.5831 68.137 28.5831ZM58.823 21.7511C56.471 21.7511 54.554 23.5401 54.554 26.0041C54.554 28.4531 56.471 30.2571 58.823 30.2571C61.176 30.2571 63.093 28.4531 63.093 26.0041C63.093 23.5401 61.176 21.7511 58.823 21.7511ZM58.823 28.5831C57.534 28.5831 56.423 27.5201 56.423 26.0051C56.423 24.4741 57.535 23.4271 58.823 23.4271C60.112 23.4271 61.223 24.4741 61.223 26.0051C61.224 27.5191 60.112 28.5831 58.823 28.5831ZM47.745 23.0571V24.8611H52.063C51.934 25.8761 51.596 26.6171 51.08 27.1321C50.452 27.7601 49.469 28.4531 47.745 28.4531C45.087 28.4531 43.009 26.3101 43.009 23.6521C43.009 20.9941 45.087 18.8511 47.745 18.8511C49.179 18.8511 50.226 19.4151 50.999 20.1401L52.272 18.8671C51.192 17.8361 49.759 17.0471 47.745 17.0471C44.104 17.0471 41.043 20.0111 41.043 23.6521C41.043 27.2931 44.104 30.2571 47.745 30.2571C49.71 30.2571 51.193 29.6121 52.352 28.4041C53.544 27.2121 53.915 25.5361 53.915 24.1831C53.915 23.7651 53.883 23.3781 53.818 23.0561H47.745V23.0571ZM93.053 24.4581C92.699 23.5081 91.619 21.7511 89.412 21.7511C87.221 21.7511 85.4 23.4751 85.4 26.0041C85.4 28.3881 87.205 30.2571 89.621 30.2571C91.57 30.2571 92.698 29.0651 93.166 28.3721L91.716 27.4051C91.233 28.1141 90.572 28.5811 89.621 28.5811C88.671 28.5811 87.994 28.1461 87.559 27.2921L93.246 24.9401L93.053 24.4581ZM87.253 25.8761C87.205 24.2321 88.526 23.3951 89.477 23.3951C90.218 23.3951 90.846 23.7661 91.056 24.2971L87.253 25.8761ZM82.63 30.0001H84.498V17.4991H82.63V30.0001ZM79.568 22.7021H79.504C79.085 22.2021 78.279 21.7511 77.265 21.7511C75.138 21.7511 73.189 23.6201 73.189 26.0211C73.189 28.4051 75.138 30.2581 77.265 30.2581C78.28 30.2581 79.085 29.8071 79.504 29.2921H79.568V29.9041C79.568 31.5311 78.698 32.4011 77.297 32.4011C76.153 32.4011 75.444 31.5801 75.154 30.8871L73.527 31.5641C73.994 32.6911 75.234 34.0771 77.297 34.0771C79.488 34.0771 81.341 32.7881 81.341 29.6461V22.0101H79.569V22.7021H79.568ZM77.426 28.5831C76.137 28.5831 75.058 27.5031 75.058 26.0211C75.058 24.5221 76.137 23.4271 77.426 23.4271C78.698 23.4271 79.697 24.5221 79.697 26.0211C79.697 27.5031 78.698 28.5831 77.426 28.5831ZM101.807 17.4991H97.336V30.0001H99.201V25.2641H101.806C103.874 25.2641 105.908 23.7671 105.908 21.3821C105.908 18.9971 103.875 17.4991 101.807 17.4991ZM101.855 23.5241H99.201V19.2391H101.855C103.25 19.2391 104.042 20.3941 104.042 21.3821C104.042 22.3501 103.25 23.5241 101.855 23.5241ZM113.387 21.7291C112.036 21.7291 110.637 22.3241 110.058 23.6431L111.714 24.3341C112.068 23.6431 112.728 23.4171 113.419 23.4171C114.384 23.4171 115.365 23.9961 115.381 25.0251V25.1541C115.043 24.9611 114.319 24.6721 113.435 24.6721C111.65 24.6721 109.832 25.6531 109.832 27.4861C109.832 29.1591 111.296 30.2361 112.936 30.2361C114.19 30.2361 114.882 29.6731 115.316 29.0131H115.38V29.9781H117.182V25.1851C117.183 22.9671 115.525 21.7291 113.387 21.7291ZM113.161 28.5801C112.551 28.5801 111.698 28.2741 111.698 27.5181C111.698 26.5531 112.76 26.1831 113.677 26.1831C114.496 26.1831 114.883 26.3601 115.381 26.6011C115.236 27.7601 114.239 28.5801 113.161 28.5801ZM123.744 22.0021L121.605 27.4221H121.541L119.321 22.0021H117.311L120.64 29.5771L118.742 33.7911H120.688L125.819 22.0021H123.744ZM106.938 30.0001H108.803V17.4991H106.938V30.0001Z" fill="white" />
                <path d="M47.4176 10.2429C47.4176 11.0809 47.1696 11.7479 46.6726 12.2459C46.1086 12.8379 45.3726 13.1339 44.4686 13.1339C43.6026 13.1339 42.8656 12.8339 42.2606 12.2339C41.6546 11.6329 41.3516 10.8889 41.3516 10.0009C41.3516 9.11194 41.6546 8.36794 42.2606 7.76794C42.8656 7.16694 43.6026 6.86694 44.4686 6.86694C44.8986 6.86694 45.3096 6.95094 45.6996 7.11794C46.0906 7.28594 46.4036 7.50894 46.6376 7.78794L46.1106 8.31594C45.7136 7.84094 45.1666 7.60394 44.4676 7.60394C43.8356 7.60394 43.2896 7.82594 42.8286 8.26994C42.3676 8.71394 42.1376 9.29094 42.1376 9.99994C42.1376 10.7089 42.3676 11.2859 42.8286 11.7299C43.2896 12.1739 43.8356 12.3959 44.4676 12.3959C45.1376 12.3959 45.6966 12.1729 46.1436 11.7259C46.4336 11.4349 46.6016 11.0299 46.6466 10.5109H44.4676V9.78994H47.3746C47.4046 9.94694 47.4176 10.0979 47.4176 10.2429Z" fill="white" />
                <path d="M52.0277 7.737H49.2957V9.639H51.7597V10.36H49.2957V12.262H52.0277V13H48.5247V7H52.0277V7.737Z" fill="white" />
                <path d="M55.2785 13H54.5075V7.737H52.8315V7H56.9545V7.737H55.2785V13Z" fill="white" />
                <path d="M59.9375 13V7H60.7085V13H59.9375Z" fill="white" />
                <path d="M64.1277 13H63.3567V7.737H61.6807V7H65.8037V7.737H64.1277V13Z" fill="white" />
                <path d="M73.6084 12.225C73.0184 12.831 72.2854 13.134 71.4084 13.134C70.5314 13.134 69.7984 12.831 69.2094 12.225C68.6194 11.619 68.3254 10.877 68.3254 9.99999C68.3254 9.12299 68.6194 8.38099 69.2094 7.77499C69.7984 7.16899 70.5314 6.86499 71.4084 6.86499C72.2804 6.86499 73.0124 7.16999 73.6044 7.77899C74.1964 8.38799 74.4924 9.12799 74.4924 9.99999C74.4924 10.877 74.1974 11.619 73.6084 12.225ZM69.7784 11.722C70.2224 12.172 70.7654 12.396 71.4084 12.396C72.0514 12.396 72.5954 12.171 73.0384 11.722C73.4824 11.272 73.7054 10.698 73.7054 9.99999C73.7054 9.30199 73.4824 8.72799 73.0384 8.27799C72.5954 7.82799 72.0514 7.60399 71.4084 7.60399C70.7654 7.60399 70.2224 7.82899 69.7784 8.27799C69.3354 8.72799 69.1124 9.30199 69.1124 9.99999C69.1124 10.698 69.3354 11.272 69.7784 11.722Z" fill="white" />
                <path d="M75.5745 13V7H76.5125L79.4285 11.667H79.4615L79.4285 10.511V7H80.1995V13H79.3945L76.3435 8.106H76.3105L76.3435 9.262V13H75.5745Z" fill="white" />
                <path d="M47.4176 10.2429C47.4176 11.0809 47.1696 11.7479 46.6726 12.2459C46.1086 12.8379 45.3726 13.1339 44.4686 13.1339C43.6026 13.1339 42.8656 12.8339 42.2606 12.2339C41.6546 11.6329 41.3516 10.8889 41.3516 10.0009C41.3516 9.11194 41.6546 8.36794 42.2606 7.76794C42.8656 7.16694 43.6026 6.86694 44.4686 6.86694C44.8986 6.86694 45.3096 6.95094 45.6996 7.11794C46.0906 7.28594 46.4036 7.50894 46.6376 7.78794L46.1106 8.31594C45.7136 7.84094 45.1666 7.60394 44.4676 7.60394C43.8356 7.60394 43.2896 7.82594 42.8286 8.26994C42.3676 8.71394 42.1376 9.29094 42.1376 9.99994C42.1376 10.7089 42.3676 11.2859 42.8286 11.7299C43.2896 12.1739 43.8356 12.3959 44.4676 12.3959C45.1376 12.3959 45.6966 12.1729 46.1436 11.7259C46.4336 11.4349 46.6016 11.0299 46.6466 10.5109H44.4676V9.78994H47.3746C47.4046 9.94694 47.4176 10.0979 47.4176 10.2429Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path d="M52.0277 7.737H49.2957V9.639H51.7597V10.36H49.2957V12.262H52.0277V13H48.5247V7H52.0277V7.737Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path d="M55.2785 13H54.5075V7.737H52.8315V7H56.9545V7.737H55.2785V13Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path d="M59.9375 13V7H60.7085V13H59.9375Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path d="M64.1277 13H63.3567V7.737H61.6807V7H65.8037V7.737H64.1277V13Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path d="M73.6084 12.225C73.0184 12.831 72.2854 13.134 71.4084 13.134C70.5314 13.134 69.7984 12.831 69.2094 12.225C68.6194 11.619 68.3254 10.877 68.3254 9.99999C68.3254 9.12299 68.6194 8.38099 69.2094 7.77499C69.7984 7.16899 70.5314 6.86499 71.4084 6.86499C72.2804 6.86499 73.0124 7.16999 73.6044 7.77899C74.1964 8.38799 74.4924 9.12799 74.4924 9.99999C74.4924 10.877 74.1974 11.619 73.6084 12.225ZM69.7784 11.722C70.2224 12.172 70.7654 12.396 71.4084 12.396C72.0514 12.396 72.5954 12.171 73.0384 11.722C73.4824 11.272 73.7054 10.698 73.7054 9.99999C73.7054 9.30199 73.4824 8.72799 73.0384 8.27799C72.5954 7.82799 72.0514 7.60399 71.4084 7.60399C70.7654 7.60399 70.2224 7.82899 69.7784 8.27799C69.3354 8.72799 69.1124 9.30199 69.1124 9.99999C69.1124 10.698 69.3354 11.272 69.7784 11.722Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path d="M75.5745 13V7H76.5125L79.4285 11.667H79.4615L79.4285 10.511V7H80.1995V13H79.3945L76.3435 8.106H76.3105L76.3435 9.262V13H75.5745Z" stroke="white" stroke-width="0.2" stroke-miterlimit="10" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.156 7.96642C10.0379 8.23392 9.97266 8.56168 9.97266 8.94294V31.0589C9.97266 31.441 10.038 31.7688 10.1562 32.0362L22.1902 20.0006L10.156 7.96642ZM10.8512 32.7554C11.2973 32.9463 11.8792 32.8858 12.5137 32.5259L26.6708 24.4812L22.8973 20.7077L10.8512 32.7554ZM27.5732 23.9694L32.0147 21.4459C33.4116 20.6509 33.4116 19.3519 32.0147 18.5579L27.5712 16.0331L23.6043 20.0005L27.5732 23.9694ZM26.6694 15.5206L12.5137 7.47694C11.8791 7.11637 11.2972 7.0562 10.8512 7.24734L22.8972 19.2934L26.6694 15.5206Z" fill="white" />
                <rect x="0.5" y="0.5" width="134" height="39" rx="4.5" stroke="white" /></svg
            ></a>
          </div>
          <div class="flex">
            <a rel="noreferrer" target="_blank" href="https://apple.com/my">
              <svg width="135" height="40" viewBox="0 0 135 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M81.5267 19.2009V21.4919H80.0906V22.9943H81.5267V28.0993C81.5267 29.8425 82.3152 30.5397 84.2991 30.5397C84.6478 30.5397 84.9798 30.4982 85.2703 30.4484V28.9626C85.0213 28.9875 84.8636 29.0041 84.5896 29.0041C83.7015 29.0041 83.3113 28.589 83.3113 27.6428V22.9943H85.2703V21.4919H83.3113V19.2009H81.5267Z" fill="white" />
                <path d="M90.3242 30.6642C92.9638 30.6642 94.5825 28.8962 94.5825 25.966C94.5825 23.0524 92.9555 21.2761 90.3242 21.2761C87.6845 21.2761 86.0576 23.0524 86.0576 25.966C86.0576 28.8962 87.6762 30.6642 90.3242 30.6642ZM90.3242 29.0788C88.7719 29.0788 87.9003 27.9416 87.9003 25.966C87.9003 24.007 88.7719 22.8615 90.3242 22.8615C91.8681 22.8615 92.748 24.007 92.748 25.966C92.748 27.9333 91.8681 29.0788 90.3242 29.0788Z" fill="white" />
                <path d="M95.9674 30.4899H97.752V25.1525C97.752 23.8825 98.7066 23.0275 100.06 23.0275C100.375 23.0275 100.906 23.0856 101.056 23.1354V21.3757C100.865 21.3259 100.524 21.301 100.259 21.301C99.0802 21.301 98.0758 21.9484 97.8184 22.8366H97.6856V21.4504H95.9674V30.4899Z" fill="white" />
                <path d="M105.487 22.7951C106.807 22.7951 107.67 23.7165 107.712 25.1359H103.146C103.246 23.7248 104.167 22.7951 105.487 22.7951ZM107.703 28.0495C107.371 28.7551 106.633 29.1452 105.553 29.1452C104.126 29.1452 103.204 28.1408 103.146 26.5554V26.4557H109.53V25.8332C109.53 22.9943 108.01 21.2761 105.495 21.2761C102.947 21.2761 101.328 23.1105 101.328 25.9992C101.328 28.8879 102.914 30.6642 105.504 30.6642C107.571 30.6642 109.015 29.6681 109.422 28.0495H107.703Z" fill="white" />
                <path d="M69.8231 27.1518C69.9607 29.3715 71.8105 30.791 74.5636 30.791C77.506 30.791 79.3472 29.3026 79.3472 26.9281C79.3472 25.0611 78.2975 24.0287 75.7509 23.435L74.3829 23.0995C72.7655 22.7209 72.1116 22.2133 72.1116 21.3272C72.1116 20.2087 73.1268 19.4774 74.6497 19.4774C76.095 19.4774 77.093 20.1915 77.2737 21.3358H79.1493C79.0374 19.2451 77.1963 17.7739 74.6755 17.7739C71.9654 17.7739 70.1586 19.2451 70.1586 21.4562C70.1586 23.2802 71.1824 24.3642 73.4279 24.889L75.0282 25.2762C76.6715 25.6634 77.3942 26.2312 77.3942 27.1776C77.3942 28.2788 76.2585 29.0789 74.7099 29.0789C73.0494 29.0789 71.8965 28.3304 71.7331 27.1518H69.8231Z" fill="white" />
                <path d="M51.3357 21.301C50.1072 21.301 49.0447 21.9152 48.4969 22.9445H48.3641V21.4504H46.6458V33.4948H48.4305V29.1203H48.5716C49.0447 30.0749 50.0657 30.6393 51.3523 30.6393C53.6351 30.6393 55.0877 28.8381 55.0877 25.966C55.0877 23.0939 53.6351 21.301 51.3357 21.301ZM50.8294 29.0373C49.3353 29.0373 48.3973 27.8586 48.3973 25.9743C48.3973 24.0817 49.3353 22.903 50.8377 22.903C52.3484 22.903 53.2532 24.0568 53.2532 25.966C53.2532 27.8835 52.3484 29.0373 50.8294 29.0373Z" fill="white" />
                <path d="M61.3325 21.301C60.104 21.301 59.0415 21.9152 58.4937 22.9445H58.3609V21.4504H56.6426V33.4948H58.4273V29.1203H58.5684C59.0415 30.0749 60.0625 30.6393 61.3491 30.6393C63.6319 30.6393 65.0845 28.8381 65.0845 25.966C65.0845 23.0939 63.6319 21.301 61.3325 21.301ZM60.8262 29.0373C59.3321 29.0373 58.3941 27.8586 58.3941 25.9743C58.3941 24.0817 59.3321 22.903 60.8345 22.903C62.3452 22.903 63.25 24.0568 63.25 25.966C63.25 27.8835 62.3452 29.0373 60.8262 29.0373Z" fill="white" />
                <path d="M43.4438 30.4899H45.4914L41.009 18.075H38.9356L34.4531 30.4899H36.4319L37.5762 27.1948H42.3081L43.4438 30.4899ZM39.8733 20.3292H40.0196L41.8177 25.5773H38.0666L39.8733 20.3292Z" fill="white" />
                <path d="M35.6504 8.71094V14.7H37.8127C39.5974 14.7 40.6309 13.6001 40.6309 11.6868C40.6309 9.80249 39.5891 8.71094 37.8127 8.71094H35.6504ZM36.5801 9.55762H37.709C38.95 9.55762 39.6846 10.3462 39.6846 11.6992C39.6846 13.073 38.9624 13.8533 37.709 13.8533H36.5801V9.55762Z" fill="white" />
                <path d="M43.7959 14.7871C45.1158 14.7871 45.9251 13.9031 45.9251 12.438C45.9251 10.9812 45.1116 10.093 43.7959 10.093C42.4761 10.093 41.6626 10.9812 41.6626 12.438C41.6626 13.9031 42.472 14.7871 43.7959 14.7871ZM43.7959 13.9944C43.0198 13.9944 42.584 13.4258 42.584 12.438C42.584 11.4585 43.0198 10.8857 43.7959 10.8857C44.5679 10.8857 45.0079 11.4585 45.0079 12.438C45.0079 13.4216 44.5679 13.9944 43.7959 13.9944Z" fill="white" />
                <path d="M52.8172 10.1802H51.9249L51.1197 13.6292H51.0492L50.1195 10.1802H49.2645L48.3348 13.6292H48.2684L47.4591 10.1802H46.5543L47.7994 14.7H48.7167L49.6463 11.3713H49.7169L50.6507 14.7H51.5763L52.8172 10.1802Z" fill="white" />
                <path d="M53.8449 14.7H54.7372V12.0562C54.7372 11.3506 55.1564 10.9106 55.8163 10.9106C56.4762 10.9106 56.7916 11.2717 56.7916 11.998V14.7H57.684V11.7739C57.684 10.699 57.1278 10.093 56.1193 10.093C55.4386 10.093 54.9904 10.396 54.7704 10.8982H54.704V10.1802H53.8449V14.7Z" fill="white" />
                <path d="M59.0893 14.7H59.9816V8.41626H59.0893V14.7Z" fill="white" />
                <path d="M63.3376 14.7871C64.6575 14.7871 65.4668 13.9031 65.4668 12.438C65.4668 10.9812 64.6533 10.093 63.3376 10.093C62.0178 10.093 61.2043 10.9812 61.2043 12.438C61.2043 13.9031 62.0137 14.7871 63.3376 14.7871ZM63.3376 13.9944C62.5615 13.9944 62.1257 13.4258 62.1257 12.438C62.1257 11.4585 62.5615 10.8857 63.3376 10.8857C64.1096 10.8857 64.5496 11.4585 64.5496 12.438C64.5496 13.4216 64.1096 13.9944 63.3376 13.9944Z" fill="white" />
                <path d="M68.1255 14.0234C67.6399 14.0234 67.2872 13.7869 67.2872 13.3801C67.2872 12.9817 67.5694 12.77 68.1919 12.7285L69.2959 12.658V13.0356C69.2959 13.5959 68.7979 14.0234 68.1255 14.0234ZM67.8973 14.7747C68.4908 14.7747 68.9847 14.5173 69.2544 14.0649H69.325V14.7H70.1841V11.6121C70.1841 10.6575 69.545 10.093 68.4119 10.093C67.3868 10.093 66.6563 10.5911 66.565 11.3672H67.4283C67.5279 11.0476 67.8724 10.865 68.3704 10.865C68.9805 10.865 69.2959 11.1348 69.2959 11.6121V12.0022L68.0716 12.0728C66.9966 12.1392 66.3907 12.6082 66.3907 13.4216C66.3907 14.2476 67.0257 14.7747 67.8973 14.7747Z" fill="white" />
                <path d="M73.2123 14.7747C73.8348 14.7747 74.3619 14.48 74.6317 13.9861H74.7022V14.7H75.5572V8.41626H74.6649V10.8982H74.5985C74.3536 10.4001 73.8307 10.1055 73.2123 10.1055C72.0709 10.1055 71.3363 11.0103 71.3363 12.438C71.3363 13.8699 72.0626 14.7747 73.2123 14.7747ZM73.4654 10.9065C74.2125 10.9065 74.6815 11.5 74.6815 12.4421C74.6815 13.3884 74.2166 13.9736 73.4654 13.9736C72.7101 13.9736 72.2577 13.3967 72.2577 12.438C72.2577 11.4875 72.7142 10.9065 73.4654 10.9065Z" fill="white" />
                <path d="M81.3437 14.7871C82.6635 14.7871 83.4729 13.9031 83.4729 12.438C83.4729 10.9812 82.6594 10.093 81.3437 10.093C80.0239 10.093 79.2104 10.9812 79.2104 12.438C79.2104 13.9031 80.0197 14.7871 81.3437 14.7871ZM81.3437 13.9944C80.5676 13.9944 80.1318 13.4258 80.1318 12.438C80.1318 11.4585 80.5676 10.8857 81.3437 10.8857C82.1157 10.8857 82.5556 11.4585 82.5556 12.438C82.5556 13.4216 82.1157 13.9944 81.3437 13.9944Z" fill="white" />
                <path d="M84.6541 14.7H85.5464V12.0562C85.5464 11.3506 85.9656 10.9106 86.6255 10.9106C87.2854 10.9106 87.6008 11.2717 87.6008 11.998V14.7H88.4932V11.7739C88.4932 10.699 87.937 10.093 86.9285 10.093C86.2478 10.093 85.7996 10.396 85.5796 10.8982H85.5132V10.1802H84.6541V14.7Z" fill="white" />
                <path d="M92.6029 9.05542V10.2009H91.8849V10.9521H92.6029V13.5046C92.6029 14.3762 92.9972 14.7249 93.9891 14.7249C94.1634 14.7249 94.3294 14.7041 94.4747 14.6792V13.9363C94.3502 13.9487 94.2713 13.957 94.1344 13.957C93.6903 13.957 93.4952 13.7495 93.4952 13.2764V10.9521H94.4747V10.2009H93.4952V9.05542H92.6029Z" fill="white" />
                <path d="M95.6725 14.7H96.5648V12.0603C96.5648 11.3755 96.9716 10.9148 97.702 10.9148C98.3329 10.9148 98.6691 11.28 98.6691 12.0022V14.7H99.5614V11.7822C99.5614 10.7073 98.9679 10.0972 98.005 10.0972C97.3244 10.0972 96.8471 10.4001 96.6271 10.9065H96.5565V8.41626H95.6725V14.7Z" fill="white" />
                <path d="M102.78 10.8525C103.44 10.8525 103.872 11.3132 103.893 12.0229H101.61C101.66 11.3174 102.121 10.8525 102.78 10.8525ZM103.889 13.4797C103.723 13.8325 103.353 14.0276 102.814 14.0276C102.1 14.0276 101.639 13.5254 101.61 12.7327V12.6829H104.802V12.3716C104.802 10.9521 104.042 10.093 102.785 10.093C101.51 10.093 100.701 11.0103 100.701 12.4546C100.701 13.8989 101.494 14.7871 102.789 14.7871C103.822 14.7871 104.544 14.2891 104.748 13.4797H103.889Z" fill="white" />
                <path d="M24.77 20.3008C24.7916 18.6198 25.6944 17.0292 27.1265 16.1488C26.2231 14.8584 24.7098 14.0403 23.1354 13.9911C21.4561 13.8148 19.8282 14.9959 18.9725 14.9959C18.1002 14.9959 16.7827 14.0086 15.364 14.0378C13.5147 14.0975 11.7907 15.1489 10.891 16.7656C8.95705 20.1141 10.3996 25.0351 12.2522 27.7417C13.1791 29.0671 14.2624 30.5475 15.6799 30.495C17.0669 30.4375 17.585 29.6105 19.2593 29.6105C20.918 29.6105 21.4041 30.495 22.8503 30.4616C24.3387 30.4375 25.2764 29.1304 26.1708 27.7925C26.8368 26.8481 27.3492 25.8044 27.6892 24.7C25.9401 23.9602 24.772 22.2 24.77 20.3008Z" fill="white" />
                <path d="M22.0383 12.2111C22.8498 11.2369 23.2496 9.98469 23.1528 8.72046C21.913 8.85068 20.7677 9.44324 19.9452 10.3801C19.141 11.2954 18.7224 12.5255 18.8015 13.7415C20.0418 13.7542 21.2611 13.1777 22.0383 12.2111Z" fill="white" />
                <rect x="0.5" y="0.5" width="134" height="39" rx="6.5" stroke="white" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-[30px] grid grid-cols-2 flex-wrap gap-[20px] lg:mt-[60px] lg:flex lg:space-x-10">
      <a class="text-white" href="<?php echo e(route('home')); ?>">Home</a>
      <a class="text-white" href="#">Support</a>
      <a class="text-white" href="#">Download</a>
      <a class="text-white" href="<?php echo e(route('about')); ?>">About Us</a>
      <a class="text-white" href="<?php echo e(route('contact')); ?>">Contact Us</a>
    </div>
    <div class="mt-12 flex flex-col-reverse items-start justify-between border-t border-white pt-8 lg:flex-row lg:items-center">
      <p class="mt-[30px] text-white lg:mt-0">Copyright (c) 2024 QuellHub. All Right Reserved.</p>
      <div class="flex items-center space-x-6">
        <a class="flex-shrink-0" target="_blank" href="#">
          <svg class="h-6 w-6 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" /></svg
        ></a>
        <a class="flex-shrink-0" target="_blank" href="#">
          <svg class="h-6 w-6 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
          </svg>
        </a>
        <a class="flex-shrink-0" target="_blank" href="#">
          <svg class="h-6 w-6 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>




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

</html><?php /**PATH C:\Users\PC\HostelBooking\resources\views/layouts/app.blade.php ENDPATH**/ ?>