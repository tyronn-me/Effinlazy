<?php
register_nav_menu( 'primary', 'Main Menu' );
show_admin_bar(false);
add_theme_support( 'post-thumbnails' );

/**
* 	Works in WordPress 4.1 or later.
*/
if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Proper way to enqueue scripts and styles
 */
function lazy_scripts() {
	wp_enqueue_style( 'style-reset', "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" );
	wp_enqueue_style( 'style-animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" );
	wp_enqueue_style( 'style-main', get_stylesheet_uri() );
	wp_enqueue_style( 'style-mobile', get_template_directory_uri() . '/css/mobile.css' );
	// Boot strap
	wp_enqueue_script( 'plugin-bundler', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'plugin-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'plugin-fontawesome', 'https://kit.fontawesome.com/8e37509268.js', array('jquery'), '1.0.0', true );

	// Main
	wp_enqueue_script( 'plugin-script', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), true );

}

add_action( 'wp_enqueue_scripts', 'lazy_scripts' );


// Add class to next/prev post links

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="page-link"';
}

function wpdocs_excerpt_more( $more ) {
    return '.......';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// Testimonials

function testimonials_posttype() {

    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
            'show_in_rest' => true,
						'menu_icon' => 'dashicons-admin-comments',
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'testimonials_posttype' );

// Add page builder admin page
add_action( 'admin_menu', 'wpse_pb_register' );

function wpse_pb_register()
{
    add_menu_page(
        'Page Builder',     // page title
        'Page Builder',     // menu title
        'manage_options',   // capability
        'page-builder',     // menu slug
        'wpse_pb_render' // callback function
    );

		register_pb__settings();
}

function register_pb__settings() {
	//register our settings
	register_setting( 'pb-plugin-settings-group', 'pb_title_option' );
	register_setting( 'pb-plugin-settings-group', 'pb_content_option' );
	register_setting( 'pb-plugin-settings-group', 'convertkit_option' );
	register_setting( 'pb-plugin-settings-group', 'pb_success_option' );
}

function wpse_pb_render()
{
    global $title;

    print '<div class="wrap">';
    print "<h1>$title</h1>";
		print "<p>The form below manages the <strong>Page Builder</strong> content.";

		?>
		<form method="post" action="options.php">
		<?php
			settings_fields( 'pb-plugin-settings-group' );
			do_settings_sections( 'pb-plugin-settings-group' );
		?>

		<table class="form-table" style="width: 60%;">
				<tr valign="top">
				<th scope="row">Convert Kit API Key</th>
				<td><input style="width: 100%;" type="password" name="convertkit_option" value="<?php echo esc_attr( get_option('convertkit_option') ); ?>" /></td>
				</tr>

        <tr valign="top">
        <th scope="row">Page Builder Title</th>
        <td><input style="width: 100%;" type="text" name="pb_title_option" value="<?php echo esc_attr( get_option('pb_title_option') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><textarea style="width: 100%; height: 300px;" type="text" name="pb_content_option"><?php echo esc_attr( get_option('pb_content_option') ); ?></textarea></td>
        </tr>

				<tr valign="top">
        <th scope="row">Successful Subscription Message</th>
        <td><textarea style="width: 100%; height: 300px;" type="text" name="pb_success_option"><?php echo esc_attr( get_option('pb_success_option') ); ?></textarea></td>
        </tr>

    </table>

		<?php submit_button(); ?>
		</form>
		<?php

    print '</div>';
}

// email

add_action("wp_ajax_contactFormSubmit", "contactFormSubmit");
add_action("wp_ajax_nopriv_contactFormSubmit", "contactFormSubmit");

function contactFormSubmit() {

	$f_name = $_POST['f_name'];
	$f_email = $_POST['f_email'];
	$f_subject = $_POST['f_subject'];
	$f_message = $_POST['f_message'];

	$message = "From: " . $f_name . "<br/>Replay Email: " . $f_email . "<br/><br/>" . $f_message;
	$messageFix = str_replace("\n", "<br/>", $message);

	$to = get_bloginfo("admin_email");
	$subject = 'Effin Lazy : ' . $f_subject;
	$body = $messageFix;
	$headers = array('Content-Type: text/html; charset=UTF-8');

	if ( wp_mail( $to, $subject, $body, $headers ) ) {
		echo "Success";
	} else {
		echo "Error";
	}

	echo "Thank you for reaching out, I will respond to you as soon as possible. If you'd like to learn more, try booking a Coffee Session With Sid.";
	die();
}

// Register sidebar

function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar', 'theme_name' ),
        'id'            => 'sidebar-footer',
        'before_widget' => '<ul class="list-group list-group-flush">',
        'after_widget'  => '</ul>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

		register_sidebar( array(
        'name'          => __( 'Footer Sidebar Right', 'theme_name' ),
        'id'            => 'sidebar-footer-right',
        'before_widget' => '<ul class="list-group list-group-flush">',
        'after_widget'  => '</ul>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}

add_action( 'init', 'themename_widgets_init' );

// Covert Kit API Intergration

add_action("wp_ajax_getConvertInfo", "getConvertInfo");
add_action("wp_ajax_nopriv_getConvertInfo", "getConvertInfo");

function getConvertInfo() {
	$apiKey = get_option('convertkit_option');
	$apiUrl = "https://api.convertkit.com/v3/forms?api_key=" . $apiKey;

	$curl = curl_init($apiUrl);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($curl);
	curl_close($curl);

	echo $response;
	die();
}

add_action("wp_ajax_addConvertSub", "addConvertSub");
add_action("wp_ajax_nopriv_addConvertSub", "addConvertSub");

function addConvertSub() {
	$apiKey = get_option('convertkit_option');
	$formID = $_POST["formid"];
	$firstname = $_POST["firstname"];
	$email = $_POST["email"];
	$apiURL = "https://api.convertkit.com/v3/forms/$formID/subscribe/";
	$data = [
  	'api_key' => $apiKey,
		'email' => $email,
		'first_name' => $firstname
	];

	$curl = curl_init($apiURL);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
	  'Content-Type: application/json; charset=utf-8'
	]);
	$response = curl_exec($curl);
	curl_close($curl);

	$successresponse = array("response" => $response, "message" => get_option('pb_success_option'));

	echo json_encode($successresponse);
	die();
}

// Main Menu

function createBootstrapMenu() {
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object("Menu 1");
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	$child_items = [];
	$parent_items = [];

	$count = 0;
	$submenu = false;

	foreach( $menuitems as $item ) {

			$link = $item->url;
			$title = $item->title;
			$id = $item->ID;
			$subID = $item->menu_item_parent;

			if ($item->menu_item_parent) {
				$child_items[] = array("id" => $subID, "Link" => $link, "title" => $title);
			}

			if ( empty($item->menu_item_parent) ) {
				$parent_items[] = array("id" => $id, "Link" => $link, "title" => $title);
			}

	}

	foreach ($parent_items as $navitem) {
		if ( isset($child_items[$count]["id"]) && $navitem["id"] == $child_items[$count]["id"] ) {
			echo '<li class="nav-item dropdown">';
					echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="' . $navitem["Link"] . '">' . $navitem["title"] . '</a>';
						echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
						foreach($child_items as $childNavItem) {
							echo '<li><a class="dropdown-item" href="' . $childNavItem["Link"] . '">' . $childNavItem["title"] . '</a></li>';
						}
						echo '</ul>';
			echo '</li>';
		} else {
			echo '<li class="nav-item">';
				echo '<a class="nav-link" href="' . $navitem["Link"] . '">' . $navitem["title"] . '</a>';
			echo '</li>';
		}
		$count++;
	}
}
?>
