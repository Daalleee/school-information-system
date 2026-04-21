<!-- Lightbox Component (Universal) -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4"
    onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-white transition z-50">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    <button onclick="event.stopPropagation(); prevImage()"
        class="absolute left-4 text-white hover:text-white transition z-50 bg-black bg-opacity-50 rounded-full p-2">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button onclick="event.stopPropagation(); nextImage()"
        class="absolute right-4 text-white hover:text-white transition z-50 bg-black bg-opacity-50 rounded-full p-2">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
    <div class="max-w-7xl max-h-full" onclick="event.stopPropagation()">
        <img id="lightboxImage" src="" alt=""
            class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
        <div id="lightboxCaption" class="text-white text-center mt-4 text-lg font-medium"></div>
        <div id="lightboxCounter" class="text-white text-center mt-2 text-sm opacity-75"></div>
    </div>
</div>

<script>
    window._lightboxImages = [];
    window._currentIndex = 0;

    function initLightbox(containerSelector) {
        window._lightboxImages = [];
        document.querySelectorAll(containerSelector).forEach(el => {
            window._lightboxImages.push({
                src: el.dataset.src || el.querySelector('img')?.src || '',
                alt: el.dataset.alt || el.querySelector('img')?.alt || '',
                caption: el.dataset.caption || el.dataset.alt || ''
            });
        });
    }

    function openLightboxFromData(containerSelector, index = 0) {
        initLightbox(containerSelector);
        openLightbox(window._lightboxImages, index);
    }

    function openLightbox(images, index = 0) {
        window._lightboxImages = images;
        window._currentIndex = index;
        updateLightboxImage();
        document.getElementById('lightbox').classList.remove('hidden');
        document.getElementById('lightbox').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.getElementById('lightbox').classList.remove('flex');
        document.body.style.overflow = 'auto';
        window._lightboxImages = [];
    }

    function updateLightboxImage() {
        if (window._lightboxImages.length === 0) return;
        const img = window._lightboxImages[window._currentIndex];
        document.getElementById('lightboxImage').src = img.src;
        document.getElementById('lightboxImage').alt = img.alt || '';
        document.getElementById('lightboxCaption').textContent = img.caption || '';
        document.getElementById('lightboxCounter').textContent =
            `${window._currentIndex + 1} / ${window._lightboxImages.length}`;
    }

    function nextImage() {
        if (window._lightboxImages.length === 0) return;
        window._currentIndex = (window._currentIndex + 1) % window._lightboxImages.length;
        updateLightboxImage();
    }

    function prevImage() {
        if (window._lightboxImages.length === 0) return;
        window._currentIndex = (window._currentIndex - 1 + window._lightboxImages.length) % window._lightboxImages
            .length;
        updateLightboxImage();
    }

    document.addEventListener('keydown', function(e) {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
    });

    let touchStartX = 0;
    document.getElementById('lightbox').addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });
    document.getElementById('lightbox').addEventListener('touchend', function(e) {
        const diff = touchStartX - e.changedTouches[0].screenX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) nextImage();
            else prevImage();
        }
    });
</script>
