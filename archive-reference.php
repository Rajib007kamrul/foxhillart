<?php get_header(); 

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
<?php
        endwhile;
    endif;
?>

    <!-- about-area end -->
    <div class="reference-area pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-4">
                    <ul class="nav nav-tabs fha-tabs" id="myTab" role="tablist">
                        <?php 
                            $args = array(
                            'post_type'  => 'art',
                            'posts_per_page' => -1,
                          );

                          $query =  new WP_Query( $args );

                          if( $query->have_posts() ):  
                            $i =0; 
                            while( $query->have_posts() ) : $query->the_post();
                            global $post;
                            $id = $post->ID;
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ( $i == 0) { echo 'active'; } ?> " data-toggle="tab" 
                                    href="#<?php echo $id;?>" role="tab" aria-controls="<?php echo $id; ?>" 
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
                            'post_type'  => 'art',
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

                            $facebook = get_post_meta( $post->ID, 'facebook', true );
                            $twitter = get_post_meta( $post->ID, 'twitter', true );
                            $google = get_post_meta( $post->ID, 'google', true );
                            $instagram = get_post_meta( $post->ID, 'instagram', true );
                        ?>
                        <div class="tab-pane fade <?php if ( $j == 0) { echo 'show active'; } ?>" id="<?php echo $id; ?>" role="tabpanel">
                            <div class="fha-tab-content-inner">
                                <h4 class="title" data-sal="slide-up" data-sal-delay="200" data-sal-duration="1200"><?php echo the_title(); ?></h4>
                                <ul>
                                    <li data-sal="slide-up" data-sal-delay="300" data-sal-duration="1200">
                                        <?php echo get_the_content(); ?>
                                    </li>
                                    <li data-sal="slide-up" data-sal-delay="400" data-sal-duration="1200">Music | sound design: <?php echo $music; ?> </li>
                                    <li data-sal="slide-up" data-sal-delay="500" data-sal-duration="1200">Client: <?php echo $client; ?> </li>
                                    <li data-sal="slide-up" data-sal-delay="600" data-sal-duration="1200">Visuals | production: <?php echo $visual; ?> </li>
                                    <li data-sal="slide-up" data-sal-delay="700" data-sal-duration="1200">Creative: <?php echo $creative; ?> </li>
                                    <li data-sal="slide-up" data-sal-delay="800" data-sal-duration="1200">Producer: <?php echo $producer; ?> </li>
                                    <li data-sal="slide-up" data-sal-delay="900" data-sal-duration="1200">Management: <?php echo $management; ?> </li>
                                    <li data-sal="slide-up" data-sal-delay="1000" data-sal-duration="1200">
                                        <?php   
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'thumbnail', [ 'class' => '' ] );
                                            } 
                                        ?>
                                    </li>
                                    <li data-sal="slide-up" data-sal-delay="1200" data-sal-duration="1200">
                                        <ul class="social-media">
                                            <li><a href="<?php  echo esc_url( get_theme_mod('facebook') ); ?>"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="<?php  echo esc_url( get_theme_mod('twitter') ); ?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php  echo esc_url( get_theme_mod('google') ); ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php  echo esc_url( get_theme_mod('instagram') ); ?>"><i class="fa fa-instagram"></i></a></li>
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
    <!-- about-area end -->
    
<?php get_footer(); ?>