<?php
/**
 * The footer for the theme.
 *
 * @package seolizards
 */
?>
<footer class="slz-footer">
    <div class="slz-container slz-footer-inner">
        <div>
            <div class="slz-brand-footer"><?php echo wp_kses_post(__('SEO <span>LIZARDS</span>', 'seolizards')); ?></div>
            <p><?php esc_html_e("Gurgaon's premier digital marketing agency, delivering data-driven SEO, PPC, social media, and web solutions that grow your business globally.", 'seolizards'); ?></p>
        </div>

        <div>
            <h4><?php esc_html_e('Our Services', 'seolizards'); ?></h4>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-services',
                    'container'      => false,
                    'fallback_cb'    => false,
                )
            );
            ?>
        </div>

        <div>
            <h4><?php esc_html_e('Quick Links', 'seolizards'); ?></h4>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-links',
                    'container'      => false,
                    'fallback_cb'    => false,
                )
            );
            ?>
        </div>

        <div>
            <h4><?php esc_html_e('Our Offices', 'seolizards'); ?></h4>
            <?php if (is_active_sidebar('footer-contact')) : ?>
                <?php dynamic_sidebar('footer-contact'); ?>
            <?php else : ?>
                <ul>
                    <li><?php esc_html_e('Gurugram', 'seolizards'); ?></li>
                    <li><?php esc_html_e('Mumbai', 'seolizards'); ?></li>
                    <li><?php esc_html_e('UK', 'seolizards'); ?></li>
                    <li><?php esc_html_e('Canada', 'seolizards'); ?></li>
                    <li><?php esc_html_e('+91 9711864014', 'seolizards'); ?></li>
                    <li><?php esc_html_e('sales@seolizards.in', 'seolizards'); ?></li>
                    <li><?php esc_html_e('Mon - Sat: 9:00 AM - 6:00 PM', 'seolizards'); ?></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <div class="slz-footer-bottom">
        <div class="slz-container">
            <?php
            printf(
                esc_html__('© %1$s SEO Lizards. All rights reserved.', 'seolizards'),
                esc_html(wp_date('Y'))
            );
            ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
