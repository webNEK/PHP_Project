<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="<?php echo e(asset('css/Login.css')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
</head>
<body>
    <div class="login">
        <img class="blobsvector-icon" alt="" src="<?php echo e(asset('./images/BlobsVector_three.svg')); ?>">
        <img class="blobsvector-icon1" alt="" src="<?php echo e(asset('./images/BlobsVector.svg')); ?>">
        <img class="blobsvector-icon2" alt="" src="<?php echo e(asset('./images/BlobsVector_two.svg')); ?>">
        <img class="sphereone-icon" alt="" src="<?php echo e(asset('/images/Sphere.one.png')); ?>">

        <div class="content">
            <div class="contentframe"></div>
            <div class="content1">
                <div class="reserved-directs-to">Reserved directs to WebNEK</div>
            
                    <?php if($errors->any()): ?>
                        <div style="color:red; margin-bottom:10px; top: 20px;">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <script>
                                    alert("<?php echo e($error); ?>");
                                </script>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                <form action="/Login" method="POST" class="login-form">
                    <?php echo csrf_field(); ?>
                    <div class="title1">WELCOME BACK!</div>
                    <div class="title">Login</div>
                    <?php
                        $remembered = json_decode(request()->cookie('remembered_login'), true);
                    ?>
                    <div class="email-input">
                        <label class="email">Email</label>
                        <div class="emailinp">
                            <input type="email" class="input" id="email" name="email" placeholder="Enter your Email here"
                                value="<?php echo e($remembered['email'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="password-input">
                        <label class="password">Password</label>
                        <div class="passwordinp">
                            <input type="password" class="input" id="password" name="password" placeholder="Enter your Password here"
                                value="<?php echo e($remembered['password'] ?? ''); ?>" required>
                        </div>
                    </div>
                    <div class="forgot-password">
                    <label style="font-size:15px; color:#fff;">
                        <input type="checkbox" name="remember" <?php echo e(!empty($remembered['remember']) ? 'checked' : ''); ?>>
                            Remember me
                    </label>
                    </div>    
                    <div class="buttoncreateacc">
                        <button type="submit" class="buttonframe-parent">
                            <div class="buttonframe"></div>
                            <span class="log-in">Log in</span>
                        </button>
                    </div>
                </form>

                <div class="dont-have-an-container">
                    <span>Don't have an account?</span>
                    <a href="Signup" class="sign-in">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/Login.blade.php ENDPATH**/ ?>