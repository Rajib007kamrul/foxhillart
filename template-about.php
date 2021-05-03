<?php /* Template Name: About Template */ get_header();

    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $featured_img_url   = get_the_post_thumbnail_url( get_the_ID(),'full' );
?>

    <!-- banner-area start -->
    <div class="banner-area style-two text-center" style="background-image: url(<?php echo $featured_img_url; ?>);">
        <div class="container">
            <div class="banner-inners">
                <h1 data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200"> <?php the_title(); ?> </h1>
            </div>
        </div>
    </div>
    <!-- banner-area end -->





<!-- about-area end -->
<?php
    $lefts    =  get_theme_mod('customizer_custom_left_list_example');
    if( is_serialized( $lefts ) ) {
        $lefts = unserialize($lefts);
    }
    $heading = get_theme_mod('customizer_custom_list_heading');
    $rights   = get_theme_mod('customizer_custom_right_list_example');
    if( is_serialized( $rights ) ) {
        $rights = unserialize($rights);
    }
?>
    <div class="about-area-page pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <ul class="fha-tabs">
                        <?php foreach ($lefts as $left): ?>
                            <li class="nav-item">
                                <a class="nav-link"> <?php echo $left; ?> </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="fha-tab-content">
                        <div class="tab-pane">
                            <div class="fha-tab-content-inner">
                                <h1 class="title-2" data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200">
                                    <?php echo $heading; ?>
                                </h1>
                                <ul  data-sal="slide-up" data-sal-delay="600" data-sal-duration="1200">
                                    <?php foreach ($rights as $right): ?>
                                        <li> <?php echo $right; ?>  </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->

<?php
        endwhile;
    endif;
?>
    <!-- about-area end -->
    <div class="about-area-page pd-bottom-120">
        <div class="container">
            <!-- about content -->
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="about-content-inner pd-top-120">
                        <span> <?php the_title(); ?> </span>
                        <p> <?php the_content(); ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->
<?php get_footer(); ?>