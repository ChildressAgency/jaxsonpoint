
    </main>

    <footer class="footer">
        <div class="footer__info">
            <div class="footer__contact">
                <h3 class="footer__heading">Contact</h3>
                <p>
                    <?php echo get_field( 'address', 'option' ); ?>
                    <?php if( get_field( 'phone', 'option' ) ): ?><br /><a href="tel:<?php echo get_field( 'phone', 'option' ); ?>"><?php echo get_field( 'phone', 'option' ); ?></a><?php endif; ?>
                    <?php if( get_field( 'email', 'option' ) ): ?><br /><a href="mailto:<?php echo get_field( 'email', 'option' ); ?>"><?php echo get_field( 'email', 'option' ); ?></a><?php endif; ?>
                    <?php if( get_field( 'facebook', 'option' ) ): ?><br /><a href="<?php echo get_field( 'facebook', 'option' ); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                </p>
            </div>
            <div class="footer__logo">
                <img src="http://dev.childressagency.com/jaxsonpoint/wp-content/uploads/2018/11/logo-decade-white.png" alt="over 10 years">
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