<?php 

/**
 * Template Name: Project Category Template
 * Template Post Type: page
 */

get_header(); ?>

<?php get_template_part( 'partials/tp-hero' ); ?>

<div class="breadcrumbs">
    <?php 
    $parent_id = wp_get_post_parent_id( get_the_ID() ); ?>
    <span><a href="<?php echo get_permalink( $parent_id ); ?>" class="breadcrumbs__link"><?php echo get_the_title( $parent_id ); ?></a> <i class="fas fa-angle-double-right"></i> <?php the_title(); ?></span>
</div>

<div class="section">
    <div class="container">
        <div class="view-by-category">
            <p class="view-by-category__toggle"><strong>View by Category <i class="fas fa-angle-down"></i></strong></p>
            <ul class="view-by-category__list">
                <?php 

                $args = array(
                    'taxonomy'  => 'project-category',
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

    <div class="container">
        <?php
        
        $cat = get_field( 'category' );
        
        $args = array(
            'post_type'         => 'projects',
            'post_status'       => 'published',
            'posts_per_page'    => 2,
            'tax_query'         => array(
                array(
                    'taxonomy'  => 'project-category',
                    'field'     => 'term_id',
                    'terms'     => $cat
                )
            )
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ){ ?>
            <div class="project-category" data-page="1" data-max-pages="<?php echo $query->max_num_pages; ?>" data-category="<?php echo $cat ?>">
                <?php while( $query->have_posts() ){
                    $query->the_post(); ?>
            
                    <div class="project">
                        <h2 class="project__title"><?php the_title(); ?></h2>
                        <h4 class="project__location"><?php the_field( 'location' ); ?></h4>
            
                        <div class="project__gallery">
                            <?php if( have_rows( 'images' ) ): while( have_rows( 'images' ) ): the_row(); ?>
                                <?php 
                                $image = get_sub_field( 'image' );
                                $ratio = get_sub_field( 'aspect_ratio' );
                                ?>
                                <div class="project__image<?php if( $ratio == 'tall' || $ratio == 'wide' ) echo ' project__image--' . $ratio; ?>">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
            
                        <div class="project__subtext">
                            <?php if( get_field( 'owner' ) ): ?>Owner: <?php the_field( 'owner' ); ?><?php endif; ?>
                            <?php if( get_field( 'owner' ) && get_field( 'gc' ) ): ?><br /><?php endif; ?>
                            <?php if( get_field( 'gc' ) ): ?>GC: <?php the_field( 'gc' ); ?><?php endif; ?>
                        </div>
            
                        <p class="project__description"><?php the_field( 'description' ); ?></p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

</div>

<?php get_template_part( 'partials/tp-flexible' ); ?>

<?php get_footer(); ?>