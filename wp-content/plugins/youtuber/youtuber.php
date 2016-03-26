<?php
/*
	Plugin Name: Youtuber
	Plugin URI: http://www.roytanck.com/2007/08/27/wordpress-plugin-youtuber/
	Description: Easily add YouTube videos to posts using valid xhtml markup.
	Version: 1.8.2
	Author: Roy Tanck
	Author URI: http://www.roytanck.com
	
	Copyright 2008-2012, Roy Tanck

	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

define('YTBR_HEADER_V', 1.1);

add_action('wp_head', 'youtuber_header');
add_action('admin_init', 'youtuber_add_buttons');
add_action('admin_menu', 'youtuber_add_pages');
add_filter('the_content', 'youtuber');
add_filter('the_excerpt', 'youtuber');
add_action('init', 'youtuber_text_domain', 1);
add_action('wp_ajax_youtuber_tinymce', 'youtuber_tinymce');
register_activation_hook(__FILE__, 'youtuber_install');

add_shortcode('youtuber', 'youtuber_shortcode' );

function youtuber_install() {
	$newoptions = get_option('youtuber_options');
	$newoptions['width'] = '425';
	$newoptions['height'] = '355';
	$newoptions['quality'] = false;
	add_option('youtuber_options', $newoptions);
}

function youtuber_text_domain() {
	load_plugin_textdomain('youtuber', false, 'youtuber/lang');
}

function youtuber_add_pages() {
	add_options_page('Youtuber', 'Youtuber', 'manage_options', __FILE__, 'youtuber_options');
}

function youtuber_tinymce() {
	// check for rights
    if ( !current_user_can('edit_pages') && !current_user_can('edit_posts') ) 
    	die(__("You are not allowed to be here"));
   	
   	require_once('tinymce/mce_youtuber.php');
    
    die();
}

function youtuber_shortcode( $atts ) {
	$options = get_option('youtuber_options');

	if(array_key_exists('youtube', $atts)) {
		//Youtube URL?
		$search = "@\s*(youtube.com\/watch\?v=([^\[]+))\s*@i";
		if(preg_match_all($search, $atts['youtube'], $matches)) {
			if(is_array($matches)) {
				foreach($matches[1] as $key =>$id) {
					// Get the data from the tag
					$url = $matches[1][$key];
					$search = $matches[0][$key];
					$url = parse_url(numeric_entities($url));
					parse_str($url['query']);
					$v = str_replace('×', 'x', $v);
					$answer = youtuber_youtube($v);
				}
			}
		} else {
			// Get the data from the tag
			$id = $atts['youtube'];
			$id = str_replace('×', 'x', numeric_entities($id));
			
			$answer = youtuber_youtube($id);
		}
		
	}

	if(array_key_exists('vimeo', $atts)) {
		//Vimeo URL?
		$search = "@\s*vimeo.com\/([^\/^\[]+)(.*)\s*@i";
		if(preg_match_all($search, $atts['vimeo'], $matches)) {
			if(is_array($matches)) {
				foreach($matches[1] as $key =>$id) {
					// Get the data from the tag
					$id = $matches[1][$key];
					
					$answer = youtuber_vimeo($id);
				}
			}
		} else {
			$id = $atts['vimeo'];

			$answer = youtuber_vimeo($id);
		}
	}

	if(array_key_exists('googlevideo', $atts)) {
		//Google Video URL?
		$search = "@\s*\video.google.com/videoplay\?docid=([0-9]+|-[0-9]+)([^\[]*)\s*@i";
		if(preg_match_all($search, $atts['googlevideo'], $matches)) {
			if(is_array($matches)) {
				foreach($matches[1] as $key =>$id) {
					// Get the data from the tag
					$id = $matches[1][$key];
					
					$answer = youtuber_googlevideo($id);
				}
			}
		} else {
			$id = $atts['googlevideo'];
	
			$answer = youtuber_googlevideo($id);
		}
	}
	return $answer;
}

function youtuber_youtube($id) {
	$options = get_option('youtuber_options');
	//__('This video was embedded using the YouTuber plugin by <a href="http://www.roytanck.com">Roy Tanck</a>. Adobe Flash Player is required to view the video.', 'youtuber');
	$vars = array( "rel" => 0, "fs" => 1 );
	if($options['quality']) $vars['ap'] = "%2526fmt%3D18";
	$url = "http://www.youtube.com/embed/".$id."?".http_build_query($vars, '', '&amp;');
	$answer = sprintf("<iframe class='youtube-player youtuber' type='text/html' width='%s' height='%s' src='%s' webkitAllowFullScreen mozallowfullscreen allowFullScreen frameborder='0'></iframe>", $options['width'], $options['height'], $url);
	if( $options['width'] == 0 || $options['width'] == '100%' || strlen($options['width']) == 0 )
		$answer = "<div class='youtuber-container'>".$answer."</div>";
	return $answer;
}

function youtuber_vimeo($id) {
	$options = get_option('youtuber_options');
	//'.__('This video was embedded using the YouTuber plugin by <a href="http://www.roytanck.com">Roy Tanck</a>. Adobe Flash Player is required to view the video.', 'youtuber').'
	$vars = array( "title" => 0, "byline" => 0, "portrait" => 0 );
	if($options['quality']) $vars['ap'] = "%2526fmt%3D18";
	$url = "http://player.vimeo.com/video/".$id."?".http_build_query($vars, '', '&amp;');
	$answer = sprintf("<iframe class='youtube-player youtuber' type='text/html' width='%s' height='%s' src='%s' frameborder='0'></iframe>", $options['width'], $options['height'], $url);
	if( $options['width'] == 0 || $options['width'] == '100%' || strlen($options['width']) == 0 )
		$answer = "<div class='youtuber-container'>".$answer."</div>";
	return $answer;
}

function youtuber_googlevideo($id) {
	$options = get_option('youtuber_options');
	//'.__('This video was embedded using the YouTuber plugin by <a href="http://www.roytanck.com">Roy Tanck</a>. Adobe Flash Player is required to view the video.', 'youtuber').'
	return '<object class="youtuber" id="VideoPlayback" style="width: '.$options['width'].'px; height: '.$options['height'].'px;" width="'.$options['width'].'" height="'.$options['height'].'" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"><param name="src" value="http://video.google.com/googleplayer.swf?docid='.$id.'" /><embed id="VideoPlayback" style="width: '.$options['width'].'px; height: '.$options['height'].'px;" type="application/x-shockwave-flash" width="'.$options['width'].'" height="'.$options['height'].'" src="http://video.google.com/googleplayer.swf?docid='.$id.'"></embed></object>';

}

function numeric_entities($string){
	$mapping_hex = array();
	$mapping_dec = array(); 

	foreach (get_html_translation_table(HTML_ENTITIES, ENT_QUOTES) as $char => $entity){ 
		$mapping_hex[html_entity_decode($entity,ENT_QUOTES,"UTF-8")] = '&#x' . strtoupper(dechex(ord(html_entity_decode($entity,ENT_QUOTES)))) . ';';
		$mapping_dec[html_entity_decode($entity,ENT_QUOTES,"UTF-8")] = '&#' . ord(html_entity_decode($entity,ENT_QUOTES)) . ';';
	}
	$string = str_replace(array_values($mapping_hex),array_keys($mapping_hex) , $string);
	$string = str_replace(array_values($mapping_dec),array_keys($mapping_dec) , $string);
	return $string;
}

function youtuber($content){
	$options = get_option('youtuber_options');
	
	//Youtube URL?
	$search = "@\s*\[youtube\]\s*(http:\/\/www.youtube.com\/watch\?v=([^\[]+))\s*\[/youtube\]\s*@i";
	if(preg_match_all($search, $content, $matches)) {
		if(is_array($matches)) {
			foreach($matches[1] as $key =>$id) {
				// Get the data from the tag
				$url = $matches[1][$key];
				$search = $matches[0][$key];
				$url = parse_url(numeric_entities($url));
				parse_str($url['query']);
				$v = str_replace('×', 'x', $v);
				$replace = youtuber_youtube($v);
				$content = str_replace ($search, $replace, $content);
			}
		}
	}
	
	//Vimeo URL?
	$search = "@\s*\[vimeo\]\s*http:\/\/(|www.)vimeo.com\/([^\/^\[]+)(.*)\s*\[/vimeo\]\s*@i";
	if(preg_match_all($search, $content, $matches)) {
		if(is_array($matches)) {
			foreach($matches[1] as $key =>$id) {
				// Get the data from the tag
				$id = $matches[2][$key];
				$search = $matches[0][$key];
				
				$replace = youtuber_vimeo($id);
				$content = str_replace ($search, $replace, $content);
			}
		}
	}
	
	//Google Video URL?
	$search = "@\s*\[googlevideo\]\s*http:\/\/video.google.com/videoplay\?docid=([0-9]+|-[0-9]+)([^\[]*)\s*\[/googlevideo\]\s*@i";
	if(preg_match_all($search, $content, $matches)) {
		if(is_array($matches)) {
			foreach($matches[1] as $key =>$id) {
				// Get the data from the tag
				$id = $matches[1][$key];
				$search = $matches[0][$key];
				
				$replace = youtuber_googlevideo($id);
				$content = str_replace ($search, $replace, $content);
			}
		}
	}
	
	
	//Just the Youtube ID?
	$search = "@\s*\[youtube\]\s*([^\[]+)\s*\[/youtube\]\s*@i";
	if(preg_match_all($search, $content, $matches)) {
		if(is_array($matches)) {
			foreach($matches[1] as $key =>$id) {
				// Get the data from the tag
				$id = $matches[1][$key];
				$id = str_replace('×', 'x', numeric_entities($id));
				$search = $matches[0][$key];
				
				$replace = youtuber_youtube($id);
				$content = str_replace ($search, $replace, $content);
			}
		}
	}
	
	//Just the Vimeo ID?
	$search = "@\s*\[vimeo\]\s*([0-9]+)\s*\[/vimeo\]\s*@i";
	if(preg_match_all($search, $content, $matches)) {
		if(is_array($matches)) {
			foreach($matches[1] as $key =>$id) {
				// Get the data from the tag
				$id = $matches[1][$key];
				$search = $matches[0][$key];
				
				$replace = youtuber_vimeo($id);
				$content = str_replace ($search, $replace, $content);
			}
		}
	}
	
	//Just Google Video ID?
	$search = "@\s*\[googlevideo\]\s*([0-9]+|-[0-9]+)\s*\[/googlevideo\]\s*@i";
	if(preg_match_all($search, $content, $matches)) {
		if(is_array($matches)) {
			foreach($matches[1] as $key =>$id) {
				// Get the data from the tag
				$id = $matches[1][$key];
				$search = $matches[0][$key];
				
				$replace = youtuber_googlevideo($id);
				$content = str_replace ($search, $replace, $content);
			}
		}
	}
		
	return $content;
}

function youtuber_options() {
	global $table_prefix, $wpdb;
	// get options
	$options = $newoptions = get_option('youtuber_options');
	// if submitted, process results
	if ( isset($_POST["youtuber_submit"]) && $_POST["youtuber_submit"]) {
		$newoptions['width'] = strip_tags(stripslashes($_POST["width"]));
		$newoptions['height'] = strip_tags(stripslashes($_POST["height"]));
		if ($_POST["quality"]=="on") {
			$newoptions['quality'] = true;
		} else {
			$newoptions['quality'] = false;
		}
	}
	// any changes? save!
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('youtuber_options', $options);
	}
	// check if installed (hook is not called if used as mu-plugin)
	$wtemp = get_option('youtuber_width');
	if( empty($wtemp) ){ youtuber_install(); }
	// if options form was sent, process those...
	if( isset($_GET['action']) && $_GET['action'] == "updateoptions" ){
		update_option('youtuber_width', $_POST['youtuber_width']);
		update_option('youtuber_height', $_POST['youtuber_height']);
		update_option('youtuber_quality', $_POST['youtuber_quality']);
	}
	// options form
	echo'<form method="post" action="'.get_bloginfo('wpurl').'/wp-admin/options-general.php?page=youtuber/youtuber.php">';
	echo '<div class="wrap"><p><h2>'.__('Youtuber options', 'youtuber').'</h2><p>';
	// settings
	echo '<table class="form-table">';
	// width
	echo '<tr valign="top"><th scope="row">'.__('Movie width', 'youtuber').'</th>';
	echo '<td><input type="text" name="width" value="'.$options['width'].'" size="5"></input><br />'.__('Width in pixels', 'youtuber').'<br />'.__('Set value to 0 to use the max possible width and auto scale the height.', 'youtuber').'<br />('.sprintf(__('YouTube\'s default is %d', 'youtuber'), 425).')</td></tr>';
	// height
	echo '<tr valign="top"><th scope="row">'.__('Movie height', 'youtuber').'</th>';
	echo '<td><input type="text" name="height" value="'.$options['height'].'" size="5"></input><br />'.__('Height in pixels (should ideally be 3/4 of the width plus 25 pixels)', 'youtuber').'<br />'.sprintf(__('Example: %d * 3/4 + 25 = %d (rounded to the nearest pixel).', 'youtuber'), $options['width'], round( $options['width'] * .75 + 25)).'<br />('.sprintf(__('YouTube\'s default is %d', 'youtuber'), 355).')</td></tr>';
	// quality
	echo '<tr valign="top"><th scope="row">'.__('Video quality', 'youtuber').'</th>';
	if (isset($options['quality']) && !empty($options['quality'])) {
		$checked = " checked=\"checked\"";
	} else {
		$checked = "";
	}
	echo '<td><input type="checkbox" name="quality" value="on"'.$checked.' />'.__('Attempt to show all videos in high quality.', 'youtuber').'</td></tr>';
	echo '</table>';
	echo '<input type="hidden" name="youtuber_submit" value="true"></input>';
	echo '<p class="submit"><input type="submit" value="'.__('Update Options &raquo;', 'youtuber').'"></input></p>';
	echo '</form>';
	echo "</div>";
	echo '<div class="wrap"><p><h2>'.__('Using Youtuber', 'youtuber').'</h2><p>';
	_e('To embed a video, follow these steps:<ul><li>Find the video on YouTube or Vimeo.</li><li>Extract the ID from the video page url.<br>These look something like:<ul><li>http://youtube.com/watch?v=<strong>Krhl2o_uwdc</strong></li><li>http://vimeo.com/<strong>10019015</strong></li> The bit in bold type is the ID.</li><li>Type <strong>[youtube]Krhl2o_uwdc[/youtube]</strong>  or <strong>[vimeo]10019015[/vimeo]</strong> anywhere in your post.</li><li>Save and publish the post.</li></ul>', 'youtuber');
	echo '</p><p>';
	
	$dir_name = '/wp-content/plugins/youtuber';
	$url = get_bloginfo('wpurl');
	$iconURL = $url.$dir_name.'/tinymce/youtuber.gif';
	
	printf( __('You can also use the button %s in the Post/Page Editor. Just add the URL to the video.', 'youtuber'), "<img src='".$iconURL."'>");
	echo '</p></div>';
}

function youtuber_add_buttons() {
	// Don't bother doing this stuff if the current user lacks permissions
	if( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;

	// Add only in Rich Editor mode
	if( get_user_option('rich_editing') == 'true') {

		// add the button for wp21 in a new way
		add_filter('mce_external_plugins', 'add_youtuber_script');
		add_filter('mce_buttons', 'add_youtuber_button');
	}
}

function add_youtuber_button($buttons) {
	array_push($buttons, 'Youtuber');
	return $buttons;
}

function add_youtuber_script($plugins) {
	$dir_name = '/wp-content/plugins/youtuber';
	$url = get_bloginfo('wpurl');
	$pluginURL = $url.$dir_name.'/tinymce/editor_plugin.js?ver='.YTBR_HEADER_V;
	$plugins['Youtuber'] = $pluginURL;
	return $plugins;
}

function youtuber_header() {
	$options = get_option('youtuber_options');
	if( $options['width'] == 0 || $options['width'] == '100%' || strlen($options['width']) == 0 ) {
		$dir_name = '/wp-content/plugins/youtuber';
		$url = get_bloginfo('wpurl');
		wp_register_style('youtuber', $url.$dir_name.'/css/youtuber.css', array(), YTBR_HEADER_V);
		wp_enqueue_style('youtuber');
	
		wp_print_styles( array( 'youtuber' ));
	}
}

?>
