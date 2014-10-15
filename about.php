<?php
/*
Template Name: about
*/
get_header(); ?>
<?php include (TEMPLATEPATH . '/inc/featured_image.php' ); ?>
<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 	<div>
			<h2 class="post-title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h2>
			<div>
				<?php the_content(); ?>
			</div>
			<ul class="comments">
				<?php $withcomments = 1; comments_template(); ?>				
			</ul>
		</div>
<?php endwhile; ?>
<?php else : ?>
	 	<div>
			<h2 class="page-header">Edit the about page to add content here!</h2>
		</div>
<?php endif; ?>
</div>
<?php get_footer(); ?>


        
