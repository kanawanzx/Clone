<?php

/**
 * Table of Contents
 *
 * - dslc_display_composer ( Displays the composer code in the front-end )
 * - dslc_get_modules ( Returns an array of active modules )
 * - dslc_display_modules ( Displays a list of active modules )
 * - dslc_get_templates ( Returns an array of active templates )
 * - dslc_display_templates ( Displays a list of active templates )
 * - dslc_filter_content ( Filters the_content() to show composer output )
 * - dslc_module_front ( Returns front-end output of a specific module )
 * - dslc_custom_css ( Generates Custom CSS for the show page )
 */


/**
 * Display the composer
 *
 * @since 1.0
 */

function dslc_display_composer() {

	global $dslc_active;

	// Reset the query ( because some devs leave their queries non-reseted )
	wp_reset_query();

	// Show the composer to users who are allowed to view it
	if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) :

		$default_section = dslc_get_option( 'lc_default_opts_section', 'dslc_plugin_options_other' );
		if ( empty( $default_section ) )
			$default_section = 'functionality';

		?>

			<div class="dslca-container dslca-state-off" data-post-id="<?php the_ID(); ?>">

				<div class="dslca-header dslc-clearfix" data-default-section="<?php echo $default_section; ?>">
					
					<!-- Tabs -->
					<span class="dslca-go-to-section-hook dslca-go-to-section-modules dslca-active" data-section=".dslca-modules"><span class="dslca-icon dslc-icon-list"></span></span>
					<span class="dslca-go-to-section-hook dslca-go-to-section-templates" data-section=".dslca-templates"><span class="dslca-icon dslc-icon-bookmark"></span></span>
					
					<!-- Option filters -->
					<span class="dslca-options-filter-hook" data-section="functionality"><span class="dslca-icon dslc-icon-cog"></span> <?php _e( 'FUNCTIONALITY', 'dslc_string' ); ?></span>
					<span class="dslca-options-filter-hook" data-section="styling"><span class="dslca-icon dslc-icon-tint"></span> <?php _e( 'STYLING', 'dslc_string' ); ?></span>
					<span class="dslca-options-filter-hook" data-section="responsive"><span class="dslca-icon dslc-icon-mobile-phone"></span> <?php _e( 'RESPONSIVE', 'dslc_string' ); ?></span>

					<div class="dslca-module-edit-actions">
						<span class="dslca-module-edit-save"><?php _e( 'CONFIRM', 'dslc_string' ); ?></span>
						<span class="dslca-module-edit-cancel"><?php _e( 'CANCEL', 'dslc_string' ); ?></span>
					</div><!-- .dslca-module-edit-actions -->

				</div><!-- .dslca-header -->

				<div class="dslca-actions">

					<!-- Save Composer -->
					<div class="dslca-save-composer dslca-save-composer-hook">
						<span class="dslca-save-composer-helptext"><?php _e( 'PUBLISH CHANGES', 'dslc_string' ); ?></span>
						<span class="dslca-save-composer-icon"><span class="dslca-icon dslc-icon-ok"></span></span>
					</div><!-- .dslca-save-composer -->

					<!-- Hide/Show -->
					<span class="dslca-show-composer-hook"><span class="dslca-icon dslc-icon-arrow-up"></span><?php _e( 'SHOW EDITOR', 'dslc_string' ); ?></span>
					<span class="dslca-hide-composer-hook"><span class="dslca-icon dslc-icon-arrow-down"></span><?php _e( 'HIDE EDITOR', 'dslc_string' ); ?></span>

					<!-- Disable -->
					<a href="<?php the_permalink(); ?>" class="dslca-close-composer-hook"><span class="dslca-icon dslc-icon-remove"></span><?php _e( 'DISABLE EDITOR', 'dslc_string' ); ?></a>

					<div class="dslc-clear"></div>

				</div><!-- .dslca-actions -->

				<div class="dslca-sections">

					<!-- Modules Listing -->
					<div class="dslca-section dslca-modules" data-bg="#5890e5">
						
						<div class="dslca-section-title">
							<div class="dslca-section-title-filter">
								<span class="dslca-section-title-filter-curr"><?php _e( 'ALL MODULES', 'dslc_string' ); ?></span>
								<span class="dslca-icon dslc-icon-angle-up"></span>
								<div class="dslca-section-title-filter-options"></div>
							</div><!-- .dslca-section-title-filter -->
						</div><!-- .dslca-section-title -->

						<div class="dslca-section-scroller">
							<div class="dslca-section-scroller-inner">
								<div class="dslca-section-scroller-content">
									<?php dslc_display_modules(); ?>
								</div><!-- .dslca-section-scroller-content -->
							</div><!-- .dslca-section-scroller-inner -->
						</div><!-- .dslca-section-scroller-content -->
						
						<div class="dslca-section-scroller-fade"></div>

						<div class="dslca-section-scroller-nav">
							<a href="#" class="dslca-section-scroller-prev"><span class="dslca-icon dslc-icon-angle-left"></span></a>
							<a href="#" class="dslca-section-scroller-next"><span class="dslca-icon dslc-icon-angle-right"></span></a>
						</div><!-- .dslca-section-scroller -->

					</div><!-- .dslca-modules -->

					<!-- Module Edit -->
					
					<div class="dslca-section dslca-module-edit" data-bg="#5890e5">

						<form class="dslca-module-edit-form">
							<?php do_action( 'dslc_options_prepend' ); ?>
							<div class="dslca-module-edit-options dslc-clearfix"></div>
							<?php do_action( 'dslc_options_append' ); ?>
						</form>

					</div><!-- .dslca-module-edit -->

					<!-- Module Section Edit -->

					<div class="dslca-section dslca-modules-section-edit" data-bg="#5890e5">

						<form class="dslca-modules-section-edit-form">

							<div class="dslca-modules-section-edit-options dslc-clearfix">

								<div class="dslca-modules-section-edit-options-inner">
										
									<div class="dslca-modules-section-edit-options-wrapper dslc-clearfix">

										<?php dslc_row_display_options(); ?>

									</div><!-- .dslca-modules-section-edit-options-wrapper -->

								</div><!-- .dslca-modules-section-edit-options-inner -->

							</div><!-- .dslca-modules-section-edit-options -->

						</form><!-- .dslca-modules-section-edit-form -->

					</div><!-- .dslca-module-section-edit -->

					<!-- Module Templates -->

					<div class="dslca-section dslca-templates dslc-clearfix" data-bg="#ca564f">
						
						<div class="dslca-section-title">
							<?php _e( 'TEMPLATES', 'dslc_string' ); ?>
						</div><!-- .dslca-section-title -->
						
						<span class="dslca-go-to-section-hook" data-section=".dslca-templates-load"><span class="dslca-icon dslc-icon-circle-arrow-down"></span><?php _e( 'Load', 'dslc_string' ); ?></span>
						<span class="dslca-open-modal-hook" data-modal=".dslca-modal-templates-save"><span class="dslca-icon dslc-icon-save"></span><?php _e( 'Save', 'dslc_string' ); ?></span>
						<span class="dslca-open-modal-hook" data-modal=".dslca-modal-templates-import"><span class="dslca-icon dslc-icon-download-alt"></span><?php _e( 'Import', 'dslc_string' ); ?></span>
						<span class="dslca-open-modal-hook" data-modal=".dslca-modal-templates-export"><span class="dslca-icon dslc-icon-upload-alt"></span><?php _e( 'Export', 'dslc_string' ); ?></span>

						<div class="dslca-modal dslca-modal-templates-save" data-bg="#ca564f">
							
							<form class="dslca-template-save-form">
								<input type="text" id="dslca-save-template-title" placeholder="<?php _e( 'Name of the template', 'dslc_string' ); ?>">
								<span class="dslca-submit"><?php _e( 'SAVE', 'dslc_string' ); ?></span>
								<span class="dslca-cancel dslca-close-modal-hook" data-modal=".dslca-modal-templates-save"><?php _e( 'CANCEL', 'dslc_string' ); ?></span>
							</form>

						</div><!-- .dslca-modal -->

						<div class="dslca-modal dslca-modal-templates-export" data-bg="#ca564f">

							<form class="dslca-template-export-form">
								<textarea id="dslca-export-code"></textarea>
								<span class="dslca-cancel dslca-close-modal-hook" data-modal=".dslca-modal-templates-export"><?php _e( 'CLOSE', 'dslc_string' ); ?></span>
							</form>

						</div><!-- .dslca-modal -->

						<div class="dslca-modal dslca-modal-templates-import" data-bg="#ca564f">
							
							<form class="dslca-template-import-form">
								<textarea id="dslca-import-code" placeholder="<?php _e( 'Enter the exported code heree', 'dslc_string' ); ?>"></textarea>
								<span class="dslca-submit">
									<span class="dslca-modal-title"><?php _e( 'IMPORT', 'dslc_string' ); ?></span>
									<div class="dslca-loading followingBallsGWrap">
										<div class="followingBallsG_1 followingBallsG"></div>
										<div class="followingBallsG_2 followingBallsG"></div>
										<div class="followingBallsG_3 followingBallsG"></div>
										<div class="followingBallsG_4 followingBallsG"></div>
									</div>
								</span>
								<span class="dslca-cancel dslca-close-modal-hook" data-modal=".dslca-modal-templates-import"><?php _e( 'CANCEL', 'dslc_string' ); ?></span>
							</form>

						</div><!-- .dslca-modal -->

					</div><!-- .dslca-section-templates -->

					<!-- Module Template Load -->

					<div class="dslca-section dslca-templates-load dslc-clearfix" data-bg="#ca564f">
							
						<span class="dslca-go-to-section-hook dslca-section-back" data-section=".dslca-templates"><span class="dslca-icon dslc-icon-reply"></span></span>

						<div class="dslca-section-title">
							<div class="dslca-section-title-filter">
								<span class="dslca-section-title-filter-curr"><?php _e( 'ORIGINAL TEMPLATES', 'dslc_string' ); ?></span>
								<span class="dslca-icon dslc-icon-angle-up"></span>
								<div class="dslca-section-title-filter-options"></div>
							</div><!-- .dslca-section-title-filter -->
						</div><!-- .dslca-section-title -->
						
						<div class="dslca-section-scroller">
							<div class="dslca-section-scroller-inner">
								<div class="dslca-section-scroller-content">
									<?php dslc_display_templates(); ?>
								</div>
							</div>
						</div>

						<div class="dslca-section-scroller-nav">
							<span class="dslca-section-scroller-prev"><span class="dslca-icon dslc-icon-angle-left"></span></span>
							<span class="dslca-section-scroller-next"><span class="dslca-icon dslc-icon-angle-right"></span></span>
						</div><!-- .dslca-section-scroller -->

					</div><!-- .dslca-templates-load -->

				</div><!-- .dslca-sections -->

				<!-- Module Template Export -->

				<textarea id="dslca-code"></textarea>
				<div class="dslca-module-options-front-backup"></div>

				<div class="dslca-container-loader">
					<div class="dslca-container-loader-inner followingBallsGWrap">
						<div class="followingBallsG_1 followingBallsG"></div>
						<div class="followingBallsG_2 followingBallsG"></div>
						<div class="followingBallsG_3 followingBallsG"></div>
						<div class="followingBallsG_4 followingBallsG"></div>
					</div>
				</div>

			</div><!-- .dscla-container -->

			<div class="dslca-prompt-modal">
				
				<div class="dslca-prompt-modal-content">

					<div class="dslca-prompt-modal-msg">

						Message goes here

					</div><!-- .dslca-prompt-modal-msg -->

					<div class="dslca-prompt-modal-actions">

						<a href="#" class="dslca-prompt-modal-confirm-hook"><span class="dslc-icon dslc-icon-ok"></span><?php _e( 'Confirm', 'dslc_string' ); ?></a>
						<span class="dslca-prompt-modal-cancel-hook"><span class="dslc-icon dslc-icon-remove"></span><?php _e( 'Cancel', 'dslc_string' ); ?></span>

					</div>

				</div><!-- .dslca-prompt-modal-content -->

			</div><!-- .dslca-prompt-modal -->

			<div class="dslca-module-edit-field-icon-ttip">
				<?php _e( 'Icons used in this plugin are from "Font Awesome".<br><a href="http://livecomposerplugin.com/icons-listing/" class="dslca-link" target="_blank">View full list of icons.</a>', 'dslc_string' ); ?>
				<span class="dslca-module-edit-field-ttip-close"><span class="dslc-icon dslc-icon-remove"></span></span>
			</div>

			<div class="dslca-module-edit-field-ttip">
				<span class="dslca-module-edit-field-ttip-close"><span class="dslc-icon dslc-icon-remove"></span></span>
				<div class="dslca-module-edit-field-ttip-inner"></div>
			</div>

			<div class="dslca-invisible-overlay"></div>

		<?php

	endif;

	global $dslc_var_templates_pt;

	// Show composer activation button
	if ( is_singular() && !$dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) :

		// If is a page or a template go ahead normally
		if ( is_page() || get_post_type() == 'dslc_templates' || ! isset( $dslc_var_templates_pt[get_post_type()] ) ) {
			
			?><a href="<?php echo add_query_arg( array( 'dslc' => 'active' ), get_permalink() ); ?>" class="dslca-activate-composer-hook"><?php _e( 'ACTIVATE EDITOR', 'dslc_string' ); ?></a><?php

		// If not a page or a template
		} else {

			// Check if it has a template attached to it
			$template = dslc_st_get_template_ID( get_the_ID() );
			if ( $template ) { 

				?><a target="_blank" href="<?php echo add_query_arg( array( 'dslc' => 'active' ), get_permalink( $template ) ); ?>" class="dslca-activate-composer-hook"><?php _e( 'EDIT TEMPLATE', 'dslc_string' ); ?></a><?php

			} else {

				?><a target="_blank" href="<?php echo admin_url( 'post-new.php?post_type=dslc_templates' ); ?>" class="dslca-activate-composer-hook"><?php _e( 'CREATE TEMPLATE', 'dslc_string' ); ?></a><?php

			}

		}

	endif;
	
} add_action( 'wp_footer', 'dslc_display_composer' );

/**
 * Returns array of active modules (false if none)
 *
 * @since 1.0
 */

function dslc_get_modules() {

	global $dslc_var_modules;

	if ( empty( $dslc_var_modules ) )
		return false;
	else
		return $dslc_var_modules;

}


/**
 * Displays a list of modules (for drag&drop)
 *
 * @since 1.0
 */

function dslc_display_modules() {

	$dslc_modules = dslc_get_modules();

	if ( $dslc_modules ) {

		?>

		<div class="dslca-module dslca-scroller-item dslca-origin" data-origin="general" data-id="DSLC_M_A">
			<span class="dslca-icon dslc-icon-th-large"></span><span class="dslca-module-title"><?php _e( 'MODULES AREA', 'dslc_string' ); ?></span>
		</div><!-- .dslc-module -->

		<?php

		foreach ( $dslc_modules as $dslc_module ) {
			
			if ( empty( $dslc_module['icon'] ) )
				$dslc_module['icon'] = 'circle';

			if ( empty ( $dslc_module['origin'] ) )
				$dslc_module['origin'] = 'lc'

			?>
				<div class="dslca-module dslca-scroller-item dslca-origin dslca-origin-<?php echo $dslc_module['origin']; ?>" data-origin="<?php echo $dslc_module['origin']; ?>" data-id="<?php echo $dslc_module['id']; ?>">
					<span class="dslca-icon dslc-icon-<?php echo $dslc_module['icon']; ?>"></span><span class="dslca-module-title"><?php echo $dslc_module['title']; ?></span>
				</div><!-- .dslc-module -->
			<?php

		}

	} else {

		echo 'No Modules Found.';

	}

}

/**
 * Returns array of active templates (false if none)
 *
 * @since 1.0
 */

function dslc_get_templates() {

	global $dslc_var_templates;

	if ( empty( $dslc_var_templates ) )
		return false;
	else
		return $dslc_var_templates;

}

/**
 * Displays a list of templates
 *
 * @since 1.0
 */

function dslc_display_templates() {

	// Get all the templates
	$templates = dslc_get_templates();

	// Arrays to store different types of templates
	$original_templates = array();
	$plugin_templates = array();
	$theme_templates = array();
	$user_templates = array();

	// If there are active templates
	if ( $templates ) {

		// Go through all templates
		foreach ( $templates as $template ) {

			// Append template to the appropriate templates array
			if ( $template['section'] == 'original' )
				$original_templates[$template['id']] = $template;
			elseif ( $template['section'] == 'plugin' )
				$plugin_templates[$template['id']] = $template;
			elseif ( $template['section'] == 'theme' )
				$theme_templates[$template['id']] = $template;
			elseif ( $template['section'] == 'user' )
				$user_templates[$template['id']] = $template;

		}

		// User templates output
		if ( ! empty( $user_templates ) ) {

			foreach( $user_templates as $template ) : ?>

				<div class="dslca-template dslca-scroller-item dslca-origin dslca-template-origin-user" data-origin="user" data-id="<?php echo $template['id']; ?>" style="display: none;">
					<span class="dslca-template-title"><?php echo $template['title']; ?></span>
					<span class="dslca-delete-template-hook" data-id="<?php echo $template['id']; ?>">
						<span class="dslca-icon dslc-icon-trash"></span>
					</span>
				</div><!-- .dslc-template -->

			<?php endforeach;

		}

		// Original templates output
		if ( ! empty( $original_templates ) ) {

				foreach( $original_templates as $template ) : ?>

					<div class="dslca-template dslca-scroller-item dslca-origin dslca-template-origin-lc" data-origin="lc" data-id="<?php echo $template['id']; ?>">
						<span class="dslca-template-title"><?php echo $template['title']; ?></span>
					</div><!-- .dslc-template -->

				<?php endforeach;

		}

		// Plugin templates output
		if ( ! empty( $plugin_templates ) ) {

				foreach( $plugin_templates as $template ) : ?>

					<div class="dslca-template dslca-scroller-item dslca-origin dslca-template-origin-plugin" data-origin="plugin" data-id="<?php echo $template['id']; ?>" style="display: none;">
						<span class="dslca-template-title"><?php echo $template['title']; ?></span>
					</div><!-- .dslc-template -->

				<?php endforeach;

		}

		// Theme templates output
		if ( ! empty( $theme_templates ) ) {

				foreach( $theme_templates as $template ) : ?>

					<div class="dslca-template dslca-scroller-item dslca-origin dslca-template-origin-theme" data-origin="theme" data-id="<?php echo $template['id']; ?>" style="display: none;">
						<span class="dslca-template-title"><?php echo $template['title']; ?></span>
					</div><!-- .dslc-template -->

				<?php endforeach;

		}

	} else {

		echo 'No templates found.';

	}

}


/**
 * Outputs content with modules
 *
 * @since 1.0
 */

function dslc_filter_content( $content ) {

	if ( post_password_required( get_the_ID() ) )
		return $content;

	global $dslc_should_filter;
	global $wp_the_query;
	global $dslc_post_types;
	global $dslc_is_content_filtered;

	$currID = get_the_ID();
	if ( isset( $wp_the_query->queried_object_id ) )
		$realID = $wp_the_query->queried_object_id;
	else 
		$realID = 'nope';

	// Should we filter the content?
	if ( ( $currID == $realID && in_the_loop() && $dslc_should_filter ) || is_archive() || is_author() || is_search() || is_404() ) {

		$dslc_is_content_filtered[ $currID ] = true;

		global $dslc_active;

		// Will hold the output
		$composer_header_append = '';
		$composer_footer_append = '';
		$header_code = '';
		$footer_code = '';
		$composer_header = '';
		$composer_footer = '';
		$composer_prepend = '';
		$composer_content = '';
		$composer_append = '';
		$template_code = false;

		// The composer code
		$composer_code = get_post_meta( get_the_ID(), 'dslc_code', true );
		$template_ID = false;

		// Tutorial
		$tut_page = false;
		$tut_ch_one = dslc_get_option( 'lc_tut_chapter_one', 'dslc_plugin_options_tuts' );
		$tut_ch_two = dslc_get_option( 'lc_tut_chapter_two', 'dslc_plugin_options_tuts' );
		$tut_ch_three = dslc_get_option( 'lc_tut_chapter_three', 'dslc_plugin_options_tuts' );
		$tut_ch_four = dslc_get_option( 'lc_tut_chapter_four', 'dslc_plugin_options_tuts' );

		if ( get_the_ID() == $tut_ch_one || get_the_ID() == $tut_ch_four ) {
			$tut_page = true;
			$composer_code = '';
		} elseif ( get_the_ID() == $tut_ch_two ) {
			$tut_page = true;
			$composer_code = '[dslc_modules_section type="wrapped" border_color="" border_width="0" border_style="solid" border="top bottom" bg_color="#f2f5f7" bg_image="" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" bg_image_repeat="repeat" bg_image_attachment="scroll" bg_image_position="left top" padding="84" padding_h="0" ] [dslc_modules_area last="yes" size="12"] [/dslc_modules_area] [/dslc_modules_section]';
		} elseif ( get_the_ID() == $tut_ch_three ) {
			$tut_page = true;
			$composer_code = '[dslc_modules_section type="wrapped" border_color="" border_width="0" border_style="solid" border="top bottom" bg_color="#f2f5f7" bg_image="" bg_video="" bg_video_overlay_color="#000000" bg_video_overlay_opacity="0" bg_image_repeat="repeat" bg_image_attachment="scroll" bg_image_position="left top" padding="84" padding_h="0" ] [dslc_modules_area last="yes" size="12"] [/dslc_modules_area] [/dslc_modules_section]';
		}

		// If single, load template
		if ( is_singular( $dslc_post_types ) ) {

			$template_ID = dslc_st_get_template_ID( get_the_ID() );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_prepend .= do_shortcode( $template_code );

			}

		}

		// If archive, load template
		if ( is_archive() && ! is_author() && ! is_search() ) {

			$template_ID = dslc_get_option( get_post_type(), 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_prepend .= do_shortcode( $template_code );

			}

		}

		if ( is_author() ) {

			$template_ID = dslc_get_option( 'author', 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_prepend .= do_shortcode( $template_code );

			}

		}

		if ( is_search() ) {

			$template_ID = dslc_get_option( 'search_results', 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$composer_code = get_post_meta( $template_ID, 'dslc_code', true );

			}

		}

		if ( is_404() ) {

			$template_ID = dslc_get_option( '404_page', 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$composer_code = get_post_meta( $template_ID, 'dslc_code', true );

			}

		}

		if ( ! is_singular( 'dslc_hf' ) ) {

			// Header/Footer
			if ( $template_ID ) {
				$header_footer = dslc_hf_get_ID( $template_ID );
			} else {
				$header_footer = dslc_hf_get_ID( get_the_ID() );
			}

			if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {
				if ( $header_footer['header'] )
					$composer_header_append = '<div class="dslc-hf-block-overlay"><a target="_blank" href="' . add_query_arg( 'dslc', 'active', get_permalink( $header_footer['header'] ) ) . '" class="dslc-hf-block-overlay-button dslca-link">Edit Header</a></div>';
				if ( $header_footer['footer'] )
					$composer_footer_append = '<div class="dslc-hf-block-overlay"><a target="_blank" href="' . add_query_arg( 'dslc', 'active', get_permalink( $header_footer['footer'] ) ) . '" class="dslc-hf-block-overlay-button dslca-link">Edit Footer</a></div>';
			}

			// Header
			if ( $header_footer['header'] ) {
				$header_code = get_post_meta( $header_footer['header'], 'dslc_code', true );
				if ( get_post_meta( $header_footer['header'], 'dslc_hf_position', true ) ) {
					$header_position = get_post_meta( $header_footer['header'], 'dslc_hf_position', true );
				} else {
					$header_position = 'relative';
				}
				$composer_header .= '<div id="dslc-header" class="dslc-header-pos-' . $header_position . '">' . do_shortcode( $header_code ) . $composer_header_append . '</div>';
			}

			// Footer
			if ( $header_footer['footer'] ) {
				$footer_code = get_post_meta( $header_footer['footer'], 'dslc_code', true );
				if ( get_post_meta( $header_footer['footer'], 'dslc_hf_position', true ) ) {
					$footer_position = get_post_meta( $header_footer['footer'], 'dslc_hf_position', true );
				} else {
					$footer_position = 'relative';
				}
				$composer_footer .= '<div id="dslc-footer"  class="dslc-footer-pos-' . $footer_position . '">' . do_shortcode( $footer_code ) . $composer_footer_append . '</div>';
			}

		}

		// Content that shows before the composer content
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {
			$composer_prepend = '';
		}

		// Content that shows after the composer content
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

			$editor_type = dslc_get_option( 'lc_editor_type', 'dslc_plugin_options_other' );
			if ( empty( $editor_type ) )
				$editor_type = 'both';

			$composer_append = '<div class="dslca-add-modules-section">
				<span class="dslca-add-modules-section-hook"><span class="dslca-icon dslc-icon-align-justify"></span>' . __( 'Add Modules Row', 'dslc_string' ) . '</span>
				<span class="dslca-import-modules-section-hook"><span class="dslca-icon dslc-icon-download-alt"></span>' . __( 'Import', 'dslc_string' ) . '</span>
			</div>';
			ob_start();

			?>
				<div class="dslca-wp-editor">
					<div class="dslca-wp-editor-inner">
						<?php 

							if ( $editor_type == 'visual' )
								wp_editor( '', 'dslcawpeditor', array( 'quicktags' => false ) ); 
							else
								wp_editor( '', 'dslcawpeditor' ); 
						?>
						<div class="dslca-wp-editor-actions">
							<span class="dslca-wp-editor-save-hook"><?php _e( 'CONFIRM', 'dslc_string' ); ?></span>
							<span class="dslca-wp-editor-cancel-hook"><?php _e( 'CANCEL', 'dslc_string' ); ?></span>
						</div>
					</div>
				</div>
			<?php
			
			$composer_append .= ob_get_contents();
			ob_end_clean();
		}

		// If composer code not empty
		if ( $composer_code || $template_code ) {
			// Generate the composer output
			$composer_content = do_shortcode( $composer_code );
		} elseif ( $header_code || $footer_code ) {
			
			if ( ! DS_LIVE_COMPOSER_ACTIVE )			
				return '<div id="dslc-content" class="dslc-content dslc-clearfix">' . $composer_header . $content . $composer_footer . '</div>';

		} else {

			if ( ! DS_LIVE_COMPOSER_ACTIVE )
				return $content;

		}

		// Post data
		if ( is_singular() && has_post_thumbnail( get_the_ID() ) )
			$composer_append .= '<input type="hidden" id="dslca-post-data-thumb" value="' . wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) . '" />';

		// Tutorial page
		if ( $tut_page )
			$composer_append .= '<input type="hidden" id="dslca-tut-page" value="' . get_the_ID() . '" />';

		// Regular textual content holder ( for search purposes )
		$content_for_search = '';
		if ( get_post_meta( get_the_ID(), 'dslc_content_for_search', true ) )
			$content_for_search = get_post_meta( get_the_ID(), 'dslc_content_for_search', true );

		if ( DS_LIVE_COMPOSER_ACTIVE )
			$composer_append .= '<textarea id="dslca-content-for-search">' . $content_for_search . '</textarea>';

		// Return the composer output and the regular WYSIWYG output
		return '<div id="dslc-content" class="dslc-content dslc-clearfix">' . do_action( 'dslc_output_prepend') . $composer_header . '<div id="dslc-main">' . $composer_prepend . $composer_content . '</div>' . $composer_append . $composer_footer . do_action( 'dslc_output_append') . '</div>';

	} else {

		return $content;

	}
	
} add_filter( 'the_content', 'dslc_filter_content', 101 );


/**
 * Output front end module content
 *
 * @since 1.0
 */

function dslc_module_front( $atts, $settings_raw = null ) {

	$settings = maybe_unserialize( base64_decode( $settings_raw ) );

	if ( is_array( $settings ) ) {

		// The ID of the module
		$module_id = $settings['module_id'];

		// Check if active
		if ( ! dslc_is_module_active( $module_id ) )
			return;

		// If class does not exists
		if ( ! class_exists( $module_id ) )
			return;
		
		// Apply new instance ID if needed
		if ( isset( $atts['give_new_id'] ) ) {
			$settings['module_instance_id'] = dslc_get_new_module_id();
		}

		// Instanciate the module class
		$module_instance = new $module_id();
		
		// Start output fetching
		ob_start();

		// Fixing the options array
		global $dslc_var_image_option_bckp;
		$dslc_var_image_option_bckp = array();
		$all_opts = $module_instance->options();
		foreach( $all_opts as $all_opt ) {

			// Fix settings when a new option added after a module is used
			if ( ! isset( $settings[ $all_opt['id'] ] ) ) {
			
				if ( isset( $all_opt['std'] ) && $all_opt['std'] !== '' ) {
					$settings[$all_opt['id']] = $all_opt['std'];
				} else {
					$settings[$all_opt['id']] = false;
				}

			}
			
		}

		// Load preset options if preset supplied
		$settings = apply_filters( 'dslc_filter_settings', $settings );

		// Transform image ID to URL
		foreach( $all_opts as $all_opt ) {
			if ( $all_opt['type'] == 'image' ) {
				if ( isset( $settings[$all_opt['id']] ) && ! empty( $settings[$all_opt['id']] ) && is_numeric( $settings[$all_opt['id']] ) ) {
					$dslc_var_image_option_bckp[$all_opt['id']] = $settings[$all_opt['id']];
					$image_info = wp_get_attachment_image_src( $settings[$all_opt['id']], 'full' );
					$settings[$all_opt['id']] = $image_info[0];
				}
			}
		}

		// Module output		
		$module_instance->output( $settings );

		// End output fetching
		$output = ob_get_contents();
		ob_end_clean();

		// Return the output
		return $output;

	} else {

		return 'A module broke';

	}

} add_shortcode( 'dslc_module', 'dslc_module_front' );

/**
 * Output front end modules area content
 *
 * @since 1.0
 */

function dslc_modules_section_front( $atts, $content = null ) {

	global $dslc_active;
	$section_style = dslc_row_get_style( $atts );
	$section_class = '';
	$overlay_style = '';

	// Columns spacing
	if ( ! isset( $atts['columns_spacing'] ) )
		$atts['columns_spacing'] = 'spacing';

	// Custom Class
	if ( ! isset( $atts['custom_class'] ) )
		$atts['custom_class'] = '';

	// Custom ID
	if ( ! isset( $atts['custom_id'] ) )
		$atts['custom_id'] = '';

	// Full/Wrapped
	if ( isset( $atts['type'] ) && ! empty( $atts['type'] ) && $atts['type'] == 'full' )
		$section_class .= 'dslc-full ';

	// Parallax
	$parallax_class = '';
	if ( isset( $atts['bg_image_attachment'] ) && ! empty( $atts['bg_image_attachment'] ) && $atts['bg_image_attachment'] == 'parallax' )
		$parallax_class = ' data-stellar-background-ratio="0.5" ';

	// Overlay Color
	if ( isset( $atts['bg_video_overlay_color'] ) && ! empty( $atts['bg_video_overlay_color'] ) )
		$overlay_style .= 'background-color:' . $atts['bg_video_overlay_color'] . '; ';

	// Overlay Opacity
	if ( isset( $atts['bg_video_overlay_opacity'] ) && ! empty( $atts['bg_video_overlay_opacity'] ) )
		$overlay_style .= 'opacity:' . $atts['bg_video_overlay_opacity'] . '; ';

	/**
	 * BG Video
	 */

	// Overlay
	$bg_video = '<div class="dslc-bg-video dslc-force-show"><div class="dslc-bg-video-inner"></div><div class="dslc-bg-video-overlay" style="'. $overlay_style .'"></div></div>';

	// BG Video
	if ( isset( $atts['bg_video'] ) && $atts['bg_video'] !== '' && $atts['bg_video'] !== 'disabled' ) {

		// If it's numeric ( in the media library )
		if ( is_numeric( $atts['bg_video'] ) ) 
			$atts['bg_video'] = wp_get_attachment_url( $atts['bg_video'] );

		// Remove the file type extension
		$atts['bg_video'] = str_replace( '.mp4', '', $atts['bg_video'] );
		$atts['bg_video'] = str_replace( '.webm', '', $atts['bg_video'] );

		// The HTML
		$bg_video = '
		<div class="dslc-bg-video">
			<div class="dslc-bg-video-inner">
				<video>
					<source type="video/mp4" src="' . $atts['bg_video'] . '.mp4" />
					<source type="video/webm" src="' . $atts['bg_video'] . '.webm" />
				</video>
			</div>
			<div class="dslc-bg-video-overlay" style="'. $overlay_style .'"></div>
		</div>';

	}

	// No video HTML if builder innactive or no video
	if ( ! $dslc_active && $atts['bg_video'] == '' && $atts['bg_image'] == '' ) {
		$bg_video = '';
	}

	/**
	 * Admin Classes
	 */

	$a_container_class = '';
	$a_prepend = '';
	$a_append = '';

	if ( $dslc_active ) {
		$a_container_class .= 'dslc-modules-section-empty ';
		$a_prepend = '<div class="dslc-modules-section-inner dslc-clearfix">';
		$a_append = '</div>';
	}

	// Columns spacing
	if ( $atts['columns_spacing'] == 'nospacing' )
		$section_class .= 'dslc-no-columns-spacing ';

	// Custom Class
	if ( $atts['custom_class'] != '' )
		$section_class .=  $atts['custom_class'] . ' ';

	// Custom ID
	$section_id = false;
	if ( $atts['custom_id'] != '' )
		$section_id =  $atts['custom_id'];

	// Custom ID - Output
	$section_id_output = '';
	if ( $section_id )
		$section_id_output = 'id="' . $section_id . '"';

	$output = '
		<div ' . $section_id_output . ' class="dslc-modules-section ' . $a_container_class . $section_class .'" style="' . dslc_row_get_style( $atts ) . '" '. $parallax_class .'>

				'.$bg_video.'

				<div class="dslc-modules-section-wrapper dslc-clearfix">'

					. $a_prepend. do_shortcode( $content ) . $a_append
					
					. '</div>';

		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

			// Management
			$output .= '
				<div class="dslca-modules-section-manage">
					<div class="dslca-modules-section-manage-inner">
						<span class="dslca-manage-action dslca-edit-modules-section-hook"><span class="dslca-icon dslc-icon-cog"></span></span>
						<span class="dslca-manage-action dslca-copy-modules-section-hook"><span class="dslca-icon dslc-icon-copy"></span></span>
						<span class="dslca-manage-action dslca-move-modules-section-hook"><span class="dslca-icon dslc-icon-move"></span></span>
						<span class="dslca-manage-action dslca-export-modules-section-hook"><span class="dslca-icon dslc-icon-upload-alt"></span></span>
						<span class="dslca-manage-action dslca-delete-modules-section-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
					</div>
				</div>
				<div class="dslca-modules-section-settings">' . dslc_row_get_options_fields( $atts ) . '</div>' ;

			// Loading
			$output .= '<div class="dslca-module-loading dslca-modules-area-loading"><div class="dslca-module-loading-inner"></div></div>';

		}

	$output .= '</div>';

	// Return the output
	return $output;

} add_shortcode( 'dslc_modules_section', 'dslc_modules_section_front' );

/**
 * Output front end modules area content
 *
 * @since 1.0
 */

function dslc_modules_area_front( $atts, $content = null ) {

	global $dslc_active;

	$pos_class = '';
	$module_area_size = $atts['size'];

	if ( $atts['last'] == 'yes' )
		$pos_class = 'dslc-last-col';

	if ( isset( $atts['first'] ) && $atts['first'] == 'yes' )
		$pos_class = 'dslc-first-col';

	$output = '<div class="dslc-modules-area dslc-col dslc-' . $atts['size'] . '-col '. $pos_class .'" data-size="' . $atts['size'] . '">';

		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

			// Management
			$output .= '<div class="dslca-modules-area-manage">
				<span class="dslca-modules-area-manage-line"></span>
				<div class="dslca-modules-area-manage-inner">
					<span class="dslca-manage-action dslca-copy-modules-area-hook"><span class="dslca-icon dslc-icon-copy"></span></span>
					<span class="dslca-manage-action dslca-move-modules-area-hook"><span class="dslca-icon dslc-icon-move"></span></span>
					<span class="dslca-manage-action dslca-change-width-modules-area-hook">
						<span class="dslca-icon dslc-icon-columns"></span>
						<div class="dslca-change-width-modules-area-options">
							<span data-size="1">1/12</span><span data-size="2">2/12</span>
							<span data-size="3">3/12</span><span data-size="4">4/12</span>
							<span data-size="5">5/12</span><span data-size="6">6/12</span>
							<span data-size="7">7/12</span><span data-size="8">8/12</span>
							<span data-size="9">9/12</span><span data-size="10">10/12</span>
							<span data-size="11">11/12</span><span data-size="12">12/12</span>
						</div>
					</span>
					<span class="dslca-manage-action dslca-delete-modules-area-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
				</div>
			</div>';

			// No content info
			$output .= '<div class="dslca-no-content">
				<span class="dslca-no-content-primary"><span class="dslca-icon dslc-icon-download-alt"></span><span class="dslca-no-content-help-text">' . __( 'Drop modules here', 'dslc_string' ) . '</span></span>
			</div>';

			// Loading
			$output .= '<div class="dslca-module-loading"><div class="dslca-module-loading-inner"></div></div>';

		}

		// Modules output
		if ( empty( $content ) || $content == ' ' ) 
			$output .= '&nbsp;';
		else
			$output .= do_shortcode( $content );

	$output .= '</div>';

	// Return the output
	return $output;

} add_shortcode( 'dslc_modules_area', 'dslc_modules_area_front' );

/**
 * Loads a template part
 *
 * @since 1.0
 */
function dslc_load_template( $filename, $default = '' ) {
	
	$template = '';

	// If filename supplied
	if ( $filename ) {

		// Look for template in the theme
		$template = locate_template( array ( $filename ) );

		// If not found in theme load default
		if ( ! $template )
			$template = DS_LIVE_COMPOSER_ABS . $default;

		load_template( $template, false );

	}

}

/**
 * Custom CSS
 *
 * @since 1.0
 */

function dslc_custom_css() {

	if ( ! is_singular() && ! is_archive() && ! is_author() && ! is_search() && ! is_404() )
		return;

	global $dslc_active;
	global $dslc_css_style;
	global $content_width;
	global $dslc_googlefonts_array;
	global $dslc_all_googlefonts_array;
	global $dslc_post_types;

	$composer_code = '';
	$template_code = '';

	$lc_width = dslc_get_option( 'lc_max_width', 'dslc_plugin_options' );

	if ( empty( $lc_width ) ) {
		$lc_width = $content_width . 'px';
	} else {
		
		if ( strpos( $lc_width, 'px' ) === false && strpos( $lc_width, '%' ) === false )
			$lc_width = $lc_width . 'px';

	}

	if ( is_singular( $dslc_post_types ) ) {
		$template_ID = dslc_st_get_template_ID( get_the_ID() );		
		$header_footer = dslc_hf_get_ID( $template_ID );
	} else {
		$header_footer = dslc_hf_get_ID( get_the_ID() );
	}

	// Header
	if ( $header_footer['header'] ) {
		$header_code = get_post_meta( $header_footer['header'], 'dslc_code', true );
		$composer_code .= $header_code;
	}	

	// Footer
	if ( $header_footer['footer'] ) {
		$footer_code = get_post_meta( $header_footer['footer'], 'dslc_code', true );
		$composer_code .= $footer_code;
	}

	echo '<style type="text/css">';

		// If single, load template
		if ( is_singular( $dslc_post_types ) ) {

			if ( $template_ID ) {
				
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );
				$composer_code .= $template_code;

			}

		}

		// If archive, load template
		if ( is_archive() && ! is_author() && ! is_search() ) {

			$template_ID = dslc_get_option( get_post_type(), 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_code .= $template_code;

			}

		}

		// If archive, load template
		if ( is_author() ) {

			$template_ID = dslc_get_option( 'author', 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_code .= $template_code;

			}

		}

		// If search, load template
		if ( is_search() ) {

			$template_ID = dslc_get_option( 'search_results', 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_code .= $template_code;

			}

		}

		// If 404, load template
		if ( is_404() ) {

			$template_ID = dslc_get_option( '404_page', 'dslc_plugin_options_archives' );

			if ( $template_ID ) {

				// Get template code
				$template_code = get_post_meta( $template_ID, 'dslc_code', true );

				// Add the template code
				$composer_code .= $template_code;

			}

		}
		
		// Get composer code
		$post_id = get_the_ID();
		$composer_code .= get_post_meta( $post_id, 'dslc_code', true );

		// If composer not used on this page stop execution
		if ( $composer_code ) {

			// Replace shortcode names
			$composer_code = str_replace( 'dslc_modules_section', 'dslc_modules_section_gen_css', $composer_code );
			$composer_code = str_replace( 'dslc_modules_area', 'dslc_modules_area_gen_css', $composer_code );
			$composer_code = str_replace( '[dslc_module]', '[dslc_module_gen_css]', $composer_code );
			$composer_code = str_replace( '[/dslc_module]', '[/dslc_module_gen_css]', $composer_code );

			// Do CSS shortcode
			do_shortcode( $composer_code );

			// Google Fonts Import

			$gfonts_output_subsets = '';
			$gfonts_subsets_arr = dslc_get_option( 'lc_gfont_subsets', 'dslc_plugin_options_performance' );
			if ( ! $gfonts_subsets_arr ) $gfonts_subsets_arr = array( 'latin', 'latin-ext', 'cyrillic', 'cyrillic-ext' );
			foreach ( $gfonts_subsets_arr as $gfonts_subset ) {
				if ( $gfonts_output_subsets == '' ) {
					$gfonts_output_subsets .= $gfonts_subset;
				} else {
					$gfonts_output_subsets .= ',' . $gfonts_subset;
				}
			}
			
			if ( ! defined( 'DS_LIVE_COMPOSER_GFONTS' ) || DS_LIVE_COMPOSER_GFONTS ) {

				$gfonts_output_prepend = '@import url("//fonts.googleapis.com/css?family=';
				$gfonts_output_append = '&subset=' . $gfonts_output_subsets . '"); ';
				$gfonts_ouput_inner = '';
				foreach ( $dslc_googlefonts_array as $gfont) {
					if ( in_array( $gfont, $dslc_all_googlefonts_array ) ) {
						$gfont = str_replace( ' ', '+', $gfont );
						if ( $gfont != '' ) {
							if ( $gfonts_ouput_inner == '' ) {
								$gfonts_ouput_inner .= $gfont . ':100,200,300,400,500,600,700,800,900';
							} else {
								$gfonts_ouput_inner .= '|' . $gfont . ':100,200,300,400,500,600,700,800,900';
							}
						}
					}
				}
				$gfonts_output = $gfonts_output_prepend . $gfonts_ouput_inner . $gfonts_output_append;
				echo $gfonts_output;

			}

		}

		// Wrapper width
		echo '.dslc-modules-section-wrapper, .dslca-add-modules-section { width : ' . $lc_width . '; } ';
		
		// Echo CSS style	
		if ( ! $dslc_active && $composer_code )
			echo $dslc_css_style;

	echo '</style>';
	

} 

function dslc_dynamic_css_hook() {

	$dynamic_css_location = dslc_get_option( 'lc_css_position', 'dslc_plugin_options' );
	if ( ! $dynamic_css_location ) $dynamic_css_location = 'head';
	if ( $dynamic_css_location == 'head' )
		add_action( 'wp_head', 'dslc_custom_css' ); 
	else
		add_action( 'wp_footer', 'dslc_custom_css' ); 	

} add_action( 'init', 'dslc_dynamic_css_hook' );

/**
 * Generate CSS - Modules Section
 */

function dslc_modules_section_gen_css( $atts, $content = null ) {

	return do_shortcode( $content );

} add_shortcode( 'dslc_modules_section_gen_css', 'dslc_modules_section_gen_css' );

/**
 * Generate CSS - Modules Area
 */

function dslc_modules_area_gen_css( $atts, $content = null ) {

	return do_shortcode( $content );

} add_shortcode( 'dslc_modules_area_gen_css', 'dslc_modules_area_gen_css' );

/**
 * Generate CSS - Module
 */

function dslc_module_gen_css( $atts, $settings_raw ) {

	$settings = maybe_unserialize( base64_decode( $settings_raw ) );

	// If it's an array
	if ( is_array( $settings ) ) {
		
		// The ID of the module
		$module_id = $settings['module_id'];

		// Check if module exists
		if ( ! dslc_is_module_active( $module_id ) )
			return;

		// If class does not exists
		if ( ! class_exists( $module_id ) )
			return;

		// Instanciate the module class
		$module_instance = new $module_id();

		// Get array of options
		$options_arr = $module_instance->options();

		// Load preset options if preset supplied
		$settings = apply_filters( 'dslc_filter_settings', $settings );

		// Transform image ID to URL
		global $dslc_var_image_option_bckp;
		$dslc_var_image_option_bckp = array();
		foreach ( $options_arr as $option_arr ) {

			if ( $option_arr['type'] == 'image' ) {
				if ( isset( $settings[$option_arr['id']] ) && ! empty( $settings[$option_arr['id']] ) && is_numeric( $settings[$option_arr['id']] ) ) {
					$dslc_var_image_option_bckp[$option_arr['id']] = $settings[$option_arr['id']];
					$image_info = wp_get_attachment_image_src( $settings[$option_arr['id']], 'full' );
					$settings[$option_arr['id']] = $image_info[0];
				}
			}

			// Fix css_custom value ( issue when default changed programmatically )
			if ( $option_arr['id'] == 'css_custom' && $module_id == 'DSLC_Text_Simple' && ! isset( $settings['css_custom'] ) ) {
				$settings['css_custom'] = $option_arr['std'];
			}

		}

		// Generate custom CSS
		if ( ( $module_id == 'DSLC_TP_Content' || $module_id == 'DSLC_Html' ) && ! isset( $settings['css_custom'] ) )
			$css_output = '';
		elseif ( isset( $settings['css_custom'] ) && $settings['css_custom'] == 'disabled' )
			$css_output = '';
		else 
			$css_output = dslc_generate_custom_css( $options_arr, $settings );

	}

} add_shortcode( 'dslc_module_gen_css', 'dslc_module_gen_css' );

/**
 * Pagination for modules
 */

function dslc_post_pagination( $atts ) {
			
	if( is_front_page() ) { $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; } else { $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; }

	if ( ! isset( $atts['force_number'] ) ) $force_number = false; else $force_number = $atts['force_number'];
	if ( ! isset( $atts['pages'] ) ) $pages = false; else $pages = $atts['pages'];
	if ( ! isset( $atts['type'] ) ) $type = 'numbered'; else $type = $atts['type'];
	$range = 2;

	$showitems = ($range * 2)+1;  

	if ( empty ( $paged ) ) { $paged = 1; }

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if( ! $pages ) {
			$pages = 1;
		}
	}

	if( 1 != $pages ) {

		?>
		<div class="dslc-pagination">
			<ul class="dslc-clearfix">
				<?php

					if ( $type == 'numbered' ) {

						if($paged > 2 && $paged > $range+1 && $showitems < $pages) { echo "<li class='dslc-inactive'><a href='".get_pagenum_link(1)."'>&laquo;</a></li>"; }
						if($paged > 1 && $showitems < $pages) { echo "<li class='dslc-inactive'><a href='".get_pagenum_link($paged - 1)."' >&lsaquo;</a></li>"; }

						for ($i=1; $i <= $pages; $i++){
							if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
								echo ($paged == $i)? "<li class='dslc-active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li class='dslc-inactive'><a class='inactive' href='".get_pagenum_link($i)."'>".$i."</a></li>";
							}
						}

						if ($paged < $pages && $showitems < $pages) { echo "<li class='dslc-inactive'><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>"; } 
						if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) { echo "<li class='dslc-inactive'><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>"; }

					} elseif ( $type == 'prevnext' ) {

						if($paged > 1 ) { echo "<li class='dslc-inactive dslc-fl'><a href='".get_pagenum_link($paged - 1)."' >" . __( 'Newer', 'dslc_string' ) . "</a></li>"; }
						if ($paged < $pages ) { echo "<li class='dslc-inactive dslc-fr'><a href='".get_pagenum_link($paged + 1)."'>" . __( 'Older', 'dslc_string' ) . "</a></li>"; } 

					}
					
				?>
			</ul>
		</div><!-- .dslc-pagination --><?php
	}

}