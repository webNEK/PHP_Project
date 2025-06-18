<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <meta name="description" content="NoteSphere Account Page">
    <title>NoteSphere - Account</title>
    <link rel="stylesheet" href="{{ asset('css/account.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&display=swap">
</head>
<body>
      
      <div class="account">
        <img class="account-child" alt="" src="{{asset('./images/Rectangle_top.png')}}">
        <img class="account-item" alt="" src="{{asset('./images/Rectangle_bottom.png')}}">		
        <div class="logo">
               <img src="{{asset('./images/logo_dark.png')}}" alt="Logo">
        </div>

        <nav class="navbar-nav">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>
        <div class="hello">
              <div class="title1">Account</div>
        </div>
        
        <div class="user-information">User Information</div>
        <div class="uploaded-notes">Uploaded Notes</div>
        <a href="/EditAccount" class="edit-profile action-link">Edit Profile</a>
        <a href="/DeleteAccount" class="delete-account action-link">Delete account</a>
        
        <div class="search">
            <input type="text" class="search-input" placeholder="What are you looking for?">
            <button class="search-button">
                <img class="icon-search" alt="" src="{{asset('./images/icon-search.png')}}">
            </button>
        </div>

        <!-- Dinamik kullanıcı bilgileri -->
        <div style="position:absolute;top:220px;left:28px;width:400px;">
            <div><b>Name:</b> {{ $user->Username ?? '-' }}</div>
            <div><b>Email:</b> {{ $user->Email ?? '-' }}</div>
            <div><b>Password:</b> {{ ($user->Password) }}</div>
            <div><b>Field of Study:</b> {{ $user->field ?? '-' }}</div>
            <div><b>Grade:</b> {{ $user->years ?? '-' }}</div>
            <div><b>DisplayName:</b> {{ $user->DisplayName }}</div>
            <div><b>Bio:</b> {{ $user->Bio }}</div>
            <div><b>Created:</b> {{ $user->Created }}</div>
        </div>
      </div>
</body>
</html>