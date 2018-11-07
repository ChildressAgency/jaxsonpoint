<div class="section">
    <div class="container<?php if( get_sub_field( 'is_thin' ) ) echo ' container--thin'; ?>">
        <h2 class="section-heading link-grid__heading"><?php the_sub_field( 'heading' ); ?></h2>
        <div class="link-grid">
            <?php if( have_rows( 'links' ) ): $i = 0; while( have_rows( 'links' ) ): the_row(); ?>
                <a href="<?php the_sub_field( 'link' ); ?>" class="link-grid__item<?php if( $i == 1 ) echo ' link-grid__item--tall'; ?>">
                    <div class="link-grid__image"><?php $image = get_sub_field( 'image' ); ?><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
                    <h3 class="link-grid__title"><?php the_sub_field( 'title' ); ?></h3>
                </a>
            <?php $i++; endwhile; endif; ?>
        </div>
    </div>
</div>