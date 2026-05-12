<?php
/**
 * Main fallback template.
 *
 * @package seolizards
 */

get_header();
?>
<section class="slz-blog-section">
    <div class="slz-container">
        <?php if (have_posts()) : ?>
            <div class="slz-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article <?php post_class('slz-card'); ?>>
                        <div class="slz-card-content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                            <a class="slz-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'seolizards'); ?> →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e('No content found.', 'seolizards'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
