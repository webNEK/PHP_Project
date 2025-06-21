<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1, width=device-width">
      <link rel="stylesheet" href="<?php echo e(asset('css/HomePage.css')); ?>" />
	  <script src="<?php echo e(asset('js/HomePage.js')); ?>"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" />
</head>
<body>
      <div class="homepage">
        <div class="logo">
               <img src="./images/logo_dark.png" alt="Logo">
        </div>
        <nav class="navbar-nav">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>
        <img class="homepage-child" alt="" src="./images/Rectangle_bottom.png">
        <img class="homepage-item" alt="" src="./images/Rectangle_top.png">
            
        <div class="for-you-section">
              <div class="title1">List</div>
        </div>
<div class="search">
    <form method="GET" action="<?php echo e(route('search')); ?>" style="display:flex; width:100%;">
        <input type="text" class="search-input" name="search" placeholder="What are you looking for?" value="<?php echo e($query ?? ''); ?>">
        <button class="search-button" type="submit">
            <img class="icon-search" alt="" src="./images/icon-search.png">
        </button>
    </form>
</div>

        <?php if(isset($query) && $query && $posts->isEmpty()): ?>
            <div style="z-index:2;"class="div">No notes found for "<?php echo e($query); ?>".</div>
        <?php elseif($posts->isNotEmpty()): ?>
            <div class="carousel-container">
                <button class="carousel-arrow left" onclick="moveCarousel(-1)">&#8592;</button>
                <div class="carousel-track" id="carouselTrack">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-card">
                            <img src="<?php echo e(asset('images/textimage.png')); ?>" alt="Post Image" class="carousel-image">
                            <div class="carousel-content">
                                <div class="carousel-title"><?php echo e($post->Title); ?></div>
                                <div class="carousel-snippet" style="color:#222; font-size:14px; margin-bottom:10px;">
                                    <?php echo e(Str::limit($post->Content, 100)); ?>

                                </div>
                                <a href="<?php echo e(url('/Read?id='.$post->PostID)); ?>" class="carousel-readmore">
                                    Readmore
                                    <img src="<?php echo e(asset('images/ReadMore.png')); ?>" alt="arrow" class="carousel-arrow-img">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="carousel-arrow right" onclick="moveCarousel(1)">&#8594;</button>
            </div>
        <?php endif; ?>

      </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/List.blade.php ENDPATH**/ ?>