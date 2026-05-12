<?php
/**
 * Blog posts index template.
 *
 * @package seolizards
 */

get_header();

$current_category_slug = isset($_GET['category']) ? sanitize_key(wp_unslash($_GET['category'])) : '';
$categories            = get_categories(array('hide_empty' => true));
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
            <a class="slz-chip <?php echo '' === $current_category_slug ? 'active' : ''; ?>" href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/')); ?>"><?php esc_html_e('All Posts', 'seolizards'); ?></a>
            <?php foreach ($categories as $category) : ?>
                <a class="slz-chip <?php echo $current_category_slug === $category->slug ? 'active' : ''; ?>" href="<?php echo esc_url(add_query_arg('category', $category->slug, get_permalink(get_option('page_for_posts')) ?: home_url('/'))); ?>"><?php echo esc_html($category->name); ?></a>
            <?php endforeach; ?>
        </div>

        <div class="slz-grid">
            <?php
            $args = array('post_type' => 'post', 'paged' => max(1, get_query_var('paged')));
            if ($current_category_slug) {
                $args['category_name'] = $current_category_slug;
            }

            $posts_query = new WP_Query($args);

            if ($posts_query->have_posts()) :
                while ($posts_query->have_posts()) :
                    $posts_query->the_post();
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
                                <span><?php echo esc_html(sprintf(_n('%s min read', '%s mins read', slz_estimated_read_time(), 'seolizards'), slz_estimated_read_time())); ?></span>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                            <a class="slz-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'seolizards'); ?> →</a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e('No posts found.', 'seolizards'); ?></p>
                <?php
            endif;
            ?>
        </div>

        <section class="slz-newsletter">
            <div aria-hidden="true">✉</div>
            <h3><?php esc_html_e('Get Weekly SEO & Marketing Tips', 'seolizards'); ?></h3>
            <p><?php esc_html_e('Join 10,000+ marketers getting actionable insights delivered to their inbox every week.', 'seolizards'); ?></p>
            <form class="slz-newsletter-form" action="#" method="post">
                <label class="screen-reader-text" for="slz-email"><?php esc_html_e('Email address', 'seolizards'); ?></label>
                <input id="slz-email" type="email" name="email" placeholder="<?php esc_attr_e('Enter your email address', 'seolizards'); ?>" required>
                <button type="submit"><?php esc_html_e('Subscribe', 'seolizards'); ?> →</button>
            </form>
        </section>
    </div>
</section>

<?php
get_footer();
