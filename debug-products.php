<?php
/**
 * Debug de productos - Verificar qué hay en la tienda
 */

// Incluir WordPress
require_once('../../../wp-load.php');

echo "<h1>Debug de Productos WooCommerce</h1>";

// Verificar que WooCommerce esté activo
if (!class_exists('WooCommerce')) {
    echo "<p style='color: red;'>❌ WooCommerce no está activo</p>";
    exit;
} else {
    echo "<p style='color: green;'>✅ WooCommerce está activo</p>";
}

// Verificar productos publicados
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);

$products_query = new WP_Query($args);

echo "<h2>Productos encontrados: " . $products_query->found_posts . "</h2>";

if ($products_query->have_posts()) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background: #f0f0f0;'>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Estado</th>";
    echo "<th>Precio</th>";
    echo "<th>SKU</th>";
    echo "<th>Imagen</th>";
    echo "</tr>";
    
    while ($products_query->have_posts()) {
        $products_query->the_post();
        $product = wc_get_product(get_the_ID());
        
        if ($product) {
            echo "<tr>";
            echo "<td>" . $product->get_id() . "</td>";
            echo "<td><strong>" . $product->get_name() . "</strong></td>";
            echo "<td>" . $product->get_status() . "</td>";
            echo "<td>" . $product->get_price_html() . "</td>";
            echo "<td>" . $product->get_sku() . "</td>";
            
            // Imagen
            if ($product->get_image_id()) {
                $image_url = wp_get_attachment_image_url($product->get_image_id(), 'thumbnail');
                echo "<td><img src='" . $image_url . "' style='width: 50px; height: 50px; object-fit: cover;'></td>";
            } else {
                echo "<td>❌ Sin imagen</td>";
            }
            
            echo "</tr>";
        }
    }
    echo "</table>";
    wp_reset_postdata();
} else {
    echo "<p style='color: red;'>❌ No se encontraron productos publicados</p>";
}

// Probar búsqueda específica
echo "<h2>Prueba de búsqueda con 'test':</h2>";

$search_args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    's' => 'test',
    'orderby' => 'title',
    'order' => 'ASC'
);

$search_query = new WP_Query($search_args);

echo "<p>Búsqueda de 'test' encontró: " . $search_query->found_posts . " productos</p>";

if ($search_query->have_posts()) {
    echo "<ul>";
    while ($search_query->have_posts()) {
        $search_query->the_post();
        $product = wc_get_product(get_the_ID());
        echo "<li>" . $product->get_name() . "</li>";
    }
    echo "</ul>";
    wp_reset_postdata();
} else {
    echo "<p>No se encontraron productos con 'test'</p>";
}

// Probar búsqueda con primera letra de productos existentes
echo "<h2>Prueba de búsqueda con primera letra:</h2>";

if ($products_query->have_posts()) {
    $products_query->the_post();
    $product = wc_get_product(get_the_ID());
    $first_letter = substr($product->get_name(), 0, 1);
    
    echo "<p>Probando búsqueda con: '" . $first_letter . "'</p>";
    
    $letter_search_args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        's' => $first_letter,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    
    $letter_search_query = new WP_Query($letter_search_args);
    
    echo "<p>Búsqueda de '" . $first_letter . "' encontró: " . $letter_search_query->found_posts . " productos</p>";
    
    if ($letter_search_query->have_posts()) {
        echo "<ul>";
        while ($letter_search_query->have_posts()) {
            $letter_search_query->the_post();
            $product = wc_get_product(get_the_ID());
            echo "<li>" . $product->get_name() . "</li>";
        }
        echo "</ul>";
        wp_reset_postdata();
    }
}

echo "<h2>Información del sistema:</h2>";
echo "<p>WordPress Version: " . get_bloginfo('version') . "</p>";
echo "<p>WooCommerce Version: " . WC()->version . "</p>";
echo "<p>URL del sitio: " . get_site_url() . "</p>";
echo "<p>Directorio del tema: " . get_template_directory() . "</p>";
?> 