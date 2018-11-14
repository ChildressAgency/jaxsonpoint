<?php

	// display template file in footer
	add_action('wp_footer', 'show_template');
	function show_template() {
		global $template;
		print_r($template);
	}

	// load jquery
	function jquery_cdn(){
	  if(!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
		wp_enqueue_script('jquery');
	  }
	}
	add_action('wp_enqueue_scripts', 'jquery_cdn');

	// load scripts
	function jaxson_scripts(){
		global $wp_query;
		wp_register_script(
			'slick-script', 
			'//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'jaxson-script', 
			'/wp-content/themes/jaxsonpoint/js/jaxson-script.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'reload-projects', 
			'/wp-content/themes/jaxsonpoint/js/reload-projects.js', 
			array('jquery'), 
			'', 
			true
		);
		
		wp_enqueue_script( 'jaxson-script' );
		wp_enqueue_script( 'slick-script' );
		wp_enqueue_script( 'reload-projects' );

		$params = array(
			'ajaxurl' 				=> admin_url( 'admin-ajax.php' ),
			'nonce'					=> wp_create_nonce( 'jaxson-nonce' ),
		);
		wp_localize_script( 'reload-projects', 'ajaxParams', $params);
	}
	add_action('wp_enqueue_scripts', 'jaxson_scripts', 100);
	
	// load styles
	function jaxson_styles(){
		wp_register_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
		wp_register_style('jaxson', get_template_directory_uri() . '/style.css');

		wp_enqueue_style('slick');
		wp_enqueue_style('jaxson');
	}
	add_action('wp_enqueue_scripts', 'jaxson_styles');

	// add general settings page
	if(function_exists('acf_add_options_page')){
	  acf_add_options_page(array(
	    'page_title' => 'General Site Settings',
	    'menu_title' => 'General Settings',
	    'menu_slug' => 'general-settings',
	    'capability' => 'edit_posts',
	    'redirect' => false
	  ));
	}

	// load fonts
	function load_fonts() {
		wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.3.1/css/all.css' );
		wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' );
		wp_enqueue_style( 'minion-pro', 'https://use.typekit.net/ihf6tfg.css' );
	}
	add_action( 'wp_enqueue_scripts', 'load_fonts' );

	// Register Navigation Menus
	register_nav_menus( array(
		'main_menu' => 'Main Menu',
		'footer_menu' => 'Footer Menu',
	) );

	add_theme_support( 'post-thumbnails', array( 'projects' ) );

	// Create 'Projects' custom post type
	function create_post_type_news() {
		register_post_type( 'projects',
			array(
				'labels' 			=> array(
					'name' 			=> __( 'Projects' ),
					'singular_name' => __( 'Project' )
				),
				'public' 			=> true,
				'has_archive' 		=> false,
				'taxonomies'		=> array( 'category' ),
				'supports'			=> array( 'thumbnail', 'title', 'revisions' )
			)
		);
	}
	add_action( 'init', 'create_post_type_news' );

	include "functions/custom-nav-walker.php";
	include "functions/button-shortcode.php";
	include "functions/bigtext-shortcode.php";
	include "functions/medtext-shortcode.php";
	include "functions/reload-projects.php";
?>