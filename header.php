<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Effin Lazy
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=0.8, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;800&family=Poppins:ital,wght@0,300;0,900;1,400&display=swap" rel="stylesheet">
	<script type="text/javascript">
		var HOMEURL = "<?php bloginfo('url'); ?>";
		var THEMEURL = "<?php bloginfo("template_directory"); ?>";
		var ajaxurl = "<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php";
	</script>
	<?php
		wp_head();
	?>
<body <?php echo body_class(); ?>>

<div id="loaderWrap" class="transition-long">
	<div class="sk-cube-grid">
	  <div class="sk-cube sk-cube1"></div>
	  <div class="sk-cube sk-cube2"></div>
	  <div class="sk-cube sk-cube3"></div>
	  <div class="sk-cube sk-cube4"></div>
	  <div class="sk-cube sk-cube5"></div>
	  <div class="sk-cube sk-cube6"></div>
	  <div class="sk-cube sk-cube7"></div>
	  <div class="sk-cube sk-cube8"></div>
	  <div class="sk-cube sk-cube9"></div>
	</div>
</div><!-- loader -->

<!-- mobile menu -->

<div id="mobile_nav">
	<a href="#" class="openMobile"><i class="fas fa-times"></i></a>
	<div id="mobile_nav_inner">
			<h3>Menu</h3>
	</div><!-- links -->
</div><!-- mobile nav -->

<div id="siteWrap">

<nav id="mainMenu" class="navbar fixed-top navbar-light transition">
	<div class="scrollLoc"></div>
	<div class="container-fluid" id="main-nav">
			  <a id="mainLogo" class="navbar-brand" href="<?php bloginfo("url"); ?>">
			    <?php bloginfo("title"); ?>
			  </a>
				<a href="#" class="openMobile"><i class="fas fa-bars"></i></a>
				<ul id="main_menu" class="nav justify-content-center">
					<?php
					  createBootstrapMenu();
					?>
				</ul>
	</div><!-- container -->
</nav><!-- nav -->
