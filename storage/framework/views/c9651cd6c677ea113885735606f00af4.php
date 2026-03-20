

<?php $__env->startSection('content'); ?>

<h2>Blog</h2>

<div class="row">

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4 mb-3">
            <div class="card">

                <?php if($post->thumbnail): ?>
                <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="card-img-top" alt="<?php echo e($post->title); ?>">
                <?php endif; ?>

                <div class="card-body">
                <h5><?php echo e($post->title); ?></h5>

                <p><?php echo e(Str::limit($post->content,100)); ?></p>

                <a href="/post/<?php echo e($post->slug); ?>" class="btn btn-primary">Read More</a>
                </div>

            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/frontend/index.blade.php ENDPATH**/ ?>