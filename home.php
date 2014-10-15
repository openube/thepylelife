<?php get_header(); ?>
<!-- IF HAVE POSTS, DO THIS -->		
<?php if (have_posts()) : $i = 0; while (have_posts()) : the_post(); $i++ ?>
    <?php if ($i == 1) : ?><!-- IF IT'S THE FIRST POST, DO THIS -->
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
		</div><!--end post container-->
	<?php endif; ?>
<?php endwhile; ?>
<!-- IF NO POSTS ARE FOUND, DO THIS -->
<?php else : ?>
	 	<div><!--post container-->
			<h2 class="page-header">No Posts Found</h2>
		</div><!--end post container-->
<?php endif; ?>
<?php get_footer(); ?>



