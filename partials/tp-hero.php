<div class="hero" style="background-image: url(<?php the_field( 'hero_image' ); ?>)">
    <div class="hero__content">
        <div class="container">
            <?php 
            $hero_text = get_field( 'hero_text' );
            if( !$hero_text )
                $hero_text = strtoupper( get_the_title() );
            ?>
            <h2 class="hero__text"><?php echo $hero_text ?></h2>
        </div>
    </div>
</div>