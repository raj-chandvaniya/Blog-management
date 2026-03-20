<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Blog Panel</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="<?php echo e(route('posts.index')); ?>" class="nav-link">Posts</a></li>
                <li class="nav-item"><a href="<?php echo e(route('categories.index')); ?>" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="<?php echo e(route('tags.index')); ?>" class="nav-link">Tags</a></li>
                <?php if(Auth()->check()): ?>
                    <li class="nav-item"><a href="<?php echo e(route('logout')); ?>" class="nav-link">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html><?php /**PATH D:\xampp\htdocs\PracticeProject\resources\views/layouts/app.blade.php ENDPATH**/ ?>