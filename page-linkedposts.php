<?php
// Template name: Custom Posts Page
include("header.php");
?>
  <div class="container-xl postsPageContainer">
	<?php
	  if ( have_posts() ) {
	    while ( have_posts() ) {
	      the_post();
	      echo do_shortcode(get_the_content());
	    }
	  }
	?>
  </div><!-- container -->
<?php include("footer.php"); ?>