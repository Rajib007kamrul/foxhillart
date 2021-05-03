<?php

add_action( 'customize_controls_enqueue_scripts', 'snt_customizer_controls_scripts' );
function snt_customizer_controls_scripts() {
	  wp_enqueue_script( 'custom_snt_control_js', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'customize-preview', 'jquery' ) );
	  wp_enqueue_style( 'custom_snt_control_style', get_template_directory_uri() . '/assets/css/customizer-controls.css' );

}

if( class_exists( 'WP_Customize_Control' ) ):
	class SNT_List_Control extends WP_Customize_Control {
		public $type = 'list';

		public function render_content() {
			$values = $this->value();
			if ( is_serialized( $values ) ) {
				$values = unserialize( $values );
			}
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>


			<div class="control-list" id="list-control-<?php echo $this->id; ?>">
				 	<?php
				 		if( is_array( $values ) ) {
              				// For each $values, create an input
				 			foreach ($values as $value ) { ?>
				 				 <div class="listinput">
									<span class="removeInput" >X</span>
									<input type="text"  value="<?php echo $value; ?>" placeholder="" />
								</div>
								<?php
				 			}
				 		}
				 	?>
			</div>

      		<!-- Button for adding new input -->
			<button type="button" data-id="<?php echo $this->id; ?>"  class="button list-control-add button-default">Add</button>
			<!-- Button to confirm the list -->
      		<button type="button" data-id="<?php echo $this->id; ?>"  class="button list-control-confirm button-primary">Confirm List</button>

			<?php
        		// If it's not serialized, serialize it to save in input
				if ( ! is_serialized( $values ) ) {
					$values = serialize( $values );
				}
			?>

      		<!-- Input that is the control setting data -->
			<input  <?php echo $this->link(); ?> type="hidden" id="list-input-<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $values; ?>" placeholder="" />

		<?php
		}
	}
endif;