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
      <section class="pb-5 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5 container">
        <div class="row">
          <div class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start" aria-labelledby="filtersSidebar">
              <div class="py-3 offcanvas-header">
                <h5 class="offcanvas-title" id="filtersSidebar">Filtrar y ordenar</h5>
                <button type="button" class="btn-close" aria-label="Close"></button>
              </div>
              <div class="flex-column pt-2 py-lg-0 offcanvas-body">
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6 mb-2">Categorías</h4>
                  <ul class="list-unstyled d-block m-0">
                    <?php
                    // Obtener todas las categorías de productos de WooCommerce
                    $product_categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'order' => 'ASC'
                    ));
                    
                    // Verificar si hay categorías
                    if (!empty($product_categories) && !is_wp_error($product_categories)) {
                        foreach ($product_categories as $category) {
                            // Obtener el enlace de la categoría
                            $category_link = get_term_link($category);
                            
                            // Obtener el conteo de productos en la categoría
                            $product_count = $category->count;
                            
                            // Verificar si el enlace es válido
                            if (!is_wp_error($category_link)) {
                                ?>
                                <div class="d-block pt-2 mt-1 nav">
                                  <a data-rr-ui-event-key="#" class="nav-link animate-underline fw-normal p-0 nav-link" href="<?php echo esc_url($category_link); ?>">
                                    <span class="animate-target text-truncate me-3"><?php echo esc_html($category->name); ?></span>
                                    <span class="text-body-secondary fs-xs ms-auto"><?php echo esc_html($product_count); ?></span>
                                  </a>
                                </div>
                                <?php
                            }
                        }
                    } else {
                        // Mostrar mensaje si no hay categorías
                        echo '<div class="d-block pt-2 mt-1 nav"><span class="text-muted">No hay categorías disponibles</span></div>';
                    }
                    ?>
                  </ul>
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
            <nav class="border-top mt-4 pt-3" aria-label="Paginación de la tienda">
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