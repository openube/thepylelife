<?php 
/*
Template Name: timeline
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="description" content="A living record of events, milestones, and food shared with family and friends.">
	<meta name="google-site-verification" content="KbOCedn_6WyRoZ5xLxaifLezBvWtxhZAVTdZn5Iot00" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
        <?php bloginfo('name'); ?>
        <?php is_front_page() ? bloginfo('description') : wp_title('|', true, 'LEFT'); ?>  
    </title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php 
        wp_head(); 
    ?>
</head>

<body <?php body_class(); ?> >
<div class="timeline-container">
<?php

get_sidebar();

if ( have_posts() ) : while (have_posts()) : the_post();
        wp_reset_postdata();
    endwhile;
endif;

$args = array(
              'post_type'      => 'post',
              'orderby'        => 'date',
              'order'          => 'ASC',
              'posts_per_page' => -1
            );

$new_query = new WP_Query( $args );

?> 
    <?php 
        if ( $new_query->have_posts() ) {
        echo '<ul class="pgwSlider">';
        while ( $new_query->have_posts() ) {
            $new_query->the_post();
            if ( has_post_thumbnail() ) {
    ?>
                <li>
                    <a href="<?php the_permalink(); ?>">;
                        <?php the_post_thumbnail(); ?>
                        <span><?php the_date('l, F j, Y'); ?> - <?php the_title(); ?></span>
                    </a>
                </li>
    <?php
            }
        }
        echo '</ul>';
        } else {
            echo '<h2 class="post-title">Add some posts to see them displayed here in a timeline.</h2>';
        } 
    ?>
<?php 
    wp_reset_postdata();
?>
</div>
</body>
</html>