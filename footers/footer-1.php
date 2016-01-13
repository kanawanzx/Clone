<!-- Footer
================================================== -->
<footer id="as-footer-1">
    <div class="as-wrapper clearfix">
        <div class="as-footer-wrapper">
            <div class="dslc-col dslc-12-col dslc-last-col">
                <?php
                if (as_option('as_option_check_logo_footer_1', '1')) {
                    ?>
                    <!-- Logo -->
                    <a href="<?php echo esc_url(home_url()); ?>" class="as-logo-footer">
                        <img src="<?php echo esc_url(as_option('as_option_custom_logo_footer_1', false, 'url')); ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
                    </a>  
                    <!-- Logo / End -->
                <?php } ?>
                <?php
                if (as_option('as_option_check_menu_footer_1', '1')) {
                    ?>
                    <!-- Menu -->
                    <?php
                    wp_nav_menu(array(
                        'container'       => false,
                        'container_class' => 'as-menu',
                        'menu_class'      => 'as-menu-footer-1',
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
                <?php
                if (as_option('as_option_copyright_footer_1')) {
                    ?>
                    <!-- Copyright -->
                    <div class="as-copyright-footer"><?php echo esc_html(as_option('as_option_copyright_footer_1')); ?></div>
                    <!-- Copyright / End -->
                <?php } ?>
                <?php
                if (as_option('as_option_check_list_social_footer_1', '1')) {
                    ?>
                    <!-- List Social -->
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
                                echo '<li><a href="' . esc_url(as_option('as_vimeo_url')) . '" ' . $as_target . ' title="Vimeo"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-vimeo-square"></span></a></li>';
                            }
                            if (as_option('as_behance_url')) {
                                echo '<li><a href="' . esc_url(as_option('as_behance_url')) . '" ' . $as_target . ' title="Behance"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-behance"></span></a></li>';
                            }
                            if (as_option('as_flickr_url')) {
                                echo '<li><a href="' . esc_url(as_option('as_flickr_url')) . '" ' . $as_target . ' title="Flickr"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-flickr"></span></a></li>';
                            }
                            if (as_option('as_tumblr_url')) {
                                echo '<li><a href="' . esc_url(as_option('as_tumblr_url')) . '" ' . $as_target . ' title="Tumblr"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-tumblr"></span></a></li>';
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
                                echo '<li><a href="' . esc_url(as_option('as_foursquare_url')) . '" ' . $as_target . ' title="Dropbox"><div class="as-social-border-style"></div><span class="dslc-icon dslc-icon-foursquare"></span></a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- List Social / End -->
                <?php } ?>
            </div>
        </div>
    </div>
</footer>
<!-- Footer / End -->
