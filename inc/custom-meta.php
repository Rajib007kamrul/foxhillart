<?php

add_action( 'admin_print_styles-post-new.php', 'script_and_style' );
add_action( 'admin_print_styles-post.php', 'script_and_style' );

function script_and_style() {
	wp_enqueue_style( 'foxhill_meta_css', get_template_directory_uri() . '/assets/css/custom-meta.css' );
	wp_enqueue_script( 'foxhill_meta_js', get_template_directory_uri() . '/assets/js/custom-meta.js', ['jquery'], false, true );
}

add_action( 'admin_init', 'add_meta_boxes' );

function add_meta_boxes() {
    add_meta_box( 'art_metabox', __( 'Reference Information', 'visgo' ), 'foxhill_post_meta', [ 'reference' ] );
}

function foxhill_post_meta() {
	global $post;

	$slider_extra_image_id = get_post_meta( $post->ID, 'slider_extra_image_id', true );
	$image  = "";

 	if( $slider_extra_image_id !== "" ) {
		$image_link = wp_get_attachment_url( $slider_extra_image_id, "full" );
		$image      = '<img src="'.$image_link.'" alt="" style="max-width:100%;"/>';
 	}

	$music = get_post_meta( $post->ID, 'music', true );
	$client = get_post_meta( $post->ID, 'client', true );
	$visual = get_post_meta( $post->ID, 'visual', true );
	$creative = get_post_meta( $post->ID, 'creative', true );
	$producer = get_post_meta( $post->ID, 'producer', true );
	$management = get_post_meta( $post->ID, 'management', true );

	$facebook = get_post_meta( $post->ID, 'facebook', true );
	$twitter = get_post_meta( $post->ID, 'twitter', true );
	$google = get_post_meta( $post->ID, 'google', true );
	$instagram = get_post_meta( $post->ID, 'instagram', true );

	$reference_repeat_fields = get_post_meta( $post->ID, 'reference_repeat_fields', true );
?>
	<table id="repeatable-fieldset-one" width="100%">
		<tbody>
				<?php
					if ( !empty( $reference_repeat_fields ) ) {
						foreach ( $reference_repeat_fields as $reference_field ) {
				?>
					<tr class="reference_repeat">
						<td>
							<label> label </label>
							<input  type="text" name="reference_label_repeat[]" class="label_repeat"
									value="<?php if( isset( $reference_field['reference_label'] ) && $reference_field['reference_label'] != '' )
									echo esc_attr( $reference_field['reference_label'] ); ?>"/>
						</td>

						<td>
							<label> value </label>
							<input  type="text" name="reference_value_repeat[]" class="value_repeat"
									value="<?php if( isset( $reference_field['reference_value'] ) && $reference_field['reference_value'] != '' )
									echo esc_attr( $reference_field['reference_value'] ); ?>"/>
						</td>

						<td class="remove-row-col"> <a class="button remove-row" href="#"> Remove </a> </td>

					</tr>
				<?php }
					} else {
				?>

				<tr class="reference_repeat">
					<td>
						<label> label </label>
						<input  type="text" name="reference_label_repeat[]" class="label_repeat" value=""/>
					</td>

					<td>
						<label> value </label>
						<input  type="text" name="reference_value_repeat[]" class="value_repeat" value=""/>
					</td>

					<td class="remove-row-col"> <a class="button remove-row" href="#"> Remove </a> </td>
				</tr>

			<?php } ?>
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td>  <a id="add-row" class="button" href="#"> Add another</a>  </td>
			</tr>
		</tfoot>
	</table>

	<table>
		<tbody>
		<!--
			<tr class="form-field">
				<td>
					<label> MUSIC | SOUND DESIGN </label>
					<input type="text" name="music" value="<?php //if( isset( $music ) ) { echo $music; } ?>">
				</td>
				<td>
					<label> Client </label>
					<input type="text" name="client" value="<?php // if( isset( $client ) ) { echo $client; } ?>">
				</td>
			</tr>
			<tr class="form-field">
				<td>
					<label> VISUALS | PRODUCTION </label>
					<input type="text" name="visual" value="<?php // if( isset( $visual ) ) { echo $visual; } ?>">
				</td>
				<td>
					<label> Creative </label>
					<input type="text" name="creative" value="<?php // if( isset( $creative ) ) { echo $creative; } ?>">
				</td>
			</tr>

			<tr class="form-field">
				<td>
					<label> Producer </label>
					<input type="text" name="producer" value="<?php //if( isset( $producer ) ) { echo $producer; } ?>">
				</td>
				<td>
					<label> Management </label>
					<input type="text" name="management" value="<?php // if( isset( $management ) ) { echo $management; } ?>">
				</td>
			</tr>  -->

			<tr class="form-field">
				<td>
					<label> Facebook </label>
					<input type="text" name="facebook" value="<?php // if( isset( $facebook ) ) { echo $facebook; } ?>">
				</td>
				<td>
					<label> Twitter </label>
					<input type="text" name="twitter" value="<?php // if( isset( $twitter ) ) { echo $twitter; } ?>">
				</td>
			</tr>

			<tr class="form-field">
				<td>
					<label> Google </label>
					<input type="text" name="google" value="<?php // if( isset( $google ) ) { echo $google; } ?>">
				</td>
				<td>
					<label> Instagram </label>
					<input type="text" name="instagram" value="<?php //if( isset( $instagram ) ) { echo $instagram; } ?>">
				</td>
			</tr>
		</tbody>
	</table>

	<table>
		<tbody>
			<tr class="form-field">
				<td>
					<div class="slider-thumbinail-container">
						<?php echo $image; ?>
					</div>

					<input type="hidden" class="slider_extra_image_id" name="slider_extra_image_id" value="<?php echo $slider_extra_image_id; ?>">
					<a href="javascript:void(0);" class="upload-work-thumbinail btn-thumbnail  <?php if ( $slider_extra_image_id !== "" ){ echo 'hidden'; } ?> "> Upload Thumbnail</a>
					<a href="javascript:void(0);" class="delete-work-thumbinail btn-thumbnail  <?php if ( $slider_extra_image_id === "" ) { echo 'hidden'; } ?> "> Remove Thumbnail </a>
				</td>
			</tr>
		</tbody>
	</table>
<?php
}

add_action( 'save_post', 'save_art_field', 10, 2 );

function save_art_field( $post_id, $post ) {

	if( 'reference' != $post->post_type )
		return ;

	// if( isset( $_POST['music'] ) ) {
	// 	update_post_meta( $post_id, 'music', $_POST['music'] );
	// }

	// if( isset( $_POST['client'] ) ) {
	// 	update_post_meta( $post_id, 'client', $_POST['client'] );
	// }

	// if( isset( $_POST['visual'] ) ) {
	// 	update_post_meta( $post_id, 'visual', $_POST['visual'] );
	// }

	// if( isset( $_POST['creative'] ) ) {
	// 	update_post_meta( $post_id, 'creative', $_POST['creative'] );
	// }

	// if( isset( $_POST['producer'] ) ) {
	// 	update_post_meta( $post_id, 'producer', $_POST['producer'] );
	// }


	// if( isset( $_POST['management'] ) ) {
	// 	update_post_meta( $post_id, 'management', $_POST['management'] );
	// }


	if( isset( $_POST['facebook'] ) ) {
		update_post_meta( $post_id, 'facebook', $_POST['facebook'] );
	}

	if( isset( $_POST['twitter'] ) ) {
		update_post_meta( $post_id, 'twitter', $_POST['twitter'] );
	}

	if( isset( $_POST['google'] ) ) {
		update_post_meta( $post_id, 'google', $_POST['google'] );
	}


	if( isset( $_POST['instagram'] ) ) {
		update_post_meta( $post_id, 'instagram', $_POST['instagram'] );
	}

	$slider_extra_image_id = "";

	if ( isset( $_POST[ "slider_extra_image_id"] ) ) {
        $slider_extra_image_id = $_POST["slider_extra_image_id"];
    }

    update_post_meta( $post_id, "slider_extra_image_id", $slider_extra_image_id );

    if ( !empty( $_POST['reference_label_repeat'] ) && !empty( $_POST['reference_value_repeat'] ) ) {
		$new = array();
		$reference_label  = $_POST['reference_label_repeat'];
		$reference_value = $_POST['reference_value_repeat'];
		$count = count( $reference_label );

		for ( $i = 0; $i < $count; $i++ ) {
			if ( $reference_label[$i] != '' ) :
				$new[$i]['reference_label']   = $reference_label[$i];
				$new[$i]['reference_value'] = $reference_value[$i];
			endif;
		}

		update_post_meta( $post_id, 'reference_repeat_fields', $new );
	}
}