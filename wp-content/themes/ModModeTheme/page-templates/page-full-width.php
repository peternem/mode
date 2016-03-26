<?php
/**
 * Template Name: Page - Full width x
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<?php
	// Advanced Custom Fieldset - Featurette
	if(get_field('hero_image'))
	{
	?>
	<div class="jumbotron product-carousel">
	    <div id="myCarousel" class="carousel slide container" data-ride="carousel" data-interval="false">
			<div class="carousel-inner">
		        <div class="item active">
		
				<?php echo '<img alt="Second slide" class="img-responsive" src="'.get_field('hero_image').'"/>'; ?>
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
	<?php
	}
	 
	?>
					
	<!-- <div class="jumbotron product-carousel">
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
	</div> -->
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
				</header><!-- .entry-header -->
			</div>
		</div>
		<div class="entry-content marketing">
			<div class="col-md-12">
			<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
			<?php
				wp_link_pages(array(
					'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
					'after'  => '</div>',
				));
			?>
			</div>
		</div><!-- .entry-content -->
		
		<hr class="featurette-divider" />
		
		<div class="marketing">
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
		<hr class="featurette-divider" />
				<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>