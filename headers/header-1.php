<!-- Header
================================================== -->
<header id="as-header-2">
    <div class="as-wrapper clearfix">
        <div class="as-header-top">
            <div class="dslc-col dslc-3-col">
                <!-- Logo -->
                <?php
                if (as_option('as_option_check_logo_header_2', '1')) {
                    ?>
                    <a href="<?php echo esc_url(home_url()); ?>" class="as-logo-main-site">
                        <img src="<?php echo esc_url(as_option('as_option_custom_logo', false, 'url')); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
                    </a>
                <?php } ?>
                <!-- Logo / End -->
            </div>
            <div class="dslc-col dslc-9-col dslc-last-col">
                <!-- List Infomation -->
                <?php
                if (as_option('as_option_check_infomation_header_2', '1')) {
                    ?>
                    <ul class="as-list-infomation-wrapper">
                        <?php
                        if (as_option('as_option_check_infomation_address_header_2', '1')) {
                            ?>
                            <li class="as-infomation-wrapper">
                                <div class="as-infomation">
                                    <div class="as-icon-info">
                                        <span class="dslc-icon dslc-icon-map-marker"></span>
                                    </div>
                                    <div class="as-detail-info">
                                        <?php echo balanceTags(as_option('as_option_infomation_address_content_header_2'), true); ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php
                        if (as_option('as_option_check_infomation_phone_header_2', '1')) {
                            ?>
                            <li class="as-infomation-wrapper">
                                <div class="as-infomation">
                                    <div class="as-icon-info">
                                        <span class="dslc-icon dslc-icon-phone"></span>
                                    </div>
                                    <div class="as-detail-info">
                                        <?php echo balanceTags(as_option('as_option_infomation_phone_content_header_2'), true); ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php
                        if (as_option('as_option_check_list_social_header_2', '1')) {
                            ?>
                            <li class="as-list-share-social-wrapper">
                                <ul class="as-list-social-header-wrapper">
                                    <?php
                                    $as_target = 'target="_self"';
                                    if (as_option('as_social_check_taget', 1)) {
                                        $as_target = 'target="_blank"';
                                    }
                                    if (as_option('as_twitter_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_twitter_url')) . '" ' . $as_target . ' title="Twitter"><span class="dslc-icon dslc-icon-twitter"></span></a></li>';
                                    }
                                    if (as_option('as_facebook_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_facebook_url')) . '" ' . $as_target . ' title="Facebook"><span class="dslc-icon dslc-icon-facebook"></span></a></li>';
                                    }
                                    if (as_option('as_dribbble_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_dribbble_url')) . '" ' . $as_target . ' title="Dribbble"><span class="dslc-icon dslc-icon-dribbble"></span></a></li>';
                                    }
                                    if (as_option('as_google_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_google_url')) . '" ' . $as_target . ' title="Google Plus"><span class="dslc-icon dslc-icon-google-plus"></span></a></li>';
                                    }
                                    if (as_option('as_pinterest_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_pinterest_url')) . '" ' . $as_target . ' title="Pinterest"><span class="dslc-icon dslc-icon-pinterest"></span></a></li>';
                                    }
                                    if (as_option('as_youtube_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_youtube_url')) . '" ' . $as_target . ' title="Youtube"><span class="dslc-icon dslc-icon-youtube"></span></a></li>';
                                    }
                                    if (as_option('as_vimeo_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_vimeo_url')) . '" ' . $as_target . ' title="Vimeo"><span class="dslc-icon dslc-icon-vimeo-square"></span></a></li>';
                                    }
                                    if (as_option('as_behance_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_behance_url')) . '" ' . $as_target . ' title="Behance"><span class="dslc-icon dslc-icon-behance"></span></a></li>';
                                    }
                                    if (as_option('as_flickr_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_flickr_url')) . '" ' . $as_target . ' title="Flickr"><span class="dslc-icon dslc-icon-flickr"></span></a></li>';
                                    }
                                    if (as_option('as_tumblr_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_tumblr_url')) . '" ' . $as_target . ' title="Tumblr"><span class="dslc-icon dslc-icon-tumblr"></span></a></li>';
                                    }
                                    if (as_option('as_linkedin_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_linkedin_url')) . '" ' . $as_target . ' title="Linkedin"><span class="dslc-icon dslc-icon-linkedin"></span></a></li>';
                                    }
                                    if (as_option('as_instagram_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_instagram_url')) . '" ' . $as_target . ' title="Instagram"><span class="dslc-icon dslc-icon-instagram"></span></a></li>';
                                    }
                                    if (as_option('as_github_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_github_url')) . '" ' . $as_target . ' title="Github"><span class="dslc-icon dslc-icon-github"></span></a></li>';
                                    }
                                    if (as_option('as_dropbox_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_dropbox_url')) . '" ' . $as_target . ' title="Dropbox"><span class="dslc-icon dslc-icon-dropbox"></span></a></li>';
                                    }
                                    if (as_option('as_foursquare_url')) {
                                        echo '<li><a href="' . esc_url(as_option('as_foursquare_url')) . '" ' . $as_target . ' title="Foursquare"><span class="dslc-icon dslc-icon-foursquare"></span></a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <!-- List Infomation / End -->
            </div>
        </div>
    </div>
    <div class="as-header-bottom" id="as-menu-header-1">
        <div class="as-wrapper clearfix">
            <div class="dslc-col dslc-12-col dslc-last-col">
                <!-- Menu -->
                <?php
                wp_nav_menu(array(
                    'container'       => false,
                    'container_class' => 'as-menu',
                    'menu_class'      => 'as-menu-header-2',
                    'theme_location'  => 'as_header_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'fallback_cb'     => false,
                ));
                ?>
                <!-- Menu / End -->
                <!-- Icon Shop & Search -->
                <?php
                if (as_option('as_option_check_icon_shop_header_2', '1') || as_option('as_option_check_icon_search_header_2', '1')) {
                    ?>
                    <ul class="as-search-and-shop">
                        <?php
                        if (as_option('as_option_check_icon_shop_header_2', '1')) {
                            ?>
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
                        }
                        ?>
                        <?php
                        if (as_option('as_option_check_icon_search_header_2', '1')) {
                            ?>
                            <li>
                                <a href="#" class="trigger-search" data-id="search_dialog">
                                    <span class="dslc-icon dslc-icon-search"></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <!-- Icon Shop & Search / End -->
            </div>
        </div>
    </div>
</header>
<!-- Header / End -->
