<form role="search" method="get" id="searchform" action="<?php bloginfo('siteurl'); ?>" >
	<label for="s" class="screen-reader-text">Search for:</label>
	<input type="text" value="<?php if(is_search() ) { the_search_query(); } else { echo 'Search...'; } ?>" name="s" id="s" onfocus="if(this.value=='Search...')this.value='<?php the_search_query(); ?>'" onblur="if(this.value=='')this.value='Search...'" />
	<input type="submit" id="searchsubmit" value="Search" /> 
</form>