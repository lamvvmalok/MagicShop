<?php
/**
 * Archivo de prueba para verificar la búsqueda AJAX
 */

// Incluir WordPress
require_once('../../../wp-load.php');

// Verificar que WooCommerce esté activo
if (!class_exists('WooCommerce')) {
    echo "WooCommerce no está activo";
    exit;
}

// Buscar productos
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'orderby' => 'title',
    'order' => 'ASC'
);

$products_query = new WP_Query($args);

echo "<h2>Productos disponibles:</h2>";
echo "<ul>";

if ($products_query->have_posts()) {
    while ($products_query->have_posts()) {
        $products_query->the_post();
        $product = wc_get_product(get_the_ID());
        
        if ($product) {
            echo "<li>";
            echo "<strong>" . $product->get_name() . "</strong> - ";
            echo $product->get_price_html();
            
            // Imagen
            if ($product->get_image_id()) {
                $image_url = wp_get_attachment_image_url($product->get_image_id(), 'thumbnail');
                echo "<br><img src='" . $image_url . "' style='width: 50px; height: 50px; object-fit: cover;'>";
            }
            
            echo "</li>";
        }
    }
    wp_reset_postdata();
} else {
    echo "<li>No se encontraron productos</li>";
}

echo "</ul>";

echo "<h2>Prueba de búsqueda AJAX:</h2>";
echo "<input type='text' id='testSearch' placeholder='Buscar productos...'>";
echo "<div id='testResults'></div>";

?>

<script>
document.getElementById('testSearch').addEventListener('input', function() {
    const query = this.value.trim();
    
    if (query.length < 2) {
        document.getElementById('testResults').innerHTML = '';
        return;
    }
    
    const formData = new FormData();
    formData.append('action', 'ajax_search_products');
    formData.append('query', query);
    formData.append('nonce', '<?php echo wp_create_nonce('ajax_search_nonce'); ?>');
    
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta:', data);
        
        if (data.success && data.data && data.data.length > 0) {
            let html = '<h3>Resultados:</h3><ul>';
            data.data.forEach(product => {
                html += `
                    <li>
                        <strong>${product.name}</strong> - ${product.price}
                        <br><img src="${product.image}" style="width: 50px; height: 50px; object-fit: cover;">
                        <br><small>${product.categories}</small>
                    </li>
                `;
            });
            html += '</ul>';
            document.getElementById('testResults').innerHTML = html;
        } else {
            document.getElementById('testResults').innerHTML = '<p>No se encontraron productos</p>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('testResults').innerHTML = '<p>Error en la búsqueda</p>';
    });
});
</script> 