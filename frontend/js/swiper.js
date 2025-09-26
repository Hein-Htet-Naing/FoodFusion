
const carouselWrapper = document.getElementById('carousel-wrapper');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;
let currentIndex = 0;
let autoSlideInterval;

function updateCarousel() {
      const offset = -currentIndex * 100;
      carouselWrapper.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
      currentIndex = (currentIndex + 1) % totalItems;
      updateCarousel();
}

function prevSlide() {
      currentIndex = (currentIndex - 1 + totalItems) % totalItems;
      updateCarousel();
}

nextBtn.onclick = () => {
      nextSlide();
      resetAutoSlide();
};

prevBtn.onclick = () => {
      prevSlide();
      resetAutoSlide();
};

function startAutoSlide() {
      autoSlideInterval = setInterval(nextSlide, 3000); // every 5 seconds
}

function resetAutoSlide() {
      clearInterval(autoSlideInterval);
      startAutoSlide();
}

startAutoSlide();

