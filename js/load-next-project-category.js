$(document).ready(function(){

    $( '.project-category' ).on( 'click', '.project__image', function(){
        search();
        // $( this ).html('test');
    });
    $pauseScrollLoad = false;

    $( window ).on( 'scroll', function(){
        $y_scroll_pos = window.pageYOffset;
        $height = $( '.project-category' ).outerHeight();
        $load_next = $height - 300;

        if( $y_scroll_pos > $load_next && !$pauseScrollLoad ){
            $pauseScrollLoad = true;
            search();
        }
    } );

    function search(){

        $action = 'get_project_category_posts';
        $page = $( '.project-category' ).data( 'page' );
        $cat = $( '.project-category' ).data( 'category' );
        $max_num_pages = $( '.project-category' ).data( 'max-pages' );

        if( $page < $max_num_pages ){
            $page++;

            $.ajax({
                type: 'POST',  
                url: ajaxParams.ajaxurl,
                data: 
                {  
                    action: $action,
                    security: ajaxParams.nonce,
                    page: $page,
                    cat: $cat
                },
                success: function(data, textStatus, XMLHttpRequest)
                {  
                    $( '.project-category' ).append( data );
                    $( '.project-category' ).data( 'page', $page );
                    $pauseScrollLoad = false;
                },  
                error: function(MLHttpRequest, textStatus, errorThrown)
                {  
                    alert(errorThrown);
                    $pauseScrollLoad = false;
                }
            });
        }
    }
});

