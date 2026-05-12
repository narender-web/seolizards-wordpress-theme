<?php
/**
 * Single post template.
 *
 * @package seolizards
 */

get_header();
?>
<section class="slz-blog-section">
    <div class="slz-container">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article <?php post_class(); ?>>
                    <h1><?php the_title(); ?></h1>
                    <div class="slz-meta">
                        <span><?php echo esc_html(get_the_date()); ?></span>
                        <span><?php echo esc_html(get_the_author()); ?></span>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="slz-card-media"><?php the_post_thumbnail('large'); ?></div>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </article>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</section>
<?php
get_footer();
