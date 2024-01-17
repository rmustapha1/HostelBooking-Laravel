<?php $__env->startSection('content'); ?>
<div id="booking" class="container px-2 py-8 mt-20 items-center justify-center">
    <!-- Steps UI -->
<div class="p-5">
  <div class="mx-auto p-4">
    <div class="flex items-center justify-center">
      <div class="flex items-center text-white relative">
        <div
          class="
            rounded-full
            bg-blue-500
            items-center text-white text-2xl font-bold
            transition
            duration-500
            ease-in-out
            h-12
            w-12
            py-3
            border-2 border-blue-500
          "
        >
        <p class="text-center">1</p>
        </div>
        <div
          class="
            absolute
            top-0
            -ml-10
            text-center
            mt-16
            w-32
            text-xs
            font-medium
            uppercase
            text-blue-500
          "
        >
          Your Selection
        </div>
      </div>
      <div
        class="
          flex-auto
          border-t-2 
          transition
          duration-500
          ease-in-out
          border-blue-500
        "
      ></div>
      <div class="flex items-center text-white relative">
        <div
          class="
            rounded-full 
            transition
            duration-500
            ease-in-out
            h-12
            w-12
            py-3
            border-2 text-2xl font-bold
            border-blue-500
            text-gray-500
          "
        >
          <p class="text-center">2</p>
        </div>
        <div
          class="
            absolute
            top-0
            -ml-10
            text-center
            mt-16
            w-32
            text-xs
            font-medium
            uppercase
            text-blue-500
          "
        >
          Reserve Room
        </div>
      </div>
      <div
        class="
          flex-auto
          border-t-2
          transition
          duration-500
          ease-in-out
          border-gray-300
        "
      ></div>
      <div class="flex items-center text-gray-500 relative">
        <div
          class="
            rounded-full
            transition
            duration-500
            ease-in-out
            h-12
            w-12 text-2xl font-bold
            py-3
            border-2 border-gray-300
          "
        >
          <p class="text-center">3</p>
        </div>
        <div
          class="
            absolute
            top-0
            -ml-10
            text-center
            mt-16
            w-32
            text-xs
            font-medium
            uppercase
            text-gray-500
          "
        >
          Make Payment
        </div>
      </div>
    </div>
  </div>
</div>


    <div class="container px-2">
        <div class="row -mx-4">
            <div class="w-full col-lg-4 px-2">
                <div class="bg-white rounded-lg border-gray-300 border-2 p-4 mb-2">
                    <h2 class="text-sm font-bold mb-2"><?php echo e($hostel->name); ?></h2>
                    <p class="text-gray-700 text-sm mb-2"><i class="bi bi-geo-alt pr-2"></i><?php echo e($hostel->location); ?></p>
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

                        <?php
                        $checkInDate = date('Y-m-d');
                        $checkOutDate = date('Y-m-d', strtotime('+1 year'));
                        ?>
                        <div class="col-6">
                            <p class="text-sm text-gray-400">Check-In</p>
                            <span
                                class="font-bold text-gray-950 text-lg pr-5 border-r-2 border-gray-300"><?php echo e($checkInDate); ?></span>
                        </div>
                        <div class="col-6">
                            <p class="text-sm text-gray-400">Check-Out</p>
                            <span class="font-bold text-gray-950 text-lg"><?php echo e($checkOutDate); ?></span>
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
                <!-- Sign in to book your details or register to manage your booking on the go! -->
                <form id="booking-form" method="post" action="<?php echo e(route('booking.saveBooking')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-3">
                        <h2 class="text-2xl font-medium text-gray-800">Continue to book with your details.
                        </h2>
                        <div class="mt-4 row">

                            <!-- First name -->
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="text-gray-600 font-medium">First name</label>
                                <input type="text" id="first_name" name="fname" placeholder="Enter your first name"
                                    value="<?php echo e($user->fname); ?>"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Last name -->
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="text-gray-600 font-medium">Last name</label>
                                <input type="text" id="last_name" name="lname" placeholder="Enter your last name"
                                    value="<?php echo e($user->lname); ?>"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Email address -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="text-gray-600 font-medium">Email address</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email address"
                                    value="<?php echo e($user->email); ?>"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Country/region -->
                            <div class="col-md-6 mb-3">
                                <label for="school" class="text-gray-600 font-medium">Your
                                    school/campus</label>
                                <input type="text" id="school" name="school" placeholder="Enter your school name"
                                    value="<?php echo e($hostel->school->name); ?>"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <input type="hidden" name="room_id" value="<?php echo e($room->id); ?>">
                            <input type="hidden" name="hostel_id" value="<?php echo e($hostel->id); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        </div>
                    </div>

                    <!-- Final Step -->
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-4">
                        <h2 class="text-lg font-medium text-gray-800">Contact Details</h2>
                        <div class="mt-4 row">

                            <!-- Telephone number -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="text-gray-600 font-medium">Telephone
                                    number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"
                                    value="<?php echo e($user->phone); ?>"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Email preferences -->
                            <div class="col-md-6 mb-3">
                                <label for="email_preferences" class="text-gray-600 font-medium">Email
                                    preferences</label>
                                <select id="email_preferences" name="email_preferences"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="all">Send me all emails</option>
                                    <option value="important">Send me only important emails</option>
                                    <option value="none">Do not send me any emails</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- Check-In-Date & Check-Out-Date -->
                    <div class="border-gray-300 border-2 rounded-sm p-4 mb-4">
                        <h2 class="text-lg font-medium text-gray-800">Check-In & Check-Out Date</h2>
                        <div class="mt-4 row">
                            <!-- Check-In-Date -->
                            <div class="col-md-6 mb-3">
                                <label for="check_in_date" class="text-gray-600 font-medium">Check-In-Date</label>
                                <input type="date" id="check_in_date" name="check_in_date"
                                    placeholder="Enter your check-in date"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    value="<?php echo e($checkInDate); ?>" required readonly>
                            </div>
                            <!-- Check-Out-Date -->
                            <div class="col-md-6 mb-3">
                                <label for="check_out_date" class="text-gray-600 font-medium">Check-Out-Date</label>
                                <input type="date" id="check_out_date" name="check_out_date" value="<?php echo e($checkOutDate); ?>"
                                    placeholder="Enter your check-out date"
                                    class="w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required readonly>
                            </div>

                        </div>


                    </div>
                    <!-- Confirm button -->
                    <div class="pt-5 float-right">
                        <button type="submit" id="submit-button"
                            class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">
                            <span id="submit-text">Next: Payment <i class="bi bi-chevron-right"></i></span>
                            <img id="submit-loader" src="<?php echo e(asset('images/loader.gif')); ?>" alt="Loading..."
                                style="display:none;">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script>
    // Get references to the button, submit-loader, and submit-text elements
    var button = document.getElementById("submit-button");
    var submitLoader = document.getElementById("submit-loader");
    var submitText = document.getElementById("submit-text");

    // Add a click event listener to the button
    button.addEventListener("click", function() {
        // Disable the button to prevent multiple clicks
        button.disabled = true;

        // Show the loader and hide the text
        submitLoader.style.display = "block";
        submitText.style.display = "none";

        // Simulate a delay for demonstration (you can replace this with your actual form submission logic)
        setTimeout(function() {
            // Re-enable the button
            button.disabled = false;

            // Hide the loader and show the text
            submitLoader.style.display = "none";
            submitText.style.display = "block";
        }, 3000); // Simulating a 3-second delay; replace with your actual logic
    });
    </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/booking/step1.blade.php ENDPATH**/ ?>