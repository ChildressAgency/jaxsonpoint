
    </main>

    <footer class="footer">
        <div class="footer__partners">
            <?php if( have_rows( 'footer_partners', 'option' ) ): while( have_rows( 'footer_partners', 'option' ) ): the_row(); ?>
                <?php $image = get_sub_field( 'image' ); ?>
                <div class="footer__partner"><?php if( get_sub_field( 'link' ) ) echo '<a href="' . the_sub_field( 'link' ) . '">'; ?><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php if( get_sub_field( 'link' ) ) echo '</a>'; ?></div>
            <?php endwhile; endif; ?>
        </div>

        <div class="footer__info">
            <div class="footer__contact">
                <h3 class="footer__heading">Contact</h3>
                <p>
                    <?php if( get_field( 'footer_contact', 'option' ) ): ?><?php the_field( 'footer_contact', 'option' ); ?><?php endif; ?>
                    <!-- <?php echo get_field( 'address', 'option' ); ?> -->
                    <!-- <?php if( get_field( 'phone', 'option' ) ): ?><br /><a href="tel:<?php echo get_field( 'phone', 'option' ); ?>"><?php echo get_field( 'phone', 'option' ); ?></a><?php endif; ?>
                    <?php if( get_field( 'email', 'option' ) ): ?><br /><a href="mailto:<?php echo get_field( 'email', 'option' ); ?>"><?php echo get_field( 'email', 'option' ); ?></a><?php endif; ?> -->
                    <?php if( get_field( 'facebook', 'option' ) ): ?><br /><a href="<?php echo get_field( 'facebook', 'option' ); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                </p>
            </div>
            <div class="footer__center">
                <?php if( get_field( 'footer_center', 'option' ) ): ?><?php the_field( 'footer_center', 'option' ); ?><?php endif; ?>
            </div>
            <div class="footer__logo">
                <?php if( get_field( 'footer_right', 'option' ) ): ?><?php the_field( 'footer_right', 'option' ); ?><?php endif; ?>
            </div>
        </div>
        <nav class="navbar footer__nav">
            <?php 
            wp_nav_menu( array(
                'theme_location'    =>  'footer_menu',
                'menu_class'        =>  'navbar__nav',
                'walker'            =>  new Custom_Nav_Walker()
            ) ); ?>
        </nav>
        <div class="footer__copyright">&copy; 2018 Jaxson Point | Website designed by <a href="https://childressagency.com/">The Childress Agency</a></div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>