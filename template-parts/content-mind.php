 <?php
   $link = get_theme_mod('reference_link');
    if( !empty( $link ) ) {
       $reference_link = esc_url( get_permalink( $link ) );
    } else {
        $reference_link = '#';
    }
    $args = array(
    'post_type'  => 'reference',
    'posts_per_page' => 5,
  );

  $query =  new WP_Query( $args );

  if( $query->have_posts() ):  $i =1; ?>
        <div class="section" id="section3">
            <!-- minds-area start -->
            <div class="minds-area">
                <div class="container">
                    <div class="x-accordion">
    <?php
          while( $query->have_posts() ) : $query->the_post();

          global $post;

          $class = '';

          $slider_extra_image = get_post_meta( $post->ID, 'slider_extra_image_id', true );
          if(  !empty( $slider_extra_image ) ) {
              $extra_image_url = wp_get_attachment_image_src( $slider_extra_image, 'fox_reference_small' );
          } else {
              $extra_image_url = "";
          }

          if( $i == 1 ) {
            $class = 'is-active';
          } else if( $query->found_posts == $i ) {
            $class = 'x-accordion-panel-last';
          }
    ?>

            <div class="x-accordion-panel <?php echo $class; ?>">
                <a href="<?php the_permalink(); ?>" class="x-schedule-trigger"><?php echo the_title(); ?></a>
                <div class="x-accordion-content">
                    <div class="x-day-group">
                        <h4> <?php echo the_title(); ?> </h4>
                    </div>
                    <div class="x-day-group">
                        <p> <?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                    </div>
                    <div class="x-day-group x-is-power-thumb">
                        <?php
                            if ( has_post_thumbnail() ) {
                              //  the_post_thumbnail( 'fox_reference_thumbnail', [ 'class' => '' ] );
                            }

                            if ( !empty( $extra_image_url ) ) {
                                    echo'<img src="'. $extra_image_url[0] .'"
                                      width="'. $extra_image_url[1] .'"
                                      height="'. $extra_image_url[2] .'"
                                      alt=""
                                      />';
                            }
                        ?>
                    </div>
                    <div class="x-day-group mb-0">
                        <a href="<?php the_permalink(); ?>">Read more  ></a>
                    </div>
                </div>
            </div>

    <?php $i++; endwhile; ?>
                </div>
            </div>
        </div>
        <!-- minds-area start -->
    </div>

    <?php
        else:
         get_template_part( 'template-parts/content', 'none' );
        endif;
    ?>