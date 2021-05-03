<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>

<?php

    $logo = get_theme_mod( 'logo_upload' );
    if ( empty( $logo ) ) {
      $logo = get_template_directory_uri() . '/assets/img/logo.svg';
    }

?>

    <!-- preloader area start -->
	<div id="preloader">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/preloader.png" alt="preloader">
    </div>
    <!-- preloader area end -->
    
    <!-- menu area start -->
    <div class="menu-inner">
        <div class="container">
            <div class="menu-inner-wrap">
                <span class="menu-close"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/1.svg" alt="img"></span>
                <div class="row">
                    <div class="col-lg-5">
        <?php
          $defaults = array(
            'theme_location'  => 'primary',
            'container_id'    => '',
            'container'       => 'ul',
            'container_class' => '',
          );

          wp_nav_menu( $defaults );
        ?>
                        <div class="menu-contact-content">
                            <p> <?php echo get_theme_mod('menu_text'); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu area start -->

    <!-- navbar start -->
    <div class="navbar-area">
        <div class="navbar-inner">
            <div class="row">
                <div class="col-6">
                    <a href="<?php echo home_url('/'); ?>" class="logo">
                        <img src="<?php echo $logo; ?> " alt="logo">
                    </a>
                </div>
                <div class="col-6">
                    <div class="navbar-right text-right">
                        <a class="navbar-social" href="<?php  echo esc_url( get_theme_mod('instagram_section') );?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/2.svg" alt="img"></a>
                        <ul class="dropdown-menu-btn">
                            <li class="bar"></li>
                            <li class="bar"></li>
                            <li class="bar"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->
