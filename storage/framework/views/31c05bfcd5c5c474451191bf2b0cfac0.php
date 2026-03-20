

<?php $__env->startSection('content'); ?>

<h3>Categories</h3>

<a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary mb-2">Add</a>

<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="border p-2 mb-2 d-flex justify-content-between">
    <?php echo e($cat->name); ?>


    <div>
        <a href="<?php echo e(route('categories.edit',$cat)); ?>" class="btn btn-warning btn-sm">Edit</a>

        <form action="<?php echo e(route('categories.destroy',$cat)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are You Sure?')">
        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
        <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/categories/index.blade.php ENDPATH**/ ?>