<?php
/**
 * Template para el formulario de búsqueda
 *
 * @package MagicShop
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="search" class="form-control" placeholder="<?php esc_attr_e('Buscar...', 'magicshop'); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" aria-label="<?php esc_attr_e('Buscar en', 'magicshop'); ?> <?php bloginfo('name'); ?>">
        <button class="btn btn-primary" type="submit">
            <i class="bi bi-search"></i>
            <span class="screen-reader-text"><?php esc_html_e('Buscar', 'magicshop'); ?></span>
        </button>
    </div>
</form> 