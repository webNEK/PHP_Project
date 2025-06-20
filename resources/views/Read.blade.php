{{-- filepath: resources/views/Read.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="{{ asset('css/read.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/Read.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" />
</head>
<body>
    <div class="reading">
        <div class="logo">
            <div class="title">NoteSphere</div>
        </div>

        <nav class="navbar">
            <a href="/HomePage" class="nav-link">Home</a>
            <a href="/List" class="nav-link">List</a>
            <a href="/Account" class="nav-link">Account</a>
        </nav>

        <div class="search-bar">
            <input type="text" placeholder="What are you looking for?" class="search-input">
            <button class="search-btn">
                <img src="{{ asset('images/icon-search.png') }}" alt="Search">
            </button>
        </div>

        <div class="content">
            <div class="article">
                <h1 class="article-title">{{ $post->Title }}</h1>
                <button 
                    id="like-btn"
                    data-liked="{{ $userLiked ? '1' : '0' }}"
                    data-post="{{ $post->PostID }}"
                    class="add-list-btn{{ $userLiked ? ' active' : '' }}"
                >
                    👍 Like (<span id="like-count">{{ $likeCount ?? 0 }}</span>)
                </button>
                <div class="article-content">
                    <p>{{ $post->Content }}</p>
                </div>
                <p class="publisher">
                    Published by 
                    @if($author)
                        {{ $author->Username }}
                    @else
                        #{{ $post->UserID }}
                    @endif
                </p>
            </div>
        </div>

        <div class="comment-section">
            <h3>Comments</h3>
            <div class="comments-list">
                @forelse($comments as $comment)
                    <div class="comment-item">
                        <p class="comment-author">{{ $comment->Username }}</p>
                        <p class="comment-text">{{ $comment->Content }}</p>
                    </div>
                @empty
                    <div class="comment-item">No comments yet.</div>
                @endforelse
            </div>

            <!-- Yorum ekleme formu klasik POST -->
            <form method="POST" action="{{ route('read.comment') }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->PostID }}">
                <textarea class="comment-input" name="comment" placeholder="Write your comment here..." required></textarea>
                <button class="add-comment-btn" type="submit">
                    Add Comment
                    <img src="{{ asset('images/plus-circle.svg') }}" alt="Add">
                </button>
            </form>
        </div>
    </div>
</body>
</html>