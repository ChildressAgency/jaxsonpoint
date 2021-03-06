<?php get_header(); ?>

<?php 
$hero = get_field( 'hero' );
if( $hero ): ?>
<div class="hero hero--home" style="background-image: url(<?php echo $hero['background']; ?>)">
    <div class="hero__content">
        <?php if( $hero['text'] ): ?><h2 class="hero__text"><?php echo $hero['text']; ?></h2><?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?php get_template_part( 'partials/tp-flexible' ); ?>

<?php get_footer(); ?>