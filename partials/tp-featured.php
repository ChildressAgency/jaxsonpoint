<div class="section">
    <?php if( get_sub_field( 'section_heading' ) ): ?>
        <h2 class="section-heading featured-heading"><?php the_sub_field( 'section_heading' ); ?></h2>
    <?php endif; ?>
    <div class="container container">
        <div class="featured-slider">
            <div class="featured-slider__prev"><i class="fas fa-less-than"></i></div>
            <div class="featured-slider__next"><i class="fas fa-greater-than"></i></div>
            <div class="featured-slider__slick">
                <?php if( have_rows( 'projects' ) ): while( have_rows( 'projects' ) ): the_row(); ?>
                    <div class="featured-slider__item">
                        <?php $image = get_sub_field( 'image' ); ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <p class="featured-slider__title"><?php the_sub_field( 'title' ); ?></p>
                        <p class="featured-slider__location"><?php the_sub_field( 'location' ); ?></p>
                        <p class="featured-slider__description"><?php the_sub_field( 'description' ); ?></p>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>