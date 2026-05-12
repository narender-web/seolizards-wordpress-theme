<?php
/**
 * Single post template.
 *
 * @package seolizards
 */

get_header();
?>
<main class="site-main">
    <section class="content-area">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <?php
                    printf(
                        /* translators: 1: date, 2: author */
                        esc_html__('Posted on %1$s by %2$s', 'seolizards'),
                        esc_html(get_the_date()),
                        esc_html(get_the_author())
                    );
                    ?>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>

            <?php if (comments_open() || get_comments_number()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        <?php endwhile; ?>
    </section>

    <?php get_sidebar(); ?>
</main>
<?php
get_footer();
