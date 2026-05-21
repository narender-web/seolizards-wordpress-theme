<?php
/**
 * Comments template.
 *
 * @package seolizards
 */

if (post_password_required()) {
    return;
}
?>
<section id="comments" class="comments-area content-area">
    <?php if (have_comments()) : ?>
        <article>
            <h2 class="entry-title">
                <?php
                printf(
                    esc_html(_nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'seolizards')),
                    esc_html(number_format_i18n(get_comments_number()))
                );
                ?>
            </h2>
            <?php the_comments_navigation(); ?>
            <ol class="comment-list">
                <?php wp_list_comments(['style' => 'ol', 'short_ping' => true]); ?>
            </ol>
            <?php the_comments_navigation(); ?>
        </article>
    <?php endif; ?>

    <?php comment_form(); ?>
</section>
