    <!-- about-area end -->
    <div class="reference-area pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-4">
                    <ul class="nav nav-tabs fha-tabs reference_tabs" id="myTab" role="tablist">
                        <?php
                            $args = array(
                            'post_type'  => 'reference',
                            'posts_per_page' => -1,
                          );

                          $query =  new WP_Query( $args );

                          if( $query->have_posts() ):
                            $i =0;
                            while( $query->have_posts() ) : $query->the_post();
                            global $post;
                            $id = $post->ID;
                            $image_url = get_the_post_thumbnail_url( $id,'full' );
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ( $i == 0) { echo 'active'; } ?> " data-toggle="tab"
                                    href="#<?php echo $id;?>"
                                    data-reftitle= "<?php echo get_the_title(); ?>"
                                    data-refimg= "<?php echo $image_url;?>"
                                    role="tab"
                                    aria-controls="<?php echo $id; ?>"
                                    aria-selected="true">
                                > <?php echo the_title(); ?> </a>
                            </li>
                        <?php
                            $i++;
                            endwhile;
                            else:
                            endif;
                        ?>
                  </ul>
                </div>
                <div class="col-xl-6 col-md-7">
                    <div class="tab-content fha-tab-content fha-tab-reference" id="myTabContent">
                        <?php
                            $args = array(
                            'post_type'  => 'reference',
                            'posts_per_page' => -1,
                          );

                          $query =  new WP_Query( $args );

                          if( $query->have_posts() ):
                            $j =0;
                            while( $query->have_posts() ) : $query->the_post();

                            global $post;
                            $id = $post->ID;

                            $music = get_post_meta( $post->ID, 'music', true );
                            $client = get_post_meta( $post->ID, 'client', true );
                            $visual = get_post_meta( $post->ID, 'visual', true );
                            $creative = get_post_meta( $post->ID, 'creative', true );
                            $producer = get_post_meta( $post->ID, 'producer', true );
                            $management = get_post_meta( $post->ID, 'management', true );

                            $facebook  = esc_url( get_post_meta( $post->ID, 'facebook', true ) );
                            $twitter   = esc_url( get_post_meta( $post->ID, 'twitter', true ) );
                            $google    = esc_url( get_post_meta( $post->ID, 'google', true ) );
                            $instagram = esc_url( get_post_meta( $post->ID, 'instagram', true ) );

                            $slider_extra_image = get_post_meta( $post->ID, 'slider_extra_image_id', true );
                            if(  !empty( $slider_extra_image ) ) {
                                $extra_image_url = wp_get_attachment_image_src( $slider_extra_image, 'fox_reference_small' );
                            } else {
                                $extra_image_url = "";
                            }

                            $reference_repeat_fields = get_post_meta( $post->ID, 'reference_repeat_fields', true );
                        ?>
                        <div class="tab-pane fade <?php if ( $j == 0) { echo 'show active'; } ?>" id="<?php echo $id; ?>" role="tabpanel">
                            <div class="fha-tab-content-inner">
                                <h4 class="title" data-sal="slide-up" data-sal-delay="200" data-sal-duration="1200"><?php echo the_title(); ?></h4>
                                <ul>
                                    <li data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200">
                                        <?php echo get_the_content(); ?>
                                    </li>
                                    <?php
                                    if ( !empty( $reference_repeat_fields ) ) {
                                        foreach ( $reference_repeat_fields as $reference_repeat_field ) {
                                            echo '<li data-sal="slide-up" data-sal-delay="400" data-sal-duration="1200">'. $reference_repeat_field['reference_label'] . ' '. $reference_repeat_field['reference_value'] .'</li>';
                                        }
                                    }
                                    ?>
<!--                                     <?php // if( !empty( $music ) ) {  ?>
                                        <li data-sal="slide-up" data-sal-delay="400" data-sal-duration="1200"> Music | sound design: <?php  // echo $music; ?> </li>
                                    <?php } // if( !empty( $client ) ) {  ?>
                                        <li data-sal="slide-up" data-sal-delay="500" data-sal-duration="1200">Client: <?php // echo $client; ?> </li>
                                    <?php } // if( !empty( $visual ) ) { ?>
                                        <li data-sal="slide-up" data-sal-delay="600" data-sal-duration="1200">Visuals | production: <?php // echo $visual; ?> </li>
                                    <?php } // if( !empty( $creative ) ) {  ?>
                                        <li data-sal="slide-up" data-sal-delay="700" data-sal-duration="1200">Creative: <?php // echo $creative; ?> </li>
                                    <?php } // if( !empty( $producer ) ) {  ?>
                                        <li data-sal="slide-up" data-sal-delay="800" data-sal-duration="1200">Producer: <?php // echo $producer; ?> </li>
                                    <?php } // if( !empty( $management ) ) { ?>
                                        <li data-sal="slide-up" data-sal-delay="900" data-sal-duration="1200">Management: <?php // echo $management; ?> </li>
                                    <?php } ?> -->
                                    <li data-sal="slide-up" data-sal-delay="1000" data-sal-duration="1200">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                              //  the_post_thumbnail( 'fox_reference_small', [ 'class' => '' ] );
                                            }
                                            if ( !empty( $extra_image_url ) ) {
                                                    echo'<img src="'. $extra_image_url[0] .'"
                                                      width="'. $extra_image_url[1] .'"
                                                      height="'. $extra_image_url[2] .'"
                                                      alt=""
                                                      />';
                                            }
                                        ?>
                                    </li>
                                    <li data-sal="slide-up" data-sal-delay="1200" data-sal-duration="1200">
                                        <ul class="social-media">
                                            <?php if( !empty( $facebook ) ) { ?>
                                                <li><a href="<?php  echo $facebook; ?>"><i class="fa fa-google-plus"></i></a></li>
                                            <?php } if( !empty( $twitter ) ) { ?>
                                                <li><a href="<?php  echo $twitter; ?>"><i class="fa fa-facebook"></i></a></li>
                                            <?php } if( !empty( $google ) ) { ?>
                                                <li><a href="<?php  echo $google; ?>"><i class="fa fa-twitter"></i></a></li>
                                            <?php } if( !empty( $instagram ) ) { ?>
                                                <li><a href="<?php  echo $instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <?php
                            $j++;
                            endwhile;
                            else:
                            endif;
                        ?>

                </div>
            </div>
        </div>
    </div>
</div>
    <!-- about-area end -->