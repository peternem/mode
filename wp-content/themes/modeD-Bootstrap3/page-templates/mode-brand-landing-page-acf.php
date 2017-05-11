<?php
/**
 * Template Name: Mode Landing Page - Full width - ACF
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>  
<?php while (have_posts()) : the_post(); ?>
	<div class="jumbotron product-carousel">
	    <div id="myCarousel" class="carousel slide container" data-ride="carousel" data-interval="false">
			<div class="carousel-inner">
		        <div class="item active">
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
	<div id="mrktg-content" class="container">
		<div class="row">
			<div class="col-md-12">
				
				<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<header class="entry-header page-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php //if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
				</header><!-- .entry-header -->
			</div>
		</div>

				<!-- <div class="entry-content marketing">
					entry-content
				</div> --><!-- .entry-content -->
					<?php
 					// Advanced Custom Fieldset - Featurette
					if(get_field('intro_copy'))
					{
						echo get_field('intro_copy');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('plp_row_1'))
					{
						echo get_field('plp_row_1');
						echo "<hr class=\"featurette-divider\" />";
					}
					
					if(get_field('plp_row_2'))
					{
						echo get_field('plp_row_2');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('plp_row_3'))
					{
						echo get_field('plp_row_3');
						echo "<hr class=\"featurette-divider\" />";
					}
					if(get_field('plp_row_4'))
					{
						echo get_field('plp_row_4');
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
				

		<!-- Footer Marketing messaging and featurettes -->
		<!-- Wrap the rest of the page in another container to center all the content. -->
		<hr class="featurette-divider" />
		<div class="container marketing">
			<!-- Three columns of text below the carousel -->
			<div class="row">
			<?php
				/* Product footer sidebar */
				if ( ! is_404() ) : ?>
					<div id="footer-widgets" class="widget-area four">
						<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
							
						<?php endif; ?>
		
						<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-8' ); ?>
							
						<?php endif; ?>
		
						<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-9' ); ?>
							
						<?php endif; ?>
					</div><!-- #footer-widgets -->
			<?php endif; ?>
			</div>
		</div>
		<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

	</div><!-- .container -->

<?php get_footer(); ?>