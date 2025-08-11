<?php
/**
 * Template para mostrar resultados de búsqueda
 *
 * @package MagicShop
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <main id="main" class="site-main main-content">
                
                <header class="page-header mb-4">
                    <h1 class="page-title">
                        <?php
                        printf(
                            esc_html__('Resultados de búsqueda para: %s', 'magicshop'),
                            '<span class="text-primary">' . get_search_query() . '</span>'
                        );
                        ?>
                    </h1>
                </header>
                
                <?php if (have_posts()) : ?>
                    
                    <div class="row">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6 mb-4">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('post h-100'); ?>>
                                    
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="post-thumbnail mb-3">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <header class="entry-header">
                                        <?php the_title(sprintf('<h2 class="entry-title post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                                        
                                        <div class="entry-meta post-meta">
                                            <span class="posted-on">
                                                <i class="bi bi-calendar"></i>
                                                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </time>
                                            </span>
                                            
                                            <span class="byline ms-3">
                                                <i class="bi bi-person"></i>
                                                <span class="author vcard">
                                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <?php echo esc_html(get_the_author()); ?>
                                                    </a>
                                                </span>
                                            </span>
                                            
                                            <?php if (has_category()) : ?>
                                                <span class="cat-links ms-3">
                                                    <i class="bi bi-folder"></i>
                                                    <?php the_category(', '); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </header>
                                    
                                    <div class="entry-content post-content">
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3"><?php esc_html_e('Leer más', 'magicshop'); ?></a>
                                    </div>
                                    
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    
                    <?php
                    // Navegación de posts
                    magicshop_pagination();
                    ?>
                    
                <?php else : ?>
                    
                    <div class="no-posts">
                        <div class="alert alert-info" role="alert">
                            <h2><?php esc_html_e('No se encontraron resultados', 'magicshop'); ?></h2>
                            <p><?php esc_html_e('Lo sentimos, pero no se encontraron resultados para tu búsqueda. Intenta con palabras diferentes.', 'magicshop'); ?></p>
                            
                            <div class="mt-4">
                                <h5><?php esc_html_e('Sugerencias:', 'magicshop'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Asegúrate de que todas las palabras estén escritas correctamente', 'magicshop'); ?></li>
                                    <li><?php esc_html_e('Intenta con palabras clave diferentes', 'magicshop'); ?></li>
                                    <li><?php esc_html_e('Intenta con palabras clave más generales', 'magicshop'); ?></li>
                                    <li><?php esc_html_e('Intenta con menos palabras clave', 'magicshop'); ?></li>
                                </ul>
                            </div>
                            
                            <div class="mt-4">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                    
                <?php endif; ?>
                
            </main>
        </div>
        
        <div class="col-lg-4 col-md-12">
            <aside id="secondary" class="widget-area sidebar">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </aside>
        </div>
    </div>
</div>

<?php
get_footer(); 