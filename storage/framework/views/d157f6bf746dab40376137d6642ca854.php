
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="<?php echo e(asset('css/Edit_Account.css')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
</head>
<body>
    <div class="edit-account">
        <div class="logo">
            <div class="logo-text">NoteSphere</div>
        </div>

        <nav class="navbar">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>

        <div class="search">
            <form method="GET" action="<?php echo e(route('search')); ?>" style="display:flex; width:100%;">
                <input type="text" class="search-input" name="search" placeholder="What are you looking for?" value="<?php echo e($query ?? ''); ?>">
                <button class="search-button" type="submit">
                    <img class="icon-search" alt="" src="./images/icon-search.png">
                </button>
            </form>
        </div>

        <div class="content">
            <h1 class="page-title">Edit Account</h1>

            <form class="edit-form" method="POST" action="<?php echo e(route('account.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-field">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name', $user->Username ?? '')); ?>" class="input-dark" required>
                </div>

                <div class="form-field">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $user->Email ?? '')); ?>" class="input-dark" required>
                </div>

                <div class="form-field">
                    <label>Field of study</label>
                    <select name="field" class="input-dark" required>
                        <option value="software" <?php echo e(old('field', $user->field ?? '') == 'software' ? 'selected' : ''); ?>>Software Engineering</option>
                        <option value="civil" <?php echo e(old('field', $user->field ?? '') == 'civil' ? 'selected' : ''); ?>>Civil Engineering</option>
                        <option value="energy" <?php echo e(old('field', $user->field ?? '') == 'energy' ? 'selected' : ''); ?>>Energy Systems Engineering</option>
                        <option value="electronics" <?php echo e(old('field', $user->field ?? '') == 'electronics' ? 'selected' : ''); ?>>Electronics Engineering</option>
                        <option value="none" <?php echo e(old('field', $user->field ?? '') == 'none' ? 'selected' : ''); ?>>None</option>
                    </select>
                </div>

                <div class="form-field">
                    <label>Grade</label>
                    <select name="grade" class="input-dark" required>
                        <option value="1" <?php echo e(old('grade', $user->years ?? '') == '1' ? 'selected' : ''); ?>>1st year</option>
                        <option value="2" <?php echo e(old('grade', $user->years ?? '') == '2' ? 'selected' : ''); ?>>2nd year</option>
                        <option value="3" <?php echo e(old('grade', $user->years ?? '') == '3' ? 'selected' : ''); ?>>3rd year</option>
                        <option value="4" <?php echo e(old('grade', $user->years ?? '') == '4' ? 'selected' : ''); ?>>4th year</option>
                    </select>
                </div>

                <div class="actions">
                    <button class="save-btn" type="submit">Save Changes</button>
                    <a href="/Account/DeleteAccount" class="delete-account action-link" onclick="return confirm('Are you sure you want to delete your account?');" style="color:white;">Delete account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/Edit_account.blade.php ENDPATH**/ ?>