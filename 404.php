<?php
/**
 * Template para mostrar páginas de error 404
 *
 * @package MagicShop
 */

get_header(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <main id="main" class="site-main main-content text-center">
                
                <div class="error-404 not-found">
                    <div class="page-content">
                        
                        <div class="error-icon mb-4">
                            <i class="bi bi-exclamation-triangle text-warning" style="font-size: 5rem;"></i>
                        </div>
                        
                        <h1 class="page-title mb-4">
                            <?php esc_html_e('¡Oops! Página no encontrada', 'magicshop'); ?>
                        </h1>
                        
                        <div class="error-code mb-4">
                            <h2 class="display-1 text-muted">404</h2>
                        </div>
                        
                        <p class="lead mb-4">
                            <?php esc_html_e('Lo sentimos, la página que buscas no existe o ha sido movida.', 'magicshop'); ?>
                        </p>
                        
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php esc_html_e('¿Qué puedes hacer?', 'magicshop'); ?></h5>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <i class="bi bi-arrow-right text-primary"></i>
                                                <?php esc_html_e('Verificar que la URL esté escrita correctamente', 'magicshop'); ?>
                                            </li>
                                            <li class="mb-2">
                                                <i class="bi bi-arrow-right text-primary"></i>
                                                <?php esc_html_e('Usar el formulario de búsqueda de abajo', 'magicshop'); ?>
                                            </li>
                                            <li class="mb-2">
                                                <i class="bi bi-arrow-right text-primary"></i>
                                                <?php esc_html_e('Navegar por las categorías del sitio', 'magicshop'); ?>
                                            </li>
                                            <li class="mb-2">
                                                <i class="bi bi-arrow-right text-primary"></i>
                                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Volver a la página de inicio', 'magicshop'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php esc_html_e('Buscar en el sitio', 'magicshop'); ?></h5>
                                        <?php get_search_form(); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php esc_html_e('Categorías populares', 'magicshop'); ?></h5>
                                        <ul class="list-unstyled">
                                            <?php
                                            $categories = get_categories(array(
                                                'orderby' => 'count',
                                                'order' => 'DESC',
                                                'number' => 5,
                                            ));
                                            
                                            foreach ($categories as $category) {
                                                echo '<li class="mb-2">';
                                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="text-decoration-none">';
                                                echo '<i class="bi bi-folder text-primary"></i> ';
                                                echo esc_html($category->name);
                                                echo ' <span class="badge bg-secondary">' . $category->count . '</span>';
                                                echo '</a>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                                <i class="bi bi-house"></i>
                                <?php esc_html_e('Volver al inicio', 'magicshop'); ?>
                            </a>
                        </div>
                        
                    </div>
                </div>
                
            </main>
        </div>
    </div>
</div>

<?php
get_footer(); 