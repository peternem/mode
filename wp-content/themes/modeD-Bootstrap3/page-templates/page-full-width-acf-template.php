<?php

/**
 * Template Name: Index Page - Page - Full Width w/ACF
 * The template used for displaying page content in page.php
 *
 * @author Mpeternell
 * @package upBootWP 0.1
 */
get_header(); ?>

<div class="jumbotron product-carousel">
    <div id="myCarousel" class="carousel slide container" data-ride="carousel" data-interval="false">
		<div class="carousel-inner">
	        <div class="item active ">
	        	<img src="<?php header_image(); ?>" alt="Second slide" class="img-responsive">
	           	<div class="container">
	            	<div class="carousel-caption">
	              		<h1><?php the_title(); ?></h1>
	              		<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
	              		<p><a class="btn btn-default btn-primary" href="#mrktg-content" role="button">Learn More</a></p>
	            	</div>
	          	</div>
	        </div> 
	    </div>
	</div>
</div>
<?php while (have_posts()) : the_post(); ?>
	<div id="mrktg-content" class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
			</div>
		</div>
		<div class="row">
			<header class="col-md-12 entry-header page-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
		</div>
		<div class="row entry-content marketing">
			<div class="col-md-12">		
					<?php
 					// Advanced Custom Fieldset - Featurette
					if(get_field('intro_paragraph'))
					{
						echo get_field('intro_paragraph');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_a'))
					{
						echo get_field('featurette_a');
						echo "<hr class=\"featurette-divider\" />";
					}
					
					if(get_field('featurette_b'))
					{
						echo get_field('featurette_b');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_c'))
					{
						echo get_field('featurette_c');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_d'))
					{
						echo get_field('featurette_d');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_e'))
					{
						echo get_field('featurette_e');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_f'))
					{
						echo get_field('featurette_f');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_g'))
					{
						echo get_field('featurette_g');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_h'))
					{
						echo get_field('featurette_h');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('featurette_i'))
					{
						echo get_field('featurette_i');
						echo "<hr class=\"featurette-divider\" />";
					}
					 
					?>
					<?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>
					<?php
						wp_link_pages(array(
							'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
							'after'  => '</div>',
						));
					?>
					<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
			</div>
		</div>
		<div class="row marketing">
			<div id="footer-widgets" class="col-md-12 widget-area four">
			<!-- Three columns of text below the carousel -->
			<?php
				/* Product footer sidebar */
				if ( ! is_404() ) : ?>
						<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
							
						<?php endif; ?>
		
						<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-8' ); ?>
							
						<?php endif; ?>
		
						<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-9' ); ?>
							
						<?php endif; ?>
					<!-- #footer-widgets -->
			<?php endif; ?>
			</div>
			
		</div>
		<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="row entry-meta"><div class="col-md-12"><span class="edit-link">', '</span></div></footer>' ); ?>	
	</div>
<?php get_footer(); ?>