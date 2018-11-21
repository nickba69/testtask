<?php
/**
 *
 *  Template Name: Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mogul
 */

?>

<?php 
	get_header()
?>

<div class="container">
	<div class="row">
		<div class="col-md-8">		
			<!-- Outputing the articles-->	
			<?php 
				$blog_post = get_template_part('template-parts/content', 'blog');
				echo $blog_posts;
			?>
		</div>
		<div class="col-md-4">
			 <?php //dynamic_sidebar( 'sidebar' ); ?> 
			<?php get_sidebar('sidebar-1') ?>

		</div>
	</div>
</div><!-- .container-->

<?php 
 get_footer()
?>
