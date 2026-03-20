

<?php $__env->startSection('content'); ?>

<h3>Create Post</h3>

<form method="POST" action="<?php echo e(route('posts.store')); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<input class="form-control mb-2" name="title" placeholder="Title">

<textarea class="form-control mb-2" name="content" placeholder="Content"></textarea>

<input type="file" class="form-control mb-2" name="thumbnail">

<select class="form-control mb-2" name="category_id">
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<div class="mb-2">
<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<label class="me-2">
<input type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>"> <?php echo e($tag->name); ?>

</label>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<select class="form-control mb-2" name="status">
<option value="draft">Draft</option>
<option value="published">Published</option>
</select>

<input type="datetime-local" class="form-control mb-2" name="published_at">

<button class="btn btn-success">Save</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/posts/create.blade.php ENDPATH**/ ?>