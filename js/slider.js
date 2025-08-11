/**
 * Slider simple para WooCommerce
 * Script que hace funcionar el slider actual con navegación
 */

(function() {
    'use strict';

    // Esperar a que el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        console.log('=== INICIANDO SLIDER SIMPLE ===');
        
        // Buscar elementos del slider
        const mainSlider = document.querySelector('.swiper');
        const prevBtn = document.getElementById('heroPrev');
        const nextBtn = document.getElementById('heroNext');
        
        console.log('Elementos encontrados:', {
            mainSlider: mainSlider,
            prevBtn: prevBtn,
            nextBtn: nextBtn
        });
        
        if (!mainSlider) {
            console.error('❌ No se encontró el slider principal');
            return;
        }
        
        // Buscar todos los slides
        const allSlides = mainSlider.querySelectorAll('.swiper-slide');
        console.log('Slides encontrados:', allSlides.length);
        
        if (allSlides.length === 0) {
            console.error('❌ No se encontraron slides');
            return;
        }
        
        let currentSlide = 0;
        const totalSlides = allSlides.length;
        
        // Función para mostrar slide
        function showSlide(index) {
            console.log('🔄 Mostrando slide:', index);
            
            // Validar índice
            if (index < 0) index = totalSlides - 1;
            if (index >= totalSlides) index = 0;
            
            // Ocultar todos los slides
            allSlides.forEach((slide, i) => {
                if (i === index) {
                    slide.style.display = 'block';
                    slide.style.opacity = '1';
                } else {
                    slide.style.display = 'none';
                    slide.style.opacity = '0';
                }
            });
            
            currentSlide = index;
            console.log('✅ Slide actual:', currentSlide);
        }
        
        // Función para siguiente slide
        function nextSlide() {
            console.log('➡️ Siguiente slide');
            showSlide(currentSlide + 1);
        }
        
        // Función para slide anterior
        function prevSlide() {
            console.log('⬅️ Slide anterior');
            showSlide(currentSlide - 1);
        }
        
        // Event listeners para botones
        if (nextBtn) {
            console.log('✅ Botón siguiente encontrado, agregando event listener');
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('🖱️ Click en botón siguiente');
                nextSlide();
            });
        } else {
            console.error('❌ No se encontró el botón siguiente');
        }
        
        if (prevBtn) {
            console.log('✅ Botón anterior encontrado, agregando event listener');
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('🖱️ Click en botón anterior');
                prevSlide();
            });
        } else {
            console.error('❌ No se encontró el botón anterior');
        }
        
        // Inicializar slider
        function initSlider() {
            console.log('🚀 Inicializando slider...');
            
            // Mostrar primer slide
            showSlide(0);
            
            // Agregar estilos CSS dinámicamente
            const style = document.createElement('style');
            style.textContent = `
                .swiper-slide {
                    transition: opacity 0.5s ease-in-out;
                }
                .swiper-slide:not([style*="display: block"]) {
                    display: none !important;
                }
            `;
            document.head.appendChild(style);
            
            console.log('✅ Slider inicializado correctamente');
        }
        
        // Inicializar
        initSlider();
        
        // Exponer funciones globalmente para debugging
        window.simpleSlider = {
            nextSlide: nextSlide,
            prevSlide: prevSlide,
            showSlide: showSlide,
            currentSlide: function() { return currentSlide; },
            totalSlides: totalSlides
        };
        
        console.log('🎉 Slider listo. Usa window.simpleSlider para debugging');
        console.log('=== FIN INICIALIZACIÓN SLIDER ===');
        
    });
    
})(); 