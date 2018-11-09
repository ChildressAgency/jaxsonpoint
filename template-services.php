<?php 

/**
 * Template Name: Services Template
 * Template Post Type: page
 */

get_header(); ?>

<?php get_template_part( 'partials/tp-hero' ); ?>

<div class="featured-services">
    <div class="featured-services__content">
        <div class="featured-services__top-bar"></div>
        <?php 
        if( have_rows( 'featured_services' ) ): while( have_rows( 'featured_services' ) ): the_row();
            $image = get_sub_field( 'image' ); ?>
            <div class="container container--thin">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']; ?>" class="featured-services__image">
            </div>
            <div class="services services--dark">
                <div class="container container--thin"><?php if( have_rows( 'services' ) ): while( have_rows( 'services' ) ): the_row(); ?>
                        <div class="service">
                            <h2 class="service__title"><?php the_sub_field( 'title' ); ?></h2>
                            <p class="service__text"><?php the_sub_field( 'description' ); ?></p>
                            <a href="<?php the_sub_field( 'link' ); ?>" class="service__link">View Related Projects</a>
                        </div>
                    <?php endwhile; endif; ?></div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php if( have_rows( 'services_section' ) ): while( have_rows( 'services_section' ) ): the_row(); ?>
    <div class="section services<?php if( get_sub_field( 'is_dark' ) ) echo ' services--dark'; ?>">
        <div class="container container--thin">
            <?php if( have_rows( 'services' ) ): while( have_rows( 'services' ) ): the_row(); ?>
                <div class="service">
                    <?php $image = get_sub_field( 'image' ); ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="service__image">
                    <h2 class="service__title"><?php the_sub_field( 'title' ); ?></h2>
                    <p class="service__text"><?php the_sub_field( 'description' ); ?></p>
                    <a href="<?php the_sub_field( 'link' ); ?>" class="service__link">View Related Projects</a>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_template_part( 'partials/tp-flexible' ); ?>

<?php get_footer(); ?>