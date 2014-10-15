<?php get_header(); ?>
            <div class="container">
                <h2>search results...</h2>
				<?php if (have_posts()) : ?>
                    <div class="row">
					<?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-6">
                            <a href="<?php the_permalink(); ?>">
                                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
                                    <div class="entry">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php if ( $wp_query->current_post !== 0 &&
                                   ($wp_query->current_post+1)%2 === 0 ) {
                                    echo '</div><div class="row">';
                                }
					endwhile; ?>
                    </div>
				<?php else : ?>
					<h2>No posts found.</h2>
				<?php endif; ?>
			</div><!--end search results-->
<?php get_footer(); ?>