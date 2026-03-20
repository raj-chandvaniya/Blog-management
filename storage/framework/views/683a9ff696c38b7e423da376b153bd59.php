

<?php $__env->startSection('content'); ?>

<h1><?php echo e($post->title); ?></h1>

    <?php if($post->thumbnail): ?>
        <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="img-fluid mb-3">
    <?php endif; ?>

    <p><?php echo e($post->content); ?></p>

    <p><b>Author:</b> <?php echo e($post->user->name); ?></p>
    <p><b>Category:</b> <?php echo e($post->category->name); ?></p>

    <p>
    <b>Tags:</b>
    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="badge bg-info"><?php echo e($tag->name); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/frontend/show.blade.php ENDPATH**/ ?>