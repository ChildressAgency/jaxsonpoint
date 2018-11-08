<div class="section">
    <div class="container<?php if( get_sub_field( 'is_thin' ) ) echo ' container--thin'; ?>">
        <?php if( get_sub_field( 'section_heading' ) ): ?>
            <h2 class="section-heading"><?php the_sub_field( 'section_heading' ); ?></h2>
        <?php endif; ?>
        <?php echo get_sub_field( 'content' ); ?>
    </div>
</div>