<?php
/*
 * This custom shortcode creates span that defines a medtext
 */
function medtext_function( $atts, $content = null ) {

    $return_string = '<span class="medtext">';

    // button text
    if( $content )
        $return_string .= $content;
    else
        $return_string .= 'Medium Text';

    $return_string .= '</span>';

    return $return_string;
}

/*
 * 'medtext' is how the shortcode is called
 * e.g. [medtext]
 */
function register_medtext_shortcode(){
   add_shortcode('medtext', 'medtext_function');
}
add_action( 'init', 'register_medtext_shortcode');