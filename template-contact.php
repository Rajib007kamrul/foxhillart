<?php /* Template Name: Contact Template */ get_header(); 
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $featured_img_url   = get_the_post_thumbnail_url( get_the_ID(),'full' );
?>

    <!-- banner-area start -->
    <div class="banner-area style-two text-center" style="background-image: url(<?php echo $featured_img_url; ?>);">
        <div class="container">
            <div class="banner-inners">
                <h1 data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
    <!-- banner-area end -->

    <!-- about-area end -->
    <div class="contact-area pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <p class="pr-xl-3 contact-left-text"><?php echo get_theme_mod('contact_text'); ?></p>
                </div>
                <div class="col-xl-7 col-lg-8">
                    <div class="contact-form-inner fha-tab-content">
						<?php echo do_shortcode( '[contact-form-7 id="1978" title="Contact us"]' ); ?>
<!--                         <form>
                            <div class="row">
                                <div class="col-md-4" data-sal="slide-up" data-sal-delay="200" data-sal-duration="1200">
                                    <div class="single-contact-wrap">
                                        <label>
                                            <span>Full name</span>
                                            <input type="text" placeholder="Name">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4" data-sal="slide-up" data-sal-delay="200" data-sal-duration="1200">
                                    <div class="single-contact-wrap">
                                        <label>
                                            <span>E-Mail</span>
                                            <input type="text" placeholder="E-Mail">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4" data-sal="slide-up" data-sal-delay="200" data-sal-duration="1200">
                                    <div class="single-contact-wrap">
                                        <label>
                                            <span>Phone number</span>
                                            <input type="text" placeholder="Phone number">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" data-sal="slide-up" data-sal-delay="400" data-sal-duration="1200">
                                    <div class="single-contact-wrap">
                                        <label>
                                            <span>Message</span>
                                            <textarea placeholder="Message"></textarea>
                                        </label>
                                    </div>
                                </div> 
                            </div>
                        </form> -->
                        <div class="row">
                            <div class="col-12 mb-4"  data-sal="slide-up" data-sal-delay="600" data-sal-duration="1200">
                                <h4 class="mb-0 contact-page-c-title">For inquires & new business.</h4>
                            </div>
                            <div class="col-sm-6" data-sal="slide-up" data-sal-delay="800" data-sal-duration="1200">
                                <div class="widget widget-contact">
                                    <p> <?php echo get_theme_mod('address_section_one'); ?> </p>
                                </div>
                            </div>
                            <div class="col-sm-6" data-sal="slide-up" data-sal-delay="800" data-sal-duration="1200">
                                <div class="widget widget-contact">
                                        <p> <?php echo get_theme_mod('address_section_two'); ?> </p>
                                    </div>
                            </div>
                            <div class="col-12">
                                <ul class="social-media" data-sal="slide-up" data-sal-delay="1000" data-sal-duration="1200">
                            <li><a href="<?php  echo esc_url( get_theme_mod('google_section') ); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php  echo esc_url( get_theme_mod('fb_section') );?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php  echo esc_url( get_theme_mod('twitter_section') );?> "><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php  echo esc_url( get_theme_mod('instragram_section') );?>"><i class="fa fa-instagram"></i></a></li>
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
   
<?php get_footer('contact'); ?>