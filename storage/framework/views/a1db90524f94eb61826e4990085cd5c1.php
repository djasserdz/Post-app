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

<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="dashboard">
        <h2>Manage Posts</h2>
        <a href="<?php echo e(route('post.create')); ?>"><button>Add post</button></a>

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
                    <div class="post-actions">
                        <!-- Update Button -->
                        <a href="<?php echo e(route('post.edit',$post->id)); ?>" class="btn btn-update">Update</a>

                        <!-- Delete Button with Form -->
                        <form action="<?php echo e(route('post.destroy',$post)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div>
            <?php echo e($posts->links('pagination::bootstrap-5')); ?>

        </div>
    </div>

    <style>
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .dashboard h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #2c3e50;
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
        .post-actions {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }
        .btn {
            padding: 10px 15px;
            margin-left: 10px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-update {
            background-color: #3498db;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-update:hover {
            background-color: #2980b9;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\gndja\Desktop\Post app\resources\views/user/dashboard.blade.php ENDPATH**/ ?>