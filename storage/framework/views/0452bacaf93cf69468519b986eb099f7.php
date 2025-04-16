<!DOCTYPE html>
<html>
<head>
    <title>Tin mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="display-4 text-success">10 Tin Mới Nhất</h1>
        <ul class="list-group">
            <?php $__currentLoopData = $tinMoi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item list-group-item-light"><?php echo e($tin->title); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <div class="mt-3">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary me-2">Quay lại trang chủ</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp2\htdocs\PHP3\LAB\LAB2\resources\views/tinmoi.blade.php ENDPATH**/ ?>