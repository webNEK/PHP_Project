<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="<?php echo e(asset('css/Signup.css')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
</head>
<body>
    <div class="signn">
        <div class="content">
            <div class="contentframe">
                <div class="content1">
                    <p class="reserved-directs-to">Reserved directs to WebNEK</p>
                    <p class="already-have-a-container">
                        Already have an account?
                        <a href="<?php echo e(url('/')); ?>" class="log-in">Log in</a>
                    </p>
                    <p class="admin-container">
                        Admin Login
                        <a href="<?php echo e(url('/AdminLogin')); ?>" class="log-in">Log in</a>
                    </p>

                    
                    <?php if($errors->any()): ?>
                        <div style="color:red; margin-bottom:10px;">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($error); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('signup')); ?>" method="POST" class="signup-form">
                        <?php echo csrf_field(); ?>
                        <div class="fullname-input">
                            <label for="fullname" class="full-name">Full Name</label>
                            <div class="nameinp">
                                <input type="text" id="fullname" name="fullname" class="input" placeholder="Enter your Full Name here" value="<?php echo e(old('fullname')); ?>" required>
                            </div>
                        </div>

                        <div class="email-input">
                            <label for="email" class="email">Email</label>
                            <div class="emailinp">
                                <input type="email" id="email" name="email" class="input" placeholder="Enter your Email here" value="<?php echo e(old('email')); ?>" required>
                            </div>
                        </div>

                        <div class="password-input">
                            <label for="password" class="password">Password</label>
                            <div class="passwordinp">
                                <input type="password" id="password" name="password" class="input" placeholder="Enter your Password here" required>
                            </div>
                        </div>

                        <div class="password-input1">
                            <label for="confirm_password" class="password-confirmation">Password confirmation</label>
                            <div class="nameinp">
                                <input type="password" id="confirm_password" name="confirm_password" class="input" placeholder="Enter your Password here" required>
                            </div>
                        </div>

                        <div class="buttoncreateacc">
                            <button type="submit" class="buttonframe-parent">
                                <div class="buttonframe"></div>
                                <span class="create-account">Create Account</span>
                            </button>
                        </div>
                    </form>

                    <h1 class="title">Create your Free Account</h1>
                    <h2 class="title1">WELCOME TO NOTESPHERE!</h2>
                </div>
            </div>
            <img class="sphereone-icon" alt="Sphere" src="<?php echo e(asset('images/Sphere.one.png')); ?>">
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/Signup.blade.php ENDPATH**/ ?>