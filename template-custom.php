<?php /* Template Name: Custom Home Template */  get_header(); ?>


    <!-- fullpage slider start -->
    <div class="fha-fullpage-slider" id="fullpage">

    <?php 
        get_template_part('template-parts/content','banner');
        get_template_part('template-parts/content','what'); 
        get_template_part('template-parts/content','mind'); 
        get_footer(); 
    ?>