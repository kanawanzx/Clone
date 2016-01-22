<!-- Footer top
======================================================================== -->
<footer id="as-footer-2">
    <div class="as-wrapper clearfix">
        <div  class="dslc-modules-section">
            <aside class="dslc-col dslc-3-col">
                <?php
                if ( as_option('as_option_check_logo_footer_2', '1') )
                {
                    ?>
                    <!-- Logo Footer-->
                    <a href="<?php echo esc_url( home_url() ); ?>" class="as-logo-footer">
                        <img src="<?php echo esc_url( as_option('as_option_custom_logo_footer_2', false, 'url') ); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
                    </a>  
                    <!-- Logo Footer / End -->
                <?php } ?>
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 1')) : ?><?php endif; ?>
            </aside>
            <aside class="dslc-col dslc-3-col">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 2')) : ?><?php endif; ?>
            </aside>
            <aside class="dslc-col dslc-3-col">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 3')) : ?><?php endif; ?>
            </aside>
            <aside class="dslc-col dslc-3-col dslc-last-col">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 4')) : ?><?php endif; ?>
            </aside>
        </div>
    </div>
</footer>
<!-- Footer top / End -->

<!-- Footer Bottom & Coppyright
======================================================================== -->
<div id="footer-bottom-2">
    <div class="as-wrapper clearfix">
        <div class="dslc-col dslc-5-col">
            <?php
            if (as_option('as_option_copyright_footer_2'))
            {
                ?>
                <!-- Copyright -->
                <div class="as-copyright-footer"><?php echo esc_html( as_option('as_option_copyright_footer_2') ); ?></div>
                <!-- Copyright / End -->
            <?php } ?>
        </div>
        <div class="dslc-col dslc-7-col dslc-last-col">
            <?php
            if (as_option('as_option_check_menu_footer_2', '2'))
            {
                ?>
                <!-- Menu -->
                <?php
                wp_nav_menu(array(
                    'container'       => false,
                    'container_class' => 'as-menu',
                    'menu_class'      => 'as-menu-footer-2',
                    'theme_location'  => 'as_footer_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'fallback_cb'     => false,
                ));
                ?>
                <!-- Menu / End -->
            <?php } ?>
        </div>
    </div>
</div>
<!-- Footer Bottom & Coppyright / End -->
