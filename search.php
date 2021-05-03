<?php get_header(); ?>


<!-- about-area end -->
<div class="about-area-page pd-bottom-120">
	<div class="container">
	    <div class="row justify-content-center">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tar' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

			<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content');
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>