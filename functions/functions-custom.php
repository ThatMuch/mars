<?php
/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* BUTTON
/––––––––––––––––––––––––*/
// Usage: [button link="https://twitter.com" text="Twitter"]
function shortcode_button($atts) {
  $link = $atts['link'];
  $text = $atts['text'];
  return '<a href="'.$link.'" class="button">'.$text.'</a>';
}
add_shortcode('button', 'shortcode_button');

// Logo du site
add_theme_support(
  'custom-logo', array(
      'flex-height' => true,
  )
);

// Page d'options
if(function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

/**
 * Change Video Background "Tap to unmute" text
 *
 * @since 2.7.0
 * @author Push Labs
 * @param String $text The button text
 * @return String $text
 */
function themeprefix_vidbg_tap_to_unmute_text( $use_old ) {
  $text = 'Activer le son';

  return $text;
}
add_filter( 'vidbg_tap_to_unmute_text', 'themeprefix_vidbg_tap_to_unmute_text' );


