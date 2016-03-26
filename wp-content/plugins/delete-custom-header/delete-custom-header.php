<?php
/*
Plugin Name: Delete Custom Header
Description: Delete uploaded header images and remove them from the database.
Version: 1.2.1
Author: Ben Yates
Author URI: http://bayates.host-ed.me/wordpress/
*/

if (!function_exists('delete_custom_header')) {
	function delete_custom_header() {
		if (!current_user_can('edit_theme_options'))
			return;
		if (empty($_POST))
			return;
		if (isset($_POST['deletecustomheader']) && isset($_POST['default-header'])) {
			check_admin_referer('custom-header-options', '_wpnonce-custom-header-options');
			$uploaded = get_uploaded_header_images();
			if (isset($uploaded[$_POST['default-header']])) {
				global $wpdb;
				$url = $uploaded[$_POST['default-header']]['url'];
				# remove header if it's the default:
				if ($url == get_theme_mod('header_image')) {
					set_theme_mod('header_image', 'remove-header');
				}
				# unset default-header so it isn't set to deleted header name:
				unset($_POST['default-header']);
				$posts = $wpdb->posts;
				$sql = "SELECT ID FROM $posts WHERE $posts.post_type = 'attachment' AND $posts.post_content = '$url'";
				$id = $wpdb->get_var($sql);
				wp_delete_post($id, true);
			}
		}
	}
	add_action('load-appearance_page_custom-header', 'delete_custom_header');
}

if (!function_exists('dch_add_delete_btn')) {
	function dch_add_delete_btn() {
		if (!isset($_GET['page']) or $_GET['page'] != 'custom-header')
			return;
?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
	var td;
	var th = jQuery('th');
	th.each(function(index, elem) {
		if (jQuery(elem).text() == 'Uploaded Images') {
			td = jQuery(elem).closest('tr').find('td');
			return false;
		}
	});
	if (!td) return;
	var div = '<div>'
		+ '<?php submit_button(__('Delete Header Image'), 'button', 'deletecustomheader', false); ?>'
		+ '</div>';
	td.append(div);
});
//]]>
</script>
<?php
	}
	add_action('admin_head', 'dch_add_delete_btn');
}

?>
