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

<?php get_template_part( 'partials/tp-flexible' ); ?>

<?php get_footer(); ?>