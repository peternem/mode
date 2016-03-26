<?php
/*
Plugin Name: Mode Dealer Tools Plugin
Plugin URI: http://codex.wordpress.org/Adding_Administration_Menus
Description: Mode Dealer Tools allow Admin to maintain the Mode Dealer Tools section of the website. (admin-page-plugin)
Author: Mpeternell
Author URI: http://mattpeternell.net
*/

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    // Add a new submenu under Settings:
    // add_options_page(__('Test Settings','menu-test'), __('Test Settings','menu-test'), 'manage_options', 'testsettings', 'mt_settings_page');

    // Add a new submenu under Tools:
    add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('Dealer Tools','menu-test'), __('Mode Tools','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

    // Add a submenu to the custom top-level menu:
    add_submenu_page('mt-top-level-handle', __('Pricing Docs','menu-test'), __('Pricing Docs','menu-test'), 'manage_options', 'pricing-docs', 'mt_sublevel_page');

    // Add a second submenu to the custom top-level menu:
    add_submenu_page('mt-top-level-handle', __('PDF Uploader','menu-test'), __('PDF Uploader','menu-test'), 'manage_options', 'pdf-uploader', 'mt_sublevel_page2');
}

// mt_settings_page() displays the page content for the Test settings submenu
// function mt_settings_page() {
	// echo "<div id=\"icon-options-general\" class=\"icon32\"><br></div>";
    // echo "<h2>" . __( 'Test Settings', 'menu-test' ) . "</h2>";
// }

// mt_tools_page() displays the page content for the Test Tools submenu
function mt_tools_page() {
	echo "<div id=\"icon-options-general\" class=\"icon32\"><br></div>";
    echo "<h2>" . __( 'Test Tools', 'menu-test' ) . "</h2>";
}

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function mt_toplevel_page() {
	echo "<div id=\"icon-options-general\" class=\"icon32\"><br></div>";
    echo "<h2>" . __( 'Mode Tools - Toplevel', 'menu-test' ) . "</h2>";
	echo "<h3>Pricing Documents PDF Uploader - PDF Uploader and Jpeg Thumbnail Creater </h3>";
	echo "<p>The Mode Tools section of the website has been developed to help support in selling our products.</p>";
	echo "You have the ability to:";
	echo "<ul><li>- Upload Documents</li><li>- Remove Documents</li></ul>";		
}

// mt_sublevel_page() displays the page content for the first submenu
// of the custom Test Toplevel menu
function mt_sublevel_page() {
	echo "<div id=\"icon-options-general\" class=\"icon32\"><br></div>";
    echo "<h2>" . __( 'Pricing Docs', 'menu-test' ) . "</h2>";
	echo "<h3>Pricing Documents</h3>";
	//echo "<p>The Mode Tools section of the website has been developed to help support in selling our products.</p>";
	echo "<p>You have the ability to upload and remove pricing documents.</p>";
	include('pricing.php');
}

// mt_sublevel_page2() displays the page content for the second submenu
// of the custom Test Toplevel menu
function mt_sublevel_page2() {
	echo "<div id=\"icon-options-general\" class=\"icon32\"><br></div>";
    echo "<h2>" . __( 'PDF Uploader', 'menu-test' ) . "</h2>";
	include('index-pdf-loader.php');
}

?>
