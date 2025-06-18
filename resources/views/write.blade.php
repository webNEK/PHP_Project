{{-- filepath: resources/views/write.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="{{ asset('/css/write.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400&display=swap" />
</head>
<body>
    <div class="write">
        <div class="logo">
            <img src="{{ asset('images/logo_dark.png') }}" alt="Logo">
        </div>
        <nav class="navbar-nav">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>
        <div class="title">Write</div>
        <img class="write-child" alt="" src="{{ asset('images/Rectangle_top.png') }}">
        <img class="write-item" alt="" src="{{ asset('images/Rectangle_bottom.png') }}">

        @if ($errors->any())
            <div style="color:red; margin-bottom:10px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="write-main-flex">
            <div class="write-left">
                <form class="writing-container" method="POST" action="{{ route('write.post') }}">
                    @csrf
                    <input type="text" class="title-input" name="title" placeholder="Title" value="{{ old('title') }}" required>
                    <textarea class="content-input" name="content" placeholder="Write here..." required>{{ old('content') }}</textarea>
                    <div class="button-container">
                        <button type="button" class="action-btn edit-btn">
                            Edit <img src="{{ asset('images/edit-3.svg') }}" alt="Edit" />
                        </button>
                        <button type="submit" name="publish" class="action-btn publish-btn">
                            Publish <img src="{{ asset('images/icon-send.png') }}" alt="Publish">
                        </button>
                        <button type="submit" name="save" class="action-btn save-btn">
                            Save <img src="{{ asset('images/save.svg') }}" alt="Save" />
                        </button>
                    </div>

                    <div class="questions-container">
                        <div class="question-group">
                            <h2 class="question-title">Which field of study this belong to?</h2>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="field" value="software" {{ old('field') == 'software' ? 'checked' : '' }} required>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Software Engineering</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="field" value="civil" {{ old('field') == 'civil' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Civil Engineering</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="field" value="energy" {{ old('field') == 'energy' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Energy Systems Engineering</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="field" value="electronics" {{ old('field') == 'electronics' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">Electronics and Communication Engineering</span>
                                </label>
                            </div>
                        </div>
                        <div class="question-group">
                            <h2 class="question-title">What grade this belong to?</h2>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="1" {{ old('grade') == '1' ? 'checked' : '' }} required>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">1st year</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="2" {{ old('grade') == '2' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">2nd year</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="3" {{ old('grade') == '3' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">3rd year</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="grade" value="4" {{ old('grade') == '4' ? 'checked' : '' }}>
                                    <span class="radio-custom"></span>
                                    <span class="option-label">4th year</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>