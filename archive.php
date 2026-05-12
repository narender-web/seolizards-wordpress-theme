<?php
/**
 * Archive template.
 *
 * @package seolizards
 */

get_header();

$current_category_slug = is_category() ? sanitize_key((string) get_query_var('category_name', '')) : '';
$categories            = get_categories(array('hide_empty' => true));
$posts_page_url        = get_permalink(get_option('page_for_posts')) ?: home_url('/');
?>
<section class="slz-hero">
    <div class="slz-container">
        <div class="slz-breadcrumb">
            <span class="current"><?php esc_html_e('Home', 'seolizards'); ?></span>
            <span>/</span>
            <span><?php esc_html_e('Blog', 'seolizards'); ?></span>
        </div>
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description('<p>', '</p>'); ?>
    </div>
</section>

<section class="slz-blog-section">
    <div class="slz-container">
        <div class="slz-filter">
            <a class="slz-chip <?php echo '' === $current_category_slug ? 'active' : ''; ?>" href="<?php echo esc_url($posts_page_url); ?>"><?php esc_html_e('All Posts', 'seolizards'); ?></a>
            <?php foreach ($categories as $category) : ?>
                <a class="slz-chip <?php echo $current_category_slug === $category->slug ? 'active' : ''; ?>" href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
            <?php endforeach; ?>
        </div>

        <div class="slz-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php $read_time = slz_estimated_read_time(); ?>
                    <article <?php post_class('slz-card'); ?>>
                        <div class="slz-card-media">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <span aria-hidden="true">⌕</span>
                            <?php endif; ?>
                        </div>
                        <div class="slz-card-content">
                            <div class="slz-meta">
                                <span><?php echo esc_html(get_the_date()); ?></span>
                                <span><?php echo esc_html(sprintf(_n('%s min read', '%s mins read', $read_time, 'seolizards'), $read_time)); ?></span>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                            <a class="slz-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'seolizards'); ?> →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e('No posts found.', 'seolizards'); ?></p>
            <?php endif; ?>
        </div>
        <?php the_posts_pagination(); ?>
    </div>
</section>

<?php
get_footer();
