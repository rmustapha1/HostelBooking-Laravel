<?php $__env->startSection('content'); ?>
<div class="container mt-20 bg-slate-300">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="bg-white mx-auto rounded-lg shadow-md mt-10 max-w-lg">
                <div class="font-bold text-3xl text-center my-5"><?php echo e(__('User Profile')); ?></div>

                <div class="info pt-3 items-center justify-center text-center">
                    <div class="">
                        <?php
                        $user = Auth::user();
                        $user_id = $user->id;
                        $name = $user->fname . ' ' . $user->lname;
                        ?>
                        <div class="w-10 h-10 rounded-full bg-white shadow-sm mb-2 mx-auto items-center justify-center">
                            <img src="<?php echo e(asset('images/profile.png')); ?>" alt="profile_photo" class="img-fluid w-10 h-10">
                        </div>
                        <div class="w-20 h-6 rounded bg-blue-100 shadow-sm mb-3 mx-auto items-center justify-center">
                            <p><?php echo e($user->role); ?></p>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2"><?php echo e($name); ?></h3>
                        <p class="text-sm font-normal text-gray-500 mb-2"><?php echo e($user->email); ?></p>
                        <?php if(is_null($user->phone)): ?>
                        <p class="text-sm font-normal text-gray-500 mb-2">None</p>
                        <?php else: ?>
                        <p class="text-sm font-normal text-gray-500"><?php echo e($user->phone); ?></p>
                        <?php endif; ?>

                        <div>
                            <a type="button" class="btn-link text-gray-500 hover:text-blue-500" data-toggle="modal" data-target="#viewBookingsModal">Booking History</a>
                        </div>
                        <div>
                            <a type="button" class="btn-link text-gray-500 hover:text-blue-500" data-toggle="modal" data-target="#editProfileModal">Edit Profile</a>
                        </div>
                        <div>
                            <a href="<?php echo e(route('complaint.index')); ?>" class="btn-link text-gray-500 hover:text-blue-500">Send
                                Complaint</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel"><?php echo e(__('Edit Profile')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(route('user.update', ['user_id' => $user_id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="row">
                                <!-- Firstname -->
                                <label for="first_name" class="text-gray-600 font-medium">First name</label>
                                <div class="col-md-12 mb-3">
                                    <input id="first_name" type="text" class="form-control w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fname" value="<?php echo e(old('fname', $user->fname)); ?>" required autocomplete="fname" autofocus>

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
                                <!-- Lastname -->
                                <label for="last_name" class="text-gray-600 font-medium">Last name</label>
                                <div class="col-md-12 mb-3">
                                    <input id="last_name" type="text" class="form-control w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lname" value="<?php echo e(old('lname', $user->lname)); ?>" required autocomplete="lname" autofocus>

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

                                <!-- Email address -->
                                <div class="col-md-12 mb-3">
                                    <label for="email" class="text-gray-600 font-medium">Email address</label>
                                    <input type="email" id="email" name="email" placeholder="Enter your email address" value="<?php echo e(old('email', $user->email)); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required autocomplete="email">
                                </div>
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

                                <!-- Telephone number -->
                                <div class="col-md-12 mb-3">
                                    <label for="phone" class="text-gray-600 font-medium">Telephone number</label>
                                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(old('phone', $user->phone)); ?>" required autocomplete="phone">
                                </div>
                                <?php $__errorArgs = ['phone'];
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


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">
                                        <?php echo e(__('Update Profile')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Bookings Modal -->
        <div class="modal fade" id="viewBookingsModal" tabindex="-1" role="dialog" aria-labelledby="viewBookingsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content max-w-1/2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewBookingsModalLabel">View Bookings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hostel Name</th>
                                    <th scope="col">Check-in Date</th>
                                    <th scope="col">Check-out Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($booking->id); ?></th>
                                    <td><?php echo e($booking->room->hostel->name); ?></td>
                                    <td><?php echo e($booking->check_in_date); ?></td>
                                    <td><?php echo e($booking->check_out_date); ?></td>
                                    <td><?php echo e($booking->status); ?></td>
                                    <?php if($booking->status == 'Canceled'): ?>
                                    <td>
                                        <form action="#" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                    <?php endif; ?>
                                    <?php if($booking->status == 'Reserved'): ?>
                                    <td>
                                        <a href="<?php echo e(route('booking.step2', ['bookingId' => $booking->id])); ?>" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded">
                                            Pay
                                        </a>
                                    </td>
                                    <?php elseif($booking->status == 'Confirmed'): ?>
                                    <td>
                                        <a href="<?php echo e(route('booking.invoice', ['bookingId' => $booking->id])); ?>" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded">
                                            View Invoice
                                        </a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/users/profile.blade.php ENDPATH**/ ?>