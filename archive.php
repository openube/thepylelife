<?php get_header(); ?>
    <div class="container">
        <h2><?php single_cat_title() ?></h2>

        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>

                <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) {
                                echo '<div id="' . $wp_query->current_post . '" class="col-lg-3 col-md-6 col-sm-12 event-item">';
                                the_post_thumbnail('medium');
                                echo '</div>';
                            }
                    ?>
                </a>
            <?php if ( $wp_query->current_post !== 0 &&
                       ($wp_query->current_post+1)%4 === 0 ) {
                        echo '</div><div class="row">';
                    }
            endwhile; ?>
            </div>
        <?php else : ?>

            <p>No posts found.</p>

        <?php endif; ?>
    </div>
<?php get_footer(); ?>