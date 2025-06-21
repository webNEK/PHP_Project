<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <meta name="description" content="NoteSphere Account Page">
    <title>NoteSphere - Account</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/account.css')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&display=swap">
</head>
<body>
      
      <div class="account">
        <img class="account-child" alt="" src="<?php echo e(asset('./images/Rectangle_top.png')); ?>">
        <img class="account-item" alt="" src="<?php echo e(asset('./images/Rectangle_bottom.png')); ?>">		
        <div class="logo">
               <img src="<?php echo e(asset('./images/logo_dark.png')); ?>" alt="Logo">
        </div>

        <nav class="navbar-nav">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>
        <div class="hello">
              <div class="title1">Account</div>
        </div>
        
        <div class="user-information" >User Information</div>
        <div class="uploaded-notes">
            <div class="uploaded-notes-title">Uploaded Notes</div>
            <div class="uploaded-notes-list">
                <?php if($posts->isEmpty()): ?>
                    <div class="note-item empty">No notes yet.</div>
                <?php else: ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div c  lass="note-item">
                             <?php echo e($post->Title); ?>

                                <span class="note-span"style="">
                                    <?php echo e($post->status); ?>

                                </span>
                            <a href="<?php echo e(url('/write?id='.$post->PostID)); ?>" class="note-read-link">Edit</a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <a href="/EditAccount" class="edit-profile action-link">Edit Profile</a>
        </div>
        <div>
            <a href="/Account/DeleteAccount" class="delete-account action-link" onclick="return confirm('Are you sure you want to delete your account?');">Delete account</a>
        </div>
        <div>
            <a href="<?php echo e(route('account.logout')); ?>" class="logout action-link" style="z-index:2">Logout</a>
        </div>
        <div class="search">
            <form method="GET" action="<?php echo e(route('search')); ?>" style="display:flex; width:100%;">
                <input type="text" class="search-input" name="search" placeholder="What are you looking for?" value="<?php echo e($query ?? ''); ?>">
                <button class="search-button" type="submit">
                    <img class="icon-search" alt="" src="./images/icon-search.png">
                </button>
            </form>
        </div>

        <!-- Dinamik kullanıcı bilgileri -->
        <div class="user-details">
            <div>Name: <?php echo e($user->Username ?? '-'); ?></div>
            <div>Email: <?php echo e($user->Email ?? '-'); ?></div>
            <div>Password:<?php echo e(($user->Password)); ?></div>
            <div>Field of Study: <?php echo e($user->field ?? '-'); ?></div>
            <div>Grade: <?php echo e($user->years ?? '-'); ?></div>
            <div>DisplayName: <?php echo e($user->DisplayName); ?></div>
            <div>Created: <?php echo e($user->CreatedAt); ?></div>
        </div>
      </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/account.blade.php ENDPATH**/ ?>