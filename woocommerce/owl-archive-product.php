<?php
/**
 * The Template for displaying product archives with Owl Carousel 2
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/owl-archive-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>

<main class="content-wrapper">
    <section class="bg-body-tertiary min-vh-100 d-flex align-items-center overflow-hidden" style="margin-top:-110px;padding-top:110px">
        <div class="h-100 py-5 my-md-2 my-lg-3 my-xl-4 mb-xxl-5 container">
            
            <div class="align-items-center justify-content-center gx-3 gx-sm-4 mb-3 mb-sm-4 row">
                
                <!-- Left Thumbnail Slider -->
                <div class="d-none d-lg-flex justify-content-end col-xl-2 col-lg-1">
                    <div class="position-relative user-select-none" style="width:262px">
                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-50 rounded-circle d-none-dark"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-circle d-none-dark d-none d-block-dark" style="opacity:0.05"></span>
                        <div class="hero-thumbnail-slider thumbnail-left position-relative z-2 opacity-60 rounded-circle pe-none">
                            <div class="owl-carousel">
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth04.png&w=1080&q=75" />
                                </div>
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth01.png&w=1080&q=75" />
                                </div>
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth02.png&w=1080&q=75" />
                                </div>
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth03.png&w=1080&q=75" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Previous -->
                <div class="order-1 order-lg-2 d-flex align-items-center justify-content-center col-sm-1 col-auto">
                    <button type="button" id="heroPrev" aria-label="Previous slide" class="btn-icon rounded-circle animate-slide-start btn btn-outline-secondary btn-lg">
                        <i class="ci-chevron-left fs-xl animate-target"></i>
                    </button>
                </div>
                
                <!-- Main Slider -->
                <div class="order-3 col-xl-6 col-lg-8 col-sm-10">
                    <div class="hero-main-slider user-select-none rounded-pill">
                        <div class="owl-carousel">
                            <div class="item">
                                <img alt="Navy blue low sofa for relaxation" width="1272" height="800" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F01.png&w=3840&q=75" />
                            </div>
                            <div class="item">
                                <img alt="Armchair with wooden legs 70x120 cm" width="1272" height="800" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F02.png&w=3840&q=75" />
                            </div>
                            <div class="item">
                                <img alt="Bed frame light gray 140x200 cm" width="1272" height="800" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F03.png&w=3840&q=75" />
                            </div>
                            <div class="item">
                                <img alt="Blue armchair with iron legs" width="1272" height="800" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F04.png&w=3840&q=75" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Next -->
                <div class="order-2 order-sm-3 order-lg-4 d-flex align-items-center justify-content-center col-sm-1 col-auto">
                    <button type="button" id="heroNext" aria-label="Next slide" class="btn-icon rounded-circle animate-slide-end btn btn-outline-secondary btn-lg">
                        <i class="ci-chevron-right fs-xl animate-target"></i>
                    </button>
                </div>
                
                <!-- Right Thumbnail Slider -->
                <div class="order-lg-5 d-none d-lg-block col-xl-2 col-lg-1">
                    <div class="position-relative user-select-none" style="width:262px">
                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-50 rounded-circle d-none-dark"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-circle d-none-dark d-none d-block-dark" style="opacity:0.05"></span>
                        <div class="hero-thumbnail-slider thumbnail-right position-relative z-2 opacity-60 rounded-circle pe-none">
                            <div class="owl-carousel">
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth02.png&w=1080&q=75" />
                                </div>
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth03.png&w=1080&q=75" />
                                </div>
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth04.png&w=1080&q=75" />
                                </div>
                                <div class="item">
                                    <img alt="Thumbnail" width="524" height="524" decoding="async" style="color:transparent" src="https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth01.png&w=1080&q=75" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Text Slider -->
            <div class="hero-text-slider">
                <div class="owl-carousel">
                    <div class="item bg-body-tertiary text-center">
                        <h3 class="text-secondary-emphasis fs-base fw-normal mb-2">Navy blue low sofa for relaxation</h3>
                        <p class="h4 mb-4">$1,250.00</p>
                        <a class="btn btn-lg btn-dark rounded-pill" href="<?php echo esc_url(home_url('/shop/')); ?>">
                            Comprar ahora <i class="ci-chevron-right fs-lg ms-2 me-n2"></i>
                        </a>
                    </div>
                    <div class="item bg-body-tertiary text-center">
                        <h3 class="text-secondary-emphasis fs-base fw-normal mb-2">Armchair with wooden legs 70x120 cm</h3>
                        <p class="h4 mb-4">$269.99</p>
                        <a class="btn btn-lg btn-dark rounded-pill" href="<?php echo esc_url(home_url('/shop/')); ?>">
                            Comprar ahora <i class="ci-chevron-right fs-lg ms-2 me-n2"></i>
                        </a>
                    </div>
                    <div class="item bg-body-tertiary text-center">
                        <h3 class="text-secondary-emphasis fs-base fw-normal mb-2">Bed frame light gray 140x200 cm</h3>
                        <p class="h4 mb-4">$760.00</p>
                        <a class="btn btn-lg btn-dark rounded-pill" href="<?php echo esc_url(home_url('/shop/')); ?>">
                            Comprar ahora <i class="ci-chevron-right fs-lg ms-2 me-n2"></i>
                        </a>
                    </div>
                    <div class="item bg-body-tertiary text-center">
                        <h3 class="text-secondary-emphasis fs-base fw-normal mb-2">Blue armchair with iron legs</h3>
                        <p class="h4 mb-4">$220.00</p>
                        <a class="btn btn-lg btn-dark rounded-pill" href="<?php echo esc_url(home_url('/shop/')); ?>">
                            Comprar ahora <i class="ci-chevron-right fs-lg ms-2 me-n2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Categories Section -->
    <section class="py-5 my-2 my-sm-3 mb-md-2 mt-lg-4 my-xl-5 container">
        <div class="pt-xxl-3">
            <div class="flex-nowrap flex-md-wrap justify-content-md-center g-0 gap-4 gap-md-0 row">
                <?php
                // Get product categories
                $product_categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'number' => 6
                ));
                
                if (!empty($product_categories) && !is_wp_error($product_categories)) {
                    foreach ($product_categories as $category) {
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image = wp_get_attachment_url($thumbnail_id);
                        ?>
                        <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                            <div>
                                <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                                    <div class="category-card-body">
                                        <a class="d-block text-decoration-none" href="<?php echo esc_url(get_term_link($category)); ?>">
                                            <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                                <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                                    <?php if ($image) : ?>
                                                        <img alt="<?php echo esc_attr($category->name); ?>" loading="lazy" decoding="async" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="<?php echo esc_url($image); ?>" />
                                                    <?php else : ?>
                                                        <div class="d-flex align-items-center justify-content-center h-100">
                                                            <i class="ci-image fs-1 opacity-40"></i>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <h3 class="category-card-title h6 text-truncate"><?php echo esc_html($category->name); ?></h3>
                                        </a>
                                        <?php
                                        // Get subcategories
                                        $subcategories = get_terms(array(
                                            'taxonomy' => 'product_cat',
                                            'parent' => $category->term_id,
                                            'hide_empty' => true,
                                            'number' => 3
                                        ));
                                        
                                        if (!empty($subcategories) && !is_wp_error($subcategories)) : ?>
                                            <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                                <?php foreach ($subcategories as $subcategory) : ?>
                                                    <li class="w-100">
                                                        <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="<?php echo esc_url(get_term_link($subcategory)); ?>">
                                                            <span class="text-truncate"><?php echo esc_html($subcategory->name); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    
    <!-- Popular Products Section -->
    <section class="pb-5 mt-md-n2 mb-2 mb-sm-3 mb-md-4 mb-xl-5 container">
        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
            <h2 class="h3 mb-0">Productos populares</h2>
            <div class="ms-3 nav">
                <a class="animate-underline px-0 py-2 nav-link" href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
                    <span class="animate-target">Ver todo</span>
                    <i class="ci-chevron-right fs-base ms-1"></i>
                </a>
            </div>
        </div>
        
        <div class="product-slider g-4 pt-3 pt-sm-4 pb-xxl-3">
            <?php
            // Get featured products
            $featured_products = wc_get_featured_product_ids();
            
            if (empty($featured_products)) {
                // Fallback to recent products if no featured products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => '_visibility',
                            'value' => array('catalog', 'visible'),
                            'compare' => 'IN'
                        )
                    )
                );
            } else {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'post__in' => $featured_products,
                    'post_status' => 'publish'
                );
            }
            
            $products = new WP_Query($args);
            
            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
                    ?>
                    <div class="item">
                        <div class="card product-card h-100 border-0 shadow-sm">
                            <div class="card-img-top position-relative">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                    <?php else : ?>
                                        <div class="placeholder-image d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8f9fa;">
                                            <i class="ci-image fs-1 opacity-40"></i>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <?php if ($product->is_on_sale()) : ?>
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">Oferta</span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <div class="mt-auto">
                                    <p class="card-text h5 mb-3">
                                        <?php echo $product->get_price_html(); ?>
                                    </p>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-dark rounded-pill flex-fill">
                                            Ver detalles
                                        </a>
                                        <?php if ($product->is_type('simple')) : ?>
                                            <button type="button" class="btn btn-dark rounded-pill btn-icon" onclick="addToCart(<?php echo $product->get_id(); ?>)">
                                                <i class="ci-cart-plus"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Show placeholder products
                for ($i = 0; $i < 4; $i++) :
                    ?>
                    <div class="item">
                        <div class="placeholder-wave">
                            <div class="ratio ratio-1x1 rounded placeholder"></div>
                            <div class="mt-2">
                                <div class="placeholder-glow">
                                    <span class="col-12 placeholder placeholder-xs"></span>
                                </div>
                                <div class="placeholder-glow">
                                    <span class="col-5 placeholder placeholder-sm"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endfor;
            endif;
            ?>
        </div>
    </section>
</main>

<script>
// Add to cart functionality
function addToCart(productId) {
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: {
            action: 'add_to_cart_ajax',
            product_id: productId,
            nonce: '<?php echo wp_create_nonce('add_to_cart_nonce'); ?>'
        },
        success: function(response) {
            if (response.success) {
                alert('Product added to cart!');
                // Optionally refresh cart count
                location.reload();
            } else {
                alert('Error adding product to cart');
            }
        },
        error: function() {
            alert('Error adding product to cart');
        }
    });
}
</script>

<?php
get_footer('shop');
?> 