<!-- Header
================================================== -->
<header id="as-header-3">
    <div class="as-wrapper clearfix">
        <!-- Navigation Visible -->
        <nav>
            <!-- Menu -->
            <?php
            wp_nav_menu(array(
                'container'       => false,
                'container_class' => 'as-menu',
                'menu_class'      => 'as-primary-nav',
                'theme_location'  => 'as_header_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'fallback_cb'     => false,
            ));
            ?>
        </nav>
        <!-- Navigation Visible / End -->
        <!-- Header Inner -->
        <div class="as-header-inner">
            <!-- Hamburger Menu -->
            <div id="as-hamburger" class="as-hamburglar is-open">
                <div id="top"></div>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="55px" height="55px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                    <path id="circle" fill="none" stroke-width="4" stroke-miterlimit="10" d="M16,32h32c0,0,11.723-0.306,10.75-11 c-0.25-2.75-1.644-4.971-2.869-7.151C50.728,7.08,42.767,2.569,33.733,2.054C33.159,2.033,32.599,2,32,2C15.432,2,2,15.432,2,32 c0,16.566,13.432,30,30,30c16.566,0,30-13.434,30-30C62,15.5,48.5,2,32,2S1.875,15.5,1.875,32"></path>
                </svg>
                <div id="bottom"></div>
            </div>
            <!-- Hamburger Menu / End -->
            <?php
            if (as_option('as_option_check_logo_header_3', '1'))
            {
                ?>
                <!-- Logo -->
                <div class="as-logo-wrapper">
                    <a href="<?php echo esc_url( home_url() ); ?>" class="as-logo-main-site">
                        <img src="<?php echo esc_url( as_option('as_option_custom_logo', false, 'url') ); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
                    </a>
                </div>
                <!-- Logo / End -->
            <?php } ?>
            <?php
            if (as_option('as_option_check_icon_shop_header_3', '1') || as_option('as_option_check_icon_search_header_3', '1'))
            {
                ?>
                <!-- Shop & Search -->
                <div class="as-shop-search-wrapper">
                    <?php
                    if (as_option('as_option_check_icon_shop_header_3', '1'))
                    {
                        ?>
                        <?php
                        if (class_exists('Woocommerce'))
                        {
                            global $woocommerce;
                            ?>
                            <div class="as-shop-cart-header"><span class="dslc-icon dslc-icon-shopping-cart"></span><?php _e('Cart', AS_DOMAIN); ?><span class="number"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span><div class="widget_shopping_cart_content"><span class="dslc-icon dslc-icon-plus"></span></div></div>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if (as_option('as_option_check_icon_search_header_3', '1'))
                    {
                        ?>
                        <a href="javascript:void(0);" title="search" class="as-search-header trigger-search" data-id="search_dialog"><span class="dslc-icon dslc-icon-search"></span></a>
                        <?php } ?>
                </div>
                <!-- Shop & Search  / End -->
            <?php } ?>
        </div>
        <!-- Header Inner / End -->
    </div>
</header>
<!-- Header / End -->
