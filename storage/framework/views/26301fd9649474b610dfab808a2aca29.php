

<?php $__env->startSection('content'); ?>

<div class="container hostel mt-20">
    <div class="page-header">
        <h1 class="page-title">Hostels</h1>
    </div>
    <p class="page-content mb-3 mt-3 text-muted">Click and start booking process.</p>

    <form action="<?php echo e(route('hostels.index')); ?>" method="GET">
        <div class="row mb-3">
            <div class="col-md-4 mb-3">
                <select name="school"
                    class="form-select w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Schools</option>
                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($school->id); ?>" <?php echo e($school->id == $selectedSchool ? 'selected' : ''); ?>>
                        <?php echo e($school->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <select name="price_range"
                    class="form-select w-full bg-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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
            <div class="col-md-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">Filter</button>
            </div>
        </div>
    </form>

    <div class="row">
        <?php $__currentLoopData = $filteredHostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 mb-5 hostel-item">
            <div class="card mb-3 d-flex flex-column rounded-lg border-none shadow-md">
                <div class="">
                    <img src="<?php echo e($hostel->img_url); ?>" class="h-full w-full object-cover object-center rounded-md"
                        alt="<?php echo e($hostel->img_url); ?>">
                    <div class="img-price">
                        <h6><i class="bis">&#8373;</i><?php echo e($hostel->price_range); ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($hostel->name); ?></h5>
                    <span><?php echo e($hostel->location); ?></span>
                    <?php
                    $rating = number_format($ratings[$hostel->id], 1);
                    ?>
                    <div class="star-rating">
                        <?php for($i = 1; $i <= 5; $i++): ?> <?php if($rating>= $i): ?>
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            <?php elseif($rating > ($i - 1)): ?>
                            <i class="bi bi-star-half text-yellow-500"></i>
                            <?php else: ?>
                            <i class="bi bi-star text-yellow-500"></i>
                            <?php endif; ?>
                            <?php endfor; ?>
                            <?php echo e($rating); ?>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text text-muted">
                                <i class="bi bi-calendar3"></i>Duration: 1yr
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text text-muted">
                                <?php
                                $rowCount = count($hostel->rooms);
                                ?>
                                <i class="bi bi-building"></i><?php echo e($rowCount); ?> rooms available
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hostel-info">
                    <h4><?php echo e($hostel->name); ?></h4>
                    <p><i class="bi">&#8373;</i><?php echo e($hostel->price_range); ?>/yr</p>
                    <a href="<?php echo e(route('hostels.show', $hostel->id)); ?>" class="details-link" title="More Details"><i
                            class="bi bi-link"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/hostels/index.blade.php ENDPATH**/ ?>