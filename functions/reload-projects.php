<?php
/*
 * Load next projects
 */
function get_project_posts(){
    check_ajax_referer( 'jaxson-nonce', 'security' );

    // current page
    $page = urldecode( $_POST['page'] );

    // the value to be returned
    $return = '';

    // construct the query
    $args = array(
        'post_type'         => 'projects',
        'post_status'       => 'publish',
        'posts_per_page'    => 6,
        'paged'             => $page,
    );
    $posts = new WP_Query( $args );
    
    if( $posts->have_posts() ){
        while( $posts->have_posts() ){
            $posts->the_post();

            global $post;


            $return .= '<div class="projects__project">';
                $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                $image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

                if( $image == "" ){
                    $images = get_field( 'images' ); 
                    $image = $images[0]['image']['url'];
                }

                $return .= '<img src="' . $image . '" alt="' . $alt . '" class="projects__image">
                <h3 class="projects__title">' . strtoupper( get_the_title() ) . '</h3>
                <p class="projects__location">' . get_field( 'location' ) . '</p>
                <p class="projects__description">' . get_field( 'description' ) . '</p>
            </div>';
        }

        wp_reset_postdata();
    } else{
        $return .= '<h2><strong>No Results</strong></h2>';
    }

    echo $return;

    exit;
}
add_action( 'wp_ajax_get_project_posts', 'get_project_posts' );
add_action( 'wp_ajax_nopriv_get_project_posts', 'get_project_posts' );