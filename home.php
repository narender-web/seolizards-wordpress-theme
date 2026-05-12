<?php
/**
 * Blog posts index template.
 *
 * @package seolizards
 */

get_header();

$categories     = get_categories(array('hide_empty' => true));
$posts_page_url = slz_get_posts_page_url();
?>
<section class="slz-hero">
    <div class="slz-container">
        <div class="slz-breadcrumb">
            <span class="current"><?php esc_html_e('Home', 'seolizards'); ?></span>
            <span>/</span>
            <span><?php esc_html_e('Blog', 'seolizards'); ?></span>
        </div>
        <h1>
            <?php echo wp_kses_post(__('Digital Marketing <span class="accent">Insights &amp; Tips</span>', 'seolizards')); ?>
        </h1>
        <p><?php esc_html_e('Expert insights, actionable strategies, and the latest trends in SEO, PPC, social media, and digital marketing.', 'seolizards'); ?></p>
    </div>
</section>

<section class="slz-blog-section">
    <div class="slz-container">
        <div class="slz-filter">
            <a class="slz-chip <?php echo is_category() ? '' : 'active'; ?>" href="<?php echo esc_url($posts_page_url); ?>"><?php esc_html_e('All Posts', 'seolizards'); ?></a>
            <?php foreach ($categories as $category) : ?>
                <a class="slz-chip" href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
            <?php endforeach; ?>
        </div>

        <div class="slz-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    $read_time = slz_estimated_read_time();
                    ?>
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
                    <?php
                endwhile;
            else :
                ?>
                <p><?php esc_html_e('No posts found.', 'seolizards'); ?></p>
                <?php
            endif;
            ?>
        </div>
        <?php the_posts_pagination(); ?>

        <section class="slz-newsletter">
            <div aria-hidden="true">✉</div>
            <h3><?php esc_html_e('Get Weekly SEO & Marketing Tips', 'seolizards'); ?></h3>
            <p><?php esc_html_e('Join 10,000+ marketers getting actionable insights delivered to their inbox every week.', 'seolizards'); ?></p>
            <div class="slz-newsletter-action">
                <a class="slz-cta" href="<?php echo esc_url(home_url('/contact')); ?>">
                    <?php esc_html_e('Subscribe', 'seolizards'); ?> →
                </a>
            </div>
        </section>
    </div>
</section>

<?php
get_footer();
