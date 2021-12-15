<?php
// This is the defualt template
include('header.php');

	if ( is_front_page() ) {
		get_template_part( 'parts/content', 'frontpage' );
	} else {
		if ( is_home() ) {
			get_template_part( 'parts/content', 'blog' );
		}
	}

include('footer.php');
?>
