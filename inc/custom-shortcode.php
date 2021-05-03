<?php 

// function tab_func( $atts, $content = null ) {
//     extract(shortcode_atts(array(
//       'title'  => '',
//       'link'   => '' ,
//       'target' => ''
//     ), $atts));
//     global $single_tab_array;
//     $single_tab_array[] = array('title' => $title, 'link' => $link, 'content' => do_shortcode($content));
//     return $single_tab_array;
// }
// add_shortcode('tab', 'tab_func');
// /* Shortcode: tabs
//  * Usage:  
//  *  [tabs]
//  *    [tab title="title 1"]Your content goes here...[/tab]
//  *    [tab title="title 2"]Your content goes here...[/tab]
//  *  [/tabs]
//  */
// function tabs_func( $atts, $content = null ) {
//     global $single_tab_array;
//     $single_tab_array = array(); // clear the array
   
//     $tabs_nav = '';
//     $tabs_content = '';
//     $tabs_output = '';
 
//     $tabs_nav .= '<div class="tabs tabs-style-topline">';
//     $tabs_nav .= '<nav>';
//     $tabs_nav .= '<ul>';
   
//      // execute the '[tab]' shortcode first to get the title and content - acts on global $single_tab_array
//     do_shortcode($content);
//     error_log( print_r(do_shortcode($content),true));
//     //declare our vars to be super clean here
//     foreach ($single_tab_array as $tab => $tab_attr_array) {
//       // $random_id = rand(1000,2000); // potential duplicate issue.. need to fix
     
//       // $default = ( $tab == 0 ) ? ' class="active"' : '';
     
//       // if($tab_attr_array['link'] != ""){
//       //   $tabs_nav .= '<li'.$default.'><a class="tab-me-link" href="' . $tab_attr_array["link"] . '" target="' . $tab_attr_array["target"] . '" rel="tab'.$random_id.'"><span>'.$tab_attr_array['title'].'</span></a></li>';
//       // }else{
//       //   $tabs_nav .= '<li'.$default.'><a href="javascript:void(0)" rel="tab'.$random_id.'"><span>'.$tab_attr_array['title'].'</span></a></li>';
//       //   $tabs_content .= '<div class="section-topline" id="tab' . $random_id . '" ' . ( $tab!=0 ? 'style="display:none"' : '') . '>'.$tab_attr_array['content'].'</div>';
//       // }
//     }
//     $tabs_nav .= '</ul>';
//     $tabs_nav .= '</nav>';
//     $tabs_output = $tabs_nav . '<div class="content-wrapper">' . $tabs_content . '</div>';
//     $tabs_output .= '</div>';
//     return $tabs_output;
// }
// add_shortcode('tabs', 'tabs_func');


if (!class_exists('Tabs_Shortcodes')) :

class Tabs_Shortcodes {

  private $add_script;
  private $tab_titles;
  
  function __construct() {
  
    # Add shortcodes
    add_shortcode('tabs', array($this, 'tabs_shortcode'));
    add_shortcode('tab', array($this, 'tab_shortcode'));
    
  }

  
  
  # Tabs wrapper shortcode
  public function tabs_shortcode($atts, $content = null) {
  
    # The shortcode is used on the page, so we'll need to load the JavaScript
    $this->add_script = true;
    
    # Create empty titles array
    $this->tab_titles = array();
    
    extract(shortcode_atts(array(
    ), $atts, 'tabs'));
    
    
    # Get all individual tabs content
    $tab_content = do_shortcode($content);
    
    # Start the tab navigation
    $out = '<div class="row justify-content-center"> 
      <div class="col-lg-3 col-md-4">
        <ul class="nav nav-tabs fha-tabs" id="myTab" role="tablist">';
    
    # Loop through tab titles
    foreach ($this->tab_titles as $key => $title) {
      $id = $key + 1;
      $out .= sprintf('<li class="nav-item" ><a href="#%s"%s data-toggle="tab" aria-controls="%s" aria-selected="%s">%s</a></li>',
        'tab-' . $id,
        $id == 1 ? ' class="nav-link active"' : 'class="nav-link"',
        'tab-' . $id,
        $id == 1 ? 'true' : 'false',
        $title
      );
    }
    
    # Close the tab navigation container and add tab content
    $out .= '</ul> </div> <div class="col-xl-6 col-lg-6 col-md-8"> <div class="tab-content fha-tab-content" id="myTabContent">';
    $out .= $tab_content;
    $out .= '</div> </div> </div>';
    return $out;
  
  }
  
  # Tab item shortcode
  public function tab_shortcode($atts, $content = null) {
  
    extract(shortcode_atts(array(
      'title' => ''
    ), $atts, 'tab'));
    
    # Add the title to the titles array
    array_push($this->tab_titles, $title);
    
    $id = count($this->tab_titles);
    
    return sprintf('<div role="tabpanel" id="%s" class="tab-pane fade %s">%s</div>',
      'tab-' . $id,
      $id == 1 ? 'show active' : '',
      do_shortcode($content)
    );
  
  }
  

}

$Tabs_Shortcodes = new Tabs_Shortcodes;

endif;