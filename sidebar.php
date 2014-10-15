<div class="sidebar-nav fixed">
    <span class="glyphicon glyphicon-plus"></span>
	<?php
            $defaults = array(
                'theme_location'  => 'navigation-menu',
                'menu_class'      => 'menu-mini'
            );
        wp_nav_menu( $defaults ); ?>
</div>