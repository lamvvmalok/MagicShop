<?php
/**
 * Template de prueba para el slider
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Test Slider</h1>
            <p>Este es un template de prueba para verificar que el slider funciona.</p>
            
            <!-- Product Slider -->
            <div class="product-slider-container">
                <div id="heroProductSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Product 1 -->
                        <div class="carousel-item active">
                            <div class="product-slide">
                                <div class="product-image-container">
                                    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Navy Blue Sofa" class="product-slide-image">
                                    <div class="product-info">
                                        <h4 class="product-title">Navy Blue Low Sofa</h4>
                                        <p class="product-description">Perfect for relaxation and modern living</p>
                                        <div class="product-price">$1,250.00</div>
                                        <button class="btn btn-dark btn-lg">
                                            Shop Now
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 2 -->
                        <div class="carousel-item">
                            <div class="product-slide">
                                <div class="product-image-container">
                                    <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Modern Armchair" class="product-slide-image">
                                    <div class="product-info">
                                        <h4 class="product-title">Modern Accent Armchair</h4>
                                        <p class="product-description">Elegant design with premium comfort</p>
                                        <div class="product-price">$899.00</div>
                                        <button class="btn btn-dark btn-lg">
                                            Shop Now
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 3 -->
                        <div class="carousel-item">
                            <div class="product-slide">
                                <div class="product-image-container">
                                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Dining Table" class="product-slide-image">
                                    <div class="product-info">
                                        <h4 class="product-title">Contemporary Dining Table</h4>
                                        <p class="product-description">Perfect for family gatherings</p>
                                        <div class="product-price">$1,599.00</div>
                                        <button class="btn btn-dark btn-lg">
                                            Shop Now
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroProductSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroProductSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#heroProductSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#heroProductSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#heroProductSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
            
            <div class="mt-5">
                <h3>Debug Info:</h3>
                <ul>
                    <li><strong>URL:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></li>
                    <li><strong>Template:</strong> <?php echo basename(__FILE__); ?></li>
                    <li><strong>Bootstrap loaded:</strong> <span id="bootstrap-status">Checking...</span></li>
                    <li><strong>Slider element:</strong> <span id="slider-status">Checking...</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== TEST SLIDER TEMPLATE LOADED ===');
    
    // Check Bootstrap
    if (typeof bootstrap !== 'undefined') {
        document.getElementById('bootstrap-status').textContent = '✅ Available';
        console.log('✅ Bootstrap is available');
    } else {
        document.getElementById('bootstrap-status').textContent = '❌ Not available';
        console.log('❌ Bootstrap not available');
    }
    
    // Check slider element
    var slider = document.getElementById('heroProductSlider');
    if (slider) {
        document.getElementById('slider-status').textContent = '✅ Found';
        console.log('✅ Slider element found');
        console.log('Slider HTML:', slider.outerHTML);
        
        // Try to initialize
        if (typeof bootstrap !== 'undefined') {
            try {
                var carousel = new bootstrap.Carousel(slider, {
                    interval: 3000,
                    wrap: true
                });
                console.log('✅ Carousel initialized successfully');
            } catch (error) {
                console.error('❌ Error initializing carousel:', error);
            }
        }
    } else {
        document.getElementById('slider-status').textContent = '❌ Not found';
        console.log('❌ Slider element not found');
    }
});
</script>

<?php get_footer(); ?> 