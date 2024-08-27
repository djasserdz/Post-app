<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['posts']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['posts']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .post-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }
        .post-image {
            width: 100%;
            height: auto;
            display: block;
        }
        .post-content {
            padding: 20px;
        }
        .post-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .post-meta {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 15px;
        }
        .post-body {
            font-size: 16px;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post-container">
            <img class="post-image" src="<?php echo e(asset('storage/'.$post->image_path)); ?>" alt="<?php echo e($post->title); ?>">
            <div class="post-content">
                <h1 class="post-title"><?php echo e($post->title); ?></h1>
                <div class="post-meta">
                    <p>Posted by <?php echo e($post->user->username); ?> • <?php echo e($post->created_at->diffForHumans()); ?></p>
                </div>
                <div class="post-body">
                    <?php echo e($post->body); ?>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\Users\gndja\Desktop\Post app\resources\views/components/postcard.blade.php ENDPATH**/ ?>