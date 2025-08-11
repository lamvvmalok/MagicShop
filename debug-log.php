<?php
/**
 * Debug log viewer
 */

// Verificar si el usuario está logueado como admin
if (!current_user_can('manage_options')) {
    wp_die('Acceso denegado');
}

// Obtener la ruta del log de WordPress
$wp_log_file = WP_CONTENT_DIR . '/debug.log';

echo '<h1>Debug Log Viewer</h1>';

if (file_exists($wp_log_file)) {
    echo '<h2>Últimas 50 líneas del debug.log:</h2>';
    echo '<pre style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; max-height: 500px; overflow-y: auto;">';
    
    $lines = file($wp_log_file);
    $last_lines = array_slice($lines, -50);
    
    foreach ($last_lines as $line) {
        echo htmlspecialchars($line);
    }
    
    echo '</pre>';
} else {
    echo '<p>No se encontró el archivo debug.log en: ' . $wp_log_file . '</p>';
}

// Información del sistema
echo '<h2>Información del Sistema:</h2>';
echo '<ul>';
echo '<li><strong>WP_DEBUG:</strong> ' . (defined('WP_DEBUG') && WP_DEBUG ? 'true' : 'false') . '</li>';
echo '<li><strong>WP_DEBUG_LOG:</strong> ' . (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG ? 'true' : 'false') . '</li>';
echo '<li><strong>Template Directory:</strong> ' . get_template_directory() . '</li>';
echo '<li><strong>Current URL:</strong> ' . $_SERVER['REQUEST_URI'] . '</li>';
echo '<li><strong>is_front_page():</strong> ' . (is_front_page() ? 'true' : 'false') . '</li>';
echo '<li><strong>is_home():</strong> ' . (is_home() ? 'true' : 'false') . '</li>';
echo '<li><strong>is_shop():</strong> ' . (is_shop() ? 'true' : 'false') . '</li>';
echo '</ul>';

// Verificar archivos de template
echo '<h2>Archivos de Template:</h2>';
$template_dir = get_template_directory();
$templates = ['test-slider.php', 'front-page.php', 'home.php', 'index.php'];

echo '<ul>';
foreach ($templates as $template) {
    $path = $template_dir . '/' . $template;
    echo '<li><strong>' . $template . ':</strong> ' . (file_exists($path) ? '✅ Existe' : '❌ No existe') . ' (' . $path . ')</li>';
}
echo '</ul>';

// Verificar contenido del test-slider.php
echo '<h2>Contenido de test-slider.php:</h2>';
$test_slider_path = $template_dir . '/test-slider.php';
if (file_exists($test_slider_path)) {
    echo '<pre style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; max-height: 300px; overflow-y: auto;">';
    echo htmlspecialchars(file_get_contents($test_slider_path));
    echo '</pre>';
} else {
    echo '<p>El archivo test-slider.php no existe.</p>';
}
?> 