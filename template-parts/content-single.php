<?php

	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'thumbnail', [ 'class' => '' ] );
	}

	the_title();

	the_content();
	
	if ( comments_open() || get_comments_number() ) :
       comments_template();
	endif;
?>