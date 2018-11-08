<?php

// check if the flexible content field has rows of data
if( have_rows('flexible_content') ):

     // loop through the rows of data
    while ( have_rows('flexible_content') ) : the_row();

        if( get_row_layout() == 'basic' ):
            get_template_part( 'partials/tp-basic' );

        elseif( get_row_layout() == 'link_grid' ):
            get_template_part( 'partials/tp-link-grid' );

        elseif( get_row_layout() == 'client_slider' ):
            get_template_part( 'partials/tp-client-slider' );

        endif;

    endwhile;

else:

    // no layouts found

endif;

?>