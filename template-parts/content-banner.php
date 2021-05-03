<?php
   $title  =  get_theme_mod('banner_section_title');
   $content = get_theme_mod('banner_section_content');
   $banner_img = get_theme_mod('banner_upload');
   $banner_video = get_theme_mod('banner_video');
?>
        <div class="section" id="section1">
            <!-- banner-area start -->
            <div class="banner-area style-one" style="background-image: url(<?php echo $banner_img; ?>);">
                <div class="container-banner">
                    <div class="banner-inner-wrap">
                        <div class="row">
                            <div class="col-lg-7 offset-lg-5 text-right">
									<div class="thumb">
                                    <iframe id="myVideo" src="<?php echo $banner_video; ?>?autoplay=1&muted=1&loop=1&controls=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="banner-inner">
                            <h1 data-sal="slide-up" data-sal-delay="400" data-sal-duration="1200"> <?php echo $title; ?> </h1>
                            <p data-sal="slide-up" data-sal-delay="800" data-sal-duration="1200"> <?php echo $content; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner-area end -->
        </div>