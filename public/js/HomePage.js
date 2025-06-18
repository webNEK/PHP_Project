function moveCarousel(direction) {
    const track = document.getElementById('carouselTrack');
    const card = track.querySelector('.carousel-card');
    if (!card) return;
    const cardWidth = card.offsetWidth + 32; // 32px gap
    track.scrollBy({ left: direction * cardWidth * 3, behavior: 'smooth' });
}
