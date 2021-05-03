<?php

class Foxhill_Customizer {

  public function __construct() {
    add_action( 'customize_register', [ $this, 'customize_register' ] );
  }

  public function customize_register( $wp_customize ) {
  		
  		/*** Home Panel **/

  		$wp_customize->add_panel( 'home_panel', array(
	        'priority' => 10,
	        'title' => __( 'Home Panel', '' ),
	        'description' => __( 'Description of what this panel does.', '' ),
	    ) );

	    $wp_customize->add_panel( 'about_panel', array(
	        'priority' => 10,
	        'title' => __( 'What we do settings', '' ),
	        'description' => __( 'Description of what this panel does.', '' ),
	    ) );


		/*** Banner Section **/

		$wp_customize->add_section('banner_section',array(
			'title'    => __('Hero settings','foxhill'),
			'priority' => 10,
			'panel' => 'home_panel',
		));

		$wp_customize->add_setting('banner_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'banner_upload', array(
			'label'    => __( 'Hero bg image' ),
			'section'  => 'banner_section',
			'settings' =>'banner_upload'
		)));
	  
	  	$wp_customize->add_setting('banner_video', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( 'banner_video', array(
		  'label' => __( 'Video URL','robo' ),
		  'section' => 'banner_section',
		  'type'=>'text'
		) );

		
		$wp_customize->add_setting('banner_section_title', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'banner_section_title', array(
		  'label' => __( 'Title','robo' ),
		  'section' => 'banner_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('banner_section_content', array(
		  'default' => __( '.', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'banner_section_content', array(
		  'label' => __( 'Content','robo' ),
		  'section' => 'banner_section',
		  'type'=>'textarea'
		) );



		/*** Banner Section **/


		/*** What We Do Section **/

		$wp_customize->add_section('What_section',array(
			'title'    => __('What we do settings','foxhill'),
			'priority' => 10,
			'panel' => 'home_panel',
		));

		$wp_customize->add_setting('what_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'what_upload', array(
			'label'    => __( 'What we do image' ),
			'section'  => 'What_section',
			'settings' =>'what_upload'
		)));

		
		$wp_customize->add_setting('What_section_title', array(
		  'default' => __( '.', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'What_section_title', array(
		  'label' => __( 'Title','robo' ),
		  'section' => 'What_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('What_section_content', array(
		  'default' => __( '.', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'What_section_content', array(
		  'label' => __( 'Content','robo' ),
		  'section' => 'What_section',
		  'type'=>'textarea'
		) );
	  
	  
		$pages = get_pages( array ( 'parent'  => 0 ) );
		$pages = wp_list_pluck( $pages, 'post_title', 'ID' );

		$wp_customize->add_setting('What_link', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );



		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'What_link', array(
			    'label'      => __( 'Read More Link', '' ),
			    'description' => __( '', '' ),
			    'settings'   => 'What_link',
			    'priority'   => 10,
			    'section'    => 'What_section',
			    'type'    => 'select',
			    'choices' => $pages
			)
		) );
	  
	 	/*** Reference Section **/

		$wp_customize->add_section('reference_section',array(
			'title'    => __('Reference settings','foxhill'),
			'priority' => 10,
			'panel' => 'home_panel',
		));
	  	$wp_customize->add_setting('reference_link', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );



		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'reference_link', array(
			    'label'      => __( 'Read More Link', '' ),
			    'description' => __( '', '' ),
			    'settings'   => 'reference_link',
			    'priority'   => 10,
			    'section'    => 'reference_section',
			    'type'    => 'select',
			    'choices' => $pages
			)
		) );


// 		$wp_customize->add_setting('What_section_url', array(
// 		  'default' => __( '.', 'robo' ),
// 		  'transport'=>'refresh'
// 		) );

// 		$wp_customize->add_control( 'What_section_url', array(
// 		  'label' => __( 'Url','robo' ),
// 		  'section' => 'What_section',
// 		  'type'=>'text'
// 		) );

		/*** What We Do Section **/

		/*** End Home Panel **/
	  
	  	/*** Start About Panel ***/
	  
	  	$wp_customize->add_section('shortcode_section',array(
			'title'    => __('Shortcode','foxhill'),
			'priority' => 10,
			'panel' => 'about_panel',
		));
	  
	  	$wp_customize->add_setting('what_page_code', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'what_page_code', array(
		  'label' => __( 'Shortcode','robo' ),
		  'section' => 'shortcode_section',
		  'type'=>'textarea'
		) );
	  
	  	$wp_customize->add_section('content_list_section',array(
			'title'    => __('Custom Content List','foxhill'),
			'priority' => 10,
			'panel' => 'about_panel',
		));

	  	$wp_customize->add_setting( 'customizer_custom_left_list_example', array());

      	$wp_customize->add_control( new SNT_List_Control(
			$wp_customize,
			'customizer_custom_left_list_example',
			array(
				'label'	=> __( 'Left List ', 'themename' ),
				'section' => 'content_list_section',
				'settings' => 'customizer_custom_left_list_example',
			)
		));


		$wp_customize->add_setting('customizer_custom_list_heading', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'customizer_custom_list_heading', array(
		  'label' => __( 'Heading','robo' ),
		  'section' => 'content_list_section',
		  'type'=>'text'
		) );
	  
		$wp_customize->add_setting( 'customizer_custom_right_list_example', array( ) );

      	$wp_customize->add_control( new SNT_List_Control(
			$wp_customize,
			'customizer_custom_right_list_example',
			array(
				'label'	=> __( 'right List ', 'themename' ),
				'section' => 'content_list_section',
				'settings' => 'customizer_custom_right_list_example',
			)
		));
		/*** End About Panel **/

  		/*** Header Section **/

		$wp_customize->add_section('header_section',array(
			'title'    => __('Header Settings','foxhill'),
			'priority' => 10,
		));

		$wp_customize->add_setting('logo_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logo_upload', array(
			'label'    => __( 'Logo Upload' ),
			'section'  => 'header_section',
			'settings' =>'logo_upload'
		)));
	  
	  	$wp_customize->add_setting('menu_text', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'menu_text', array(
		  'label' => __( 'Menu Text','robo' ),
		  'section' => 'header_section',
		  'type'=>'textarea'
		) );
	  
	  	$wp_customize->add_setting('instagram_section', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'instagram_section', array(
		  'label' => __( 'Instagram Link','robo' ),
		  'section' => 'header_section',
		  'type'=>'text'
		) );

		/*** Footer Section **/

		
		/*** Address Section **/

		$wp_customize->add_setting('footer_logo_upload', array(
			'default'   => '',
			'transport' =>'postMessage'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'footer_logo_upload', array(
			'label'    => __( 'Footer Logo Upload' ),
			'section'  => 'footer_section',
			'settings' =>'footer_logo_upload'
		)));		

		$wp_customize->add_setting('address_section_one', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'address_section_one', array(
		  'label' => __( 'Address One','robo' ),
		  'section' => 'footer_section',
		  'type'=>'textarea'
		) );

		$wp_customize->add_setting('address_section_two', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'address_section_two', array(
		  'label' => __( 'Address Two','robo' ),
		  'section' => 'footer_section',
		  'type'=>'textarea'
		) );


		/*** Social Media Section **/

		$wp_customize->add_section('footer_section',array(
			'title'=> __('Footer Settings','foxhill'),
			'priority'=>10,
		));

		$wp_customize->add_setting('fb_section', array(
		  'default' => __('https://www.facebook.com/','foxhill'),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'fb_section', array(
		  'label' => __( 'FB Link' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );

		$wp_customize->add_setting('twitter_section', array(
		  'default' => __ ( 'https://www.google.com/', 'foxhill' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'twitter_section', array(
		  'label' => __( 'Twitter Link', 'foxhill' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );


		$wp_customize->add_setting('instragram_section', array(
		  'default' => __('https://twitter.com/','foxhill'),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'instragram_section', array(
		  'label' => __( 'Instragram Link','foxhill' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );


		$wp_customize->add_setting('google_section', array(
		  'default' => __( 'https://www.google.com/', 'foxhill' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'google_section', array(
		  'label' => __( 'Google Plus Link','foxhill' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );

		/*** CopyRight Section **/

		$wp_customize->add_setting('copyright_section', array(
		  'default' => __( '', 'robo' ),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'copyright_section', array(
		  'label' => __( 'Copy Right Text','robo' ),
		  'section' => 'footer_section',
		  'type'=>'text'
		) );
	  
// 	  	$wp_customize->add_setting('footer_title_section', array(
// 		  'default' => __( '', 'robo' ),
// 		  'transport'=>'refresh'
// 		) );

// 		$wp_customize->add_control( 'footer_title_section', array(
// 		  'label' => __( 'Footer Title','robo' ),
// 		  'section' => 'footer_section',
// 		  'type'=>'text'
// 		) );
	  
	  
		/*** Contact Section **/

		$wp_customize->add_section('contact_section',array(
			'title'=> __('Contact Settings','foxhill'),
			'priority'=>10,
		));

		$wp_customize->add_setting('contact_text', array(
		  'default' => __('','foxhill'),
		  'transport'=>'refresh'
		) );

		$wp_customize->add_control( 'contact_text', array(
		  'label' => __( 'Contact Text' ),
		  'section' => 'contact_section',
		  'type'=>'textarea'
		) );

  }
}

new Foxhill_Customizer();