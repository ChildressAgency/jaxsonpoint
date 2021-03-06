<?php 

/**
 * Template Name: Customers Template
 * Template Post Type: page
 */

get_header(); ?>

<?php get_template_part( 'partials/tp-hero' ); ?>

<div class="section">
    <div class="container">
        <div class="customers">
            <?php if( have_rows( 'customers' ) ): while( have_rows( 'customers' ) ): the_row(); ?>
                <div class="customer">
                    <?php $image = get_sub_field( 'image' ); ?>
                    <?php if( get_sub_field( 'link' ) ): ?><a href="<?php the_sub_field( 'link' ); ?>"><?php endif; ?><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php if( get_sub_field( 'link' ) ): ?></a><?php endif; ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_template_part( 'partials/tp-flexible' ); ?>

<?php get_footer(); ?>