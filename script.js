document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('.carousel-container img');
    let currentSlide = 0;

    function showSlide(index) {
        images.forEach((image, i) => {
            if (i === index) {
                image.style.display = 'block';
            } else {
                image.style.display = 'none';
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % images.length;
        showSlide(currentSlide);
    }

    // Change slide every 3 seconds (adjust as needed)
    setInterval(nextSlide, 5000);

    // Initial slide
    showSlide(currentSlide);
});

document.addEventListener("DOMContentLoaded", function () {
    const textCarousel = document.querySelector('.text-carousel');
    const texts = textCarousel.querySelectorAll('p');
    let currentText = 0;

    function showText(index) {
        texts.forEach((text, i) => {
            if (i === index) {
                text.style.display = 'block';
            } else {
                text.style.display = 'none';
            }
        });
    }

    function nextText() {
        currentText = (currentText + 1) % texts.length;
        showText(currentText);
    }

    setInterval(nextText, 5000);

    showText(currentText);
});
