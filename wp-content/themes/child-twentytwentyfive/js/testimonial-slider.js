document.addEventListener('DOMContentLoaded', function () {
    const sliderContainer = document.querySelector('.testimonial-slider-container');
    if (!sliderContainer) {
        return;
    }

    const testimonials = sliderContainer.querySelectorAll('.testimonial-slide');
    const prevBtn = document.querySelector('.testimonial-arrow.prev');
    const nextBtn = document.querySelector('.testimonial-arrow.next');

    if (testimonials.length <= 1) {
        if(prevBtn) prevBtn.style.display = 'none';
        if(nextBtn) nextBtn.style.display = 'none';
        return;
    }

    let currentIndex = 0;

    function showTestimonial(index) {
        testimonials.forEach(testimonial => {
            testimonial.classList.remove('active');
        });

        testimonials[index].classList.add('active');
    }

    nextBtn.addEventListener('click', function () {
        currentIndex++;
        if (currentIndex >= testimonials.length) {
            currentIndex = 0; 
        }
        showTestimonial(currentIndex);
    });

    // Previous button click event
    prevBtn.addEventListener('click', function () {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = testimonials.length - 1; 
        }
        showTestimonial(currentIndex);
    });

    showTestimonial(currentIndex);
});