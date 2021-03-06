<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width initial-scale=1.0" name="viewport">
    <meta content="The Childress Agency" name="author">
    <meta content="public" http-equiv="cache-control">
    <meta content="private" http-equiv="cache-control">
    
    <title><?php echo get_bloginfo( 'name' ); if( get_bloginfo( 'description' ) ): echo ' | ' . get_bloginfo( 'description' ); endif; ?></title>

    <?php wp_head(); ?>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
    <!--[if gte IE 9]
    <style type='text/css'>
    footer {
    filter: none;
    }
    </style>
    <![endif]-->
</head>
<body>
    
    <header class="header">
        <!-- <div class="section"> -->
            <!-- <div class="container container--fluid"> -->
                <div class="header__brand">
                    <?php $logo = get_field( 'header_logo', 'option' ); ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php if( $logo['alt'] ) echo $logo['alt']; else echo $logo['title']; ?>"></a>
                </div>
                <div class="header__text">
                    <?php the_field( 'header_text', 'option' ); ?>
                </div>
                <nav class="navbar header__nav">
                    <button class="navbar__toggler" type="button" data-target="#main-menu">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <div class="" id="main-menu">
                        <?php 
                        wp_nav_menu( array(
                            'theme_location'    =>  'main_menu',
                            'menu_class'        =>  'navbar__nav',
                            'walker'            =>  new Custom_Nav_Walker()
                        ) ); ?>
                    </div>
                </nav>
            <!-- </div> -->
        <!-- </div> -->
    </header>
    <!-- <div class="header__separator"></div> -->

    <main>
