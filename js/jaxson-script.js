$(document).ready(function(){

    /**
     * HEADER NAVIGATION
     */
    $header_nav = $( '.header__nav' ).find( '.navbar__nav' );
    $header_nav_height = 0;

    $( '.navbar__toggler' ).click(function(){
            $header_nav_height = 0;
            $header_nav.children().each(function(){
                $header_nav_height += $( this ).outerHeight();
            });

        if( $header_nav.hasClass( 'navbar__open' ) ){
            $header_nav.removeClass( 'navbar__open' );
            $header_nav.css( 'max-height', '0' );
        } else {
            $header_nav.addClass( 'navbar__open' );
            $header_nav.css( 'max-height', $header_nav_height + 'px' );
        }
    });
    


    /**
     * CLIENT SLIDER
     */
    $( '.client-slider__slick' ).slick({
        infinite:       true,
        slidesToShow:   4,
        slidesToScroll: 1,
        autoplay:       true,
        autoplaySpeed:  3000,
        arrows:         true,
        nextArrow:      $( '.client-slider__next' ),
        prevArrow:      $( '.client-slider__prev' ),
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });


    /**
     * FEATURED SLIDER
     */
    $( '.featured-slider__slick' ).slick({
        infinite:       true,
        slidesToShow:   3,
        slidesToScroll: 1,
        autoplay:       true,
        autoplaySpeed:  5000,
        arrows:         true,
        nextArrow:      $( '.featured-slider__next' ),
        prevArrow:      $( '.featured-slider__prev' ),
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });


    /**
     * PROJECTS TITLES
     *
     * Normalize the height of the title field of all of the "Project" boxes
     */
    $project_titles = $('.projects__title');
    $featured_titles = $('.featured-slider__title');

    // run at resize
    $( window ).resize(function() {
        $.fn.setHeadingHeight($project_titles, 0);   
        $.fn.setHeadingHeight($featured_titles, 0);   
    });  

    $.fn.setHeadingHeight = function(titles, height) {

        // reset to auto or else we can't check height
        $(titles).css({ 'height': 'auto' });

        // get highest value
        $(titles).each(function(i, obj) {    
            height = Math.max(height, $(obj).outerHeight()) 
        });

        // set new height
        $(titles).css({ 'height': height + 'px' });    
    }

    // run at load
    $.fn.setHeadingHeight($project_titles, 0);
    $.fn.setHeadingHeight($featured_titles, 0);






    /**
     * PROJECTS CATEGORY TOGGLE
     *
     * Toggle the product categories dropdown
     */
    $cat_toggle = $( '.view-by-category' ).find( '.view-by-category__toggle' );
    $cat_list = $( '.view-by-category' ).find( '.view-by-category__list' );
    $cat_list_height = 0;

    $cat_toggle.click(function(){
            $cat_list_height = 0;
            $cat_list.children().each(function(){
                $cat_list_height += $( this ).outerHeight();
            });

        if( $cat_toggle.hasClass( '.view-by-category__open' ) ){
            $cat_toggle.removeClass( '.view-by-category__open' );
            $cat_toggle.find( '.fas' ).removeClass( 'fa-angle-up' ).addClass( 'fa-angle-down' );
            $cat_list.css( 'max-height', '0' );
        } else {
            $cat_toggle.addClass( '.view-by-category__open' );
            $cat_toggle.find( '.fas' ).removeClass( 'fa-angle-down' ).addClass( 'fa-angle-up' );
            $cat_list.css( 'max-height', $cat_list_height + 'px' );
        }
    });
});
