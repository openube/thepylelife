<form method="get" action="<?php bloginfo( 'siteurl' ) ?>" role="search">
	<div class="form-group">
	    <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" class="form-control" placeholder="Search">
	</div>
</form>