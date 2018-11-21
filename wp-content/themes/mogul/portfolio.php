
<?php /* Template Name: Portfolio */ ?>

<?=get_header();?>

<?php
    $args = array( //arguments to get all portfolio categories
        'taxonomy' => 'portfolio_category',
        'hide_empty' => false,
    );
    $categories = get_terms($args);
    wp_reset_postdata();

    $portfolio_bottom_text_title = get_field('portfolio_bottom_text_title', 'option');
    $portfolio_bottom_text = get_field('portfolio_bottom_text', 'option');

?>

<!--OUTPUTING THE CATEGORIES OF PORTFOLIO-->
<section class="portfolio">
    <nav class="portfolio-sorting-menu">
        <?php
            foreach( $categories as $category ) {
                ?>
                <a href="#" class="category"><?=($category->name);?></a>

                <?php
            }
        ?>
    </nav>
    <!-- POPUP ITEMS FROM PORTFOLIO-->
    <aside >
        <div class="popuper">
            <button class="pop-close-btn" type="button"><span class="">&times</span></button>
            <img src="#" class="portfolio-full-image" alt="">
        </div>
    </aside>
    <div class="content-here container">
        <?php
            $argst = array(
                'post_type' => 'custom_portfolio',
            );
        ?>

        <!--Outputing portfolio items-->
        <?php
        $all_portfolio_items = new WP_Query($argst);

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
        <article class="portfolio-text text-center">
            <h2><?= $portfolio_bottom_text_title?></h2>
            <p2><?= $portfolio_bottom_text?></p2>
        </article>
    </div><!-- .content-here -->
</section> <!--.portfolio -->
<?=get_footer();?>
