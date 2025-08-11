<?php
/**
 * Template de prueba muy simple
 */

get_header(); ?>

<div style="background: red; color: white; padding: 50px; text-align: center; font-size: 24px; margin: 50px;">
    <h1>🎉 ¡FUNCIONA! 🎉</h1>
    <p>Este es el template de prueba simple-slider.php</p>
    <p>Si ves esto, significa que el filtro de template funciona correctamente.</p>
    <p>URL: <?php echo $_SERVER['REQUEST_URI']; ?></p>
    <p>Template: <?php echo basename(__FILE__); ?></p>
</div>

<?php get_footer(); ?> 