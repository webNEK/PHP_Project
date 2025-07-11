<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="<?php echo e(asset('css/Information.css')); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" />
</head>
<body>
    <div class="information">
        <div class="logo">
            <img class="logo-child" alt="" src="./images/logo.png">
        </div>
        <div class="title1">Let's get to know you better!</div>
        
        <form class="info-form" method="POST"">
            <?php echo csrf_field(); ?>
            <div class="question-group">
                <label class="question-label">What's your current year of study?</label>
                <span class="select-text">Select one option.</span>
                
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="study-year" value="1st">
                        <span>1st year</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="study-year" value="2nd">
                        <span>2nd year</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="study-year" value="3rd">
                        <span>3rd year</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="study-year" value="4th">
                        <span>4th year</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="study-year" value="graduate">
                        <span>Graduate student</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="study-year" value="not-student">
                        <span>Not a student</span>
                    </label>
                </div>
            </div>

            <div class="question-group">
                <label class="question-label">What's your field of study?</label>
                <span class="select-text">Select one option.</span>
                
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="field" value="software">
                        <span>Software Engineering</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="field" value="civil">
                        <span>Civil Engineering</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="field" value="energy">
                        <span>Energy Systems Engineering</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="field" value="electronics">
                        <span>Electronics and Communication Engineering</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="field" value="other">
                        <span>Other</span>
                    </label>
                </div>
            </div>

            <div class="buttoncreateacc">
                <button type="submit" class="buttonframe-parent">
                    <div class="buttonframe"></div>
                    <span class="continue">Continue</span>
                </button>
            </div>
        </form>

        <img class="sphere_book" alt="" src="./images/Sphere_book.png">
    </div>
</body>
</html><?php /**PATH C:\Users\eyupm\NoteSphere\resources\views/Information.blade.php ENDPATH**/ ?>