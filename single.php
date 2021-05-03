<?php get_header(); ?>

<!-- about-area end -->
<div class="about-area-page pd-bottom-120">
	<div class="container">
	    <div class="row justify-content-center">
			<?php
			    if( have_posts() ):
			        while ( have_posts() ) : the_post();
			        	get_template_part( 'template-parts/content', 'single' );
			        	if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
			        endwhile;
			    else:
			    	get_template_part( 'template-parts/content', 'none' );
			    endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>