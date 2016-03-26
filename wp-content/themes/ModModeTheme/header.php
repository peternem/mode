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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
    <!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container navigation">
			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
				</button>
	        <div class="navbar-header">
	        	<a href="<?php echo get_option('home'); ?>/" rel="home" class="logo-link">
	            	<img src="/wp-content/uploads/2016/01/mode-logo-teal-grey.svg" alt="ModeDistributing.com" title="ModeDistributing.com" class="img-responsive company-logo" />
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
		</div>
	</nav>
	<div id="page" class="hfeed site">
		<div id="content" class="site-content">
