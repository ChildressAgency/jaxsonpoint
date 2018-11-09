<div class="section" <?php if( get_sub_field( 'background' ) ): ?>style="background-image: url(<?php the_sub_field( 'background' ); ?>);<?php endif; ?>">
    <?php if( get_sub_field( 'background' ) ): ?><div class="white-gradient-overlay"></div><?php endif; ?>
    <div class="container<?php if( get_sub_field( 'is_thin' ) ) echo ' container--thin'; ?>">
        <?php if( get_sub_field( 'section_heading' ) ): ?>
            <h2 class="section-heading"><?php the_sub_field( 'section_heading' ); ?></h2>
        <?php endif; ?>
        <?php echo get_sub_field( 'content' ); ?>
    </div>
</div>