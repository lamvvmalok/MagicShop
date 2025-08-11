<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

// Condición: si es la página de tienda, cargar shop.php
if (is_shop()) {
    get_header('shop');
    include get_template_directory() . '/shop.php';
    get_footer('shop');
    return;
}

get_header('shop'); 

?>

    <script>
      ((e, t, r, n, o, a, i, l) => {
        let u = document.documentElement,
          s = ["light", "dark"];

        function c(t) {
          var r;
          (Array.isArray(e) ? e : [e]).forEach(e => {
            let r = "class" === e,
              n = r && a ? o.map(e => a[e] || e) : o;
            r ? (u.classList.remove(...n), u.classList.add(a && a[t] ? a[t] : t)) : u.setAttribute(e, t)
          }), r = t, l && s.includes(r) && (u.style.colorScheme = r)
        }
        if (n) c(n);
        else try {
          let e = localStorage.getItem(t) || r,
            n = i && "system" === e ? window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light" : e;
          c(n)
        } catch (e) {}
      })("data-bs-theme", "theme", "light", null, ["light", "dark"], null, true, true)
    </script>
    
    <!-- jQuery (required for Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Owl Carousel 2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    
    <!-- Owl Carousel 2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <!-- Fallback jQuery if CDN fails -->
    <script>
    if (typeof jQuery === 'undefined') {
        document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"><\/script>');
    }
    </script>
    
    <style>
    /* Owl Carousel Custom Styles to match Swiper design */
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
        display: block;
        max-width: 100%;
    }
    
    .hero-main-slider .owl-item img {
        border-radius: 50px;
        width: 100% !important;
        height: auto !important;
        object-fit: cover !important;
        display: block !important;
    }
    
    .hero-thumbnail-left .owl-item img,
    .hero-thumbnail-right .owl-item img {
        border-radius: 50%;
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        display: block !important;
    }
    
    .hero-thumbnail-left .owl-item,
    .hero-thumbnail-right .owl-item {
        width: 262px !important;
        height: 262px !important;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    
    .hero-thumbnail-left .owl-item:hover,
    .hero-thumbnail-right .owl-item:hover {
        transform: scale(1.05);
        opacity: 0.8;
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
        .hero-thumbnail-left,
        .hero-thumbnail-right {
          display: none !important;
        }
      }
      
      /* Cart badge styles */
      .btn-icon .badge {
        font-size: 0.7rem;
        padding: 0.25rem 0.5rem;
        min-width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      /* Menu active state */
      .nav-link.active {
        color: #007bff !important;
        font-weight: 600;
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
    <style>
      :root {
        --bprogress-color: #0A2FFF;
        --bprogress-height: 4px;
        --bprogress-spinner-size: 18px;
        --bprogress-spinner-animation-duration: 400ms;
        --bprogress-spinner-border-size: 2px;
        --bprogress-box-shadow: 0 0 10px #0A2FFF, 0 0 5px #0A2FFF;
        --bprogress-z-index: 99999;
        --bprogress-spinner-top: 15px;
        --bprogress-spinner-bottom: auto;
        --bprogress-spinner-right: 15px;
        --bprogress-spinner-left: auto;
      }

      .bprogress {
        width: 0;
        height: 0;
        pointer-events: none;
        z-index: var(--bprogress-z-index);
      }

      .bprogress .bar {
        background: var(--bprogress-color);
        position: fixed;
        z-index: var(--bprogress-z-index);
        top: 0;
        left: 0;
        width: 100%;
        height: var(--bprogress-height);
      }

      /* Fancy blur effect */
      .bprogress .peg {
        display: block;
        position: absolute;
        right: 0;
        width: 100px;
        height: 100%;
        box-shadow: var(--bprogress-box-shadow);
        opacity: 1.0;
        transform: rotate(3deg) translate(0px, -4px);
      }

      /* Remove these to get rid of the spinner */
      .bprogress .spinner {
        display: block;
        position: fixed;
        z-index: var(--bprogress-z-index);
        top: var(--bprogress-spinner-top);
        bottom: var(--bprogress-spinner-bottom);
        right: var(--bprogress-spinner-right);
        left: var(--bprogress-spinner-left);
      }

      .bprogress .spinner-icon {
        width: var(--bprogress-spinner-size);
        height: var(--bprogress-spinner-size);
        box-sizing: border-box;
        border: solid var(--bprogress-spinner-border-size) transparent;
        border-top-color: var(--bprogress-color);
        border-left-color: var(--bprogress-color);
        border-radius: 50%;
        -webkit-animation: bprogress-spinner var(--bprogress-spinner-animation-duration) linear infinite;
        animation: bprogress-spinner var(--bprogress-spinner-animation-duration) linear infinite;
      }

      .bprogress-custom-parent {
        overflow: hidden;
        position: relative;
      }

      .bprogress-custom-parent .bprogress .spinner,
      .bprogress-custom-parent .bprogress .bar {
        position: absolute;
      }

      .bprogress .indeterminate {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: var(--bprogress-height);
        overflow: hidden;
      }

      .bprogress .indeterminate .inc,
      .bprogress .indeterminate .dec {
        position: absolute;
        top: 0;
        height: 100%;
        background-color: var(--bprogress-color);
      }

      .bprogress .indeterminate .inc {
        animation: bprogress-indeterminate-increase 2s infinite;
      }

      .bprogress .indeterminate .dec {
        animation: bprogress-indeterminate-decrease 2s 0.5s infinite;
      }

      @-webkit-keyframes bprogress-spinner {
        0% {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @keyframes bprogress-spinner {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }

      @keyframes bprogress-indeterminate-increase {
        from {
          left: -5%;
          width: 5%;
        }

        to {
          left: 130%;
          width: 100%;
        }
      }

      @keyframes bprogress-indeterminate-decrease {
        from {
          left: -80%;
          width: 80%;
        }

        to {
          left: 110%;
          width: 10%;
        }
      }
    </style>
    <!--$!-->
    <template data-dgst="BAILOUT_TO_CLIENT_SIDE_RENDERING"></template>
    <!--/$-->
    <!-- Header y menú movidos a header-shop.php -->
    <main class="content-wrapper">
      <section class="bg-body-tertiary min-vh-100 d-flex align-items-center overflow-hidden" style="margin-top:-110px;padding-top:110px">
        <div class="h-100 py-5 my-md-2 my-lg-3 my-xl-4 mb-xxl-5 container">
          <div class="align-items-center justify-content-center gx-3 gx-sm-4 mb-3 mb-sm-4 row">
            <?php
            // Initialize product_data array
            $product_data = array();
            
            // Check if WooCommerce is active
            if (class_exists('WooCommerce')) {
                // Get 4 featured products
                $featured_products = wc_get_featured_product_ids();
                
                if (empty($featured_products)) {
                    // Fallback to recent products if no featured products
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
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
                        'posts_per_page' => 4,
                        'post__in' => $featured_products,
                        'post_status' => 'publish'
                    );
                }
                
                $products = new WP_Query($args);
                
                if ($products->have_posts()) {
                    while ($products->have_posts()) {
                        $products->the_post();
                        global $product;
                        
                        // Get product image with better fallback
                        $product_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $thumbnail_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                        
                        // If no featured image, try to get first product gallery image
                        if (!$product_image && $product) {
                            $gallery_images = $product->get_gallery_image_ids();
                            if (!empty($gallery_images)) {
                                $product_image = wp_get_attachment_image_src($gallery_images[0], 'large');
                                $thumbnail_image = wp_get_attachment_image_src($gallery_images[0], 'medium');
                            }
                        }
                        
                        // Ensure we have valid image URLs
                        if (!$product_image || empty($product_image[0])) {
                            $product_image = array('https://via.placeholder.com/800x600/cccccc/666666?text=Product+Image', 800, 600);
                        }
                        if (!$thumbnail_image || empty($thumbnail_image[0])) {
                            $thumbnail_image = array('https://via.placeholder.com/300x300/cccccc/666666?text=Thumbnail', 300, 300);
                        }
                        
                        $product_data[] = array(
                            'title' => get_the_title(),
                            'price' => $product ? $product->get_price_html() : '$0.00',
                            'url' => get_permalink(),
                            'image' => $product_image ? $product_image[0] : 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F01.png&w=3840&q=75',
                            'thumbnail' => $thumbnail_image ? $thumbnail_image[0] : 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth01.png&w=1080&q=75'
                        );
                    }
                    wp_reset_postdata();
                }
            }
            
            // If no products found, use fallback data
            if (empty($product_data)) {
                $product_data = array(
                    array('title' => 'Navy blue low sofa for relaxation', 'price' => '$1,250.00', 'url' => home_url('/shop/'), 'image' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F01.png&w=3840&q=75', 'thumbnail' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth01.png&w=1080&q=75'),
                    array('title' => 'Armchair with wooden legs 70x120 cm', 'price' => '$269.99', 'url' => home_url('/shop/'), 'image' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F02.png&w=3840&q=75', 'thumbnail' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth02.png&w=1080&q=75'),
                    array('title' => 'Bed frame light gray 140x200 cm', 'price' => '$760.00', 'url' => home_url('/shop/'), 'image' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F03.png&w=3840&q=75', 'thumbnail' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth03.png&w=1080&q=75'),
                    array('title' => 'Blue armchair with iron legs', 'price' => '$220.00', 'url' => home_url('/shop/'), 'image' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2F04.png&w=3840&q=75', 'thumbnail' => 'https://cartzilla-react.createx.studio/_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fhero-slider%2Fth04.png&w=1080&q=75')
                );
            }
            
            // Debug: Let's see what we have
            // echo '<pre style="background:white;padding:10px;margin:10px;border:1px solid #ccc;position:fixed;top:10px;right:10px;z-index:9999;max-width:400px;font-size:12px;">'; 
            // echo 'Product Data: ';
            // print_r($product_data); 
            // echo '</pre>';
            ?>
            
            <!-- Left Thumbnail Slider -->
            <div class="d-none d-lg-flex justify-content-end col-xl-2 col-lg-1">
              <div class="position-relative user-select-none" style="width:262px">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-50 rounded-circle d-none-dark"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-circle d-none-dark d-none d-block-dark" style="opacity:0.05"></span>
                <div class="hero-thumbnail-left position-relative z-2 opacity-60 rounded-circle pe-none">
                  <div class="owl-carousel">
                    <?php if (!empty($product_data)) : ?>
                      <?php foreach ($product_data as $index => $product) : ?>
                      <div class="item">
                        <img alt="<?php echo esc_attr($product['title']); ?>" width="524" height="524" decoding="async" style="color:transparent;width:100%;height:100%;object-fit:cover;" src="<?php echo esc_url($product['thumbnail']); ?>" />
                      </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
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
                  <?php if (!empty($product_data)) : ?>
                    <?php foreach ($product_data as $index => $product) : ?>
                    <div class="item">
                      <img alt="<?php echo esc_attr($product['title']); ?>" width="1272" height="800" decoding="async" style="color:transparent;width:100%;height:auto;object-fit:cover;" src="<?php echo esc_url($product['image']); ?>" />
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
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
                <div class="hero-thumbnail-right position-relative z-2 opacity-60 rounded-circle pe-none">
                  <div class="owl-carousel">
                    <?php if (!empty($product_data)) : ?>
                      <?php foreach ($product_data as $index => $product) : ?>
                      <div class="item">
                        <img alt="<?php echo esc_attr($product['title']); ?>" width="524" height="524" decoding="async" style="color:transparent;width:100%;height:100%;object-fit:cover;" src="<?php echo esc_url($product['thumbnail']); ?>" />
                      </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Text Slider -->
          <div class="hero-text-slider">
            <div class="owl-carousel">
              <?php if (!empty($product_data)) : ?>
                <?php foreach ($product_data as $index => $product) : ?>
                <div class="item bg-body-tertiary text-center">
                  <h3 class="text-secondary-emphasis fs-base fw-normal mb-2"><?php echo esc_html($product['title']); ?></h3>
                  <p class="h4 mb-4"><?php echo $product['price']; ?></p>
                  <a class="btn btn-lg btn-dark rounded-pill" href="<?php echo esc_url($product['url']); ?>">
                    Comprar ahora <i class="ci-chevron-right fs-lg ms-2 me-n2"></i>
                  </a>
                </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5 my-2 my-sm-3 mb-md-2 mt-lg-4 my-xl-5 container">
        <div data-simplebar="init" data-simplebar-auto-hide="false" class="pt-xxl-3">
          <div class="simplebar-wrapper">
            <div class="simplebar-height-auto-observer-wrapper">
              <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
              <div class="simplebar-offset">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content">
                  <div class="simplebar-content">
                    <div class="flex-nowrap flex-md-wrap justify-content-md-center g-0 gap-4 gap-md-0 row">
                      <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                        <div>
                          <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                            <div class="category-card-body">
                              <a class="d-block text-decoration-none" href="https://cartzilla-react.createx.studio/shop/furniture">
                                <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                  <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                    <img alt="Bedroom" loading="lazy" decoding="async" data-nimg="fill" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="328px" srcSet="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=16&amp;q=75amp;q=../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=32&amp;q=75mp;w=3../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=48&amp;q=7501.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=64&amp;q=75ories%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=96&amp;q=75%2Fcat../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=128&amp;q=75rniture../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=256&amp;q=75ome%2Ff../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=384&amp;q=75Fimg%2F../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=640&amp;q=75e?url=%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=750&amp;q=75ext/ima../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=828&amp;q=7550w, /_../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=1080&amp;q=75;q=75 82../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=1200&amp;q=75080&amp;../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=1920&amp;q=75&amp;w=1../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=2048&amp;q=752F01.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=3840&amp;q=75egories%2F01.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fcategories%2F01.png&amp;w=3840&amp;q=75 3840w" src="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F01.png&amp;w=3840&amp;q=75" />
                                  </div>
                                </div>
                                <h3 class="category-card-title h6 text-truncate">Bedroom</h3>
                              </a>
                              <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Beds and mattresses</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Dressing tables</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Pillowcases</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                        <div>
                          <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                            <div class="category-card-body">
                              <a class="d-block text-decoration-none" href="https://cartzilla-react.createx.studio/shop/furniture">
                                <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                  <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                    <img alt="Living room" loading="lazy" decoding="async" data-nimg="fill" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="328px" srcSet="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=16&amp;q=75amp;q=../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=32&amp;q=75mp;w=3../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=48&amp;q=7502.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=64&amp;q=75ories%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=96&amp;q=75%2Fcat../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=128&amp;q=75rniture../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=256&amp;q=75ome%2Ff../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=384&amp;q=75Fimg%2F../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=640&amp;q=75e?url=%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=750&amp;q=75ext/ima../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=828&amp;q=7550w, /_../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=1080&amp;q=75;q=75 82../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=1200&amp;q=75080&amp;../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=1920&amp;q=75&amp;w=1../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=2048&amp;q=752F02.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=3840&amp;q=75egories%2F02.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fcategories%2F02.png&amp;w=3840&amp;q=75 3840w" src="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F02.png&amp;w=3840&amp;q=75" />
                                  </div>
                                </div>
                                <h3 class="category-card-title h6 text-truncate">Living room</h3>
                              </a>
                              <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Bookcases and storage</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Coffee tables</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Cabinets</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                        <div>
                          <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                            <div class="category-card-body">
                              <a class="d-block text-decoration-none" href="https://cartzilla-react.createx.studio/shop/furniture">
                                <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                  <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                    <img alt="Bathroom" loading="lazy" decoding="async" data-nimg="fill" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="328px" srcSet="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=16&amp;q=75amp;q=../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=32&amp;q=75mp;w=3../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=48&amp;q=7503.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=64&amp;q=75ories%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=96&amp;q=75%2Fcat../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=128&amp;q=75rniture../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=256&amp;q=75ome%2Ff../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=384&amp;q=75Fimg%2F../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=640&amp;q=75e?url=%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=750&amp;q=75ext/ima../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=828&amp;q=7550w, /_../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=1080&amp;q=75;q=75 82../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=1200&amp;q=75080&amp;../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=1920&amp;q=75&amp;w=1../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=2048&amp;q=752F03.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=3840&amp;q=75egories%2F03.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fcategories%2F03.png&amp;w=3840&amp;q=75 3840w" src="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F03.png&amp;w=3840&amp;q=75" />
                                  </div>
                                </div>
                                <h3 class="category-card-title h6 text-truncate">Bathroom</h3>
                              </a>
                              <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Mirrors</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Bathroom rugs</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Bathrobes and slippers</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                        <div>
                          <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                            <div class="category-card-body">
                              <a class="d-block text-decoration-none" href="https://cartzilla-react.createx.studio/shop/furniture">
                                <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                  <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                    <img alt="Decoration" loading="lazy" decoding="async" data-nimg="fill" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="328px" srcSet="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=16&amp;q=75amp;q=../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=32&amp;q=75mp;w=3../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=48&amp;q=7504.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=64&amp;q=75ories%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=96&amp;q=75%2Fcat../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=128&amp;q=75rniture../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=256&amp;q=75ome%2Ff../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=384&amp;q=75Fimg%2F../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=640&amp;q=75e?url=%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=750&amp;q=75ext/ima../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=828&amp;q=7550w, /_../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=1080&amp;q=75;q=75 82../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=1200&amp;q=75080&amp;../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=1920&amp;q=75&amp;w=1../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=2048&amp;q=752F04.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=3840&amp;q=75egories%2F04.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fcategories%2F04.png&amp;w=3840&amp;q=75 3840w" src="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F04.png&amp;w=3840&amp;q=75" />
                                  </div>
                                </div>
                                <h3 class="category-card-title h6 text-truncate">Decoration</h3>
                              </a>
                              <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Flowerpots</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Glassware</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Home fragrance</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                        <div>
                          <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                            <div class="category-card-body">
                              <a class="d-block text-decoration-none" href="https://cartzilla-react.createx.studio/shop/furniture">
                                <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                  <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                    <img alt="Office" loading="lazy" decoding="async" data-nimg="fill" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="328px" srcSet="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=16&amp;q=75amp;q=../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=32&amp;q=75mp;w=3../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=48&amp;q=7505.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=64&amp;q=75ories%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=96&amp;q=75%2Fcat../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=128&amp;q=75rniture../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=256&amp;q=75ome%2Ff../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=384&amp;q=75Fimg%2F../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=640&amp;q=75e?url=%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=750&amp;q=75ext/ima../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=828&amp;q=7550w, /_../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=1080&amp;q=75;q=75 82../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=1200&amp;q=75080&amp;../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=1920&amp;q=75&amp;w=1../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=2048&amp;q=752F05.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=3840&amp;q=75egories%2F05.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fcategories%2F05.png&amp;w=3840&amp;q=75 3840w" src="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F05.png&amp;w=3840&amp;q=75" />
                                  </div>
                                </div>
                                <h3 class="category-card-title h6 text-truncate">Office</h3>
                              </a>
                              <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Desks and bureaus</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Office chairs</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Filing cabinets</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4 col-xl-2 col-lg-3 col-md-4 col">
                        <div>
                          <div class="category-card w-100 text-center px-1 px-lg-2 px-xxl-3" style="min-width:165px">
                            <div class="category-card-body">
                              <a class="d-block text-decoration-none" href="https://cartzilla-react.createx.studio/shop/furniture">
                                <div class="bg-body-tertiary rounded-pill mb-3 mx-auto" style="max-width:164px">
                                  <div class="ratio ratio-1x1 rounded-pill overflow-hidden">
                                    <img alt="Kitchen" loading="lazy" decoding="async" data-nimg="fill" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="328px" srcSet="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=16&amp;q=75amp;q=../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=32&amp;q=75mp;w=3../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=48&amp;q=7506.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=64&amp;q=75ories%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=96&amp;q=75%2Fcat../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=128&amp;q=75rniture../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=256&amp;q=75ome%2Ff../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=384&amp;q=75Fimg%2F../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=640&amp;q=75e?url=%../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=750&amp;q=75ext/ima../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=828&amp;q=7550w, /_../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=1080&amp;q=75;q=75 82../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=1200&amp;q=75080&amp;../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=1920&amp;q=75&amp;w=1../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=2048&amp;q=752F06.png../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=3840&amp;q=75egories%2F06.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2Fimg%2Fhome%2Ffurniture%2Fcategories%2F06.png&amp;w=3840&amp;q=75 3840w" src="../_next/image@url=%252Fimg%252Fhome%252Ffurniture%252Fcategories%252F06.png&amp;w=3840&amp;q=75" />
                                  </div>
                                </div>
                                <h3 class="category-card-title h6 text-truncate">Kitchen</h3>
                              </a>
                              <ul class="category-card-list nav w-100 flex-column gap-1 pt-3">
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Cupboards</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Chest of drawers</span>
                                  </a>
                                </li>
                                <li class="w-100">
                                  <a class="nav-link justify-content-center min-w-0 w-100 fw-normal hover-effect-underline p-0" href="https://cartzilla-react.createx.studio/shop/furniture">
                                    <span class="text-truncate">Dining tables</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="simplebar-placeholder"></div>
          </div>
          <div class="simplebar-track simplebar-horizontal">
            <div class="simplebar-scrollbar"></div>
          </div>
          <div class="simplebar-track simplebar-vertical">
            <div class="simplebar-scrollbar"></div>
          </div>
        </div>
      </section>
      <?php
      // Get popular products for the section
      $popular_products = array();
      
      if (class_exists('WooCommerce')) {
          // Get products ordered by popularity (sales)
          $args = array(
              'post_type' => 'product',
              'posts_per_page' => 4,
              'post_status' => 'publish',
              'meta_key' => 'total_sales',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
              'meta_query' => array(
                  array(
                      'key' => '_visibility',
                      'value' => array('catalog', 'visible'),
                      'compare' => 'IN'
                  )
              )
          );
          
          $products_query = new WP_Query($args);
          
          if ($products_query->have_posts()) {
              while ($products_query->have_posts()) {
                  $products_query->the_post();
                  global $product;
                  
                  // Get product image
                  $product_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                  
                  // If no featured image, try to get first product gallery image
                  if (!$product_image && $product) {
                      $gallery_images = $product->get_gallery_image_ids();
                      if (!empty($gallery_images)) {
                          $product_image = wp_get_attachment_image_src($gallery_images[0], 'medium');
                      }
                  }
                  
                  // Ensure we have a valid image URL
                  if (!$product_image || empty($product_image[0])) {
                      $product_image = array('https://via.placeholder.com/400x400/cccccc/666666?text=Product', 400, 400);
                  }
                  
                  $popular_products[] = array(
                      'title' => get_the_title(),
                      'price' => $product ? $product->get_price_html() : '$0.00',
                      'url' => get_permalink(),
                      'image' => $product_image[0],
                      'image_width' => $product_image[1],
                      'image_height' => $product_image[2]
                  );
              }
              wp_reset_postdata();
          }
      }
      
      // If no products found, use fallback data
      if (empty($popular_products)) {
          $popular_products = array(
              array('title' => 'Classic Wooden Chair', 'price' => '$299.00', 'url' => home_url('/shop/'), 'image' => 'https://via.placeholder.com/400x400/cccccc/666666?text=Classic+Chair', 'image_width' => 400, 'image_height' => 400),
              array('title' => 'Modern Pendant Lamp', 'price' => '$89.00', 'url' => home_url('/shop/'), 'image' => 'https://via.placeholder.com/400x400/cccccc/666666?text=Pendant+Lamp', 'image_width' => 400, 'image_height' => 400),
              array('title' => 'Vintage Table Lamp', 'price' => '$129.00', 'url' => home_url('/shop/'), 'image' => 'https://via.placeholder.com/400x400/cccccc/666666?text=Table+Lamp', 'image_width' => 400, 'image_height' => 400),
              array('title' => 'Industrial Desk Chair', 'price' => '$199.00', 'url' => home_url('/shop/'), 'image' => 'https://via.placeholder.com/400x400/cccccc/666666?text=Desk+Chair', 'image_width' => 400, 'image_height' => 400)
          );
      }
      ?>
      
      <section class="pb-5 mt-md-n2 mb-2 mb-sm-3 mb-md-4 mb-xl-5 container">
        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
          <h2 class="h3 mb-0">Productos populares</h2>
          <div class="ms-3 nav">
            <a data-rr-ui-event-key="/shop/furniture" class="animate-underline px-0 py-2 nav-link" href="<?php echo esc_url(home_url('/shop/')); ?>">
              <span class="animate-target">Ver todo</span>
              <i class="ci-chevron-right fs-base ms-1"></i>
            </a>
          </div>
        </div>
        <div class="g-4 pt-3 pt-sm-4 pb-xxl-3 row row-cols-lg-4 row-cols-md-3 row-cols-2">
          <?php if (!empty($popular_products)) : ?>
            <?php foreach ($popular_products as $index => $product) : ?>
              <div class="col">
                <div class="position-relative mb-2">
                  <a href="<?php echo esc_url($product['url']); ?>" class="d-block text-decoration-none">
                    <div class="ratio ratio-1x1 rounded overflow-hidden">
                      <img alt="<?php echo esc_attr($product['title']); ?>" loading="lazy" decoding="async" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="<?php echo esc_url($product['image']); ?>" />
                    </div>
                  </a>
                </div>
                <p class="mb-0 text-secondary-emphasis fs-sm">
                  <?php echo wp_kses_post($product['price']); ?>
                </p>
                <h6 class="mb-0">
                  <a href="<?php echo esc_url($product['url']); ?>" class="text-decoration-none text-dark">
                    <?php echo esc_html($product['title']); ?>
                  </a>
                </h6>
                <p class="mb-3 text-secondary-emphasis fs-sm">
                  Envío gratis
                </p>
                <div class="d-flex gap-2">
                  <a href="<?php echo esc_url($product['url']); ?>" class="btn btn-dark rounded-pill w-100">
                    Ver detalles
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </section>
    </main>

    <script>
    // Initialize Owl Carousel 2 sliders
    // Wait for both jQuery and Owl Carousel to be loaded
    function initOwlSliders() {
        if (typeof jQuery === 'undefined') {
            console.log('jQuery not loaded yet, retrying...');
            setTimeout(initOwlSliders, 100);
            return;
        }
        
        if (typeof jQuery.fn.owlCarousel === 'undefined') {
            console.log('Owl Carousel not loaded yet, retrying...');
            setTimeout(initOwlSliders, 100);
            return;
        }
        
        jQuery(document).ready(function($) {
        
        // Initialize main hero slider
        var heroSlider = $('.hero-main-slider .owl-carousel');
        var thumbnailLeft = $('.hero-thumbnail-left .owl-carousel');
        var thumbnailRight = $('.hero-thumbnail-right .owl-carousel');
        var textSlider = $('.hero-text-slider .owl-carousel');
        
        if (heroSlider.length) {
            
            // Initialize main slider
            var mainSlider = heroSlider.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: false, // Disable autoplay to prevent conflicts
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn'
            });
            
            // Initialize thumbnail slider (left side)
            var leftThumbSlider = thumbnailLeft.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: false, // Disable autoplay to prevent conflicts
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn'
            });
            
            // Initialize thumbnail slider (right side)
            var rightThumbSlider = thumbnailRight.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: false, // Disable autoplay to prevent conflicts
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn'
            });
            
            // Initialize text slider
            var textCarousel = textSlider.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                nav: false,
                dots: false,
                autoplay: false, // Disable autoplay to prevent conflicts
                smartSpeed: 600,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn'
            });
            
            // Sync all sliders with a flag to prevent infinite loops
            var isSyncing = false;
            
            function syncSliders(sourceSlider, targetIndex) {
                if (isSyncing) return;
                isSyncing = true;
                
                // Calculate previous and next indices for thumbnails
                var totalSlides = mainSlider.find('.owl-item').length;
                var prevIndex = (targetIndex - 1 + totalSlides) % totalSlides;
                var nextIndex = (targetIndex + 1) % totalSlides;
                
                if (sourceSlider !== mainSlider) {
                    mainSlider.trigger('to.owl.carousel', [targetIndex, 300, true]);
                }
                if (sourceSlider !== leftThumbSlider) {
                    leftThumbSlider.trigger('to.owl.carousel', [prevIndex, 300, true]);
                }
                if (sourceSlider !== rightThumbSlider) {
                    rightThumbSlider.trigger('to.owl.carousel', [nextIndex, 300, true]);
                }
                if (sourceSlider !== textCarousel) {
                    textCarousel.trigger('to.owl.carousel', [targetIndex, 300, true]);
                }
                
                setTimeout(function() {
                    isSyncing = false;
                }, 350);
            }
            
            mainSlider.on('changed.owl.carousel', function(event) {
                syncSliders(mainSlider, event.item.index);
            });
            
            leftThumbSlider.on('changed.owl.carousel', function(event) {
                syncSliders(leftThumbSlider, event.item.index);
            });
            
            rightThumbSlider.on('changed.owl.carousel', function(event) {
                syncSliders(rightThumbSlider, event.item.index);
            });
            
            textCarousel.on('changed.owl.carousel', function(event) {
                syncSliders(textCarousel, event.item.index);
            });
            
            // Navigation buttons
            $('#heroPrev').on('click', function() {
                mainSlider.trigger('prev.owl.carousel');
            });
            
            $('#heroNext').on('click', function() {
                mainSlider.trigger('next.owl.carousel');
            });
            
            // Initialize thumbnails in correct positions
            setTimeout(function() {
                var currentIndex = mainSlider.find('.owl-item.active').index();
                var totalSlides = mainSlider.find('.owl-item').length;
                var prevIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                var nextIndex = (currentIndex + 1) % totalSlides;
                
                leftThumbSlider.trigger('to.owl.carousel', [prevIndex, 0, true]);
                rightThumbSlider.trigger('to.owl.carousel', [nextIndex, 0, true]);
            }, 100);
            
            // Make thumbnails clickable
            leftThumbSlider.on('click', '.owl-item', function() {
                var clickedIndex = $(this).index();
                var totalSlides = mainSlider.find('.owl-item').length;
                var mainIndex = (clickedIndex + 1) % totalSlides;
                mainSlider.trigger('to.owl.carousel', [mainIndex, 300, true]);
            });
            
            rightThumbSlider.on('click', '.owl-item', function() {
                var clickedIndex = $(this).index();
                var totalSlides = mainSlider.find('.owl-item').length;
                var mainIndex = (clickedIndex - 1 + totalSlides) % totalSlides;
                mainSlider.trigger('to.owl.carousel', [mainIndex, 300, true]);
            });
            
            // Manual autoplay for main slider only
            var autoplayInterval = setInterval(function() {
                if (!isSyncing) {
                    mainSlider.trigger('next.owl.carousel');
                }
            }, 5000);
            
            // Pause autoplay on hover
            $('.hero-main-slider, .hero-thumbnail-left, .hero-thumbnail-right, .hero-text-slider').hover(
                function() {
                    clearInterval(autoplayInterval);
                },
                function() {
                    autoplayInterval = setInterval(function() {
                        if (!isSyncing) {
                            mainSlider.trigger('next.owl.carousel');
                        }
                    }, 5000);
                }
            );
            
            console.log('Owl Carousel 2 slider initialized successfully');
        }
        
    });
    }
    
    // Start initialization
    initOwlSliders();
    </script>

    <?php
get_footer('shop');
?> 