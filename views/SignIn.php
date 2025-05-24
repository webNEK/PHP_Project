
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="./index.css" />
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
                        <a href="login.php" class="log-in">Log in</a>
                    </p>

                    <form action="" method="POST" class="signup-form">
                        <div class="fullname-input">
                            <label for="fullname" class="full-name">Full Name</label>
                            <div class="nameinp">
                                <input type="text" id="fullname" name="fullname" class="input" placeholder="Enter your Full Name here" required>
                            </div>
                        </div>

                        <div class="email-input">
                            <label for="email" class="email">Email</label>
                            <div class="emailinp">
                                <input type="email" id="email" name="email" class="input" placeholder="Enter your Email here" required>
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
            <img class="sphereone-icon" alt="Sphere" src="views/images/Sphere.one.png">
        </div>
    </div>
</body>
</html>

<style>
	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.contentframe {
  	position: absolute;
  	top: 0px;
  	right: 0px;
  	border-radius: 25px 0px 0px 25px;
  	background-color: #fcfeff;
  	width: 738px;
  	height: 721px;
}
.reserved-directs-to {
  	position: absolute;
  	top: 639.88px;
  	left: 128px;
  	display: inline-block;
  	width: 308px;
  	height: 16px;
}
.log-in {
  	color: #000;
	display:flex;
}
.already-have-a-container {
  	position: absolute;
  	top: 576.7px;
  	left: 0px;
  	font-size: 18px;
  	display: inline-block;
  	width: 291px;
  	height: 19.1px;
}
.buttonframe {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 10px;
  	background-color: #000;
  	width: 297px;
  	height: 42.2px;
	display: flex;
  	justify-content: center;
  	align-items: center;
}
.create-account {
  	position: absolute;
  	top: 7px;
  	left: 45px;
  	font-weight: 500;
  	display: inline-block;
  	width: 210px;
  	height: 27.7px;
	color:#fff;
	font-family: 'Poppins', sans-serif;
	font-size: 20px;
	text-align: center;
  	line-height: 27.7px;
  	white-space: nowrap;
  	text-decoration: none;
  	cursor: pointer;

}
.buttonframe-parent {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 297px;
  	height: 42.2px;
	border:none;
}
.buttoncreateacc {
  	position: absolute;
  	top: 474.42px;
  	left: 139px;
  	width: 297px;
  	height: 42.2px;
  	font-size: 26px;
  	color: #fff;
}
.password {
  	position: absolute;
  	top: 0px;
  	left: 4px;
  	font-weight: 500;
  	display: inline-block;
  	width: 229.8px;
  	height: 21px;
}
.enter-your-password {
  	position: absolute;
  	top: 12.03px;
  	left: 34px;
  	display: inline-block;
  	width: 220.1px;
  	height: 21.1px;
}
.input {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 20px;
  	background-color: rgba(176, 186, 195, 0.4);
  	width: 524.1px;
  	height: 45.8px;
	padding-left: 25px; 
    font-family: 'Poppins', sans-serif;
    font-size: 16px; 
    border: none; 
    outline: none; 
}
.passwordinp {
  	position: absolute;
  	top: 32.09px;
  	left: 0px;
  	width: 524.1px;
  	height: 45.8px;
  	font-size: 16px;
  	color: rgba(0, 0, 0, 0.5);
}
.password-input {
  	position: absolute;
  	top: 282.89px;
  	left: 18px;
  	width: 524.1px;
  	height: 77.9px;
}
.password-confirmation {
  	position: absolute;
  	top: 0px;
  	left: 5px;
  	font-weight: 500;
  	display: inline-block;
  	width: 256px;
  	height: 21.1px;
}
.password-input1 {
  	position: absolute;
  	top: 368.12px;
  	left: 21px;
  	width: 524.1px;
  	height: 74.8px;
}
.email {
  	position: absolute;
  	top: 0px;
  	left: 1px;
  	font-weight: 500;
  	display: inline-block;
  	width: 165.6px;
  	height: 21.7px;
}
.enter-your-email {
  	position: absolute;
  	top: 11.97px;
  	left: 34.94px;
  	display: inline-block;
  	width: 183.4px;
  	height: 21.1px;
}
.emailinp {
  	position: absolute;
  	top: 29.44px;
  	left: 0px;
  	width: 524.1px;
  	height: 45.8px;
  	font-size: 16px;
  	color: rgba(0, 0, 0, 0.5);
}
.email-input {
  	position: absolute;
  	top: 200.66px;
  	left: 21px;
  	width: 524.1px;
  	height: 75.2px;
}
.full-name {
  	position: absolute;
  	top: 0px;
  	left: 3px;
  	font-weight: 500;
  	display: inline-block;
  	width: 172.7px;
  	height: 21px;
}
.enter-your-fulll {
  	position: absolute;
  	top: 11.97px;
  	left: 34.94px;
  	display: inline-block;
  	width: 227.1px;
  	height: 21.1px;
}
.nameinp {
  	position: absolute;
  	top: 29.08px;
  	left: 0px;
  	width: 524.1px;
  	height: 45.8px;
  	font-size: 16px;
  	color: rgba(0, 0, 0, 0.5);
}
.fullname-input {
  	position: absolute;
  	top: 118.43px;
  	left: 21px;
  	width: 524.1px;
  	height: 74.8px;
}
.title {
  	position: absolute;
  	top: 49.26px;
  	left: 101px;
  	font-size: 26px;
  	font-weight: 600;
  	color: #000;
  	display: inline-block;
  	width: 363px;
  	height: 27.7px;
}
.title1 {
  	position: absolute;
  	top: 0px;
  	left: 61px;
  	font-size: 32px;
  	font-weight: 600;
  	color: #000;
  	display: inline-block;
  	width: 438px;
  	height: 42px;
}
.content1 {
  	position: absolute;
  	top: 37px;
  	left: 78px;
  	width: 545.1px;
  	height: 655.9px;
}
.content {
  	position: absolute;
  	top: 0px;
  	right: 0px;
  	width: 738px;
  	height: 100%;
}
.sphereone-icon {
  	position: absolute;
  	top: 77px;
  	left: -480px;
  	width: 554px;
  	height: 547px;
  	object-fit: cover;
}
.signn {
  	width: 100%;
  	position: relative;
  	background-color: #000;
  	height: 100vh;
  	overflow: hidden;
  	text-align: left;
  	font-size: 20px;
  	color: #7c838a;
  	font-family: Poppins;
}
</style>
