<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Hostels Booking</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Include Bootstrap JavaScript and jQuery from CDN -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Other CSS and JavaScript imports as needed -->

</head>

<body id="login">
    <div class="content-wrap">
        <div class="container mx-auto mt-8">
            <div class="row justify-content-center">
                <div class="col-md-7 lg:text-left lg:py-5 lg:pl-20 hidden sm:block md:block">
                    <h2 class="text-base font-semibold leading-7 text-blue-300">Welcome To PrivateHostels</h2>
                    <div class="line1 items-start justify-start my-2 text-white">
                    </div>
                    <h1 class="text-white font-bold lg:text-5xl sm:text-4xl mb-5">The easy way to find accommodation.
                    </h1>
                </div>
                <div class="col-md-5">
                    <div class="bg-white shadow-sm rounded-xl border-t-blue-600 border-t-8">
                        <h1 class="text-base text-center font-semibold leading-7 text-blue-500 mt-5">
                            <?php echo e(__('Register')); ?>

                        </h1>
                        <div class="line2 items-start justify-center mx-auto my-2">
                        </div>
                        <div class="form">
                            <form method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="text-left mb-2 mt-3 pl-3">
                                    <span for="fname"
                                        class="text-base leading-3 text-left text-gray-500"><?php echo e(__('Firstname')); ?></span>
                                </div>
                                <div class="relative rounded-md col-md-12 items-center">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-person-fill text-gray-300" viewBox="0 0 16 16"></i>
                                    </div>
                                    <input id="fname" type="text"
                                        class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-md border-1 py-4 pl-12 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        name="fname" placeholder="Enter your firstname" value="<?php echo e(old('fname')); ?>"
                                        required autocomplete="fname" autofocus>

                                    <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="text-left mb-2 mt-3 pl-3">
                                    <span for="lname"
                                        class="text-base leading-3 text-left text-gray-500"><?php echo e(__('Lastname')); ?></span>
                                </div>
                                <div class="relative rounded-md col-md-12 items-center">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-person-fill text-gray-300" viewBox="0 0 16 16"></i>
                                    </div>
                                    <input id="lname" type="text"
                                        class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-md border-1 py-4 pl-12 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        name="lname" placeholder="Enter your lastname" value="<?php echo e(old('lname')); ?>"
                                        required autocomplete="lname" autofocus>

                                    <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="text-left mb-2 mt-3 pl-3">
                                    <span for="email"
                                        class="text-base leading-3 text-left text-gray-500"><?php echo e(__('Email')); ?></span>
                                </div>
                                <div class="relative rounded-md col-md-12 items-center">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-envelope-fill text-gray-300" viewBox="0 0 16 16"></i>

                                    </div>
                                    <input id="email" type="email"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-md border-1 py-4 pl-12 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        name="email" placeholder="example@mail.com" value="<?php echo e(old('email')); ?>" required
                                        autocomplete="email" autofocus>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <input id="role" type="hidden" name="role" value="Student">
                                </div>

                                <div class="text-left mb-2 mt-3 pl-3">
                                    <span for="password"
                                        class="text-base leading-3 text-left text-gray-500"><?php echo e(__('Password')); ?></span>
                                </div>
                                <div class="relative rounded-md col-md-12">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-lock-fill text-gray-300" viewBox="0 0 16 16"></i>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-md border-1 py-4 pl-12 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        name="password" required placeholder="**********" autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <div class="text-left mb-2 mt-3 pl-3">
                                    <span for="password"
                                        class="text-base leading-3 text-left text-gray-500"><?php echo e(__('Confirm Password')); ?></span>
                                </div>

                                <div class="relative rounded-md col-md-12 mb-3">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-lock-fill text-gray-300" viewBox="0 0 16 16"></i>
                                    </div>
                                    <input id="password-confirm" type="password"
                                        class="form-control rounded-md border-1 py-4 pl-12 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        name="password_confirmation" required placeholder="**********"
                                        autocomplete="new-password">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button type="submit"
                                        class="btn bg-blue-400 py-2 text-center mb-5 text-white w-full hover:bg-blue-600">
                                        <?php echo e(__('Register')); ?>

                                    </button>
                                </div>
                            </form>
                            <div class="line items-start justify-center mx-auto mb-3">
                            </div>

                            <div class="flex space-x-2 justify-center items-center mx-3 pb-3 text-gray-400 text-sm">
                                <p>Already have an account? <a href="<?php echo e(route('login')); ?>"
                                        class="btn-link text-center text-blue-400 hover:text-blue-600">Login</a></p>
                                <span>OR</span>
                                <span>Go back <a href="<?php echo e(route('home')); ?>"
                                        class="btn-link text-center text-blue-400 hover:text-blue-600">Home</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer mx-auto">
        <div class="container">
            <div class="text-left text-white my-3">
                <p class="avl awc awo axr">© 2023 Private Hostels Booking, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html><?php /**PATH C:\Users\PC\HostelBooking\resources\views/auth/register.blade.php ENDPATH**/ ?>