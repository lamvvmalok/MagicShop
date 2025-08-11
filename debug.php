<?php
/**
 * Template de debug para verificar el problema del slider
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Debug Template</h1>
            <p>Este es el template de debug para verificar el problema del slider.</p>
            
            <h2>Información de la página:</h2>
            <ul>
                <li><strong>URL actual:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></li>
                <li><strong>is_front_page():</strong> <?php echo is_front_page() ? 'true' : 'false'; ?></li>
                <li><strong>is_home():</strong> <?php echo is_home() ? 'true' : 'false'; ?></li>
                <li><strong>is_shop():</strong> <?php echo is_shop() ? 'true' : 'false'; ?></li>
                <li><strong>Template actual:</strong> <?php echo get_page_template_slug(); ?></li>
                <li><strong>Post type:</strong> <?php echo get_post_type(); ?></li>
            </ul>
            
            <h2>Slider de prueba:</h2>
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
                    </div>
                </div>
            </div>
            
            <h2>Enlaces de prueba:</h2>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Página principal (home_url)</a></li>
                <li><a href="<?php echo site_url(); ?>">Sitio principal (site_url)</a></li>
                <li><a href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>">Página de la tienda</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
// Debug script
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== DEBUG TEMPLATE LOADED ===');
    console.log('Current URL:', window.location.href);
    console.log('Document title:', document.title);
    
    // Verificar si el slider existe
    var slider = document.getElementById('heroProductSlider');
    console.log('Slider element:', slider);
    
    if (slider) {
        console.log('✅ Slider found in debug template');
        console.log('Slider HTML:', slider.outerHTML);
        
        // Intentar inicializar
        if (typeof bootstrap !== 'undefined') {
            console.log('✅ Bootstrap available');
            var carousel = new bootstrap.Carousel(slider, {
                interval: 3000,
                wrap: true
            });
            console.log('✅ Carousel initialized');
        } else {
            console.log('⚠️ Bootstrap not available');
        }
    } else {
        console.log('❌ Slider not found in debug template');
    }
});
</script>

<?php get_footer(); ?> 