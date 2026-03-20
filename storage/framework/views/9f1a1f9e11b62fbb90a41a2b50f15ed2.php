

<?php $__env->startSection('content'); ?>

<h3>Edit Post</h3>

<form method="POST" action="<?php echo e(route('posts.update',$post)); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

<input class="form-control mb-2" name="title" value="<?php echo e($post->title); ?>">

<textarea class="form-control mb-2" name="content"><?php echo e($post->content); ?></textarea>

<input type="file" name="thumbnail" class="form-control mb-2">

<?php if($post->thumbnail): ?>
    <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" width="100" class="mb-2">
<?php endif; ?>

<select class="form-control mb-2" name="category_id">
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cat->id); ?>" <?php echo e($post->category_id == $cat->id ? 'selected':''); ?>>
<?php echo e($cat->name); ?>

</option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<div class="mb-2">
<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<input type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>"
<?php echo e($post->tags->contains($tag->id) ? 'checked':''); ?>>
<?php echo e($tag->name); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<select class="form-control mb-2" name="status">
<option value="draft" <?php echo e($post->status=='draft'?'selected':''); ?>>Draft</option>
<option value="published" <?php echo e($post->status=='published'?'selected':''); ?>>Published</option>
</select>

<input type="datetime-local" class="form-control mb-2" name="published_at"
value="<?php echo e($post->published_at); ?>">

<button class="btn btn-primary">Update</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/posts/edit.blade.php ENDPATH**/ ?>