/**
 * Owl Carousel 2 Slider Implementation
 * Replicates the exact design of the current Swiper slider
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        
        // Initialize main hero slider
        var heroSlider = $('.hero-main-slider');
        var thumbnailSlider = $('.hero-thumbnail-slider');
        var textSlider = $('.hero-text-slider');
        
        if (heroSlider.length) {
            
            // Initialize main slider
            var mainSlider = heroSlider.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
            
            // Initialize thumbnail slider (left side)
            var leftThumbSlider = thumbnailSlider.filter('.thumbnail-left').owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
            
            // Initialize thumbnail slider (right side)
            var rightThumbSlider = thumbnailSlider.filter('.thumbnail-right').owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
            
            // Initialize text slider
            var textCarousel = textSlider.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
            
            // Sync all sliders
            mainSlider.on('changed.owl.carousel', function(event) {
                var currentIndex = event.item.index;
                leftThumbSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                rightThumbSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                textCarousel.trigger('to.owl.carousel', [currentIndex, 300, true]);
            });
            
            leftThumbSlider.on('changed.owl.carousel', function(event) {
                var currentIndex = event.item.index;
                mainSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                rightThumbSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                textCarousel.trigger('to.owl.carousel', [currentIndex, 300, true]);
            });
            
            rightThumbSlider.on('changed.owl.carousel', function(event) {
                var currentIndex = event.item.index;
                mainSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                leftThumbSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                textCarousel.trigger('to.owl.carousel', [currentIndex, 300, true]);
            });
            
            textCarousel.on('changed.owl.carousel', function(event) {
                var currentIndex = event.item.index;
                mainSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                leftThumbSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
                rightThumbSlider.trigger('to.owl.carousel', [currentIndex, 300, true]);
            });
            
            // Navigation buttons
            $('#heroPrev').on('click', function() {
                mainSlider.trigger('prev.owl.carousel');
            });
            
            $('#heroNext').on('click', function() {
                mainSlider.trigger('next.owl.carousel');
            });
            
            // Add custom CSS for Owl Carousel to match Swiper design
            var customCSS = `
                <style>
                .owl-carousel {
                    position: relative;
                }
                
                .owl-carousel .owl-stage {
                    display: flex;
                }
                
                .owl-carousel .owl-item {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                
                .owl-carousel .owl-item img {
                    width: 100%;
                    height: auto;
                    object-fit: cover;
                }
                
                .hero-main-slider .owl-item img {
                    border-radius: 50px;
                }
                
                .hero-thumbnail-slider .owl-item img {
                    border-radius: 50%;
                    width: 262px;
                    height: 262px;
                    object-fit: cover;
                }
                
                .hero-text-slider .owl-item {
                    background-color: var(--bs-body-tertiary);
                    text-align: center;
                    padding: 2rem;
                    border-radius: 50px;
                }
                
                .owl-carousel .owl-nav {
                    display: none;
                }
                
                .owl-carousel .owl-dots {
                    display: none;
                }
                
                /* Animation classes */
                .owl-carousel .owl-item {
                    opacity: 0;
                    transition: opacity 0.6s ease;
                }
                
                .owl-carousel .owl-item.active {
                    opacity: 1;
                }
                
                /* Responsive adjustments */
                @media (max-width: 991.98px) {
                    .hero-thumbnail-slider {
                        display: none !important;
                    }
                }
                
                @media (max-width: 767.98px) {
                    .hero-main-slider .owl-item img {
                        border-radius: 25px;
                    }
                    
                    .hero-text-slider .owl-item {
                        border-radius: 25px;
                        padding: 1.5rem;
                    }
                }
                </style>
            `;
            
            $('head').append(customCSS);
            
            console.log('Owl Carousel 2 slider initialized successfully');
        }
        
        // Initialize product slider for WooCommerce
        var productSlider = $('.product-slider');
        if (productSlider.length) {
            productSlider.owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                smartSpeed: 600,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    576: {
                        items: 2,
                        nav: false
                    },
                    768: {
                        items: 3,
                        nav: true
                    },
                    992: {
                        items: 4,
                        nav: true
                    }
                },
                navText: [
                    '<i class="ci-chevron-left"></i>',
                    '<i class="ci-chevron-right"></i>'
                ]
            });
            
            console.log('Product slider initialized successfully');
        }
        
    });
    
})(jQuery); 