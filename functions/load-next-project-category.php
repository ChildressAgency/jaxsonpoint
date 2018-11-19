<?php
/*
 * Load next projects
 */
function get_project_category_posts(){
    check_ajax_referer( 'jaxson-nonce', 'security' );

    // current page
    $page = urldecode( $_POST['page'] );
    $cat = urldecode( $_POST['cat'] );

    // the value to be returned
    $return = '';

    // construct the query
    $args = array(
        'post_type'         => 'projects',
        'post_status'       => 'publish',
        'posts_per_page'    => 2,
        'paged'             => $page,
        'tax_query'         => array(
            array(
                'taxonomy'  => 'project-category',
                'field'     => 'term_id',
                'terms'     => $cat
            )
        )
    );
    $posts = new WP_Query( $args );
    
    if( $posts->have_posts() ){
        while( $posts->have_posts() ){
            $posts->the_post();

            global $post;


            $return .= '<div class="project">';

                $return .= '<h2 class="project__title">' . get_the_title() . '</h2>
                <h4 class="project__location">' . get_field( 'location' ) . '</h4>';

                $return .= '<div class="project__gallery">';
                if( have_rows( 'images' ) ){
                    while( have_rows( 'images' ) ){
                        the_row();
                     
                    $image = get_sub_field( 'image' );
                    $ratio = get_sub_field( 'aspect_ratio' );

                    $return .= '<div class="project__image';
                        if( $ratio == 'tall' || $ratio == 'wide' )
                            $return .= ' project__image--' . $ratio;
                        $return .= '">';
                        $return .= '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '">
                    </div>';
                    }
                }
                $return .= '</div>
            
                <div class="project__subtext">';
                    if( get_field( 'owner' ) )
                        $return .= 'Owner: ' . get_field( 'owner' );
                    if( get_field( 'owner' ) && get_field( 'gc' ) )
                        $return .= '<br />';
                    if( get_field( 'gc' ) )
                        $return .= 'GC: ' . get_field( 'gc' );
                $return .= '</div>
            
                <p class="project__description">' . get_field( 'description' ) . '</p>
            </div>';
        }

        wp_reset_postdata();
    } else{
        $return .= '<h2><strong>No Results</strong></h2>';
    }

    echo $return;

    exit;
}
add_action( 'wp_ajax_get_project_category_posts', 'get_project_category_posts' );
add_action( 'wp_ajax_nopriv_get_project_category_posts', 'get_project_category_posts' );