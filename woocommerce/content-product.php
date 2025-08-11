<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure we are running a single product here
if (!$product || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('col-lg-3 col-md-4 col-6 mb-4', $product); ?>>
    <div class="card h-100 product-card">
        <div class="card-img-top position-relative">
                            <?php if ($product->is_on_sale()) : ?>
                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">Oferta</span>
                <?php endif; ?>
            
                                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="text-decoration-none">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 h-100 object-fit-cover')); ?>
                                            <?php else : ?>
                                                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="<?php echo esc_attr(get_the_title()); ?>" class="img-fluid w-100 h-100 object-fit-cover">
                                            <?php endif; ?>
                                        </a>
        </div>

        <div class="card-body d-flex flex-column">
            <div class="mb-auto">
                <h5 class="card-title">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="text-decoration-none text-dark">
                        <?php echo esc_html(get_the_title()); ?>
                    </a>
                </h5>
                
                <div class="price mb-3">
                    <?php echo $product->get_price_html(); ?>
                </div>
                
                <?php if ($product->get_average_rating()) : ?>
                    <div class="rating mb-2">
                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-auto">
                <?php
                echo apply_filters('woocommerce_loop_add_to_cart_link',
                    sprintf('<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
                        esc_url($product->add_to_cart_url()),
                        esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
                        esc_attr(isset($args['class']) ? $args['class'] : 'btn btn-primary btn-sm w-100'),
                        isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
                        esc_html($product->add_to_cart_text())
                    ),
                    $product,
                    $args
                );
                ?>
            </div>
        </div>
    </div>
</li> 