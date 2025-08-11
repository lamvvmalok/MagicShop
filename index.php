<?php
/**
 * Template principal - Página de inicio con slider
 * Compatible con WooCommerce
 *
 * @package MagicShop
 */

get_header(); ?>

<!-- Hero Section with Product Slider -->
<section class="hero-section bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Everything You Need for a Modern Interior</h1>
                <p class="lead mb-4">Discover our collection of premium furniture and home decor items that will transform your living space.</p>
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_shop_page_id'))); ?>" class="btn btn-primary btn-lg">Comprar Ahora</a>
            </div>
            <div class="col-lg-6">
                <!-- Product Slider -->
                <div class="product-slider-container">
                    <div id="heroProductSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Product 1 -->
                            <div class="carousel-item active">
                                <div class="product-slide">
                                    <div class="product-image-container">
                                        <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Navy Blue Sofa" class="product-slide-image">
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
                                        <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Modern Armchair" class="product-slide-image">
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
                                        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Dining Table" class="product-slide-image">
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
                            
                            <!-- Product 4 -->
                            <div class="carousel-item">
                                <div class="product-slide">
                                    <div class="product-image-container">
                                        <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Bedroom Set" class="product-slide-image">
                                        <div class="product-info">
                                            <h4 class="product-title">Luxury Bedroom Set</h4>
                                            <p class="product-description">Create your perfect sanctuary</p>
                                            <div class="product-price">$2,299.00</div>
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
                            <button type="button" data-bs-target="#heroProductSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Grid -->
<section id="products" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>
        <div class="row">
            <?php
            // Mostrar productos destacados de WooCommerce
            if (class_exists('WooCommerce')) {
                $featured_products = wc_get_featured_product_ids();
                if (empty($featured_products)) {
                    // Si no hay productos destacados, mostrar productos recientes
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                } else {
                    $args = array(
                        'post_type' => 'product',
                        'post__in' => $featured_products,
                        'posts_per_page' => 4,
                        'post_status' => 'publish'
                    );
                }
                
                $products_query = new WP_Query($args);
                
                if ($products_query->have_posts()) {
                    while ($products_query->have_posts()) {
                        $products_query->the_post();
                        global $product;
                        ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card product-card h-100 border-0 shadow-sm">
                                <div class="position-relative">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                        <?php else : ?>
                                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="<?php echo esc_attr(get_the_title()); ?>" class="card-img-top">
                                        <?php endif; ?>
                                    </a>
                                                                <?php if ($product && $product->is_on_sale()) : ?>
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">Oferta</span>
                            <?php endif; ?>
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="tooltip" title="Agregar a Lista de Deseos">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="h5 text-primary mb-0">
                                                <?php echo $product ? $product->get_price_html() : ''; ?>
                                            </span>
                                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">View Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
            } else {
                // Fallback si WooCommerce no está activo
                ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Navy blue low sofa">
                            <div class="position-absolute top-0 end-0 m-2">
                                <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="tooltip" title="Agregar a Lista de Deseos">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Sofá bajo azul marino para relajación</h5>
                            <p class="card-text text-muted">Perfecto para tu sala de estar</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$1,250.00</span>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">¿Por qué elegir nuestros productos?</h2>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-leaf-fill text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h4>Ecológico</h4>
                    <p class="text-muted">Decora tu espacio con muebles ecológicos con bajos COV, materiales respetuosos con el medio ambiente y recubrimientos seguros.</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-award-fill text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h4>Calidad insuperable</h4>
                    <p class="text-muted">Elegimos materias primas de los mejores fabricantes, por lo que nuestros muebles y decoración son de la más alta calidad a los mejores precios.</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-truck-fill text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4>Entrega a tu puerta</h4>
                    <p class="text-muted">Entregamos a tu puerta en cualquier parte del mundo. Si no estás 100% satisfecho, avísanos dentro de 30 días y resolveremos el problema.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="mb-3">Mantente en contacto con nosotros</h3>
                <p class="mb-4">Recibe las últimas actualizaciones sobre nuestros productos y promociones</p>
                
                <form class="row g-3">
                    <div class="col-md-8">
                        <input type="email" class="form-control form-control-lg" placeholder="¡Por favor ingresa tu dirección de correo electrónico!" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-light btn-lg w-100">Suscribirse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
// Inicialización directa del slider
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing slider...');
    
    // Intentar inicializar con Bootstrap
    if (typeof bootstrap !== 'undefined') {
        var slider = document.getElementById('heroProductSlider');
        if (slider) {
            console.log('Bootstrap available, initializing carousel...');
            var carousel = new bootstrap.Carousel(slider, {
                interval: 5000,
                wrap: true,
                keyboard: true,
                pause: 'hover'
            });
            console.log('Carousel initialized successfully');
        }
    } else {
        console.log('Bootstrap not available, using manual slider...');
        // Inicialización manual
        var slider = document.getElementById('heroProductSlider');
        if (slider) {
            var slides = slider.querySelectorAll('.carousel-item');
            var currentSlide = 0;
            
            function showSlide(index) {
                slides.forEach(function(slide, i) {
                    slide.style.display = i === index ? 'block' : 'none';
                });
            }
            
            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }
            
            setInterval(nextSlide, 5000);
            console.log('Manual slider initialized');
        }
    }
});
</script> 