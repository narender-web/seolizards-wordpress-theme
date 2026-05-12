<?php
/**
 * Not found template.
 *
 * @package seolizards
 */

get_header();
?>
<main class="site-main">
    <section class="content-area">
        <article>
            <h1 class="entry-title"><?php esc_html_e('Page not found', 'seolizards'); ?></h1>
            <p><?php esc_html_e('The page you are looking for does not exist.', 'seolizards'); ?></p>
            <?php get_search_form(); ?>
        </article>
    </section>

    <?php get_sidebar(); ?>
</main>
<?php
get_footer();
