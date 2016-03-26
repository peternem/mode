<?php
/*
Plugin Name: Mode CTA Widget
Plugin URI: http://www.wpexplorer.com/
Description: Call To action widget for the Mode Product, Contact and Service CTA areas located at the bottom of each page.
Version: 1.0
Author: MPeternell.net
Author URI: http:// MPeternell.net/
License: GPL2
*/

class wp_my_plugin extends WP_Widget {
// Controller
	function wp_my_plugin() {
		$widget_ops = array('classname' => 'my_widget_class', 'description' => __('Call-To-Action Widget for Product level pages. Location of widget is at bottom of page just above global footer.', 'wp_widget_plugin'));
		$control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false, $name = __('Mode CTA Widget', 'wp_widget_plugin'), $widget_ops, $control_ops );
	}	
	
// constructor
    // function wp_my_plugin() {
        // parent::WP_Widget(false, $name = __('CTA Widget', 'wp_widget_plugin') );
    // }
	
	// widget form creation
	function form($instance) {
	
		// Check values
		if( $instance) {
		    $title = esc_attr($instance['title']);
			$imgUrl = esc_attr($instance['imgUrl']);
		    $subtitle = esc_attr($instance['subtitle']);
		    $textarea = esc_textarea($instance['textarea']);
			$linkUrl = esc_textarea($instance['linkUrl']);
		} else {
		     $title = '';
			 $imgUrl = '';
		     $subtitle = '';
		     $textarea = '';
			 $linkUrl = '';
		}
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id('imgUrl'); ?>"><?php _e('Image', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('imgUrl'); ?>" name="<?php echo $this->get_field_name('imgUrl'); ?>" type="text" value="<?php echo $imgUrl; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Sub Title:', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('linkUrl'); ?>"><?php _e('Link Url:', 'wp_widget_plugin'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('linkUrl'); ?>" name="<?php echo $this->get_field_name('linkUrl'); ?>"><?php echo $linkUrl; ?></textarea>
		</p>
	<?php
	}
	// update widget
	function update($new_instance, $old_instance) {
	      $instance = $old_instance;
	      // Fields
	      $instance['title'] = strip_tags($new_instance['title']);
		  $instance['imgUrl'] = strip_tags($new_instance['imgUrl']);
	      $instance['subtitle'] = strip_tags($new_instance['subtitle']);
	      $instance['textarea'] = strip_tags($new_instance['textarea']);
		  $instance['linkUrl'] = strip_tags($new_instance['linkUrl']);
	     return $instance;
	}

	// display widget
	function widget($args, $instance) {
	   extract( $args );
	   // these are the widget options
	   $title = apply_filters('widget_title', $instance['title']);
	   $imgUrl = $instance['imgUrl'];
	   $subtitle = $instance['subtitle'];
	   $textarea = $instance['textarea'];
	   $linkUrl = $instance['linkUrl'];
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="cta_widget widget-text wp_widget_plugin_box">';

	   // Check if image URL is set
	   if ( $imgUrl ) {
	      echo '<img class="img-thumbnail" src="'.$imgUrl.'" />';
	   }
		
		// Check if Widget title is set
	   if ( $title ) {
	      echo $before_title . $title . $after_title;
	   }
	   
	   // Check if Sub-title is set
	   if( $subtitle ) {
	      echo '<p class="wp_widget_plugin_text">'.$subtitle.'</p>';
	   }
	   // Check if textarea is set
	   if( $textarea ) {
	     echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
	   }

	   echo '</div>';
	   		// Check if Link URL  is set
	   if( $linkUrl ) {
	    // echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
		 echo '<footer><a class="btn btn-primary" href="'.$linkUrl.'" role="button">Visit Page »</a></footer>';
	   }
	   echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_my_plugin");'));
?>
