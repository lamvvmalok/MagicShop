<?php
/**
 * Template para mostrar comentarios
 *
 * @package MagicShop
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title mb-4">
            <?php
            $magicshop_comment_count = get_comments_number();
            if ('1' === $magicshop_comment_count) {
                printf(
                    esc_html__('Un comentario en "%2$s"', 'magicshop'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    esc_html(_nx('%1$s comentario en "%2$s"', '%1$s comentarios en "%2$s"', $magicshop_comment_count, 'comments title', 'magicshop')),
                    number_format_i18n($magicshop_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h3>

        <ol class="comment-list list-unstyled">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
                'walker'     => new Bootstrap_Comment_Walker(),
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => '<i class="bi bi-arrow-left"></i> ' . __('Comentarios anteriores', 'magicshop'),
            'next_text' => __('Comentarios siguientes', 'magicshop') . ' <i class="bi bi-arrow-right"></i>',
        ));
        ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'        => __('Deja un comentario', 'magicshop'),
        'title_reply_to'     => __('Responde a %s', 'magicshop'),
        'cancel_reply_link'  => __('Cancelar respuesta', 'magicshop'),
        'label_submit'       => __('Publicar comentario', 'magicshop'),
        'class_form'         => 'comment-form needs-validation',
        'class_submit'       => 'btn btn-primary',
        'comment_field'      => '<div class="form-group mb-3"><label for="comment" class="form-label">' . __('Comentario', 'magicshop') . '</label><textarea id="comment" name="comment" class="form-control" rows="5" required></textarea></div>',
        'fields'             => array(
            'author' => '<div class="row"><div class="col-md-6"><div class="form-group mb-3"><label for="author" class="form-label">' . __('Nombre', 'magicshop') . ' <span class="required">*</span></label><input id="author" name="author" type="text" class="form-control" required /></div></div>',
            'email'  => '<div class="col-md-6"><div class="form-group mb-3"><label for="email" class="form-label">' . __('Email', 'magicshop') . ' <span class="required">*</span></label><input id="email" name="email" type="email" class="form-control" required /></div></div></div>',
            'url'    => '<div class="form-group mb-3"><label for="url" class="form-label">' . __('Sitio web', 'magicshop') . '</label><input id="url" name="url" type="url" class="form-control" /></div>',
        ),
    ));
    ?>

</div> 