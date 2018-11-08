<div class="section">
    <div class="container<?php if( get_sub_field( 'is_thin' ) ) echo ' container--thin'; ?>">
        <?php if( get_sub_field( 'section_heading' ) ): ?>
            <h2 class="section-heading"><?php the_sub_field( 'section_heading' ); ?></h2>
        <?php endif; ?>
        <div class="client-slider-text">
            <?php if( get_sub_field( 'text' ) ) the_sub_field( 'text' ); ?>
        </div>
        <div class="client-slider">
            <div class="client-slider__prev"><i class="fas fa-less-than"></i></div>
            <div class="client-slider__next"><i class="fas fa-greater-than"></i></div>
            <div class="client-slider__slick">
                <?php if( have_rows( 'clients' ) ): while( have_rows( 'clients' ) ): the_row(); ?>
                    <div class="client-slider__item">
                        <?php if( get_sub_field( 'link' ) ): ?><a href="<?php the_sub_field( 'link' ); ?>" class="client-slider__link"><?php endif; ?>
                            <?php $logo = get_sub_field( 'logo' ); ?>
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                        <?php if( get_sub_field( 'link' ) ): ?></a><?php endif; ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>