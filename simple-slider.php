<?php
/**
 * Template simple con slider manual
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Simple Slider Test</h1>
            <p>Este es un slider simple sin Bootstrap para verificar que funciona.</p>
            
            <!-- Simple Slider -->
            <div class="simple-slider" style="position: relative; width: 100%; height: 400px; overflow: hidden; border: 2px solid red;">
                <div id="simpleSlider" style="position: relative; width: 100%; height: 100%;">
                    <!-- Slide 1 -->
                    <div class="slide active" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: block; background: linear-gradient(45deg, #ff6b6b, #4ecdc4);">
                        <div style="position: absolute; bottom: 20px; left: 20px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                            <h2>Producto 1</h2>
                            <p>Descripción del producto 1</p>
                            <div style="font-size: 24px; font-weight: bold; color: #ffd700;">$1,250.00</div>
                            <button class="btn btn-light" onclick="alert('Producto 1 seleccionado')">Comprar Ahora</button>
                        </div>
                    </div>
                    
                    <!-- Slide 2 -->
                    <div class="slide" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none; background: linear-gradient(45deg, #a8e6cf, #dcedc1);">
                        <div style="position: absolute; bottom: 20px; left: 20px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                            <h2>Producto 2</h2>
                            <p>Descripción del producto 2</p>
                            <div style="font-size: 24px; font-weight: bold; color: #ffd700;">$899.00</div>
                            <button class="btn btn-light" onclick="alert('Producto 2 seleccionado')">Comprar Ahora</button>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                    <div class="slide" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none; background: linear-gradient(45deg, #ffd93d, #ff6b6b);">
                        <div style="position: absolute; bottom: 20px; left: 20px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                            <h2>Producto 3</h2>
                            <p>Descripción del producto 3</p>
                            <div style="font-size: 24px; font-weight: bold; color: #ffd700;">$1,599.00</div>
                            <button class="btn btn-light" onclick="alert('Producto 3 seleccionado')">Comprar Ahora</button>
                        </div>
                    </div>
                </div>
                
                <!-- Controls -->
                <button id="prevBtn" style="position: absolute; top: 50%; left: 20px; transform: translateY(-50%); background: rgba(255,255,255,0.8); border: none; padding: 10px 15px; border-radius: 50%; cursor: pointer; font-size: 18px;">‹</button>
                <button id="nextBtn" style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%); background: rgba(255,255,255,0.8); border: none; padding: 10px 15px; border-radius: 50%; cursor: pointer; font-size: 18px;">›</button>
                
                <!-- Indicators -->
                <div style="position: absolute; bottom: 20px; right: 20px; display: flex; gap: 10px;">
                    <button class="indicator active" data-slide="0" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; cursor: pointer;"></button>
                    <button class="indicator" data-slide="1" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(255,255,255,0.5); border: none; cursor: pointer;"></button>
                    <button class="indicator" data-slide="2" style="width: 12px; height: 12px; border-radius: 50%; background: rgba(255,255,255,0.5); border: none; cursor: pointer;"></button>
                </div>
            </div>
            
            <div class="mt-5">
                <h3>Debug Info:</h3>
                <ul>
                    <li><strong>URL:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></li>
                    <li><strong>Template:</strong> <?php echo basename(__FILE__); ?></li>
                    <li><strong>Slider element:</strong> <span id="slider-status">Checking...</span></li>
                    <li><strong>Auto-play:</strong> <span id="autoplay-status">Checking...</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== SIMPLE SLIDER TEMPLATE LOADED ===');
    
    // Check slider element
    var slider = document.getElementById('simpleSlider');
    if (slider) {
        document.getElementById('slider-status').textContent = '✅ Found';
        console.log('✅ Simple slider element found');
        
        // Initialize manual slider
        var slides = slider.querySelectorAll('.slide');
        var indicators = document.querySelectorAll('.indicator');
        var currentSlide = 0;
        var autoplayInterval;
        
        function showSlide(index) {
            // Hide all slides
            slides.forEach(function(slide) {
                slide.style.display = 'none';
            });
            
            // Remove active class from indicators
            indicators.forEach(function(indicator) {
                indicator.classList.remove('active');
                indicator.style.background = 'rgba(255,255,255,0.5)';
            });
            
            // Show current slide
            slides[index].style.display = 'block';
            indicators[index].classList.add('active');
            indicators[index].style.background = 'white';
            
            currentSlide = index;
        }
        
        function nextSlide() {
            var next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }
        
        function prevSlide() {
            var prev = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prev);
        }
        
        // Add event listeners
        document.getElementById('nextBtn').addEventListener('click', nextSlide);
        document.getElementById('prevBtn').addEventListener('click', prevSlide);
        
        // Add indicator clicks
        indicators.forEach(function(indicator, index) {
            indicator.addEventListener('click', function() {
                showSlide(index);
            });
        });
        
        // Start autoplay
        autoplayInterval = setInterval(nextSlide, 3000);
        document.getElementById('autoplay-status').textContent = '✅ Running';
        console.log('✅ Simple slider initialized successfully');
        
        // Pause autoplay on hover
        slider.addEventListener('mouseenter', function() {
            clearInterval(autoplayInterval);
        });
        
        slider.addEventListener('mouseleave', function() {
            autoplayInterval = setInterval(nextSlide, 3000);
        });
        
    } else {
        document.getElementById('slider-status').textContent = '❌ Not found';
        console.log('❌ Simple slider element not found');
    }
});
</script>

<?php get_footer(); ?> 