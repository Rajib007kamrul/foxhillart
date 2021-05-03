    <!-- footer-area start -->
        <div class="footer-area style-two">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="footer-inner text-center">
                            <div class="copy-right mb-4" data-sal="slide-up" data-sal-delay="1000" data-sal-duration="1200">
                                <p><?php echo get_theme_mod('copyright_section'); ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-area end -->

    <?php

        $footer_logo = get_theme_mod( 'footer_logo_upload' );
        if ( empty( $footer_logo ) ) {
          $footer_logo = get_template_directory_uri() . '/assets/img/logo2.svg';
        }

    ?>
    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top">
			<a href="<?php echo home_url( '/' ); ?>">   <img src="<?php echo $footer_logo; ?>" alt="logo2"> </a>
        </span>
    </div>
    <!-- back to top area end -->
<?php wp_footer(); ?>
</body>
</html>