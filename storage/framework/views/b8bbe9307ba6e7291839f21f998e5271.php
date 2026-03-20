

<?php $__env->startSection('content'); ?>

<h3>Create Tag</h3>

<form method="POST" action="<?php echo e(route('tags.store')); ?>">
<?php echo csrf_field(); ?>

<input class="form-control mb-2" name="name" placeholder="Name">

<button class="btn btn-success">Save</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/tags/create.blade.php ENDPATH**/ ?>