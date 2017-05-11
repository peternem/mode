<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container navigation">
			<!-- <a href="<?php echo get_option('home'); ?>/" rel="home" class="modeLogo">
	           <img src="http://beta.modedistributing.com/wp-content/uploads/2013/11/mode-distributing-logo.jpg" alt="ModeDistributing.com" title="ModeDistributing.com" class="img-responsive" />
	        </a> -->
			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
				</button>
				
	        <div class="navbar-header">
	        	<a href="<?php echo get_option('home'); ?>/" rel="home" class="">
	            	<img src="http://beta.modedistributing.com/wp-content/uploads/2013/11/mode-distributing-logo.jpg" alt="ModeDistributing.com" title="ModeDistributing.com" class="img-responsive" />
	            </a> 
	        </div>
			<?php 
			$args = array('theme_location' => 'primary', 
						  'container_class' => 'navbar-collapse collapse', 
						  'menu_class' => 'nav navbar-nav navbar-right',
						  'fallback_cb' => '',
                          'menu_id' => 'main-menu',
                          'walker' => new Upbootwp_Walker_Nav_Menu()); 
			wp_nav_menu($args);
			?>
		</div><!-- container -->
	</nav>
	<div id="page" class="hfeed site">
		<div id="content" class="site-content">
