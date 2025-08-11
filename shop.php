<?php
/**
 * Template para la página de tienda - Categorías de WooCommerce
 */

get_header('shop'); 
?>

<main class="content-wrapper">
      <div aria-label="breadcrumb" class="pt-3 my-3 my-md-4 container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Categorías</li>
        </ol>
      </div>
      <h1 class="h3 container mb-sm-4 container">Categorías de la tienda</h1>
      <section class="mb-4 container">
        <div data-simplebar="init" data-simplebar-auto-hide="false">
          <div class="simplebar-wrapper">
            <div class="simplebar-height-auto-observer-wrapper">
              <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
              <div class="simplebar-offset">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content">
                  <div class="simplebar-content">
                    <div style="min-width:960px" class="g-0 row row-cols-6">
                      <?php
                      // Obtener las primeras 6 categorías para la barra de marcas
                      $brand_categories = get_terms(array(
                          'taxonomy' => 'product_cat',
                          'hide_empty' => true,
                          'parent' => 0,
                          'number' => 6,
                      ));

                      if (!empty($brand_categories) && !is_wp_error($brand_categories)) {
                          foreach ($brand_categories as $category) {
                              $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                              $image = wp_get_attachment_url($thumbnail_id);
                              
                              if (!$image) {
                                  $image = get_template_directory_uri() . '/img/placeholder-category.jpg';
                              }
                              ?>
                              <div class="col">
                                <a class="d-flex justify-content-center py-3 px-2 px-xl-3" href="<?php echo esc_url(get_term_link($category)); ?>">
                                  <img alt="<?php echo esc_attr($category->name); ?>" loading="lazy" width="164" height="80" decoding="async" data-nimg="1" class="d-none-dark" style="color:transparent" src="<?php echo esc_url($image); ?>" />
                                  <img alt="<?php echo esc_attr($category->name); ?>" loading="lazy" width="164" height="80" decoding="async" data-nimg="1" class="d-none d-block-dark" style="color:transparent" src="<?php echo esc_url($image); ?>" />
                                </a>
                              </div>
                              <?php
                          }
                      }
                      ?>
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
      <section class="container">
        <!--$-->
        <div class="gy-5 row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
          <?php
          // Obtener todas las categorías de WooCommerce
          $product_categories = get_terms(array(
              'taxonomy' => 'product_cat',
              'hide_empty' => true,
              'parent' => 0,
          ));

          if (!empty($product_categories) && !is_wp_error($product_categories)) {
              foreach ($product_categories as $category) {
                  // Obtener la imagen de la categoría
                  $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                  $image = wp_get_attachment_url($thumbnail_id);
                  
                  if (!$image) {
                      $image = get_template_directory_uri() . '/img/placeholder-category.jpg';
                  }
                  
                  // Obtener subcategorías
                  $subcategories = get_terms(array(
                      'taxonomy' => 'product_cat',
                      'hide_empty' => true,
                      'parent' => $category->term_id,
                      'number' => 5, // Máximo 5 subcategorías
                  ));
                  ?>
                  
                  <div class="col">
                    <div class="hover-effect-scale">
                      <a class="d-block bg-body-tertiary rounded p-4 mb-4" href="<?php echo esc_url(get_term_link($category)); ?>">
                        <img alt="<?php echo esc_attr($category->name); ?>" loading="lazy" width="362" height="258" decoding="async" data-nimg="1" class="hover-effect-target" style="color:transparent" src="<?php echo esc_url($image); ?>" />
                      </a>
                      <h2 class="h6 d-flex w-100 pb-2 mb-1">
                        <a class="animate-underline animate-target d-inline text-truncate" href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                      </h2>
                      <ul class="nav flex-column gap-2 mt-n1">
                        <?php
                        if (!empty($subcategories) && !is_wp_error($subcategories)) {
                            foreach ($subcategories as $subcategory) {
                                ?>
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="<?php echo esc_url(get_term_link($subcategory)); ?>"><?php echo esc_html($subcategory->name); ?></a>
                                </li>
                                <?php
                            }
                        } else {
                            // Si no hay subcategorías, mostrar algunos productos de la categoría
                            $products = wc_get_products(array(
                                'category' => array($category->slug),
                                'limit' => 5,
                                'status' => 'publish',
                            ));
                            
                            foreach ($products as $product) {
                                ?>
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                  
                  <?php
              }
          }
          ?>
        </div>
        <!--/$-->
      </section>
      <section class="pb-4 pt-5 mb-3 container">
        <div class="g-3 g-lg-4 row">
          <?php
          // Obtener un producto destacado para el banner principal
          $featured_products = wc_get_featured_product_ids();
          $main_product = null;
          
          if (!empty($featured_products)) {
              $main_product = wc_get_product($featured_products[0]);
          } else {
              // Si no hay productos destacados, obtener el primer producto
              $products = wc_get_products(array(
                  'limit' => 1,
                  'status' => 'publish',
              ));
              if (!empty($products)) {
                  $main_product = $products[0];
              }
          }
          ?>
          
          <div class="col-md-7">
            <div class="position-relative d-flex flex-column flex-sm-row align-items-center h-100 rounded-5 overflow-hidden px-5 px-sm-0 pe-sm-4">
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark rtl-flip" style="background:linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark rtl-flip" style="background:linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
              <div class="position-relative z-1 text-center text-sm-start pt-4 pt-sm-0 ps-xl-4 mt-2 mt-sm-0 order-sm-2">
                <h2 class="h3 mb-2"><?php echo $main_product ? esc_html($main_product->get_name()) : 'Producto Destacado'; ?></h2>
                <p class="fs-sm text-light-emphasis mb-sm-4"><?php echo $main_product ? esc_html($main_product->get_short_description()) : 'Descripción del producto'; ?></p>
                <a class="btn btn-primary" href="<?php echo $main_product ? esc_url($main_product->get_permalink()) : '#'; ?>">
                  Desde <?php echo $main_product ? $main_product->get_price_html() : '$0'; ?> <i class="ci-arrow-up-right fs-base ms-1 me-n1"></i>
                </a>
              </div>
              <div class="position-relative z-1 w-100 align-self-end order-sm-1" style="max-width:416px">
                <?php if ($main_product && $main_product->get_image_id()) : ?>
                  <img alt="<?php echo esc_attr($main_product->get_name()); ?>" width="832" height="640" decoding="async" data-nimg="1" style="color:transparent" src="<?php echo esc_url(wp_get_attachment_image_url($main_product->get_image_id(), 'large')); ?>" />
                <?php else : ?>
                  <img alt="Producto Destacado" width="832" height="640" decoding="async" data-nimg="1" style="color:transparent" src="<?php echo get_template_directory_uri(); ?>/img/placeholder-product.jpg" />
                <?php endif; ?>
              </div>
            </div>
          </div>
          
          <?php
          // Obtener otro producto para el banner secundario
          $second_product = null;
          if (!empty($featured_products) && count($featured_products) > 1) {
              $second_product = wc_get_product($featured_products[1]);
          } else {
              $products = wc_get_products(array(
                  'limit' => 1,
                  'offset' => 1,
                  'status' => 'publish',
              ));
              if (!empty($products)) {
                  $second_product = $products[0];
              }
          }
          ?>
          
          <div class="col-md-5">
            <div class="position-relative d-flex flex-column align-items-center justify-content-between h-100 rounded-5 overflow-hidden pt-3">
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark rtl-flip" style="background:linear-gradient(90deg, #fdcbf1 0%, #fdcbf1 1%, #ffecfa 100%)"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark rtl-flip" style="background:linear-gradient(90deg, #362131 0%, #322730 100%)"></span>
              <div class="position-relative z-1 text-center pt-3 mx-4">
                <i class="ci-apple text-body-emphasis fs-3 mb-3"></i>
                <p class="fs-sm text-light-emphasis mb-1">Oferta de la semana</p>
                <h2 class="h3 mb-4"><?php echo $second_product ? esc_html($second_product->get_name()) : 'Producto en Oferta'; ?></h2>
              </div>
              <a class="position-relative z-1 d-block w-100" href="<?php echo $second_product ? esc_url($second_product->get_permalink()) : '#'; ?>">
                <?php if ($second_product && $second_product->get_image_id()) : ?>
                  <img alt="<?php echo esc_attr($second_product->get_name()); ?>" width="1050" height="318" decoding="async" data-nimg="1" style="color:transparent" src="<?php echo esc_url(wp_get_attachment_image_url($second_product->get_image_id(), 'large')); ?>" />
                <?php else : ?>
                  <img alt="Producto en Oferta" width="1050" height="318" decoding="async" data-nimg="1" style="color:transparent" src="<?php echo get_template_directory_uri(); ?>/img/placeholder-product.jpg" />
                <?php endif; ?>
              </a>
            </div>
          </div>
        </div>
      </section>
      <section class="pb-5 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5 container">
        <div class="g-4 row-cols-lg-4 row row-cols-md-3 row-cols-2">
          <?php
          // Obtener productos para mostrar en la sección de productos
          $products = wc_get_products(array(
              'limit' => 8,
              'status' => 'publish',
          ));

          if (!empty($products)) {
              foreach ($products as $product) {
                  ?>
                  <div class="col">
                    <div class="position-relative mb-3">
                      <a href="<?php echo esc_url($product->get_permalink()); ?>" class="d-block">
                        <?php if ($product->get_image_id()) : ?>
                          <img alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" width="282" height="306" decoding="async" data-nimg="1" class="rounded" style="color:transparent" src="<?php echo esc_url(wp_get_attachment_image_url($product->get_image_id(), 'medium')); ?>" />
                        <?php else : ?>
                          <img alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" width="282" height="306" decoding="async" data-nimg="1" class="rounded" style="color:transparent" src="<?php echo get_template_directory_uri(); ?>/img/placeholder-product.jpg" />
                        <?php endif; ?>
                      </a>
                    </div>
                                         <p class="mb-1 text-muted">
                       <small><?php echo strip_tags(wc_get_product_category_list($product->get_id(), ', ')); ?></small>
                     </p>
                    <h6 class="mb-2">
                      <a href="<?php echo esc_url($product->get_permalink()); ?>" class="text-decoration-none text-dark"><?php echo esc_html($product->get_name()); ?></a>
                    </h6>
                    <p class="mb-0 text-primary fw-bold">
                      <?php echo $product->get_price_html(); ?>
                    </p>
                  </div>
                  <?php
              }
          }
          ?>
        </div>
      </section>
      <section class="bg-body-tertiary py-5">
        <div class="pt-sm-2 pt-md-3 pt-lg-4 pt-xl-5 container">
          <div class="row">
            <div class="mb-5 mb-md-0 col-lg-5 col-md-6">
              <h2 class="h4 mb-2">Suscríbete a nuestro newsletter</h2>
              <p class="text-body pb-2 pb-ms-3">Recibe nuestras últimas actualizaciones sobre productos y promociones</p>
              <form noValidate="" class="d-flex pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">
                <input placeholder="Tu email" required="" type="email" class="w-100 me-2 form-control form-control-lg" />
                <button type="submit" class="btn btn-primary btn-lg">Suscribirse</button>
              </form>
              <div class="d-flex gap-3">
                <a role="button" tabindex="0" href="#" aria-label="Síguenos en Instagram" class="btn-icon rounded-circle btn btn-secondary">
                  <i class="ci-instagram fs-base"></i>
                </a>
                <a role="button" tabindex="0" href="#" aria-label="Síguenos en Facebook" class="btn-icon rounded-circle btn btn-secondary">
                  <i class="ci-facebook fs-base"></i>
                </a>
                <a role="button" tabindex="0" href="#" aria-label="Síguenos en YouTube" class="btn-icon rounded-circle btn btn-secondary">
                  <i class="ci-youtube fs-base"></i>
                </a>
                <a role="button" tabindex="0" href="#" aria-label="Síguenos en Telegram" class="btn-icon rounded-circle btn btn-secondary">
                  <i class="ci-telegram fs-base"></i>
                </a>
              </div>
            </div>
            <div class="offset-lg-1 offset-xl-2 col-xl-4 col-lg-5 col-md-6">
              <ul class="list-unstyled d-flex flex-column gap-4 ps-md-4 ps-lg-0 mb-3">
                <?php
                // Obtener productos para la sección de blog/vlog
                $blog_products = wc_get_products(array(
                    'limit' => 3,
                    'status' => 'publish',
                ));

                if (!empty($blog_products)) {
                    foreach ($blog_products as $product) {
                        ?>
                        <li class="flex-nowrap align-items-center position-relative nav">
                          <div class="flex-shrink-0" style="width:140px">
                            <?php if ($product->get_image_id()) : ?>
                              <img alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" width="280" height="172" decoding="async" data-nimg="1" class="rounded" style="color:transparent" src="<?php echo esc_url(wp_get_attachment_image_url($product->get_image_id(), 'medium')); ?>" />
                            <?php else : ?>
                              <img alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" width="280" height="172" decoding="async" data-nimg="1" class="rounded" style="color:transparent" src="<?php echo get_template_directory_uri(); ?>/img/placeholder-product.jpg" />
                            <?php endif; ?>
                          </div>
                          <div class="ps-3">
                            <div class="fs-xs text-body-secondary lh-sm mb-2"><?php echo strip_tags(wc_get_product_category_list($product->get_id(), ', ')); ?></div>
                            <a data-rr-ui-event-key="<?php echo esc_url($product->get_permalink()); ?>" class="fs-sm hover-effect-underline stretched-link p-0 nav-link" href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                          </div>
                        </li>
                        <?php
                    }
                }
                ?>
              </ul>
              <div class="ps-md-4 ps-lg-0 nav">
                <a data-rr-ui-event-key="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn animate-underline text-decoration-none px-0 nav-link" href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
                  <span class="animate-target">Ver todos</span>
                  <i class="ci-chevron-right fs-base ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php
get_footer('shop');
?>