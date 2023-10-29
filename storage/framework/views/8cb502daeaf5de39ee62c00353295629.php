<?php $__env->startSection('content'); ?>
<div id="booking" class="container px-2 py-8 mt-20 items-center justify-center">
    <!-- Steps UI -->
    <div class="flex items-center justify-center space-x-1 my-5 sm:overflow-x-hidden">

        <div class="flex items-center justify-center space-x-1">
            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M9.707 18.707l10-10a1 1 0 0 0-1.414-1.414l-9.293 9.293l-3.293-3.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0z" />
                </svg>
            </div>
            <p class="text-gray-800 text-sm font-bold">Your Selection</p>
            <div class="h-0.5 bg-gray-700 w-60 border-r-3 border-gray-400">
            </div>
        </div>
        <div class="flex items-center justify-center space-x-1">
            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M9.707 18.707l10-10a1 1 0 0 0-1.414-1.414l-9.293 9.293l-3.293-3.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0z" />
                </svg>
            </div>
            <p class="text-gray-800 text-sm font-bold">Reserve Room</p>
            <div class="h-0.5 bg-gray-700 w-60 border-r-3 border-gray-400">
            </div>
            <div class="flex items-center justify-center space-x-1">
                <div class="w-12 h-12 rounded-full bg-gray-200 border-2 border-blue-500 flex items-center justify-center text-gray-600 text-2xl font-bold">
                    3</div>
                <p class="text-gray-800 text-sm font-bold">Make Payment</p>
            </div>

        </div>

    </div>
    <div class="container px-2">
        <div class="row -mx-4">
            <div class="w-full col-lg-4 px-2">
                <div class="bg-white rounded-lg border-gray-300 border-2 p-4 mb-2">
                    <h2 class="text-sm font-bold mb-2"><?php echo e($room->hostel->name); ?></h2>
                    <p class="text-gray-700 text-sm mb-2"><i class="bi bi-geo-alt pr-2"></i><?php echo e($room->hostel->location); ?></p>
                    <div class="star-rating">
                        <?php for($i = 1; $i <= 5; $i++): ?> <?php if($normalizedRating>= $i): ?>
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            <?php elseif($normalizedRating > ($i - 1)): ?>
                            <i class="bi bi-star-half text-yellow-500"></i>
                            <?php else: ?>
                            <i class="bi bi-star text-yellow-500"></i>
                            <?php endif; ?>
                            <?php endfor; ?>
                            <?php echo e($normalizedRating); ?>

                    </div>

                    <?php
                    $rowCount = count($hostel->reviews);
                    ?>
                    <span class="text-gray-700 mb-2"><?php echo e($rowCount); ?> reviews</span>
                </div>
                <div class="bg-white rounded-lg border-gray-300 border-2 p-4 mb-2">
                    <h2 class="text-sm font-bold mb-2">Your Booking Details</h2>
                    <div class="row items-center mb-3">
                        <div class="col-6">
                            <p class="text-sm text-gray-400">Check-In</p>
                            <span class="font-bold text-gray-950 text-lg pr-5 border-r-2 border-gray-300"><?php echo e($booking->check_in_date); ?></span>
                        </div>
                        <div class="col-6">
                            <p class="text-sm text-gray-400">Check-Out</p>
                            <span class="font-bold text-gray-950 text-lg"><?php echo e($booking->check_out_date); ?></span>
                        </div>
                    </div>
                    <p class="text-gray-800 text-left">Duration:</p>
                    <span class="font-bold text-gray-950 text-sm text-left">1 year</span>
                </div>
                <div class="bg-white rounded-lg border-gray-300 p-4 border-2 mb-2">
                    <h2 class="text-sm font-bold mb-2">Your price summary</h2>
                    <div class="bg-blue-100 row rounded-md shadow-sm p-4 mb-2">
                        <div class="col font-extrabold text-left text-3xl">
                            Total
                        </div>
                        <div class="col font-extrabold text-left text-3xl mb-2">
                            GH&#8373;<?php echo e($room->price_per_year); ?>

                        </div>
                    </div>
                    <div class="row items-center">
                        <div class="col-6 ">
                            <p class="text-sm text-gray-400">Room number</p>
                            <p class="font-bold text-gray-950 text-lg"><?php echo e($room->room_no); ?></p>
                        </div>
                        <div class="col-6">
                            <p class="text-sm text-gray-400">Room type</p>
                            <p class="font-bold text-gray-950 text-lg"><?php echo e($room->room_type); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full col-lg-8 px-2">
                <form id="payment-form" method="post" action="<?php echo e(route('pay')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-3">
                        <div class="row items-center">
                            <div class="col-10">
                                <h1 class="lg:text-xl sm:text-lg font-black text-gray-950">You're required to make
                                    payment to
                                    complete
                                    booking</h1>
                                <p class="text-sm text-gray-500">Any reservation without payment within 24hrs will be
                                    canceled.
                                </p>
                            </div>
                            <div class="col-2">
                                <img src="https://cf.bstatic.com/static/img/book/bp-no-payment-last-minute/91d509cff564c4644361f56c4b4b00d1cc9b4609.png" class="h-full w-full" alt="booking-payment">
                            </div>
                        </div>
                        <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                        <input type="hidden" name="amount" value="<?php echo e($room->price_per_year); ?>">
                        <input type="hidden" name="booking_id" value="<?php echo e($booking->id); ?>">
                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">

                        <div class="pt-5 row items-center">
                            <div class="col">
                                <button class="lg:hidden bg-white border-2 border-blue-600 text-blue-500 font-bold px-4 py-3 rounded-lg hover:bg-blue-600">
                                    <span>Pay later</span>
                                </button>
                            </div>
                            <div class="col items-center space-x-3">
                                <a href="<?php echo e(route('home')); ?>" class="hidden sm:inline md:inline bg-white border-2 border-blue-600 text-blue-500 font-bold px-4 py-3 rounded-lg hover:bg-blue-600">
                                    <span>Pay later</span>
                                </a>
                                <button type="submit" id="submit-button" class="bg-blue-500 text-white font-bold px-4 py-3 rounded-lg hover:bg-blue-600">
                                    <span id="submit-text">Complete <i class="bi bi-lock" style="font-size:25px"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/booking/step2.blade.php ENDPATH**/ ?>