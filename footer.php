<?php // $footer_title= get_theme_mod('footer_title_section');  ?> 
<div class="section" id="section4">
            <!-- footer-area start -->
            <div class="footer-area mb-lg-0">
                <div class="container">
                    <div class="footer-inner text-center">
                <h2 data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200">For inquires & new business</h2>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7">
                        <div class="row" data-sal="slide-up" data-sal-delay="500" data-sal-duration="1200">
                            <div class="col-sm-6">
                                <div class="widget widget-contact">
                                    <p> 
                                        <?php echo get_theme_mod('address_section_one'); ?>
                                       <!--  Anthon Bäckström <br> Owner / Executive Producer <br> anthon@foxhillarts.se <br> +46 (0)70 713 88 13 -->
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="widget widget-contact">
                                    <p>
                                        <?php echo get_theme_mod('address_section_two'); ?>
                                       <!--  Matilda Thysell <br> Business Development <br> 
                                        matilda@foxhillarts.se <br> +46 (0)70 585 89 81 -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <ul class="social-media" data-sal="slide-up" data-sal-delay="900" data-sal-duration="1200">
                            <li><a href="<?php  echo esc_url( get_theme_mod('google_section') ); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php  echo esc_url( get_theme_mod('fb_section') );?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php  echo esc_url( get_theme_mod('twitter_section') );?> "><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php  echo esc_url( get_theme_mod('instragram_section') );?>"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <div class="copy-right" data-sal="slide-up" data-sal-delay="1000">
                            <p> <?php echo get_theme_mod('copyright_section'); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
            <!-- footer-area end -->
        </div>
    </div>
    <!-- fullpage slider end -->

    <?php

        $footer_logo = get_theme_mod( 'footer_logo_upload' );
        if ( empty( $footer_logo ) ) {
          $footer_logo = get_template_directory_uri() . '/assets/img/logo2.svg';
        }

    ?>
    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top">
           <a href="<?php echo home_url( '/' ); ?>">  <img src="<?php echo $footer_logo; ?>" alt="logo2"> </a>
        </span>
    </div>
    <!-- back to top area end -->





<?php wp_footer(); ?>
</body>
</html>