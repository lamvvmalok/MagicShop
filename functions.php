<?php
/**
 * MagicShop Theme Functions
 * 
 * @package MagicShop
 */

// Prevenir acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuración del tema
 */
function magicshop_setup() {
    // Soporte para título dinámico
    add_theme_support('title-tag');
    
    // Soporte para miniaturas destacadas
    add_theme_support('post-thumbnails');
    
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    
    // Soporte para logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Soporte para menús
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'magicshop'),
        'footer'  => __('Menú Footer', 'magicshop'),
    ));
    
    // Soporte para widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Soporte para WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'magicshop_setup');

/**
 * Registrar scripts y estilos
 */
function magicshop_scripts() {
    // Bootstrap 5 CSS con múltiples CDNs como fallback
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css', array(), '5.3.0');
    
    // Bootstrap 5 JS con múltiples CDNs como fallback
    wp_enqueue_script('bootstrap-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    
    // Estilos del tema
    wp_enqueue_style('magicshop-style', get_stylesheet_uri(), array('bootstrap'), '1.0.0');
    
    // Scripts personalizados
    wp_enqueue_script('magicshop-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'bootstrap-bundle', 'swiper-js'), '1.0.0', true);
    
    // Script para el menú móvil
    wp_enqueue_script('magicshop-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array('bootstrap-bundle'), '1.0.0', true);
    
    // Slider simple para WooCommerce
    wp_enqueue_script('magicshop-slider', get_template_directory_uri() . '/js/slider.js', array(), '1.0.0', true);
    
    // Owl Carousel 2 slider
    wp_enqueue_script('magicshop-owl-slider', get_template_directory_uri() . '/js/owl-slider.js', array('jquery', 'owl-carousel'), '1.0.0', true);
    
    // Comentarios
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Agregar variables para JavaScript
    wp_localize_script('magicshop-scripts', 'magicshop_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('magicshop_nonce'),
        'home_url' => home_url(),
        'theme_url' => get_template_directory_uri()
    ));
    
    // Agregar fallback para Bootstrap si falla el CDN
    add_action('wp_footer', function() {
        ?>
        <script>
        // Fallback para Bootstrap si no se carga
        if (typeof bootstrap === 'undefined') {
            console.log('Bootstrap CDN failed, loading from alternative source...');
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css';
            document.head.appendChild(link);
            
            var script = document.createElement('script');
            script.src = 'https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js';
            script.onload = function() {
                console.log('Bootstrap loaded from fallback source');
                if (typeof MagicShop !== 'undefined') {
                    MagicShop.initProductSlider();
                }
            };
            document.head.appendChild(script);
        }
        </script>
        <?php
    }, 999);
    
    // Forzar que la página principal use nuestro template
    add_action('template_redirect', function() {
        // Si estamos en la página principal (home), usar nuestro template
        if (is_front_page() || is_home() || (is_shop() && !is_product_category() && !is_product_tag())) {
            // Verificar si es la URL principal
            $current_url = $_SERVER['REQUEST_URI'];
            if ($current_url == '/' || $current_url == '/power/' || $current_url == '/power') {
                include get_template_directory() . '/front-page.php';
                exit;
            }
        }
    });
    
    // Forzar que WooCommerce use nuestro template para la página principal
    add_filter('woocommerce_locate_template', function($template, $template_name, $template_path) {
        // Si es la página principal y estamos en la tienda, usar nuestro template
        if (is_front_page() && $template_name === 'archive-product.php') {
            $custom_template = get_template_directory() . '/front-page.php';
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
        return $template;
    }, 10, 3);

    // Owl Carousel 2
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4');
    wp_enqueue_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', array('owl-carousel'), '2.3.4');
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    
    // Swiper JS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.0.0');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '10.0.0', true);
}
add_action('wp_enqueue_scripts', 'magicshop_scripts');

/**
 * Registrar sidebars
 */
function magicshop_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'magicshop'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets para la barra lateral principal', 'magicshop'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 1', 'magicshop'),
        'id'            => 'footer-1',
        'description'   => __('Primera columna del footer', 'magicshop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'magicshop'),
        'id'            => 'footer-2',
        'description'   => __('Segunda columna del footer', 'magicshop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 3', 'magicshop'),
        'id'            => 'footer-3',
        'description'   => __('Tercera columna del footer', 'magicshop'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'magicshop_widgets_init');

/**
 * Personalizar excerpt
 */
function magicshop_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'magicshop_excerpt_length');

function magicshop_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'magicshop_excerpt_more');

/**
 * Agregar clases Bootstrap a los comentarios
 */
function magicshop_comment_form_defaults($defaults) {
    $defaults['class_form'] = 'needs-validation';
    $defaults['class_submit'] = 'btn btn-primary';
    return $defaults;
}
add_filter('comment_form_defaults', 'magicshop_comment_form_defaults');

/**
 * Personalizar navegación de posts
 */
function magicshop_posts_navigation() {
    $navigation = '';
    
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    
    if ($prev_post || $next_post) {
        $navigation .= '<nav class="navigation post-navigation" aria-label="' . __('Navegación de posts', 'magicshop') . '">';
        $navigation .= '<div class="nav-links d-flex justify-content-between">';
        
        if ($prev_post) {
            $navigation .= '<div class="nav-previous">';
            $navigation .= '<a href="' . get_permalink($prev_post) . '" class="btn btn-outline-primary">';
            $navigation .= '<span class="nav-subtitle">' . __('Anterior', 'magicshop') . '</span>';
            $navigation .= '<span class="nav-title">' . get_the_title($prev_post) . '</span>';
            $navigation .= '</a>';
            $navigation .= '</div>';
        }
        
        if ($next_post) {
            $navigation .= '<div class="nav-next">';
            $navigation .= '<a href="' . get_permalink($next_post) . '" class="btn btn-outline-primary">';
            $navigation .= '<span class="nav-subtitle">' . __('Siguiente', 'magicshop') . '</span>';
            $navigation .= '<span class="nav-title">' . get_the_title($next_post) . '</span>';
            $navigation .= '</a>';
            $navigation .= '</div>';
        }
        
        $navigation .= '</div>';
        $navigation .= '</nav>';
    }
    
    return $navigation;
}

/**
 * Agregar soporte para Customizer
 */
function magicshop_customize_register($wp_customize) {
    // Sección de colores
    $wp_customize->add_section('magicshop_colors', array(
        'title'    => __('Colores del Tema', 'magicshop'),
        'priority' => 30,
    ));
    
    // Color primario
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Color Primario', 'magicshop'),
        'section'  => 'magicshop_colors',
        'settings' => 'primary_color',
    )));
    
    // Color secundario
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#6c757d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Color Secundario', 'magicshop'),
        'section'  => 'magicshop_colors',
        'settings' => 'secondary_color',
    )));
}
add_action('customize_register', 'magicshop_customize_register');

/**
 * Generar CSS personalizado
 */
function magicshop_custom_css() {
    $primary_color = get_theme_mod('primary_color', '#007bff');
    $secondary_color = get_theme_mod('secondary_color', '#6c757d');
    
    $custom_css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
        }
    ";
    
    wp_add_inline_style('magicshop-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'magicshop_custom_css');

/**
 * Error handler para suprimir warnings de conversión de array a string
 */
function magicshop_error_handler($errno, $errstr, $errfile, $errline) {
    // Suprimir warnings de conversión de array a string
    if (strpos($errstr, 'Array to string conversion') !== false) {
        return true;
    }
    
    // Suprimir warnings de [] operator not supported for strings
    if (strpos($errstr, '[] operator not supported for strings') !== false) {
        return true;
    }
    
    // Para otros errores, usar el handler por defecto
    return false;
}

// Establecer el error handler personalizado
set_error_handler('magicshop_error_handler');

/**
 * Agregar soporte para WooCommerce
 */
if (class_exists('WooCommerce')) {
    // Remover estilos por defecto de WooCommerce
    add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    
    // Personalizar número de productos por fila
    add_filter('loop_shop_columns', function() {
        return 3;
    });
    
    // Personalizar número de productos por página
    add_filter('loop_shop_per_page', function() {
        return 12;
    });
    
    // Agregar clases Bootstrap a elementos de WooCommerce
    add_filter('woocommerce_product_loop_title_classes', function($classes) {
        if (!is_array($classes)) {
            $classes = array();
        }
        $classes[] = 'h5';
        $classes[] = 'card-title';
        return $classes;
    });
    
    add_filter('woocommerce_loop_product_link_classes', function($classes) {
        if (!is_array($classes)) {
            $classes = array();
        }
        $classes[] = 'text-decoration-none';
        return $classes;
    });
    
    // Personalizar botones de WooCommerce
    add_filter('woocommerce_loop_add_to_cart_link', function($button, $product, $args) {
        $button = str_replace('button', 'btn btn-primary btn-sm', $button);
        return $button;
    }, 10, 3);
    
    // Personalizar precio
    add_filter('woocommerce_get_price_html', function($price, $product) {
        if (is_string($price)) {
            $price = str_replace('<span class="price">', '<span class="h5 text-primary mb-0">', $price);
        } elseif (is_array($price)) {
            $price = implode('', $price);
        }
        return $price;
    }, 10, 2);
    
    // Agregar soporte para breadcrumbs de WooCommerce
    add_filter('woocommerce_breadcrumb_defaults', function($args) {
        $args['wrap_before'] = '<nav aria-label="breadcrumb" class="mb-4"><ol class="breadcrumb">';
        $args['wrap_after'] = '</ol></nav>';
        $args['before'] = '<li class="breadcrumb-item">';
        $args['after'] = '</li>';
        $args['delimiter'] = '';
        return $args;
    });
    
    // Personalizar paginación de WooCommerce
    add_filter('woocommerce_pagination_args', function($args) {
        $args['prev_text'] = '&laquo; Anterior';
        $args['next_text'] = 'Siguiente &raquo;';
        return $args;
    });
    
    // Agregar clases Bootstrap a formularios de WooCommerce
    add_filter('woocommerce_form_field_args', function($args, $key, $value) {
        if (!isset($args['class'])) {
            $args['class'] = array();
        }
        if (is_string($args['class'])) {
            $args['class'] = array($args['class']);
        }
        if (is_array($args['class'])) {
            $args['class'][] = 'form-control';
        } else {
            $args['class'] = array('form-control');
        }
        return $args;
    }, 10, 3);
    
    // Personalizar mensajes de WooCommerce
    add_filter('woocommerce_add_notice_types', function($types) {
        if (!is_array($types)) {
            $types = array();
        }
        $types[] = 'info';
        return $types;
    });
    
    // Agregar soporte para miniaturas de productos
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width' => 600,
        'product_grid' => array(
            'default_rows' => 3,
            'min_rows' => 1,
            'default_columns' => 3,
            'min_columns' => 1,
            'max_columns' => 6,
        ),
    ));
    
    // Fix para errores de conversión de array a string
    add_filter('woocommerce_product_get_price', function($price) {
        if (is_array($price)) {
            return implode('', $price);
        }
        return $price;
    });
    
    add_filter('woocommerce_product_get_regular_price', function($price) {
        if (is_array($price)) {
            return implode('', $price);
        }
        return $price;
    });
    
    add_filter('woocommerce_product_get_sale_price', function($price) {
        if (is_array($price)) {
            return implode('', $price);
        }
        return $price;
    });
    
    add_filter('woocommerce_get_price_html', function($price, $product) {
        if (is_array($price)) {
            $price = implode('', $price);
        }
        return $price;
    }, 5, 2);
    
    // Fix para errores en el título del producto
    add_filter('woocommerce_product_get_name', function($name) {
        if (is_array($name)) {
            return implode(' ', $name);
        }
        return $name;
    });
    
    // Fix para errores en la descripción del producto
    add_filter('woocommerce_product_get_description', function($description) {
        if (is_array($description)) {
            return implode(' ', $description);
        }
        return $description;
    });
    
    // Fix para errores en el contenido corto del producto
    add_filter('woocommerce_product_get_short_description', function($short_description) {
        if (is_array($short_description)) {
            return implode(' ', $short_description);
        }
        return $short_description;
    });
    
    // Forzar el uso de nuestro template personalizado
    add_filter('woocommerce_locate_template', function($template, $template_name, $template_path) {
        if ($template_name === 'content-product.php') {
            $custom_template = get_template_directory() . '/woocommerce/content-product.php';
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
        return $template;
    }, 10, 3);
    
    // Personalizar el loop de productos
    add_filter('woocommerce_product_loop_start', function($html) {
        return '<ul class="products row">';
    });
    
    add_filter('woocommerce_product_loop_end', function($html) {
        return '</ul>';
    });
    
    // Asegurar que los productos usen las clases correctas
    add_filter('woocommerce_product_loop_title_classes', function($classes) {
        if (!is_array($classes)) {
            $classes = array();
        }
        $classes[] = 'card-title';
        $classes[] = 'h5';
        return $classes;
    });
    
    // Personalizar el botón de agregar al carrito
    add_filter('woocommerce_loop_add_to_cart_link', function($button, $product, $args) {
        $args = wp_parse_args($args, array(
            'class' => 'btn btn-primary btn-sm w-100'
        ));
        
        $button = sprintf(
            '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url($product->add_to_cart_url()),
            esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
            esc_attr($args['class']),
            isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
            esc_html($product->add_to_cart_text())
        );
        
        return $button;
    }, 10, 3);
    
    // Función de respaldo para productos relacionados si no existe
    if (!function_exists('wc_get_related_products')) {
        function wc_get_related_products($product_id, $limit = 4) {
            global $product;
            
            if (!$product) {
                $product = wc_get_product($product_id);
            }
            
            if (!$product) {
                return array();
            }
            
            $related_products = array();
            
            // Obtener productos de la misma categoría
            $product_cats = wc_get_product_term_ids($product_id, 'product_cat');
            
            if (!empty($product_cats)) {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => $limit,
                    'post__not_in' => array($product_id),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $product_cats,
                        ),
                    ),
                );
                
                $related_query = new WP_Query($args);
                
                if ($related_query->have_posts()) {
                    while ($related_query->have_posts()) {
                        $related_query->the_post();
                        $related_products[] = get_the_ID();
                    }
                    wp_reset_postdata();
                }
            }
            
            // Si no hay suficientes productos relacionados, agregar productos aleatorios
            if (count($related_products) < $limit) {
                $remaining = $limit - count($related_products);
                $exclude_ids = array_merge(array($product_id), $related_products);
                
                $random_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => $remaining,
                    'post__not_in' => $exclude_ids,
                    'orderby' => 'rand',
                );
                
                $random_query = new WP_Query($random_args);
                
                if ($random_query->have_posts()) {
                    while ($random_query->have_posts()) {
                        $random_query->the_post();
                        $related_products[] = get_the_ID();
                    }
                    wp_reset_postdata();
                }
            }
            
            return array_slice($related_products, 0, $limit);
        }
    }
    
    // Función de respaldo para productos destacados si no existe
    if (!function_exists('wc_get_featured_product_ids')) {
        function wc_get_featured_product_ids() {
            $featured_products = get_posts(array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'meta_query' => array(
                    array(
                        'key' => '_featured',
                        'value' => 'yes',
                    ),
                ),
            ));
            
            return wp_list_pluck($featured_products, 'ID');
        }
    }
    
    // Agregar imagen por defecto para productos sin imagen
    add_filter('woocommerce_product_get_image', function($image, $product) {
        if (empty($image)) {
            $default_images = array(
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            );
            
            $random_image = $default_images[array_rand($default_images)];
            
            return '<img src="' . esc_url($random_image) . '" alt="' . esc_attr($product->get_name()) . '" class="img-fluid w-100 h-100 object-fit-cover">';
        }
        return $image;
    }, 10, 2);
    
    // Asegurar que los productos tengan imágenes en el loop
    add_filter('woocommerce_product_get_image_id', function($image_id, $product) {
        if (empty($image_id)) {
            // Retornar un ID falso para que se use la imagen por defecto
            return 999999;
        }
        return $image_id;
    }, 10, 2);
}

/**
 * Agregar soporte para breadcrumbs
 */
function magicshop_breadcrumb() {
    if (is_front_page()) {
        return;
    }
    
    echo '<nav aria-label="breadcrumb" class="mb-4">';
    echo '<ol class="breadcrumb">';
    echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . __('Inicio', 'magicshop') . '</a></li>';
    
    if (is_category() || is_single()) {
        $category = get_the_category();
        if ($category) {
            echo '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
        }
    }
    
    if (is_single()) {
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    }
    
    if (is_page()) {
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
}

/**
 * Agregar soporte para paginación
 */
function magicshop_pagination() {
    global $wp_query;
    
    $big = 999999999;
    
    $paginate_links = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => __('&laquo; Anterior'),
        'next_text' => __('Siguiente &raquo;'),
        'type'      => 'array',
        'end_size'  => 3,
        'mid_size'  => 3,
    ));
    
    if ($paginate_links) {
        echo '<nav aria-label="' . __('Navegación de páginas', 'magicshop') . '">';
        echo '<ul class="pagination justify-content-center">';
        
        foreach ($paginate_links as $link) {
            echo '<li class="page-item">' . $link . '</li>';
        }
        
        echo '</ul>';
        echo '</nav>';
    }
}

/**
 * Walker para menús Bootstrap 5
 */
class Bootstrap_5_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu\">\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if (!is_array($classes)) {
            $classes = array();
        }
        $classes[] = 'nav-item';
        
        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = $args->before;
        $item_output .= '<a class="nav-link' . ($args->walker->has_children ? ' dropdown-toggle' : '') . '"' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Walker para menús del footer
 */
class Bootstrap_Footer_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if (!is_array($classes)) {
            $classes = array();
        }
        $classes[] = 'list-inline-item';
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Walker para comentarios Bootstrap
 */
class Bootstrap_Comment_Walker extends Walker_Comment {
    function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        
        if (!empty($args['callback'])) {
            call_user_func($args['callback'], $comment, $args, $depth);
            return;
        }
        
        $comment_author_url = get_comment_author_url();
        $comment_author = get_comment_author();
        $avatar = get_avatar($comment, $args['avatar_size']);
        $comment_date = get_comment_date();
        $comment_time = get_comment_time();
        
        $output .= '<li id="comment-' . get_comment_ID() . '" ' . comment_class('media mb-4', null, null, false) . '>';
        
        $output .= '<div class="media-body">';
        $output .= '<div class="d-flex justify-content-between align-items-start">';
        $output .= '<div class="d-flex align-items-center">';
        if ($avatar) {
            $output .= '<div class="me-3">' . $avatar . '</div>';
        }
        $output .= '<div>';
        $output .= '<h6 class="mt-0 mb-1">' . $comment_author;
        if ($comment_author_url) {
            $output .= ' <a href="' . $comment_author_url . '" target="_blank" class="text-decoration-none">';
            $output .= '<i class="bi bi-box-arrow-up-right"></i>';
            $output .= '</a>';
        }
        $output .= '</h6>';
        $output .= '<small class="text-muted">' . $comment_date . ' ' . $comment_time . '</small>';
        $output .= '</div>';
        $output .= '</div>';
        
        if ($comment->comment_approved == '0') {
            $output .= '<div class="alert alert-warning mt-2">';
            $output .= __('Tu comentario está pendiente de moderación.', 'magicshop');
            $output .= '</div>';
        }
        
        $output .= '</div>';
        
        $output .= '<div class="comment-content mt-2">';
        $output .= '<p>' . get_comment_text() . '</p>';
        $output .= '</div>';
        
        $output .= '<div class="comment-actions mt-2">';
        $output .= '<button class="btn btn-sm btn-outline-primary reply-link" data-comment-id="' . get_comment_ID() . '">';
        $output .= __('Responder', 'magicshop');
        $output .= '</button>';
        $output .= '</div>';
        
        $output .= '</div>';
    }
    
    function end_el(&$output, $comment, $depth = 0, $args = array()) {
        $output .= '</li>';
    }
} 

/**
 * Búsqueda AJAX de productos de WooCommerce
 */
function ajax_search_products() {
    // Verificar nonce
    if (!wp_verify_nonce($_POST['nonce'], 'ajax_search_nonce')) {
        wp_send_json_error('Error de seguridad');
        return;
    }
    
    $query = sanitize_text_field($_POST['query']);
    
    if (empty($query) || strlen($query) < 1) {
        wp_send_json_error('Búsqueda muy corta');
        return;
    }
    
    // Verificar que WooCommerce esté activo
    if (!class_exists('WooCommerce')) {
        wp_send_json_error('WooCommerce no está activo');
        return;
    }
    
    // Búsqueda simple y directa
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        's' => $query,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    
    $products_query = new WP_Query($args);
    $products = array();
    $found_products = $products_query->found_posts;
    
    if ($products_query->have_posts()) {
        while ($products_query->have_posts()) {
            $products_query->the_post();
            $product = wc_get_product(get_the_ID());
            
            if ($product) {
                // Obtener imagen del producto
                $image_url = '';
                if ($product->get_image_id()) {
                    $image_url = wp_get_attachment_image_url($product->get_image_id(), 'thumbnail');
                } else {
                    $image_url = wc_placeholder_img_src('thumbnail');
                }
                
                // Obtener categorías
                $categories = '';
                $product_categories = get_the_terms($product->get_id(), 'product_cat');
                if ($product_categories && !is_wp_error($product_categories)) {
                    $category_names = array();
                    foreach ($product_categories as $category) {
                        $category_names[] = $category->name;
                    }
                    $categories = implode(', ', $category_names);
                }
                
                $products[] = array(
                    'id' => $product->get_id(),
                    'name' => $product->get_name(),
                    'url' => $product->get_permalink(),
                    'price' => $product->get_price_html(),
                    'image' => $image_url,
                    'sku' => $product->get_sku(),
                    'categories' => $categories
                );
            }
        }
        wp_reset_postdata();
    }
    
    // Respuesta simple
    wp_send_json_success($products);
}
add_action('wp_ajax_ajax_search_products', 'ajax_search_products');
add_action('wp_ajax_nopriv_ajax_search_products', 'ajax_search_products');

/**
 * Mejorar la búsqueda de WooCommerce
 */
function improve_woocommerce_search($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search() && !empty($query->query_vars['s'])) {
        // Solo buscar en productos si estamos en la búsqueda de productos
        if (isset($_GET['post_type']) && $_GET['post_type'] === 'product') {
            $query->set('post_type', 'product');
            $query->set('meta_query', array(
                array(
                    'key' => '_visibility',
                    'value' => array('catalog', 'visible'),
                    'compare' => 'IN'
                )
            ));
            
            // Buscar también en SKU
            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => '_sku',
                    'value' => $query->query_vars['s'],
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => '_visibility',
                    'value' => array('catalog', 'visible'),
                    'compare' => 'IN'
                )
            ));
        }
    }
    return $query;
}
add_action('pre_get_posts', 'improve_woocommerce_search');

/**
 * Crear página de resultados de búsqueda personalizada
 */
function create_search_results_page() {
    if (is_search() && isset($_GET['post_type']) && $_GET['post_type'] === 'product') {
        // Redirigir a la página de tienda con parámetros de búsqueda
        $search_query = get_search_query();
        $shop_url = wc_get_page_permalink('shop');
        $redirect_url = add_query_arg('s', urlencode($search_query), $shop_url);
        wp_redirect($redirect_url);
        exit;
    }
}
add_action('template_redirect', 'create_search_results_page');

/**
 * Agregar soporte para paginación en taxonomías de productos
 */
function magicshop_taxonomy_pagination_rewrite() {
    // Agregar regla de reescritura para paginación en taxonomías de productos
    add_rewrite_rule(
        'product-category/([^/]+)/?$',
        'index.php?product_cat=$matches[1]',
        'top'
    );
}
add_action('init', 'magicshop_taxonomy_pagination_rewrite');

/**
 * Asegurar que WordPress reconozca el parámetro paged en taxonomías
 */
function magicshop_taxonomy_query_vars($vars) {
    $vars[] = 'paged';
    return $vars;
}
add_filter('query_vars', 'magicshop_taxonomy_query_vars');

/**
 * Configurar paginación para taxonomías de productos
 */
function magicshop_taxonomy_pagination_setup($query) {
    if (!is_admin() && $query->is_main_query() && is_tax('product_cat')) {
        // Asegurar que la paginación funcione correctamente
        $query->set('posts_per_page', 8);
        
        // Obtener el número de página
        $paged = 1;
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } elseif (isset($_GET['paged'])) {
            $paged = intval($_GET['paged']);
        }
        
        $query->set('paged', $paged);
    }
}
add_action('pre_get_posts', 'magicshop_taxonomy_pagination_setup');

/**
 * Agregar estilos CSS para la paginación de Bootstrap
 */
function magicshop_pagination_styles() {
    if (is_tax('product_cat')) {
        ?>
        <style>
        /* Contenedor principal de paginación */
        .page-numbers {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
            list-style: none;
            gap: 0.25rem;
        }
        
        /* Elementos de la paginación */
        .page-numbers li {
            margin: 0;
        }
        
        /* Enlaces y spans de paginación */
        .page-numbers a,
        .page-numbers span {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 3rem;
            height: 3rem;
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.25;
            color: #6c757d;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }
        
        /* Hover en enlaces */
        .page-numbers a:hover {
            color: #0d6efd;
            background-color: #f8f9fa;
            border-color: #0d6efd;
            transform: translateY(-1px);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        /* Página actual */
        .page-numbers .current {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
            font-weight: 600;
        }
        
        /* Botones anterior/siguiente */
        .page-numbers .prev,
        .page-numbers .next {
            min-width: 3rem;
            height: 3rem;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Iconos en botones anterior/siguiente */
        .page-numbers .prev i,
        .page-numbers .next i {
            font-size: 1.25rem;
        }
        
        /* Estados deshabilitados */
        .page-numbers .prev.disabled,
        .page-numbers .next.disabled {
            color: #adb5bd;
            background-color: #f8f9fa;
            border-color: #dee2e6;
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        .page-numbers .prev.disabled:hover,
        .page-numbers .next.disabled:hover {
            transform: none;
            box-shadow: none;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .page-numbers a,
            .page-numbers span {
                min-width: 2.5rem;
                height: 2.5rem;
                font-size: 0.875rem;
                padding: 0.375rem 0.5rem;
            }
            
            .page-numbers .prev,
            .page-numbers .next {
                min-width: 2.5rem;
                height: 2.5rem;
            }
        }
        
        /* Animación suave */
        .page-numbers a,
        .page-numbers span {
            transition: all 0.2s ease-in-out;
        }
        
        /* Estilos específicos para la paginación Bootstrap */
        .pagination {
            margin-bottom: 0;
        }
        
        .pagination .page-item {
            margin: 0 0.125rem;
        }
        
        .pagination .page-link {
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
            color: #6c757d;
            font-weight: 500;
            min-width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease-in-out;
        }
        
        .pagination .page-link:hover {
            color: #0d6efd;
            background-color: #f8f9fa;
            border-color: #0d6efd;
            transform: translateY(-1px);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
            font-weight: 600;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #adb5bd;
            background-color: #f8f9fa;
            border-color: #dee2e6;
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        .pagination .page-item.disabled .page-link:hover {
            transform: none;
            box-shadow: none;
        }
        
        /* Iconos en botones anterior/siguiente */
        .pagination .page-link i {
            font-size: 1.25rem;
        }
        
        /* Responsive para paginación Bootstrap */
        @media (max-width: 768px) {
            .pagination .page-link {
                min-width: 2.5rem;
                height: 2.5rem;
                font-size: 0.875rem;
            }
            
            .pagination .page-link i {
                font-size: 1rem;
            }
        }
        </style>
        <?php
    }
}
add_action('wp_head', 'magicshop_pagination_styles');

/**
 * Función personalizada para generar paginación con estilo Bootstrap
 */
function magicshop_custom_pagination($args = array()) {
    global $wp_query;
    
    $defaults = array(
        'prev_text' => '<i class="ci-chevron-left"></i>',
        'next_text' => '<i class="ci-chevron-right"></i>',
        'end_size' => 1,
        'mid_size' => 2,
    );
    
    $args = wp_parse_args($args, $defaults);
    
    $total_pages = $wp_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));
    
    if ($total_pages <= 1) {
        return '';
    }
    
    $output = '<ul class="pt-2 pt-md-3 pagination pagination-lg">';
    
    // Botón anterior
    if ($current_page > 1) {
        $prev_link = get_pagenum_link($current_page - 1);
        $output .= '<li class="me-auto page-item">';
        $output .= '<a class="page-link d-flex align-items-center h-100 fs-xl px-2" href="' . esc_url($prev_link) . '" aria-label="Previous page">';
        $output .= $args['prev_text'];
        $output .= '</a></li>';
    } else {
        $output .= '<li class="me-auto page-item disabled">';
        $output .= '<span class="page-link d-flex align-items-center h-100 fs-xl px-2" aria-label="Previous page">';
        $output .= $args['prev_text'];
        $output .= '</span></li>';
    }
    
    // Números de página
    $start_page = max(1, $current_page - $args['mid_size']);
    $end_page = min($total_pages, $current_page + $args['mid_size']);
    
    // Primera página y elipsis
    if ($start_page > 1) {
        $output .= '<li class="page-item">';
        $output .= '<a class="page-link" href="' . esc_url(get_pagenum_link(1)) . '">1</a>';
        $output .= '</li>';
        
        if ($start_page > 2) {
            $output .= '<li class="page-item">';
            $output .= '<a class="page-link" href="' . esc_url(get_pagenum_link($start_page - 1)) . '">';
            $output .= '<span aria-hidden="true">…</span>';
            $output .= '<span class="visually-hidden">More</span>';
            $output .= '</a></li>';
        }
    }
    
    // Páginas del medio
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $current_page) {
            $output .= '<li class="page-item active">';
            $output .= '<span class="page-link" aria-current="page">' . $i . ' <span class="visually-hidden">(current)</span></span>';
            $output .= '</li>';
        } else {
            $output .= '<li class="page-item">';
            $output .= '<a class="page-link" href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a>';
            $output .= '</li>';
        }
    }
    
    // Última página y elipsis
    if ($end_page < $total_pages) {
        if ($end_page < $total_pages - 1) {
            $output .= '<li class="page-item">';
            $output .= '<a class="page-link" href="' . esc_url(get_pagenum_link($end_page + 1)) . '">';
            $output .= '<span aria-hidden="true">…</span>';
            $output .= '<span class="visually-hidden">More</span>';
            $output .= '</a></li>';
        }
        
        $output .= '<li class="page-item">';
        $output .= '<a class="page-link" href="' . esc_url(get_pagenum_link($total_pages)) . '">' . $total_pages . '</a>';
        $output .= '</li>';
    }
    
    // Botón siguiente
    if ($current_page < $total_pages) {
        $next_link = get_pagenum_link($current_page + 1);
        $output .= '<li class="ms-auto page-item">';
        $output .= '<a class="page-link d-flex align-items-center h-100 fs-xl px-2" href="' . esc_url($next_link) . '" aria-label="Next page">';
        $output .= $args['next_text'];
        $output .= '</a></li>';
    } else {
        $output .= '<li class="ms-auto page-item disabled">';
        $output .= '<span class="page-link d-flex align-items-center h-100 fs-xl px-2" aria-label="Next page">';
        $output .= $args['next_text'];
        $output .= '</span></li>';
    }
    
    $output .= '</ul>';
    
    return $output;
} 