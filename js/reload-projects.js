$(document).ready(function(){

    // $( '.projects' ).on( 'click', '.projects__image', function(){
    //     search();
    // });
    $pauseScrollLoad = false;

    $( window ).on( 'scroll', function(){
        $y_scroll_pos = window.pageYOffset;
        $height = $( '.projects' ).outerHeight();
        $load_next = $height - 300;

        if( $y_scroll_pos > $load_next && !$pauseScrollLoad ){
            $pauseScrollLoad = true;
            search();
        }
    } );

    function search(){

        $action = 'get_project_posts';
        $page = $( '.projects' ).data( 'page' );
        $max_num_pages = $( '.projects' ).data( 'max-pages' );

        if( $page < $max_num_pages ){
            $page++;

            $.ajax({
                type: 'POST',  
                url: ajaxParams.ajaxurl,
                data: 
                {  
                    action: $action,
                    security: ajaxParams.nonce,
                    page: $page
                },
                success: function(data, textStatus, XMLHttpRequest)
                {  
                    $( '.projects' ).append(data);
                    $( '.projects' ).data( 'page', $page );
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

