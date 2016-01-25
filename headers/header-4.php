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
        <div class="dslc-col dslc-8-col">
            <div class="as-header-4-menu-wrapper">
                <nav>
                    <!-- Menu -->
                    <?php
                    wp_nav_menu(array(
                        'container'       => false,
                        'container_class' => 'as-menu',
                        'menu_class'      => 'as-menu-4',
                        'theme_location'  => 'as_header_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'fallback_cb'     => false,
                    ));
                    ?>
                </nav>
            </div>
        </div>
        <div class="dslc-col dslc-1-col  dslc-last-col">
            <div class="as-search-header-4">
                <?php if (as_option('as_option_check_icon_search_header_4', '1')): ?>
                    <a href="javascript:void(0);" title="search" class="as-search-header trigger-search" data-id="search_dialog"><span class="dslc-icon dslc-icon-search"></span></a>
                    <?php else :?>
                    &nbsp;
                        <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</header>
<!-- Header / End -->
