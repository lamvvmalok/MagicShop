/**
 * Scripts personalizados para MagicShop Theme
 * 
 * @package MagicShop
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        
        // Botón de volver arriba
        var backToTop = $('#back-to-top');
        
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                backToTop.fadeIn();
            } else {
                backToTop.fadeOut();
            }
        });
        
        backToTop.click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
        
        // Tooltips de Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Popovers de Bootstrap
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
        
        // Inicializar Owl Carousel cuando la página esté completamente cargada
        $(window).on('load', function() {
            if ($('#heroOwlSlider').length) {
                console.log('Página cargada, inicializando Owl Carousel');
                $('#heroOwlSlider').owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    smartSpeed: 700,
                    navText: [
                        '<span class="owl-nav-btn owl-prev"><i class="bi bi-chevron-left"></i></span>',
                        '<span class="owl-nav-btn owl-next"><i class="bi bi-chevron-right"></i></span>'
                    ]
                });
                console.log('Owl Carousel inicializado en window.load');
            }
        });
        
        // Validación de formularios
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
        
        // Smooth scroll para enlaces internos
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
        
        // Lazy loading para imágenes
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
        // Animaciones al hacer scroll
        function animateOnScroll() {
            $('.animate-on-scroll').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                
                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animated');
                }
            });
        }
        
        $(window).on('scroll', animateOnScroll);
        animateOnScroll(); // Ejecutar una vez al cargar
        
        // Menú móvil mejorado
        $('.navbar-nav .nav-link').on('click', function() {
            if ($(window).width() < 992) {
                $('.navbar-collapse').collapse('hide');
            }
        });
        
        // Contador de caracteres para comentarios
        $('#comment').on('input', function() {
            var maxLength = 5000;
            var currentLength = $(this).val().length;
            var remaining = maxLength - currentLength;
            
            if (!$(this).next('.char-counter').length) {
                $(this).after('<small class="char-counter text-muted"></small>');
            }
            
            $(this).next('.char-counter').text(remaining + ' caracteres restantes');
            
            if (remaining < 0) {
                $(this).next('.char-counter').addClass('text-danger');
            } else {
                $(this).next('.char-counter').removeClass('text-danger');
            }
        });
        
        // Mejoras para WooCommerce (si está activo)
        if (typeof wc_add_to_cart_params !== 'undefined') {
            // Animación para botones de añadir al carrito
            $('.add_to_cart_button').on('click', function() {
                $(this).addClass('loading');
                setTimeout(() => {
                    $(this).removeClass('loading');
                }, 2000);
            });
        }
        
        // Mejoras de accesibilidad
        $('.dropdown-toggle').on('keydown', function(e) {
            if (e.keyCode === 13 || e.keyCode === 32) {
                e.preventDefault();
                $(this).dropdown('toggle');
            }
        });
        
        // Preloader (opcional)
        $(window).on('load', function() {
            $('.preloader').fadeOut('slow');
        });
        
        // Mejoras para el formulario de búsqueda
        $('.search-form input[type="search"]').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
        });
        
        // Auto-hide para alertas
        $('.alert-dismissible').each(function() {
            var alert = $(this);
            setTimeout(function() {
                alert.fadeOut();
            }, 5000);
        });
        
        // Mejoras para galerías
        $('.gallery').each(function() {
            $(this).find('a').attr('data-fancybox', 'gallery');
        });
        
        // Mejoras para tablas responsivas
        $('table').addClass('table table-responsive');
        
        // Mejoras para listas de posts
        $('.post').hover(
            function() {
                $(this).find('.post-thumbnail img').addClass('scale');
            },
            function() {
                $(this).find('.post-thumbnail img').removeClass('scale');
            }
        );
        
        // Inicializar Swiper para el slider hero
        function initSwiper() {
            if (typeof Swiper !== 'undefined') {
                console.log('Inicializando Swiper para hero slider');
                
                // Verificar que existan los botones de navegación
                const heroNext = document.getElementById('heroNext');
                const heroPrev = document.getElementById('heroPrev');
                const mainSwiper = document.getElementById('heroMainSwiper');
                
                console.log('Elementos encontrados:', {
                    heroNext: heroNext,
                    heroPrev: heroPrev,
                    mainSwiper: mainSwiper
                });
                
                if (!mainSwiper) {
                    console.error('Slider principal no encontrado');
                    return false;
                }
                
                // Inicializar el slider principal primero
                const mainSwiperConfig = {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    speed: 800,
                    allowTouchMove: true,
                    grabCursor: true,
                    navigation: {
                        nextEl: '#heroNext',
                        prevEl: '#heroPrev',
                        enabled: true
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        type: 'bullets'
                    }
                };
                
                try {
                    const mainSwiperInstance = new Swiper('#heroMainSwiper', mainSwiperConfig);
                    console.log('Slider principal inicializado:', mainSwiperInstance);
                    
                    // Agregar eventos de debug
                    mainSwiperInstance.on('slideChange', function() {
                        console.log('Slide principal cambiado a:', this.realIndex);
                    });
                    
                    mainSwiperInstance.on('navigationNext', function() {
                        console.log('Navegación siguiente activada');
                    });
                    
                    mainSwiperInstance.on('navigationPrev', function() {
                        console.log('Navegación anterior activada');
                    });
                    
                    // Inicializar otros sliders (thumbnails)
                    const thumbnailSwipers = document.querySelectorAll('.swiper:not(#heroMainSwiper)');
                    const allSwipers = [mainSwiperInstance];
                    
                    thumbnailSwipers.forEach((container, index) => {
                        if (container.swiper) {
                            allSwipers.push(container.swiper);
                            return;
                        }
                        
                        const thumbnailConfig = {
                            slidesPerView: 1,
                            spaceBetween: 0,
                            loop: true,
                            effect: 'fade',
                            fadeEffect: {
                                crossFade: true
                            },
                            speed: 800,
                            allowTouchMove: false,
                            autoplay: false
                        };
                        
                        try {
                            const thumbnailSwiper = new Swiper(container, thumbnailConfig);
                            allSwipers.push(thumbnailSwiper);
                            console.log('Thumbnail swiper inicializado:', index);
                        } catch (error) {
                            console.error('Error al inicializar thumbnail swiper', index, error);
                        }
                    });
                    
                    // Sincronizar todos los sliders
                    if (allSwipers.length > 1) {
                        mainSwiperInstance.on('slideChange', function() {
                            allSwipers.forEach((otherSwiper, i) => {
                                if (otherSwiper !== this && otherSwiper.realIndex !== this.realIndex) {
                                    otherSwiper.slideTo(this.realIndex);
                                }
                            });
                        });
                    }
                    
                    // Agregar eventos manuales a los botones como respaldo
                    if (heroNext && heroPrev) {
                        heroNext.addEventListener('click', function(e) {
                            e.preventDefault();
                            console.log('Click manual en botón siguiente');
                            mainSwiperInstance.slideNext();
                        });
                        
                        heroPrev.addEventListener('click', function(e) {
                            e.preventDefault();
                            console.log('Click manual en botón anterior');
                            mainSwiperInstance.slidePrev();
                        });
                    }
                    
                    console.log('Todos los Swipers inicializados correctamente');
                    return true;
                    
                } catch (error) {
                    console.error('Error al inicializar slider principal:', error);
                    return false;
                }
                
            } else {
                console.log('Swiper no está disponible');
                return false;
            }
        }
        
        // Inicializar Owl Carousel para el slider de productos en la tienda
        function initOwlCarousel() {
            if ($('#heroOwlSlider').length && typeof $.fn.owlCarousel !== 'undefined') {
                console.log('Inicializando Owl Carousel para heroOwlSlider');
                $('#heroOwlSlider').owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    smartSpeed: 700,
                    navText: [
                        '<span class="owl-nav-btn owl-prev"><i class="bi bi-chevron-left"></i></span>',
                        '<span class="owl-nav-btn owl-next"><i class="bi bi-chevron-right"></i></span>'
                    ]
                });
                console.log('Owl Carousel inicializado correctamente');
            } else {
                console.log('Owl Carousel no disponible o elemento no encontrado');
                if (!$('#heroOwlSlider').length) {
                    console.log('Elemento heroOwlSlider no encontrado');
                }
                if (typeof $.fn.owlCarousel === 'undefined') {
                    console.log('Owl Carousel plugin no cargado');
                }
            }
        }
        
        // Intentar inicializar Swiper inmediatamente
        initSwiper();
        
        // Intentar inicializar Owl Carousel inmediatamente
        initOwlCarousel();
        
        // Intentar de nuevo después de un pequeño delay
        setTimeout(function() {
            initSwiper();
            initOwlCarousel();
        }, 1000);
        
    });
    
    // Funciones globales
    window.MagicShop = {
        // Función para mostrar notificaciones
        showNotification: function(message, type = 'info') {
            var alertClass = 'alert-' + type;
            var alert = $('<div class="alert ' + alertClass + ' alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999;">' +
                message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                '</div>');
            
            $('body').append(alert);
            
            setTimeout(function() {
                alert.fadeOut();
            }, 3000);
        },
        

        
        // Función para copiar al portapapeles
        copyToClipboard: function(text) {
            navigator.clipboard.writeText(text).then(function() {
                MagicShop.showNotification('Texto copiado al portapapeles', 'success');
            }).catch(function() {
                MagicShop.showNotification('Error al copiar texto', 'danger');
            });
        },
        
        // Función para compartir en redes sociales
        shareOnSocial: function(platform, url, title) {
            var shareUrls = {
                facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
                twitter: 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(title),
                linkedin: 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(url),
                whatsapp: 'https://wa.me/?text=' + encodeURIComponent(title + ' ' + url)
            };
            
            if (shareUrls[platform]) {
                window.open(shareUrls[platform], '_blank', 'width=600,height=400');
            }
        }
    };
    
})(jQuery); 