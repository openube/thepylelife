<?php get_header(); ?>
<!-- IF HAVE POSTS, DO THIS -->		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php include (TEMPLATEPATH . '/inc/featured_image.php' ); ?>
	 	<div class="container post"><!--post container-->
            <small class="date"><?php the_date('l, F j, Y') ?> - <?php the_author() ?></small>
			<h2 class="post-title">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h2>
			<div>
				<?php the_content(); ?>
			</div>
            <?php include (TEMPLATEPATH . '/inc/post_nav.php' ); ?>
            <ul class="comments">
				<?php $withcomments = 1; comments_template(); ?>				
			</ul>
		</div><!--end post container-->
<?php endwhile; ?>
<!-- IF NO POSTS ARE FOUND, DO THIS -->
<?php else : ?>
	 	<div><!--post container-->
			<h2 class="page-header">No Posts Found</h2>
		</div><!--end post container-->
<?php endif; ?>
<?php get_footer(); ?>






