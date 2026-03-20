

<?php $__env->startSection('content'); ?>

<h3>Edit Tag</h3>

<form method="POST" action="<?php echo e(route('tags.update',$tag)); ?>">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

<input class="form-control mb-2" name="name" value="<?php echo e($tag->name); ?>">

<button class="btn btn-primary">Update</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/tags/edit.blade.php ENDPATH**/ ?>