<?php
/**
 * Site footer.
 *
 * @package seolizards
 */
?>
<footer class="site-footer">
    <div class="site-footer__inner">
        <p>
            <?php
            printf(
                /* translators: 1: current year, 2: site name */
                esc_html__('%1$s © %2$s. All rights reserved.', 'seolizards'),
                esc_html(gmdate('Y')),
                esc_html(get_bloginfo('name'))
            );
            ?>
        </p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
