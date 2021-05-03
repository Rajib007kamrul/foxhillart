<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'thumbnail', [ 'class' => 'img-fluid' ] );
	}
	the_title();
	the_content();
?>