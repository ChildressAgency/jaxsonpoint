<?php 

/**
 * Template Name: Projects Template
 * Template Post Type: page
 */

get_header(); ?>

<?php get_template_part( 'partials/tp-hero' ); ?>

<div class="section">

    <div class="container">
        <div class="view-by-category">
            <p class="view-by-category__toggle"><strong>View by Category <i class="fas fa-angle-down"></i></strong></p>
            <ul class="view-by-category__list">
                <?php 

                $args = array(
                    'taxonomy'  => 'category',
                    'orderby'   => 'name',
                    'order'     => 'ASC'
                );

                $cats = get_categories( $args );

                foreach( $cats as $cat ){
                    if( $cat->cat_name != "Uncategorized" )
                        echo '<li><a href="' . $cat->slug . '">' . $cat->name . '</a></pre>';
                } ?>
            </ul>
        </div>
    </div>



    <?php 
    global $wp_query;

    $args = array(
        'post_type'         => 'projects',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'posts_per_page'    => 6
    );

    $query = new WP_Query( $args );

    $temp_query = $wp_query;
    $wp_query = NULL;
    $wp_query = $query;

    if( $query->have_posts() ): ?>
        <div class="projects container" data-page="1" data-max-pages="<?php echo $query->max_num_pages; ?>">
            <?php while( $query->have_posts() ): $query->the_post(); ?>
        
                <div class="projects__project">
                    <?php 
                    global $post;

                    $thumbnail_id = get_post_thumbnail_id( $post->ID );
                    $image = get_the_post_thumbnail_url( $post->ID, 'full' );
                    $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

                    if( $image == "" ){
                        $images = get_field( 'images' ); 
                        $image = $images[0]['image']['url'];
                    }
                    ?>

                    <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="projects__image">
                    <h3 class="projects__title"><?php echo strtoupper( get_the_title() ); ?></h3>
                    <p class="projects__location"><?php the_field( 'location' ); ?></p>
                    <p class="projects__description"><?php the_field( 'description' ); ?></p>
                </div>
        
            <?php endwhile; ?>
        </div>
    <?php endif; 

    $wp_query = NULL;
    $wp_query = $temp_query; ?>
</div>

<?php get_template_part( 'partials/tp-flexible' ); ?>

<?php get_footer(); ?>