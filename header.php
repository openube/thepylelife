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
    <header>
        <h1 class="title"><a href="<?php bloginfo('url'); ?>">the pyle life</a></h1>
        <?php
            $defaults = array(
                'theme_location'  => 'navigation-menu',
                'menu_class'      => 'nav nav-justified box-shadow-bottom'
            );
        wp_nav_menu( $defaults ); ?>
        <div class="search-container fixed fixed-top fixed-right">
            <?php get_search_form(); ?>
            <span class="glyphicon glyphicon-search"></span>
        </div>
    </header>

