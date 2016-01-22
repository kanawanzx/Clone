<?php

	function dslc_row_display_options() {

		// Global var containing options
		global $dslc_var_row_options;

		// If empty return
		if ( empty( $dslc_var_row_options ) ) return;

		foreach ( $dslc_var_row_options as $row_option ) {

			$css_rule_output = '';
			if ( isset( $row_option['affect_on_change_rule'] ) )
				$css_rule_output = 'data-css-rule="' . $row_option['affect_on_change_rule'] . '"';

			$css_element_output = '';
			if ( isset( $row_option['affect_on_change_el'] ) )
				$css_element_output = 'data-css-element="' . $row_option['affect_on_change_el'] . '"';

			$extra_class = '';
			if ( $row_option['type'] == 'image' || $row_option['type'] == 'video' )
				$extra_class = 'dslca-modules-section-edit-option-upload';
			if ( $row_option['type'] == 'border_checkbox' )
				$extra_class = 'dslca-modules-section-edit-option-checkbox';

			if ( ! isset( $row_option['ext'] ) )
				$row_option['ext'] = '';

			if ( ! isset( $row_option['min'] ) )
				$row_option['min'] = 0;

			if ( ! isset( $row_option['max'] ) )
				$row_option['max'] = 100;

			if ( ! isset( $row_option['increment'] ) )
				$row_option['increment'] = 1;

			?>
			<div class="dslca-modules-section-edit-option <?php echo $extra_class; ?>" data-id="<?php echo $row_option['id']; ?>">

				<span class="dslca-modules-section-edit-label"><?php echo $row_option['label']; ?></span>

				<?php if ( $row_option['type'] == 'text' ) : ?>
					
					<input type="text" class="dslca-modules-section-edit-field" data-id="<?php echo $row_option['id']; ?>" <?php echo $css_element_output . ' ' . $css_rule_output; ?> />

				<?php elseif ( $row_option['type'] == 'select' ) : ?>
					
					<select type="text" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-select" data-id="<?php echo $row_option['id']; ?>" <?php echo $css_element_output . ' ' . $css_rule_output; ?> >
						<?php foreach ( $row_option['choices'] as $choice ) : ?>
							<option value="<?php echo $choice['value']; ?>"><?php echo $choice['label']; ?></option>
						<?php endforeach; ?>
					</select>

				<?php elseif ( $row_option['type'] == 'color' ) : ?>

					<input type="text" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-colorpicker" data-id="<?php echo $row_option['id']; ?>" <?php echo $css_element_output . ' ' . $css_rule_output; ?> />

				<?php elseif ( $row_option['type'] == 'image' ) : ?>

					<span class="dslca-modules-section-edit-field-image-add-hook"><span class="dslca-icon dslc-icon-cloud-upload"></span><?php _e( 'Upload Image', 'dslc_string' ); ?></span>
					<span class="dslca-modules-section-edit-field-image-remove-hook"><span class="dslca-icon dslc-icon-remove"></span><?php _e( 'Remove Image', 'dslc_string' ); ?></span>
					<input type="hidden" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-upload" data-id="<?php echo $row_option['id']; ?>" <?php echo $css_element_output . ' ' . $css_rule_output; ?> />

				<?php elseif ( $row_option['type'] == 'video' ) : ?>

					<span class="dslca-modules-section-edit-field-image-add-hook"><span class="dslca-icon dslc-icon-cloud-upload"></span><?php _e( 'Upload Video', 'dslc_string' ); ?></span>
					<span class="dslca-modules-section-edit-field-image-remove-hook"><span class="dslca-icon dslc-icon-remove"></span><?php _e( 'Remove Video', 'dslc_string' ); ?></span>
					<input type="hidden" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-upload" data-id="<?php echo $row_option['id']; ?>" <?php echo $css_element_output . ' ' . $css_rule_output; ?> />

				<?php elseif ( $row_option['type'] == 'slider' ) : ?>

					<div class="dslca-modules-section-edit-field-slider" data-ext="<?php echo $row_option['ext']; ?>" data-min="<?php echo $row_option['min']; ?>" data-max="<?php echo $row_option['max']; ?>" data-incr="<?php echo $row_option['increment']; ?>"></div>
					<span class="dslca-modules-section-edit-field-slider-tooltip"></span>
					<input type="hidden" class="dslca-modules-section-edit-field" data-id="<?php echo $row_option['id']; ?>" <?php echo $css_element_output . ' ' . $css_rule_output; ?> />

				<?php elseif ( $row_option['type'] == 'border_checkbox' ) : ?>

					<div class="dslca-modules-section-edit-option-checkbox-wrapper">
						<div class="dslca-modules-section-edit-option-checkbox-single">
							<span class="dslca-modules-section-edit-option-checkbox-hook"><span class="dslca-icon dslc-icon-check-empty"></span><?php _e( 'Top', 'dslc_string' ); ?></span>
							<input type="checkbox" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-checkbox" data-id="border-top" data-css-rule="border-width">
						</div>
						<div class="dslca-modules-section-edit-option-checkbox-single">
							<span class="dslca-modules-section-edit-option-checkbox-hook"><span class="dslca-icon dslc-icon-check-empty"></span><?php _e( 'Right', 'dslc_string' ); ?></span>
							<input type="checkbox" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-checkbox" data-id="border-right" data-css-rule="border-width">
						</div>
						<div class="dslca-modules-section-edit-option-checkbox-single">
							<span class="dslca-modules-section-edit-option-checkbox-hook"><span class="dslca-icon dslc-icon-check-empty"></span><?php _e( 'Bottom', 'dslc_string' ); ?></span>
							<input type="checkbox" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-checkbox" data-id="border-bottom" data-css-rule="border-width">
						</div>
						<div class="dslca-modules-section-edit-option-checkbox-single">
							<span class="dslca-modules-section-edit-option-checkbox-hook"><span class="dslca-icon dslc-icon-check-empty"></span><?php _e( 'Left', 'dslc_string' ); ?></span>
							<input type="checkbox" class="dslca-modules-section-edit-field dslca-modules-section-edit-field-checkbox" data-id="border-left" data-css-rule="border-width">
						</div>
					</div>

				<?php endif; ?>

			</div><!-- .dslca-modules-section-edit-option -->
			<?php

		}

	}

	function dslc_row_get_options_fields( $atts = false ) {

		$output = '';

		// Global var containing options
		global $dslc_var_row_options;

		// If empty return
		if ( empty( $dslc_var_row_options ) ) return;

		// Go through each option and append HTML
		if ( $atts ) {
			foreach ( $dslc_var_row_options as $row_option ) {
				$output .= '<input type="text" data-id="' . $row_option['id'] . '" value="'. $atts[$row_option['id']] .'" data-def="'. $atts[$row_option['id']] .'">';
			}
		} else {
			foreach ( $dslc_var_row_options as $row_option ) {
				if ( ! isset( $row_option['std'] ) ) $row_option['std'] = '';
				$output .= '<input type="text" data-id="' . $row_option['id'] . '" value="'. $row_option['std'] .'">';
			}
		}

		return $output;

	}

	function dslc_row_get_style( $atts = false ) {

		global $dslc_var_row_options;
		$style = '';

		// If empty return
		if ( empty( $dslc_var_row_options ) ) return;

		// Loop through all options
		foreach ( $dslc_var_row_options as $row_option ) {
			
			// If there's an el then it's not for the section div			
			if ( ! isset( $row_option['affect_on_change_el'] ) ) {

				// The CSS rules
				$rules = false;
				if ( isset( $row_option['affect_on_change_rule'] ) )
					$rules = explode( ',', $row_option['affect_on_change_rule'] );

				// The CSS value
				$value = false;
				if ( $atts && isset( $atts[$row_option['id']] ) ) {
					$value = $atts[$row_option['id']];
				} elseif ( isset( $row_option['std'] ) ) {
					$value = $row_option['std'];
				}

				// The CSS value extension
				if ( isset( $row_option['ext'] ) )
					$value = $value . $row_option['ext'];

				// Border
				if ( $row_option['id'] == 'border' ) {

					$checkbox_arr = explode( ' ', trim( $value ) );

					if ( ! in_array( 'top', $checkbox_arr ) )
						$style .= 'border-top-style: hidden; ';

					if ( ! in_array( 'right', $checkbox_arr ) )
						$style .= 'border-right-style: hidden; ';

					if ( ! in_array( 'bottom', $checkbox_arr ) )
						$style .= 'border-bottom-style: hidden; ';

					if ( ! in_array( 'left', $checkbox_arr ) )
						$style .= 'border-left-style: hidden; ';

				}

				if ( $value && $rules ) {

					foreach ( $rules as $rule ) {

						if ( $rule == 'background-image' ) {

							if ( $row_option['id'] == 'bg_image_thumb' ) {
								if ( $value == 'enabled' ) {
									$value = 'url(' . wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) . ')';
								}
							} else {
								$value = 'url(' . wp_get_attachment_url( $value ) . ')';
							}

						}

						$style .= $rule . ':' . $value . ';';

					}

				}

			} 

		}

		return $style;

	}