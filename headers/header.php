<!-- Mark Black  -->
<section id="as-mark-black-sidenav"></section>
<!-- Mark Black / End -->
<!-- Header
================================================== -->
<header id="as-header-sidenav">
    <!-- Logo -->
    <?php
    if (as_option('as_option_custom_logo')) {
        ?>
        <a href="<?php echo esc_url(home_url()); ?>" class="as-logo-main-site">
            <img src="<?php echo esc_url(as_option('as_option_custom_logo', false, 'url')); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
        </a>
    <?php } ?>
    <!-- Logo / End -->
    <?php
    if (as_option('as_option_check_sidenav', '1')) {
        ?>
        <?php
        $nav_position = '';
        if (as_option('as_option_position_sidenav') == "left") {
            $nav_position = 'as-nav-menu-left';
        }
        else {
            $nav_position = 'as-nav-menu-right';
        }
        ?>
        <!-- Hamburger Button -->
        <a href="javascript:void(0)" class="as-icon-hamburger-menu">
            <div class="as-line as-first"></div>
            <div class="as-line as-second"></div>
            <div class="as-line as-third"></div>
        </a>
        <!-- Hamburger Button / End -->
        <!-- SideNav -->
        <nav class="as-main-nav-menu <?php echo esc_attr($nav_position); ?>">
            <a href="javascript:void(0)" class="as-close-nav-mobile"><span class="dslc-icon dslc-icon-remove"></span></a>
            <!-- Logo -->
            <?php
            if (as_option('as_option_logo_sidenav', '1')) {
                ?>
                <a href="<?php echo esc_url(home_url()); ?>" class="as-logo-sidenav">
                    <img src="<?php echo esc_url(as_option('as_option_custom_logo', false, 'url')); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
                </a>
            <?php } ?>
            <!-- Logo / End -->

            <!-- Menu -->
            <?php
            wp_nav_menu(array(
                'container'       => false,
                'container_class' => 'as-menu',
                'menu_class'      => 'as-menu-main as-menu-roll',
                'theme_location'  => 'as_sidebar_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'fallback_cb'     => false,
            ));
            ?>
            <!-- Menu / End -->

            <!-- List Social -->
            <?php
            if (as_option('as_option_check_list_social_sidenav', '1')) {
                ?>
                <div class="as-list-social-wrapper">
                    <ul class="as-social-nav">
                        <?php
                        $as_target = 'target="_self"';
                        if (as_option('as_social_check_taget', 1)) {
                            $as_target = 'target="_blank"';
                        }
                        if (as_option('as_twitter_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_twitter_url')) . '" ' . $as_target . ' title="Twitter"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-twitter"></span></a></li>';
                        }
                        if (as_option('as_facebook_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_facebook_url')) . '" ' . $as_target . ' title="Facebook"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-facebook"></span></a></li>';
                        }
                        if (as_option('as_dribbble_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_dribbble_url')) . '" ' . $as_target . ' title="Dribbble"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-dribbble"></span></a></li>';
                        }
                        if (as_option('as_google_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_google_url')) . '" ' . $as_target . ' title="Google Plus"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-google-plus"></span></a></li>';
                        }
                        if (as_option('as_pinterest_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_pinterest_url')) . '" ' . $as_target . ' title="Pinterest"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-pinterest"></span></a></li>';
                        }
                        if (as_option('as_youtube_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_youtube_url')) . '" ' . $as_target . ' title="Youtube"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-youtube"></span></a></li>';
                        }
                        if (as_option('as_vimeo_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_vimeo_url')) . '" ' . $as_target . ' title="Viimeo"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-vimeo-square"></span></a></li>';
                        }
                        if (as_option('as_behance_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_behance_url')) . '" ' . $as_target . ' title="Behance"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-behance"></span></a></li>';
                        }
                        if (as_option('as_flickr_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_flickr_url')) . '" ' . $as_target . ' title="Flickr"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-flickr"></span></a></li>';
                        }
                        if (as_option('as_linkedin_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_linkedin_url')) . '" ' . $as_target . ' title="Linkedin"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-linkedin"></span></a></li>';
                        }
                        if (as_option('as_instagram_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_instagram_url')) . '" ' . $as_target . ' title="Instagram"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-instagram"></span></a></li>';
                        }
                        if (as_option('as_github_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_github_url')) . '" ' . $as_target . ' title="Github"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-github"></span></a></li>';
                        }
                        if (as_option('as_dropbox_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_dropbox_url')) . '" ' . $as_target . ' title="Dropbox"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-dropbox"></span></a></li>';
                        }
                        if (as_option('as_foursquare_url')) {
                            echo '<li><a href="' . esc_url(as_option('as_foursquare_url')) . '" ' . $as_target . ' title="Foursquare"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-foursquare"></span></a></li>';
                        }
                        ?>
                    </ul>
                    <!-- Copyright -->
                    <?php
                    if (as_option('as_option_sidenav_footer_copyright')) {
                        ?>
                        <p class="as-copyright-text-sidenav"><?php echo balanceTags(as_option('as_option_sidenav_footer_copyright')); ?></p>
                    <?php } ?>
                    <!-- Copyright / End -->
                </div>
                <!-- List Social / End -->
            <?php } ?>
        </nav>
        <!-- SideNav / End -->
    <?php } ?>
</header>
<!-- Header / End -->
