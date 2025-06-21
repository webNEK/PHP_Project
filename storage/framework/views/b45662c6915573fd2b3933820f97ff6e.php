
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="<?php echo e(asset('/css/write.css')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&display=swap" />
</head>
<body>
    <div class="write">
        <div class="logo">
            <img src="<?php echo e(asset('images/logo_dark.png')); ?>" alt="Logo">
        </div>
        <nav class="navbar-nav">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>
        <div class="title">Write</div>
        <img class="write-child" alt="" src="<?php echo e(asset('images/Rectangle_top.png')); ?>">
        <img class="write-item" alt="" src="<?php echo e(asset('images/Rectangle_bottom.png')); ?>">

        <?php if($errors->any()): ?>
            <div style="color:red; margin-bottom:10px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="write-main-flex">
            <div class="write-left">
                <form class="writing-container" method="POST" action="<?php echo e(route('write.post')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($post) && $post->PostID): ?>
                        <input type="hidden" name="id" value="<?php echo e($post->PostID); ?>">
                    <?php endif; ?>
                    <input type="text" class="title-input" name="title" placeholder="Title" value="<?php echo e(old('title',$post->Title ?? '')); ?>" required>
                    <textarea class="content-input" name="content" placeholder="Write here..." required><?php echo e(old('content',$post->Content ?? '')); ?></textarea>
                    <div class="button-container">
                        <?php if(isset($post) && $post->PostID): ?>
                            <a href="<?php echo e(route('write.delete', ['id' => $post->PostID])); ?>" 
                            class="action-btn edit-btn"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete <img src="<?php echo e(asset('images/cop.png')); ?>" alt="Delete" />
                            </a>
                        <?php endif; ?>
                        <button type="submit" name="publish" class="action-btn publish-btn">
                            Publish <img src="<?php echo e(asset('images/icon-send.png')); ?>" alt="Publish">
                        </button>
                        <button type="submit" name="save" class="action-btn save-btn">
                            Save <img src="<?php echo e(asset('images/save.svg')); ?>" alt="Save" />
                        </button>
                    </div>

                    <div class="questions-container" style="top: -100px;">
                        <div class="question-group">
                            <h2 class="question-title">Which field of study this belong to?</h2>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="field" value="software" <?php echo e(old('field', $post->field ?? '') == 'software' ? 'checked' : ''); ?> required>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Software Engineering</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="field" value="civil" <?php echo e(old('field', $post->field ?? '') == 'civil' ? 'checked' : ''); ?>>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Civil Engineering</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="field" value="energy" <?php echo e(old('field', $post->field ?? '') == 'energy' ? 'checked' : ''); ?>>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Energy Systems Engineering</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="field" value="electronics" <?php echo e(old('field', $post->field ?? '') == 'electronics' ? 'checked' : ''); ?>>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Electronics and Communication Engineering</span>
                                </label>
                                <?php if(session('user')['field'] == 'admin'): ?>
                                    <label class="radio-option">
                                        <input type="radio" name="field" value="admin" <?php echo e(old('field', $post->field ?? '') == 'admin' ? 'checked' : ''); ?>>
                                        <span class="radio-custom"></span>
                                        <span class="option-label">Admin</span>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="question-group">
                            <h2 class="question-title">What grade this belong to?</h2>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="1" <?php echo e(old('grade', $post->grade ?? '') == '1' ? 'checked' : ''); ?> required>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">1st year</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="2" <?php echo e(old('grade', $post->grade ?? '') == '2' ? 'checked' : ''); ?>>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">2nd year</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="3" <?php echo e(old('grade', $post->grade ?? '') == '3' ? 'checked' : ''); ?>>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">3rd year</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="4" <?php echo e(old('grade', $post->grade ?? '') == '4' ? 'checked' : ''); ?>>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">4th year</span>
                                </label>
                                    <?php if(session('user')['field'] == 'admin'): ?>
                                    <label class="radio-option">
                                        <input type="radio" name="grade" value="admin" <?php echo e(old('grade', $post->grade ?? '') == 'admin' ? 'checked' : ''); ?>>
                                        <span class="radio-custom"></span>
                                        <span class="option-label">Admin</span>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/write.blade.php ENDPATH**/ ?>