<?php
// date_default_timezone_set('America/Anchorage');

show_admin_bar( false );
include( TEMPLATEPATH . '/functions/posttype.php' );

add_action('admin_head', 'led_admin_css');

function led_admin_css() {
  echo '<style>
  div.error{
    display: none;
  }
  </style>';
}

if( current_user_can('tickets_manager') ) {
  add_action( 'admin_head', 'manager_admin_head_css' );
  add_action( 'admin_menu', 'remove_manager_menus' );
	add_filter('manage_edit-tribe_events_columns', 'my_columns');

}

if ( function_exists( 'add_theme_support' ) )
{
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('menus');
  add_theme_support( 'title-tag' );
  add_theme_support( 'woocommerce' );
}


// Remove WooCommerce Updater
remove_action('admin_notices', 'woothemes_updater_notice');


function convert_datetime($str)
{

    list($date, $time) = explode(' ', $str);
    list($year, $month, $day) = explode('-', $date);
    list($hour, $minute, $second) = explode(':', $time);

    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

    return $timestamp;
}


function replace_uploaded_image($image_data) {
    // if there is no large image : return
    if (!isset($image_data['sizes']['large'])) return $image_data;

    // paths to the uploaded image and the large image
    $upload_dir = wp_upload_dir();
    $uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
    $large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file'];

    // delete the uploaded image
    unlink($uploaded_image_location);

    // rename the large image
    rename($large_image_location,$uploaded_image_location);

    // update image metadata and return them
    $image_data['width'] = $image_data['sizes']['large']['width'];
    $image_data['height'] = $image_data['sizes']['large']['height'];
    unset($image_data['sizes']['thumbnail']);

    return $image_data;
}
//add_filter('wp_generate_attachment_metadata','replace_uploaded_image');


if ( ! isset( $content_width ) )
$content_width = 1140;




add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +

function woo_archive_custom_cart_button_text() {

        return __( 'Choose a table', 'woocommerce' );

}





add_role(
  'tickets_manager',
  __( 'Ticket Manager' ),
  array(
    'read'         => true,  // true allows this capability
    'edit_posts'   => true,
    'delete_posts' => false, // Use false to explicitly deny
  )
);

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'tickets_manager' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only

    $role->add_cap( 'level_9' );
    $role->add_cap( 'level_8' );
    $role->add_cap( 'level_7' );
    $role->add_cap( 'level_6' );
    $role->add_cap( 'level_5' );
    $role->add_cap( 'level_4' );
    $role->add_cap( 'level_3' );
    $role->add_cap( 'level_2' );
    $role->add_cap( 'level_1' );
    $role->add_cap( 'level_0' );

    $role->add_cap( 'edit_posts' );
    $role->add_cap( 'edit_others_posts' );
    $role->add_cap( 'edit_published_posts' );
    $role->add_cap( 'publish_posts' );
    $role->add_cap( 'manage_options' );

    $role->add_cap( 'edit_tribe_event' );
    $role->add_cap( 'read_tribe_event' );
    $role->add_cap( 'delete_tribe_event' );
    $role->add_cap( 'read_private_tribe_events' );
    $role->add_cap( 'edit_tribe_events' );
    $role->add_cap( 'edit_others_tribe_events' );
    $role->add_cap( 'edit_private_tribe_events' );
    $role->add_cap( 'edit_published_tribe_events' );
    $role->add_cap( 'delete_tribe_events' );
    $role->add_cap( 'delete_others_tribe_events' );
    $role->add_cap( 'delete_private_tribe_events' );
    $role->add_cap( 'delete_published_tribe_events' );
    $role->add_cap( 'publish_tribe_events' );

$role2 = get_role( 'administrator' );

		// echo "<pre>";
		// print_r( $role );
		// echo "</pre>";

}
add_action( 'admin_init', 'add_theme_caps');


function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return admin_url('edit.php?post_type=tribe_events&tribe-has-tickets=1&post_status=any&paged=1');
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


function remove_manager_menus(){
	global $submenu;

	if( !current_user_can( 'tickets_manager' ) ) {
		return;
	}

  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'jetpack' );                    //Jetpack*
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit.php?post_type=gallery' );    //Galleries
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'mobile-menu-options' );    //Pages

	// remove_submenu_page( 'edit.php?post_type=tribe_events', 'edit.php?post_type=ticket-meta-fieldset' );    //Galleries

  // unset(
  //     $submenu['edit.php?post_type=tribe_events'][5],
  //     $submenu['edit.php?post_type=tribe_events'][10]
  // );

	// echo "<pre>";
	// print_r( $submenu );
	// echo "</pre>";



}

function manager_admin_head_css() {
  echo '
    <style media="screen">
      #adminmenumain,
      #wpfooter,
      #wp-admin-bar-new-content,
      #wp-admin-bar-tribe-events,
      #wp-admin-bar-comments,
      #wp-admin-bar-wp-logo,
      #wp-admin-bar-search,
      .tablenav.top .alignleft.actions,
      .tablenav.bottom .alignleft.actions,
      .row-actions,
      .row-actions .edit,
      .row-actions .inline,
      .row-actions .tickets_orders,
      td.check-column,
      th.check-column,
			.page-title-action,
			ul.subsubsub
      {
        display: none !important;
      }
      #wpcontent, #wpfooter{
        margin-left: 0 !important;
      }
    </style>
';
}




function my_columns($columns) {
		unset( $columns['title'] );
		unset( $columns['author'] );
		unset( $columns['events-cats'] );
		unset( $columns['tags'] );
		unset( $columns['comments'] );
		unset( $columns['recurring'] );
		unset( $columns['tickets'] );
		unset( $columns['start-date'] );
		unset( $columns['end-date'] );

		$columns['new-title'] = 'Event';
		$columns['tickets'] = 'Attendees';
		$columns['start-date'] = 'Start Date';
		$columns['end-date'] = 'End Date';

    return $columns;
}

add_action('manage_tribe_events_posts_custom_column', 'replace_title_products', 10, 2);
function replace_title_products( $column, $post_id ) {

    switch ( $column ) {
				case 'new-title':
						$new_title = '<strong><a href="'.admin_url( 'edit.php?post_type=tribe_events&page=tickets-attendees&event_id=' . $post_id ).'">'.get_the_title( $post_id ).'</a></strong>';
						echo $new_title;
            break;
    }
}

/**
 * Add the "Visit Store" link in admin bar main menu.
 *
 * @since 1.0.0
 * @param WP_Admin_Bar $wp_admin_bar
 */
function admin_bar_menus( $wp_admin_bar ) {

	add_action('wp_before_admin_bar_render', 'ds_admin_bar_remove', 0);
	function ds_admin_bar_remove() {
		global $wp_admin_bar;

		/* Remove their stuff */
		$wp_admin_bar->remove_menu('wp-logo'); // WP Logo
		$wp_admin_bar->remove_menu('comments'); // Comments
		$wp_admin_bar->remove_menu('new-content'); // New Content
		$wp_admin_bar->remove_menu('archive'); // New Content
	}

	// $wp_admin_bar->add_node( array(
	// 	'id'    => 'ds_menu_ayuda',
	// 	'title' => 'HELP',
	// 	'href'  => '#ayuda',
	// 	// 	'meta'  => array( 'class' => 'my-toolbar-page' )
	// ) );

	$wp_admin_bar->add_node( array(
		'id'    => 'led_tickets',
		'title' => 'Events',
		'href'  => admin_url('edit.php?post_type=tribe_events&tribe-has-tickets=1&post_status=any&paged=1'),
		// 	'meta'  => array( 'class' => 'my-toolbar-page' )
	) );

}
add_action( 'admin_bar_menu', 'admin_bar_menus', 31 );


/**
 * Change number of related products output
 */
function woo_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}



/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_product_thumbnails', 'woocommerce_output_related_products', 10 );
