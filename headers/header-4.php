<!-- Header
================================================== -->
<header id="as-header-4">
    <div class="as-wrapper clearfix">
        <div class="as-wrapper-header-4">
        <div class="dslc-col dslc-3-col">
            <?php if(as_option('as_option_check_logo_header_4','1')):?>
            <a href="<?php echo home_url();?>">
                <img src="<?php echo esc_url( as_option('as_option_custom_logo', false, 'url') ); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
            </a>
             <?php else :?>
                    &nbsp;
            <?php endif;?>
        </div>
        <div class="dslc-col dslc-8-col as-mail-menu-scroll">
            <div class="as-header-4-menu-wrapper">
                <nav id="as-menu-scroll">
                    <div class="as-nav-menu-button">
                        <span class="as-button-icon"></span>
                    </div>
                    <!-- Menu -->
                    <?php
                    wp_nav_menu(array(
                        'container'       => false,
                        'container_class' => 'as-menu',
                        'menu_class'      => 'as-menu-4 as-menu-roll',
                        'theme_location'  => 'as_header_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'fallback_cb'     => false,
                    ));
                    if (!is_front_page()){
		                    echo "<input type='hidden' id='as-douma' value='".home_url()."'>";
	                    }
                    ?>
                </nav>
            </div>
        </div>
        <div class="dslc-col dslc-1-col  dslc-last-col as-menu-search">
            <!-- Icon Shop & Search -->
            <?php if (as_option('as_option_check_icon_search_header_4', '1')): ?>
                    <ul class="as-search-and-shop as-search-header-4">
                            <?php
                            if (class_exists('Woocommerce')) {
                                global $woocommerce;
                                ?>
                                <li class="as-icon-shopping">
                                    <a href="javascript:void(0);"><span class="dslc-icon dslc-icon-shopping-cart"></span><span class="as-quatity-item-woo"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span></a>
                                    <div class="widget_shopping_cart_content"></div>
                                </li>
                                <?php
                            }
                        ?>
                            <li>
                                <a href="#" class="trigger-search" data-id="search_dialog">
                                    <span class="dslc-icon dslc-icon-search"></span>
                                </a>
                            </li>
                    </ul>
             <?php else :?>
                    &nbsp;
                        <?php endif; ?>
                <!-- Icon Shop & Search / End -->
            </div>

        </div>
    </div>
    </div>
</header>
<!-- Header / End -->
