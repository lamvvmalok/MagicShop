<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>

<main class="content-wrapper">
      <div class="container">
        <nav aria-label="breadcrumb" class="position-relative pt-3 mt-3 mt-md-4 mb-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Inicio</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/shop">Tienda</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Lighthouse Lantern</li>
          </ol>
        </nav>
        <div class="pb-4 pb-md-5 mb-2 mb-md-0 mb-xl-3 row">
          <div class="pb-4 pb-md-0 mb-2 mb-sm-3 mb-md-0 col-xl-8 col-md-7">
            <div class="g-3 g-sm-4 g-md-3 g-lg-4 row row-cols-2">
              <?php
              // Obtener el producto de forma segura
              $product_id = get_the_ID();
              $product = wc_get_product($product_id);
              
              if ($product && is_a($product, 'WC_Product')) {
                  $attachment_ids = $product->get_gallery_image_ids();
                  $post_thumbnail_id = $product->get_image_id();
                  
                  // Array para todas las imágenes (thumbnail + galería)
                  $all_images = array();
                  if ($post_thumbnail_id) {
                      $all_images[] = $post_thumbnail_id;
                  }
                  if (!empty($attachment_ids)) {
                      $all_images = array_merge($all_images, $attachment_ids);
                  }
                  
                  // Si no hay imágenes, mostrar una imagen por defecto
                  if (empty($all_images)) {
                      ?>
                      <div class="col">
                        <div class="position-relative d-flex rounded-4 overflow-hidden bg-light" style="height: 400px;">
                          <div class="d-flex align-items-center justify-content-center w-100">
                            <span class="text-muted">No hay imágenes disponibles</span>
                          </div>
                        </div>
                      </div>
                      <?php
                  } else {
                      // Mostrar las primeras 2 imágenes en la fila principal
                      for ($i = 0; $i < min(2, count($all_images)); $i++) {
                          $image_id = $all_images[$i];
                          $image_url = wp_get_attachment_image_url($image_id, 'large');
                          $image_thumb = wp_get_attachment_image_url($image_id, 'medium');
                          $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                          $image_title = get_the_title($image_id);
                          
                          if ($image_url) {
                              ?>
                              <div class="col">
                                <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded-4 overflow-hidden" 
                                   href="<?php echo esc_url($image_url); ?>" 
                                   data-gallery="#blueimp-gallery-product"
                                   title="<?php echo esc_attr($image_title); ?>"
                                   onclick="return false;">
                                  <i class="ci-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                  <img alt="<?php echo esc_attr($image_alt ?: $image_title); ?>" 
                                       loading="lazy" 
                                       width="624" 
                                       height="624" 
                                       decoding="async" 
                                       class="hover-effect-target" 
                                       style="color:transparent" 
                                       src="<?php echo esc_url($image_thumb); ?>" />
                                </a>
                              </div>
                              <?php
                          }
                      }
                      
                      // Mostrar imágenes adicionales en el collapse
                      if (count($all_images) > 2) {
                          ?>
                          <div class="col-12">
                            <div id="morePictures" class="d-md-block collapse">
                              <div class="g-3 g-sm-4 g-md-3 g-lg-4 pb-3 pb-sm-4 pb-md-0 row row-cols-2">
                                <?php
                                for ($i = 2; $i < count($all_images); $i++) {
                                    $image_id = $all_images[$i];
                                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                                    $image_thumb = wp_get_attachment_image_url($image_id, 'medium');
                                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                    $image_title = get_the_title($image_id);
                                    
                                    if ($image_url) {
                                        ?>
                                        <div class="col">
                                          <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded-4 overflow-hidden" 
                                             href="<?php echo esc_url($image_url); ?>" 
                                             data-gallery="#blueimp-gallery-product"
                                             title="<?php echo esc_attr($image_title); ?>"
                                             onclick="return false;">
                                            <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                                            <i class="ci-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                            <img alt="<?php echo esc_attr($image_alt ?: $image_title); ?>" 
                                                 loading="lazy" 
                                                 width="534" 
                                                 height="596" 
                                                 decoding="async" 
                                                 class="hover-effect-target" 
                                                 style="color:transparent" 
                                                 src="<?php echo esc_url($image_thumb); ?>" />
                                          </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                              </div>
                            </div>
                            <button type="button" data-label-collapsed="Mostrar más fotos" data-label-expanded="Mostrar menos fotos" class="w-100 d-md-none collapsed btn btn-outline-secondary btn-lg">
                              <i class="collapse-toggle-icon ci-chevron-down fs-lg ms-2 me-n2"></i>
                            </button>
                          </div>
                          <?php
                      }
                  }
              } else {
                  // Fallback si no hay producto
                  ?>
                  <div class="col">
                    <div class="position-relative d-flex rounded-4 overflow-hidden bg-light" style="height: 400px;">
                      <div class="d-flex align-items-center justify-content-center w-100">
                        <span class="text-muted">Producto no encontrado</span>
                      </div>
                    </div>
                  </div>
                  <?php
              }
              ?>
            </div>
          </div>
          <div class="col-xl-4 col-md-5">
            <div class="d-none d-md-block" style="margin-top:-90px"></div>
            <div class="sticky-md-top ps-md-2 ps-xl-4">
              <div class="d-none d-md-block" style="padding-top:90px"></div>
              <h1 class="fs-xl fw-medium"><?php echo get_the_title(); ?></h1>
              <div class="h4 fw-bold mb-4">
                <?php
                $product_id = get_the_ID();
                $product = wc_get_product($product_id);
                if ($product) {
                    echo $product->get_price_html();
                }
                ?>
              </div>

              <div class="d-flex gap-3 pb-4 mb-2 mb-lg-3">
                <a href="https://wa.me/584242613321?text=<?php echo urlencode('Estoy interesado en ' . get_the_title()); ?>" 
                   target="_blank" 
                   class="w-100 rounded-pill btn btn-lg text-decoration-none" 
                   style="background-color: #25D366; border-color: #25D366; color: white;">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                  </svg>
                  Consultar por WhatsApp
                </a>
              </div>
              <div class="mb-4">
                <div class="fs-sm">
                  <span class="me-1">Categoría: <?php echo wc_get_product_category_list(get_the_ID(), ', ', '<a>', '</a>'); ?></span>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between bg-body-tertiary rounded p-3">
                <div class="me-3">
                  <h6 class="fs-sm mb-1">¿Tienes una pregunta?</h6>
                  <p class="fs-sm mb-0">Contáctanos si tienes preguntas</p>
                </div>
                <a class="btn btn-sm btn-outline-dark rounded-pill" href="https://cartzilla-react.createx.studio/contact/v2">Contáctanos</a>
              </div>
            </div>
            <div class="toast-container bottom-0 end-0 position-fixed z-fixed p-3"></div>
          </div>
        </div>
        <section class="sticky-product-banner sticky-top">
          <div class="sticky-product-banner-inner pt-5">
            <div class="navbar flex-nowrap align-items-center bg-body pt-4 pb-2">
              <div class="d-flex align-items-center min-w-0 ms-lg-2 me-3">
                <div style="width:50px" class="ratio flex-shrink-0 ratio-1x1">
                  <img alt="Image" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" style="color:transparent" srcSet="../../_next/image%3Furl=%252Fimg%252Fshop%252Ffurniture%252Fproduct%252Fthumb.png&amp;w=128&amp;q=75amp;q../../_next/image%3Furl=%252Fimg%252Fshop%252Ffurniture%252Fproduct%252Fthumb.png&amp;w=256&amp;q=75p;w=256&amp;q=75 2x" src="../../_next/image%3Furl=%252Fimg%252Fshop%252Ffurniture%252Fproduct%252Fthumb.png&amp;w=256&amp;q=75" />
                </div>
                <h4 class="h6 fw-medium d-none d-lg-block ps-3 mb-0">Lighthouse Lantern</h4>
                <div class="w-100 min-w-0 d-lg-none ps-2">
                  <h4 class="fs-sm fw-medium text-truncate mb-1">Lighthouse Lantern</h4>
                  <div class="h6 mb-0">$
                    <!-- -->69.00
                    <!-- -->
                    <del class="fs-xs fw-normal text-body-tertiary">$
                      <!-- -->416.00
                    </del>
                  </div>
                </div>
              </div>
              <div class="h4 d-none d-lg-block mb-0 ms-auto me-4">$
                <!-- -->357.00
                <!-- -->
                <del class="fs-sm fw-normal text-body-tertiary">$
                  <!-- -->416.00
                </del>
              </div>
              <div class="d-flex gap-2">
                <a href="https://wa.me/584242613321?text=<?php echo urlencode('Estoy interesado en ' . get_the_title()); ?>" 
                   target="_blank" 
                   class="d-none d-md-inline-flex rounded-pill ms-auto px-4 btn btn-lg text-decoration-none"
                   style="background-color: #25D366; border-color: #25D366; color: white;">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                  </svg>
                  Consultar por WhatsApp
                </a>
                <a href="https://wa.me/584242613321?text=<?php echo urlencode('Estoy interesado en ' . get_the_title()); ?>" 
                   target="_blank" 
                   aria-label="Consultar por WhatsApp" 
                   class="btn-icon animate-slide-end rounded-circle ms-auto d-md-none btn text-decoration-none"
                   style="background-color: #25D366; border-color: #25D366; color: white;">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- Tab único de Descripción -->
        <section class="pb-5 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
          <div class="card">
            <div class="card-header bg-light">
              <h4 class="mb-0">Descripción</h4>
            </div>
            <div class="card-body">
              <?php echo wp_kses_post(get_the_content() ?: 'Sin descripción.'); ?>
            </div>
          </div>
        </section>
        <section class="pb-5 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
          <h2 class="h3 pb-2 pb-sm-3">Productos populares</h2>
          <div class="g-4 pb-xxl-3 row row-cols-lg-4 row-cols-md-3 row-cols-2">
            <?php
            if (class_exists('WooCommerce')) {
              $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
              );
              $products_query = new WP_Query($args);
              if ($products_query->have_posts()) {
                while ($products_query->have_posts()) {
                  $products_query->the_post();
                  global $product;
                  $product_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                  if (!$product_image || empty($product_image[0])) {
                    $product_image = array('https://via.placeholder.com/400x400/cccccc/666666?text=Product', 400, 400);
                  }
                  ?>
                  <div class="col">
                    <div class="position-relative mb-2">
                      <a href="<?php echo esc_url(get_permalink()); ?>" class="d-block text-decoration-none">
                        <div class="ratio ratio-1x1 rounded overflow-hidden">
                          <img alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="<?php echo esc_url($product_image[0]); ?>" />
                        </div>
                      </a>
                    </div>
                    <p class="mb-0 text-secondary-emphasis fs-sm">
                      <?php echo $product->get_price_html(); ?>
                    </p>
                    <h6 class="mb-0">
                      <a href="<?php echo esc_url(get_permalink()); ?>" class="text-decoration-none text-dark">
                        <?php the_title(); ?>
                      </a>
                    </h6>
                    <p class="mb-3 text-secondary-emphasis fs-sm">
                      Envío gratis
                    </p>
                    <div class="d-flex gap-2">
                      <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-dark rounded-pill w-100">
                        Ver detalles
                      </a>
                    </div>
                  </div>
                  <?php
                }
                wp_reset_postdata();
              }
            }
            ?>
          </div>
        </section>

      </div>
    </main>

    <!-- Blueimp Gallery Container -->
    <div id="blueimp-gallery-product" class="blueimp-gallery blueimp-gallery-controls" aria-label="image gallery" aria-modal="true" role="dialog">
      <div class="slides" aria-live="off"></div>
      <h3 class="title"></h3>
      <a class="prev" aria-controls="blueimp-gallery-product" aria-label="previous slide" aria-keyshortcuts="ArrowLeft">‹</a>
      <a class="next" aria-controls="blueimp-gallery-product" aria-label="next slide" aria-keyshortcuts="ArrowRight">›</a>
      <a class="close" aria-controls="blueimp-gallery-product" aria-label="close" aria-keyshortcuts="Escape">×</a>
      <a class="play-pause" aria-controls="blueimp-gallery-product" aria-label="play slideshow" aria-keyshortcuts="Space" aria-pressed="true" role="button"></a>
      <ol class="indicator"></ol>
    </div>

    <!-- Blueimp Gallery CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blueimp-gallery/blueimp-gallery.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blueimp-gallery-custom.css">

    <!-- Blueimp Gallery JS -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/blueimp-gallery/blueimp-gallery.min.js"></script>
    
    <!-- Initialize Blueimp Gallery -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if blueimp is available
        if (typeof blueimp === 'undefined') {
            console.error('blueimp Gallery not loaded!');
            return;
        }
        
        // Get all gallery links
        var links = document.querySelectorAll('[data-gallery="#blueimp-gallery-product"]');
        if (links.length > 0) {
            var linksArray = Array.prototype.slice.call(links);
            
            // Pre-create thumbnail indicators
            var indicatorContainer = document.querySelector('#blueimp-gallery-product .indicator');
            if (indicatorContainer) {
                var thumbnailHTML = '';
                linksArray.forEach(function(link, index) {
                    var img = link.querySelector('img');
                    if (img) {
                        thumbnailHTML += '<li><img src="' + img.src + '" data-index="' + index + '" style="width:50px;height:50px;object-fit:cover;border-radius:4px;cursor:pointer;border:2px solid transparent;margin:0 2px;"></li>';
                    }
                });
                indicatorContainer.innerHTML = thumbnailHTML;
            }
            
            // Add click handlers to main gallery links
            linksArray.forEach(function(link, index) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Initialize gallery
                    var gallery = blueimp.Gallery(linksArray, {
                        container: '#blueimp-gallery-product',
                        index: index
                    });
                    
                    // Add click handlers to thumbnails
                    var thumbnails = document.querySelectorAll('#blueimp-gallery-product .indicator img');
                    thumbnails.forEach(function(thumb, thumbIndex) {
                        thumb.addEventListener('click', function() {
                            gallery.slide(thumbIndex);
                        });
                    });
                });
            });
        }
    });
    </script>

<?php
get_footer('shop');
?> 