jQuery(document).ready(function($){




// **PORTFOLIO AJAX SORTING BY CATEGORY   
    $('.portfolio-sorting-menu .category').click(function(){
        var portfolio_category = $(this).text();
        $.ajax({
            url: 'http://localhost/testtask/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'portfolio',
                category: portfolio_category,
                param2: 3,
            },
            // data: 'action=portfolio&param1=2&param2=3',
            beforeSend: function() {
                $('.content-here').text('Gallery is uploading');
                $('.content-here').css('height','900px');


            },
            success: function( data ) {
                $('.content-here').html(data);
                $('.content-here').css('height','900px');
            }
        });
        return false; // FOR A LINK ELEMENT
    });
    // END PORTFOLIO AJAX SORTING BY CATEGORY

// **REVIEW LOGO AJAX DESCRIPTION   
    $('.review_logo').click(function(){

        var logo_id = $(this).children('img').attr('data-id');
                // console.log(logo_id);

        var insert_position = $(this);
        $.ajax({
            url: 'http://localhost/testtask/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'review_logo',
                review_logo_id: logo_id,
            },
            // data: 'action=portfolio&param1=2&param2=3',
            beforeSend: function() {

            },
            success: function( data ) {
                $('.review-logo-description').html(data);
            }
        });
        return false; // FOR A LINK ELEMENT
    });
    // REVIEW LOGO AJAX DESCRIPTION
  
// **PORTFOLIO ITEMS POPUPER
    $('.portfolio-item').click(function(){
        var full_image = $(this).attr('href');
        $('.portfolio-item').css('filter', 'blur(20px)');
        $('.popuper').css('display', 'inline-block');
        $('.portfolio-full-image').attr('src',full_image);

        return false;
    })

    $('.pop-close-btn').click(function(){
        $('.portfolio-item').css('filter', 'none');
        $('.popuper').css('display', 'none');

    })
    // END PORTFOLIO ITEMS POPUPER 

// **COMMON POPUPER
    // 1)add what you need to show inside .popuper
    // 2) add class "poput_trigger" on place where 
    //    you need to push to open popup
    $('.popup_trigger').click(function(){
        $('.popuper').css('display', 'inline-block'); // Make popup visible

        return false;
    })

    $('.pop-close-btn').click(function(){
        $('.popuper').css('display', 'none'); // hide popup

    })
    // END REVIEW LOGO POPUPER

// **LOAD MORE
    var ajaxurl = "http://localhost/testtask/wp-admin/admin-ajax.php";
    var page = 2;
    
        $('body').on('click', '.load_more', function() {
            var data = {
                'action': 'load_posts_by_ajax',
                'page': page,
            };
     
            $.post(ajaxurl, data, function(response) {
                $('#reviews').append(response);
                page++;
                if(response == ''){
                    $('.load_more').hide();
                }
            });
            return false;
        });

    // END LOADMORE

});




