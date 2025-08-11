<?php
/**
 * Template para mostrar posts individuales
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
                                
                                <span class="comments-link ms-3">
                                    <i class="bi bi-chat"></i>
                                    <a href="<?php comments_link(); ?>">
                                        <?php comments_number('0 comentarios', '1 comentario', '% comentarios'); ?>
                                    </a>
                                </span>
                            </div>
                        </header>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="entry-content post-content">
                            <?php
                            the_content(sprintf(
                                wp_kses(
                                    __('Continuar leyendo<span class="screen-reader-text"> "%s"</span>', 'magicshop'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post(get_the_title())
                            ));
                            
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Páginas:', 'magicshop'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                        
                        <footer class="entry-footer mt-4">
                            <?php if (has_tag()) : ?>
                                <div class="tags-links mb-3">
                                    <h5><i class="bi bi-tags"></i> <?php esc_html_e('Etiquetas:', 'magicshop'); ?></h5>
                                    <?php the_tags('<div class="d-flex flex-wrap gap-2">', '', '</div>'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-navigation">
                                <?php echo magicshop_posts_navigation(); ?>
                            </div>
                        </footer>
                        
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