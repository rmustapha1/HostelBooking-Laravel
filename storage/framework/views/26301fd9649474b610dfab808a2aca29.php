<?php $__env->startSection('content'); ?>

<div class="container hostel mt-20">
    <div class="page-header">
        <h1 class="page-title">Find Rooms</h1>
    </div>
    <p class="page-content mb-3 mt-3 text-muted">Click and start booking process.</p>

    

  <div class="bg-white p-6 rounded-xl shadow">
    <form action="<?php echo e(route('hostels.index')); ?>" method="GET">
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <div class="flex flex-col">
        <label for="name" class="font-medium text-sm text-stone-600">Categories</label>
        <select name="school"
                    class="form-select w-full bg-gray-50 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Schools</option>
                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($school->id); ?>" <?php echo e($school->id == $selectedSchool ? 'selected' : ''); ?>>
                        <?php echo e($school->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
      </div>

      <div class="flex flex-col">
        <label for="email" class="font-medium text-sm text-stone-600">Price Range</label>
             <select name="price_range"
                    class="form-select w-full bg-gray-50 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Price Ranges</option>
                    <option value="0-1000" <?php echo e($selectedPriceRange == '0-1000' ? 'selected' : ''); ?>>0 - 1000</option>
                    <option value="1001-2000" <?php echo e($selectedPriceRange == '1001-2000' ? 'selected' : ''); ?>>1001 - 2000
                    </option>
                    <option value="2001-3000" <?php echo e($selectedPriceRange == '2001-3000' ? 'selected' : ''); ?>>2001 -
                        3000</option>
                    <option value="3001-4000" <?php echo e($selectedPriceRange == '3001-4000' ? 'selected' : ''); ?>>3001 -
                        4000</option>
                    <option value="4001-5000" <?php echo e($selectedPriceRange == '4001-5000' ? 'selected' : ''); ?>>4001 -
                        5000</option>
                    <option value="5001-6000" <?php echo e($selectedPriceRange == '5001-6000' ? 'selected' : ''); ?>>5001 -
                        6000</option>
                    <option value="6001-7000" <?php echo e($selectedPriceRange == '6001-7000' ? 'selected' : ''); ?>>6001 -
                        7000</option>
                    <option value="7001-8000" <?php echo e($selectedPriceRange == '7001-8000' ? 'selected' : ''); ?>>7001 -
                        8000</option>
                    <option value="8001-9000" <?php echo e($selectedPriceRange == '8001-9000' ? 'selected' : ''); ?>>8001 -
                        9000</option>
                    <option value="9001-10000" <?php echo e($selectedPriceRange == '9001-10000' ? 'selected' : ''); ?>>9001 -
                        10000</option>
                    <option value="10001-50000" <?php echo e($selectedPriceRange == '10001-50000' ? 'selected' : ''); ?>>10001 -
                        50000</option>
                </select>
         </div>

       </div>

    <div class="grid md:flex grid-cols-2 justify-end space-x-4 w-full mt-6">
      <a href="<?php echo e(route('hostels.index')); ?>" class="px-4 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 font-bold text-white shadow-md shadow-gray-200 transition ease-in-out duration-200 translate-10">
        Reset
       </a>


      <button type="submit" class="px-4 py-2 rounded-lg bg-blue-400 hover:bg-blue-500 font-bold text-white shadow-md shadow-blue-200 transition ease-in-out duration-200 translate-10">
        Find
      </button>
    </div>
    </form>
  </div>
  



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <?php $__currentLoopData = $filteredHostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="hover:text-gray" href="<?php echo e(route('hostels.show', $hostel->id)); ?>">
  <div class="cursor-pointer rounded-xl bg-white p-3 shadow-lg hover:shadow-xl">
	<div class="relative flex items-end overflow-hidden rounded-xl">
	  <img src="https://thumbnails.production.thenounproject.com/gA9eZOvsBYSHrMumgrslmRGoBto=/fit-in/1000x1000/photos.production.thenounproject.com/photos/BCBA88B6-5B41-4B50-A786-E60CAA0ECDA3.jpg" alt="wallpaper" />

	  <div class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
		  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
		</svg>
                   <?php
                    $rating = number_format($ratings[$hostel->id], 1);
                    ?>
		              <span class="ml-1 text-sm text-slate-400">
                             <?php echo e($rating); ?>

						</span>
	  </div>
	</div>

	<div class="mt-1 p-2">
	  <h2 class="text-slate-700"><?php echo e($hostel->name); ?></h2>
	  <p class="mt-1 text-sm text-slate-400"><?php echo e($hostel->location); ?></p>

	  <div class="mt-3 flex items-end justify-between">
		<p>
		  <span class="text-lg font-bold text-blue-500">&#8373;<?php echo e($hostel->price_range); ?>+</span>
		  <span class="text-sm text-slate-400">/year</span>
		</p>

		<div class="group inline-flex rounded-xl bg-blue-100 p-2 hover:bg-blue-200">
		  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400 group-hover:text-orange-500" viewBox="0 0 20 20" fill="currentColor">
			<path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
		  </svg>
		</div>
	  </div>
	</div>
  </div>
  </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/hostels/index.blade.php ENDPATH**/ ?>