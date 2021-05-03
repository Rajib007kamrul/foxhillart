<?php

	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'thumbnail', [ 'class' => '' ] );
	}
?>

<h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?>  </a>  </h5>
<p> <?php echo wp_trim_words( get_the_content(), 30 ); ?> </p>