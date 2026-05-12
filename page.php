<?php
/**
 * Page template.
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
