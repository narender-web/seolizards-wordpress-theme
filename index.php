<?php
/**
 * Main blog template.
 *
 * @package seolizards
 */

get_header();
?>
<main class="site-main">
    <section class="content-area">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    <?php endif; ?>

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <nav class="pagination" aria-label="<?php esc_attr_e('Posts', 'seolizards'); ?>">
                <?php the_posts_pagination(); ?>
            </nav>
        <?php else : ?>
            <article>
                <h2 class="entry-title"><?php esc_html_e('No posts found', 'seolizards'); ?></h2>
                <p><?php esc_html_e('Try checking back later for new posts.', 'seolizards'); ?></p>
            </article>
        <?php endif; ?>
    </section>

    <?php get_sidebar(); ?>
</main>
<?php
get_footer();
