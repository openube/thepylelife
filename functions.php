<?php

function pyle_life_scripts() {
    enqueue_jquery();
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'pgwslider', get_template_directory_uri() . '/js/pgwslider.min.js');
    wp_enqueue_script( 'pylelife', get_template_directory_uri() . '/js/pylelife.js');
    enqueue_comment_reply();
}
function pyle_life_styles() {
    wp_enqueue_style('reset_css', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css');
}
function enqueue_comment_reply() {
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply-local', get_template_directory_uri() . '/js/comment-reply.js' );
    }
}

// Add scripts and styles to <head>
add_action( 'wp_enqueue_scripts', 'pyle_life_scripts' );
add_action( 'wp_enqueue_scripts', 'pyle_life_styles' );

function enqueue_jquery() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Add RSS links to <head> section
automatic_feed_links();

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Register Menus
function register_navigation_menu() {
  register_nav_menu('navigation-menu',__( 'Navigation' ));
}
add_action( 'init', 'register_navigation_menu' );


// Add Featured Images
add_theme_support( 'post-thumbnails' ); 
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Add HTML5 Support
add_theme_support( 'html5', array( 'search-form' ) );

// Hide Admin Bar
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');


// Category Link Helper
function get_catlink_by_id($id) {
    $cat_id = get_cat_ID($id);
    $cat_link = get_category_link($cat_id);
    return $cat_link;
}
     
// Limit search results to posts
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

// Echo Thumbnail URL
function echo_thumbnail_url() {
    if ( has_post_thumbnail() ) {
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        echo $url;
    }
}

// Wrap Post Images in Div
add_filter('image_send_to_editor', 'wrap_my_div', 10, 8);

function wrap_my_div($html, $id, $caption, $title, $align, $url, $alt){
      return '<div class="post-image-container">'.$html.'</div>';
}

// Add Custom Comments
function pyle_life_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>

	<small class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( __('on %1$s at %2$s '), get_comment_date(),  get_comment_time() ); ?></a><?php
            printf( __( '<cite class="fn">%s</cite> <span class="says">said:</span>' ), get_comment_author_link() );
		?>
	</small>

	<?php comment_text(); ?>

	<small class="reply">
    <?php edit_comment_link( __( '(Edit)' ), '  ', '' );
    comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</small>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; } ?>
