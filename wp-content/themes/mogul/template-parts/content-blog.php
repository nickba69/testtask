<?php 
/**
*
* Template part for posts on blog page
*
*/
?>
<?php 
$args = array(
	'post-type' => 'post',
);
$blog_posts = new WP_Query($args);
 ?>
<?php if($blog_posts->have_posts()):
	?>
	<section id="blog">
		<?php
		while ($blog_posts->have_posts()):
			$blog_posts->the_post();
			?>
			<article>
			<h2><?php the_title()?></h2>
			<p><?php the_content() ?></p>
			</article>
			<?
		endwhile;
		?>
	</section> <!-- #blog -->
	<?php
endif;?>


