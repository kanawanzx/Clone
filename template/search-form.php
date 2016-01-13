<!-- Custom Search Form
======================================================================== -->
<div id="search_dialog" class="dialog">
    <div class="dialog__overlay"></div>
    <div class="dialog__content">
        <div class="morph-shape">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
                <rect x="3" y="3" fill="none" width="556" height="276"/>
            </svg>
        </div>
        <div class="dialog-inner">
            <h2><?php echo __('Enter your keyword:', AS_DOMAIN); ?></h2>
            <div class="search-form-wrapper-dialog">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url() ); ?>">
                    <div>
                        <input type="text" value="" name="s" id="s" />
                        <input type="submit" id="searchsubmit" value="Search" />
                    </div>
                </form>
            </div>
            <div><button class="action" data-dialog-close="close"><?php _e('Close', AS_DOMAIN); ?></button></div>
        </div>
    </div>
</div>
<!-- Custom Search Form / End -->
