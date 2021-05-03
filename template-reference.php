<?php /* Template Name: Reference Template */ get_header();

    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $featured_img_url   = get_the_post_thumbnail_url( get_the_ID(),'full' );
?>

    <!-- banner-area start -->
    <div class="banner-area style-two text-center reference-banner" style="background-image: url(<?php echo $featured_img_url; ?>);">
        <div class="container">
            <div class="banner-inners ">
                <h1 data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200"><?php the_title(); ?></h1>
            </div>
        </div>
		<a class="bst-horizontal-line" href="#"><span class="bst-horizontal-line-after">Client</span>
			<span class="reference-title">Fishy Minds</span>	</a>
    </div>
    <!-- banner-area end -->

	<?php
			get_template_part('template-parts/content','reference');
        endwhile;
    endif;
?>

<?php get_footer(); ?>