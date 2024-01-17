<?php $__env->startSection('content'); ?>
<section id="profile-page" class="mx-auto">
<div class="container mt-20">
<div class="top-banner">
        <h1 class="text-gray-900 text-bold text-center lg:text-5xl sm:text-4xl">Your Profile</h1>
        <div class="line3 items-start justify-start mx-auto my-2 text-blue-500">
        </div>
    </div>
<div class="container">
               <?php
                $user = Auth::user();
                $user_id = $user->id;
                $name = $user->fname . ' ' . $user->lname;
                ?>
    <div class="p-8 bg-white shadow mt-24">  
        <div class="grid grid-cols-1 md:grid-cols-3">    
            <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">      
                <div>
                    <p class="font-bold text-gray-700 text-xl">00</p>        
                    <p class="text-gray-400">Room Number</p> 
                </div>      
                <div>           
                    <p class="font-bold text-gray-700 text-xl">00</p> 
                    <p class="text-gray-400">Reviews</p>     
                </div>          
                <div>           
                    <p class="font-bold text-gray-700 text-xl">00</p>
                    <p class="text-gray-400">Room Type</p>
                </div>    
            </div>    
            <div class="relative">
                <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">  
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>      
                </div>    
            </div>    
            <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                <button type="button" class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5" data-toggle="modal" data-target="#viewBookingsModal"> Bookings</button>

                <a href="<?php echo e(route('complaint.index')); ?>"  class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">  Message</a>    
            </div>  
        </div>  
        <div class="mt-20 text-center border-b pb-12">    
            <h1 class="text-4xl font-medium text-gray-700"><?php echo e($name); ?><span class="font-light text-gray-500"></span>
        </h1>    
        <p class="font-light text-gray-600 mt-3"><?php echo e($user->role); ?></p>    
        <p class="mt-8 text-gray-500"><?php echo e($user->phone); ?></p>    
        <p class="mt-2 text-gray-500"><?php echo e($user->email); ?></p>  
    </div>  
    <div class="mt-12 flex flex-col justify-center">    
        <p class="text-gray-600 text-center font-light lg:px-16">...</p>    
        <button  class="text-blue-500 py-2 px-4 border-2 font-medium mt-4" data-toggle="modal" data-target="#editProfileModal">  Edit Profile</button>  
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
</div>
</section>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/users/profile.blade.php ENDPATH**/ ?>