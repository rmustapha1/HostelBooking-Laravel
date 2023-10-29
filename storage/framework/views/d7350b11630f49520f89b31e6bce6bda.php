

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Hostels</h1>
    <form action="<?php echo e(route('hostels.index')); ?>" method="GET">
        <div class="form-group">
            <label for="school">Schools:</label>
            <select name="school" class="form-control">
                <option value="">All</option>
                <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($school->id); ?>"><?php echo e($school->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <select name="price" class="form-control">
                <option value="">All</option>
                <option value="1">&lt; $50</option>
                <option value="2">$50 - $100</option>
                <option value="3">&gt; $100</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <hr>

    <?php if($message): ?>
    <div class="alert alert-info"><?php echo e($message); ?></div>
    <?php else: ?>
    <!-- Display filtered hostels here -->
    <div class="row">
        <?php $__currentLoopData = $filteredHostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card">
                <img src="<?php echo e($hostel->image_url); ?>" class="card-img-top" alt="<?php echo e($hostel->name); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($hostel->name); ?></h5>
                    <p class="card-text"><?php echo e($hostel->location); ?></p>
                    <p class="card-text"><?php echo e($hostel->price); ?></p>
                    <a href="<?php echo e(route('hostels.show', $hostel->id)); ?>" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>



</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\HostelBooking\resources\views/hostels.blade.php ENDPATH**/ ?>