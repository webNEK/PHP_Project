<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
</head>
<body>
    <div class="login">
        <img class="blobsvector-icon" alt="" src="{{ asset('./images/BlobsVector_three.svg') }}">
        <img class="blobsvector-icon1" alt="" src="{{ asset('./images/BlobsVector.svg') }}">
        <img class="blobsvector-icon2" alt="" src="{{ asset('./images/BlobsVector_two.svg') }}">
        <img class="sphereone-icon" alt="" src="{{ asset('/images/Sphere.one.png') }}">

        <div class="content">
            <div class="contentframe"></div>
            <div class="content1">
                <div class="reserved-directs-to">Reserved directs to WebNEK</div>
            
                    @if ($errors->any())
                        <div style="color:red; margin-bottom:10px; top: 20px;">
                            @foreach ($errors->all() as $error)
                                <script>
                                    alert("{{ $error }}");
                                </script>
                            @endforeach
                        </div>
                    @endif

                <form action="/Login" method="POST" class="login-form">
                    @csrf
                    <div class="title1">WELCOME BACK!</div>
                    <div class="title">Login</div>
                    @php
                        $remembered = json_decode(request()->cookie('remembered_login'), true);
                    @endphp
                    <div class="email-input">
                        <label class="email">Email</label>
                        <div class="emailinp">
                            <input type="email" class="input" id="email" name="email" placeholder="Enter your Email here"
                                value="{{ $remembered['email'] ?? '' }}" required>
                        </div>
                    </div>

                    <div class="password-input">
                        <label class="password">Password</label>
                        <div class="passwordinp">
                            <input type="password" class="input" id="password" name="password" placeholder="Enter your Password here"
                                value="{{ $remembered['password'] ?? '' }}" required>
                        </div>
                    </div>
                    <div class="forgot-password">
                    <label style="font-size:15px; color:#fff;">
                        <input type="checkbox" name="remember" {{ !empty($remembered['remember']) ? 'checked' : '' }}>
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

