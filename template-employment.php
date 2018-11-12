<?php 

/**
 * Template Name: Employment Template
 * Template Post Type: page
 */

get_header(); ?>

<?php get_template_part( 'partials/tp-hero' ); ?>

<div class="section">
    <div class="container container--thin">
        <?php $recognition = get_field( 'recognition' ); ?>
        <h2 class="section-heading section-heading--alt"><?php echo $recognition['section_heading']; ?></h2>
        <div class="recognition">
            <img class="recognition__image" src="<?php echo $recognition['image']['url']; ?>" alt="<?php echo $recognition['image']['alt']; ?>">
            <div class="recognition__info">
                <h3 class="recognition__name"><?php echo $recognition['name']; ?></h3>
                <div class="recognition__text"><?php echo $recognition['description']; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="employment" style="background-image: url('http://dev.childressagency.com/jaxsonpoint/wp-content/uploads/2018/11/employment-bg.png');">
    <div class="section employment__upper">
        <div class="container container--thin">
            <?php $above_positions = get_field( 'above_positions' ); ?>
            <?php if( $above_positions['heading'] ): ?>
                <h2 class="section-heading"><?php echo $above_positions['heading']; ?></h2>
            <?php endif; ?>
            <?php echo $above_positions['content'] ?>
        </div>
    </div>

    <?php if( have_rows( 'positions' ) ): while( have_rows( 'positions' ) ): the_row(); ?>
        <div class="container container--thin">
            <div class="employment__position">
                <h2 class="employment__title"><?php the_sub_field( 'title' ); ?></h2>
                <div class="employment__info">
                    <div class="employment__text"><?php the_sub_field( 'info' ); ?></div>
                    <?php $image = get_sub_field( 'image' ); ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="employment__image">
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>

    <div class="section employment__lower">
        <div class="container container--thin">
            <?php the_field( 'below_positions' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>