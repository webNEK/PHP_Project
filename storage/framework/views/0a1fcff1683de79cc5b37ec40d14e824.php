<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="<?php echo e(asset('css/read.css')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/Read.js')); ?>"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
</head>
<body>
    <div class="reading">
        <div class="logo">
            <div class="title">NoteSphere</div>
        </div>

        <nav class="navbar">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>

        <div class="search-bar">
            <input type="text" placeholder="What are you looking for?" class="search-input">
            <button class="search-btn">
                <img src="<?php echo e(asset('images/icon-search.png')); ?>" alt="Search">
            </button>
        </div>

        <div class="content">
            <div class="article">
                <h1 class="article-title"><?php echo e($post->Title); ?></h1>
                <button 
                    id="like-btn"
                    data-liked="<?php echo e($userLiked ? '1' : '0'); ?>"
                    data-post="<?php echo e($post->PostID); ?>"
                    class="add-list-btn<?php echo e($userLiked ? ' active' : ''); ?>"
                >
                    👍 Like (<span id="like-count"><?php echo e($likeCount ?? 0); ?></span>)
                </button>
                <div class="article-content">
                    <p><?php echo e($post->Content); ?></p>
                </div>
                <p class="publisher">
                    Published by 
                    <?php if($author): ?>
                        <?php echo e($author->Username); ?>

                    <?php else: ?>
                        #<?php echo e($post->UserID); ?>

                    <?php endif; ?>
                </p>
            </div>
        </div>

        <div class="comment-section">
            <h3>Comments</h3>
            <div class="comments-list">
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="comment-item">
                        <p class="comment-author"><?php echo e($comment->Username); ?></p>
                        <p class="comment-text"><?php echo e($comment->Content); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="comment-item">No comments yet.</div>
                <?php endif; ?>
            </div>

            <!-- Yorum ekleme formu klasik POST -->
            <form method="POST" action="<?php echo e(route('read.comment')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="post_id" value="<?php echo e($post->PostID); ?>">
                <textarea class="comment-input" name="comment" placeholder="Write your comment here..." required></textarea>
                <button class="add-comment-btn" type="submit">
                    Add Comment
                    <img src="<?php echo e(asset('images/plus-circle.svg')); ?>" alt="Add">
                </button>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/Read.blade.php ENDPATH**/ ?>