<?php get_header(); ?>
<div class="container panel panel-default" id="main-container"><!--main-container-->
	<div class="row"><!--main content and twitter feed-->
		<div class="col-md-9"><!--post-column-->

<!-- IF HAVE POSTS, DO THIS -->		
<?php if (have_posts()) : $i = 0; while (have_posts()) : the_post(); $i++ ?>
	 <?php if ($i == 1) : ?><!-- IF IT'S THE FIRST POST, DO THIS -->
	 	<div><!--post container-->
	 		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			<h2 class="page-header">
				<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h2>
			<h5 class="text-info"><?php the_date() ?> by: <?php the_author() ?></h5>
			<div>
				<?php the_content(); ?>
			</div>
			<ul class="media-list">
				<?php $withcomments = 1; comments_template(); ?>				
			</ul>
		</div><!--end post container-->
		

	<!-- IF IT'S OTHER POSTS, DO THIS -->
	<div class="list-group">
	<?php else : ?>
		<a href="<?php the_permalink() ?>" class="list-group-item">
			<h4 class="list-group-item-heading"><?php the_title() ?></h4>
			<p class="list-group-item-text"><?php the_excerpt() ?></p>
		</a>
	<?php endif; ?>
<?php endwhile; ?>
	</div><!--end list group-->
<!-- IF NO POSTS ARE FOUND, DO THIS -->
<?php else : ?>
	 	<div><!--post container-->
			<h2 class="page-header">No Posts Found</h2>
		</div><!--end post container-->
<?php endif; ?>



		</div><!--end post column-->
		<?php get_sidebar(); ?>
	</div><!--end main content and twitter feed-->
</div><!--main-container-->
<?php get_footer(); ?>






