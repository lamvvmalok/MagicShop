<?php
/**
 * Template para mostrar páginas de categorías de productos
 * 
 * @package MagicShop
 */

get_header('shop'); 

// Obtener la categoría actual
$current_category = get_queried_object();

// Parámetros de paginación
$paged = 1;
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} elseif (isset($_GET['paged'])) {
    $paged = intval($_GET['paged']);
}
$posts_per_page = 8;

// Usar la consulta principal de WordPress que ya está configurada para paginación
global $wp_query;
$products_query = $wp_query;
$total_products = $products_query->found_posts;
$total_pages = $products_query->max_num_pages;

// Debug: Mostrar información de paginación (temporal)
// echo "<!-- Debug: Paged = $paged, Total Products = $total_products, Total Pages = $total_pages -->";


?>

<main class="content-wrapper">
      <h1 class="h3 container mb-4">Shop catalog</h1>
      <section class="pb-5 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5 container">
        <div class="row">
          <div class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start" aria-labelledby="filtersSidebar">
              <div class="py-3 offcanvas-header">
                <h5 class="offcanvas-title" id="filtersSidebar">Filter and sort</h5>
                <button type="button" class="btn-close" aria-label="Close"></button>
              </div>
              <div class="flex-column pt-2 py-lg-0 offcanvas-body">
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6 mb-2">Categories</h4>
                  <ul class="list-unstyled d-block m-0">
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Smartphones</span>
                        <span class="text-body-secondary fs-xs ms-auto">218</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Accessories</span>
                        <span class="text-body-secondary fs-xs ms-auto">372</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Tablets</span>
                        <span class="text-body-secondary fs-xs ms-auto">110</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Wearable Electronics</span>
                        <span class="text-body-secondary fs-xs ms-auto">142</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Computers &amp; Laptops</span>
                        <span class="text-body-secondary fs-xs ms-auto">205</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Cameras, Photo &amp; Video</span>
                        <span class="text-body-secondary fs-xs ms-auto">78</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Headphones</span>
                        <span class="text-body-secondary fs-xs ms-auto">121</span>
                      </a>
                    </div>
                    <div class="d-block pt-2 mt-1 nav">
                      <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="electronics.html#">
                        <span class="animate-target text-truncate me-3">Video Games</span>
                        <span class="text-body-secondary fs-xs ms-auto">89</span>
                      </a>
                    </div>
                  </ul>
                </div>
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6 mb-2" id="slider-label">Price</h4>
                  <span dir="ltr" data-orientation="horizontal" aria-disabled="false" data-pips="false" class="range-slider" style="--radix-slider-thumb-transform:translateX(-50%)">
                    <span data-orientation="horizontal" class="range-slider-track">
                      <span data-orientation="horizontal" class="range-slider-connect" style="left:21.25%;right:21.875%"></span>
                    </span>
                    <span style="transform:var(--radix-slider-thumb-transform);position:absolute;left:calc(0% + 0px)">
                      <span role="slider" aria-valuemin="0" aria-valuemax="1600" aria-orientation="horizontal" data-orientation="horizontal" tabindex="0" class="range-slider-handle" data-tooltip="true" data-tooltip-prefix="$" style="display:none" data-radix-collection-item=""></span>
                      <input style="display:none" />
                    </span>
                    <span style="transform:var(--radix-slider-thumb-transform);position:absolute;left:calc(0% + 0px)">
                      <span role="slider" aria-valuemin="0" aria-valuemax="1600" aria-orientation="horizontal" data-orientation="horizontal" tabindex="0" class="range-slider-handle" data-tooltip="true" data-tooltip-prefix="$" style="display:none" data-radix-collection-item=""></span>
                      <input style="display:none" />
                    </span>
                  </span>
                  <div class="hstack gap-2">
                    <div class="position-relative w-50">
                      <i class="ci-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input min="0" max="1249" type="number" class="form-icon-start form-control" value="340" />
                    </div>
                    <i class="ci-minus text-body-emphasis mx-2"></i>
                    <div class="position-relative w-50">
                      <i class="ci-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input min="341" max="1600" type="number" class="form-icon-start form-control" value="1250" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" data-bs-theme="light" class="fixed-bottom z-sticky w-100 border-0 border-top border-light border-opacity-10 rounded-0 pb-4 d-lg-none btn btn-dark btn-lg">
              <i class="ci-filter fs-base me-2"></i>Filters </button>
          </div>
          <div class="col-lg-9">
                                     <?php if ($products_query->have_posts()) : ?>
              <div class="g-4 pb-3 mb-3 row row-cols-md-3 row-cols-2">
                <?php while ($products_query->have_posts()) : $products_query->the_post(); 
                  global $product;
                  
                  // Obtener imagen del producto
                  $product_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                  if (!$product_image || empty($product_image[0])) {
                      $product_image = array('https://via.placeholder.com/400x400/cccccc/666666?text=Product', 400, 400);
                  }
                ?>
                <div class="col">
                  <div class="position-relative mb-3">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="d-block text-decoration-none">
                      <div class="ratio ratio-1x1 rounded overflow-hidden">
                        <img alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" class="object-fit-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="<?php echo esc_url($product_image[0]); ?>" />
                      </div>
                    </a>
                  </div>
                  <p class="mb-1 text-secondary-emphasis fs-sm">
                    <?php echo $product->get_price_html(); ?>
                  </p>
                  <h6 class="mb-2">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="text-decoration-none text-dark">
                      <?php the_title(); ?>
                    </a>
                  </h6>
                  <p class="mb-0 text-secondary-emphasis fs-sm">
                    <?php echo strip_tags(wc_get_product_category_list($product->get_id(), ', ')); ?>
                  </p>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
            <?php else : ?>
              <div class="text-center py-5">
                <p class="text-muted">No se encontraron productos en esta categoría.</p>
              </div>
            <?php endif; ?>

            
            <?php if ($total_pages > 1) : ?>
            <nav class="border-top mt-4 pt-3" aria-label="Shop pagination">
              <div class="d-flex justify-content-center">
                <?php echo magicshop_custom_pagination(); ?>
              </div>
            </nav>
            <?php endif; ?>
          </div>
        </div>
      </section>

    </main>

<?php
get_footer('shop');
?> 