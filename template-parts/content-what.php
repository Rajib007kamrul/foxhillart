<?php 
   $title  =  get_theme_mod('What_section_title');
   $content = get_theme_mod('What_section_content');
   $what_img = get_theme_mod('what_upload');
   $link = get_theme_mod('What_link');
    if( !empty( $link ) ) {
       $What_link = esc_url( get_permalink( $link ) ); 
    } else {
        $What_link = '#';
    }
?>

        <div class="section" id="section2">
            <!-- about-area start -->
            <div class="about-area">
                <div class="container">
                    <div class="about-inner-wrap">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-7 align-self-center">
                                <div class="about-inner mb-4 mb-md-0">
                                    <h2 data-sal="slide-up" data-sal-delay="600" data-sal-duration="1200"> <?php echo $title; ?> </h2> 

                                </h2>
                                    <p data-sal="slide-up" data-sal-delay="800" data-sal-duration="1200">
                                        <?php echo $content; ?>
                                    </p>
                                                                       <a data-sal="slide-up" data-sal-delay="1000" data-sal-duration="1200" href="<?php echo $What_link; ?>">Read more  ></a>
                                </div>
                            </div>
                            <div class="col-md-5 offset-xl-2 offset-lg-1" data-sal="slide-up" data-sal-delay="400" data-sal-duration="1200">
                                <div class="thumb">
                                    <img src="<?php echo $what_img; ?>" alt="about">
                                    <span>Foxhill Arts studio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- about-area end -->
        </div>