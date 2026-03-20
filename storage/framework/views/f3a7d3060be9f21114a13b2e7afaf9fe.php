

<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between mb-3">
        <h3>Posts</h3>
        <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">Add Post</a>
    </div>

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Status</th>
        <th>Author</th>
        <th>Published</th>
        <th>Action</th>
    </tr>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($post->title); ?></td>
            <td><?php echo e($post->category->name); ?></td>
            <td>
                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge bg-info"><?php echo e($tag->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <span class="badge bg-<?php echo e($post->status == 'published' ? 'success':'secondary'); ?>">
                <?php echo e($post->status); ?>

                </span>
            </td>
            <td><?php echo e($post->user->name); ?></td>
            <td><?php echo e($post->published_at); ?></td>

            <td>
                <a href="<?php echo e(route('posts.edit',$post)); ?>" class="btn btn-warning btn-sm">Edit</a>

                <form action="<?php echo e(route('posts.destroy',$post)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are You Sure?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

<?php echo e($posts->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/posts/index.blade.php ENDPATH**/ ?>