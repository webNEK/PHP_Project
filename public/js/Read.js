document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('like-btn');
    const likeCountSpan = document.getElementById('like-count');
    if (!btn) return;

    btn.addEventListener('click', function () {
        const liked = btn.getAttribute('data-liked') === '1';
        const postId = btn.getAttribute('data-post');
        fetch('/Read/like', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ post_id: postId })
        })
        .then(res => res.json())
        .then(data => {
            btn.setAttribute('data-liked', data.liked ? '1' : '0');
            btn.classList.toggle('active', data.liked);
            likeCountSpan.textContent = data.likeCount;
        });
    });
});