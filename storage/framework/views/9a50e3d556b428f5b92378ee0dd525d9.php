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
    <style>
        /* General styling for the post container */
.post-container {
    display: flex;
    flex-direction: column;
    width: 300px; /* Adjust width for smaller size */
    margin: 0 auto; /* Center horizontally */
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

/* Styling for the post image */
.post-image {
    width: 100%; /* Full width of container */
    height: 180px; /* Adjust height as needed */
    object-fit: cover; /* Cover the container without distortion */
}

/* Styling for the post content */
.post-content {
    padding: 15px;
}

/* Styling for the post title */
.post-title {
    font-size: 18px; /* Smaller title font size */
    margin: 0 0 10px 0; /* Margin below the title */
}

/* Styling for post meta */
.post-meta {
    font-size: 12px; /* Smaller font size for meta info */
    color: #777;
    margin-bottom: 15px; /* Margin below meta info */
}

/* Styling for the post body */
.post-body {
    font-size: 14px; /* Smaller font size for body text */
    color: #333;
}

    </style>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Display your post content -->
    <div class="post-container">
        <img class="post-image" src="<?php echo e(asset('storage/'.$post->image_path)); ?>" alt="<?php echo e($post->title); ?>">
        <div class="post-content">
            <h1 class="post-title"><?php echo e($post->title); ?></h1>
            <div class="post-meta">
                <p>Posted by <?php echo e($post->user->username); ?> • <?php echo e($post->created_at->diffForHumans()); ?></p>
            </div>
            <div class="post-body">
                <?php echo e($post->body); ?> <a href="<?php echo e(route('post.show',$post)); ?>">Read more &rarr;</a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Display pagination links -->
<div class="pagination-links">
    <?php echo e($posts->links('pagination::bootstrap-5')); ?>


</div>

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
<?php /**PATH C:\Users\gndja\Desktop\Post app\resources\views/post/index.blade.php ENDPATH**/ ?>