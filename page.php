<?php
/**
 * Template para mostrar páginas
 *
 * @package MagicShop
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <main id="main" class="site-main main-content">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                        
                        <header class="entry-header mb-4">
                            <?php the_title('<h1 class="entry-title post-title">', '</h1>'); ?>
                        </header>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="entry-content post-content">
                            <?php
                            the_content();
                            
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Páginas:', 'magicshop'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                        
                        <?php if (get_edit_post_link()) : ?>
                            <footer class="entry-footer mt-4">
                                <?php
                                edit_post_link(
                                    sprintf(
                                        wp_kses(
                                            __('Editar <span class="screen-reader-text">"%s"</span>', 'magicshop'),
                                            array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                            )
                                        ),
                                        wp_kses_post(get_the_title())
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                                ?>
                            </footer>
                        <?php endif; ?>
                        
                    </article>
                    
                    <?php
                    // Si los comentarios están abiertos o hay al menos un comentario
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    
                <?php endwhile; ?>
                
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