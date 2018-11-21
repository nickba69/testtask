<?php
/**
 * Template part for displaying portfolio page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mogul
 */

?>
<?php
    if ($_POST['category']): // if the form was sent (to get videos from one category)
        $argms = array(
            'post_type' => 'custom_portfolio',
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio_category',
                    'field'    => 'slug',
                    'terms'    => $_POST['category'],
                ),
            ),
        );
    endif;
?>


<!--Outputing portsolio items-->
<?php
    $all_portfolio_items = new WP_Query($argms);

    if($all_portfolio_items->have_posts()){

       while($all_portfolio_items->have_posts()){
           $all_portfolio_items->the_post();
       ?>
            <a href="<?php the_post_thumbnail_url()?>" class="portfolio-item">
                <img src="<?php  the_post_thumbnail_url('thumbnail')?>" alt="">
            </a>
            
        <?php
       }
    };
?>
<script>
    jQuery(document).ready(function($){
            // **PORTFOLIO ITEMS POPUPER
        $('.portfolio-item').click(function(){
            var full_image = $(this).attr('href');
            $('.portfolio-item').css('filter', 'blur(20px)');
            $('.popuper').css('display', 'inline-block');
            $('.portfolio-full-image').attr('src',full_image);
            // $("body").bind("mousewheel", function() {
            //     return false;
            // });
            console.log(full_image);
            return false;
        })

        $('.pop-close-btn').click(function(){
            $('.portfolio-item').css('filter', 'none');
            $('.popuper').css('display', 'none');
            // $("body").bind("mousewheel", function() {
            //     return true;
            // });
        })
        // END PORTFOLIO ITEMS POPUPER 
    })
</script>
<?php


?>

