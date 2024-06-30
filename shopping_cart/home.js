// Simple JavaScript carousel function
let currentSlide = 0;

function showSlide(slideIndex) {
    const slides = document.querySelectorAll('.carousel-slide');
    slides.forEach((slide, index) => {
        slide.style.display = (index === slideIndex) ? 'block' : 'none';
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

setInterval(nextSlide, 3000); // Change slide every 3 seconds

function swapImage(originalImage, alternateImage) {
    const productImages = document.querySelectorAll('.product-image');

    productImages.forEach((img) => {
        if (img.src.includes(originalImage)) {
            img.src = img.src.replace(originalImage, alternateImage);
        } else if (img.src.includes(alternateImage)) {
            img.src = img.src.replace(alternateImage, originalImage);
        }
    });
}
