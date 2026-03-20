

<?php $__env->startSection('content'); ?>

<h3>Tags</h3>

<a href="<?php echo e(route('tags.create')); ?>" class="btn btn-primary mb-2">Add</a>

<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="border p-2 mb-2 d-flex justify-content-between">
    <?php echo e($tag->name); ?>


    <div>
        <a href="<?php echo e(route('tags.edit',$tag)); ?>" class="btn btn-warning btn-sm">Edit</a>

        <form method="POST" action="<?php echo e(route('tags.destroy',$tag)); ?>" class="d-inline" onsubmit="return confirm('Are You Sure?')">
        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/tags/index.blade.php ENDPATH**/ ?>