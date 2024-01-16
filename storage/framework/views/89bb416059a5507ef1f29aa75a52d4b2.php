<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>QellHub Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/base/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('images/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('images/site.webmanifest')); ?>">
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>

    <style>
    * {
        font-family: 'Space Grotesk', sans-serif;
    }
    </style>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo logo">
                                <img class="h-10 w-auto" src="<?php echo e(asset('images/quellhub_logo.png')); ?>" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
                            <form class="pt-3" method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="fname" type="text" class="form-control form-control-lg border-left-0"
                                            name="fname" placeholder="Enter your firstname" required
                                            autocomplete="fname" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="lname" type="text" class="form-control form-control-lg border-left-0"
                                            name="lname" placeholder="Enter your lastname" required autocomplete="lname"
                                            autofocus>
                                        <input type="hidden" name="role" value="Student" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-email-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="email" type="email"
                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control-lg border-left-0"
                                            placeholder="Enter your email" name="email" value="<?php echo e(old('email')); ?>"
                                            required autocomplete="email" autofocus>

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
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-phone text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="phone" type="tel" class="form-control form-control-lg border-left-0"
                                            name="phone" placeholder="0000000000" required autocomplete="phone"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control-lg border-left-0"
                                            placeholder="Password" name="password" required
                                            autocomplete="current-password">

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
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="password-confirm" type="password"
                                            class="form-control form-control-lg border-left-0"
                                            name="password_confirmation" required placeholder="Confirm Password"
                                            autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="<?php echo e(route('login')); ?>"
                                        class="text-primary">Login</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Can't signup now? <a href="<?php echo e(route('home')); ?>" class="text-primary">Go
                                        Home</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 register-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy;
                            2023 All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo e(asset('vendors/base/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('js/template.js')); ?>"></script>
    <!-- endinject -->
</body>

</html><?php /**PATH C:\Users\PC\HostelBooking\resources\views/auth/register.blade.php ENDPATH**/ ?>