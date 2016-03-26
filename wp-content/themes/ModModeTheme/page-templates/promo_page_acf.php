<?php
/**
 * Template Name: Promo Page - ACF
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
		            <div class="row">
					  		<div class="col-xs-9 col-sm-10 col-md-10">
					  			<h1><?php the_title(); ?></h1>
	              				<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>	
					  		</div>
					  		<div class="col-xs-3 col-sm-2 col-md-2">
					  			<div class="btn-group"><a class="btn btn-sm btn-primary" href="#mrktg-content" role="button">Visit page &raquo;</a></div>
					  		</div>
						</div>
		            </div>
		          </div>
		        </div> 
		    </div>
		</div>
	</div>
	<?php
	} 
	?>
				

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

					<?php the_content(); ?>
					<?php if(have_rows('promo_flex_content')) { ?>
						<?php while( have_rows('promo_flex_content') ): the_row(); 
						$title_img = get_sub_field('title');
						$copy = get_sub_field('copy');
						$details = get_sub_field('details');
						$image = get_sub_field('image');
						$link = get_sub_field('link');
						$pdf_doc_link = get_sub_field('pdf_doc_link');
						?>
						<div class="row acf-featurette">
						<div class="col-sm-7 col-md-7 content-col-main">
							<div class="acf-label"><img class="img-responsive" src="<?php echo $title_img['url']; ?>" alt="<?php echo $title_img['alt'] ?>" /></div>
						     <div class="acf-desc">
						     	<h3 class="featurette-heading"><?php echo $copy; ?></h3>
						     	<p class="lead"><?php echo $details; ?></p>
						    	
						    </div>
						    <div class="acf-link">
						    	<?php if ($link) { ?>
						    	<p><a class="btn btn-primary" href="<?php echo $link; ?>" title="View details">View details »</a></p>
						    	<?php }?>
						    	<?php if ($pdf_doc_link) { ?>
						    	<p><a class="btn btn-primary" href="<?php echo $pdf_doc_link; ?>" target="_blank" title="View details">View details »</a></p>
						    	<?php }?>
						    </div>
						</div>
						<div class="col-sm-5 col-md-5">
							<img class="img-thumbnail aga-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						</div>
							
						</div>
						<?php endwhile; ?>
					<?php } else { ?>
					<div class="row acf-featurette">
					<div class="col-md-7 content-col-main">
						<div class="acf-label"><h3 class="featurette-heading">Promotions coming soon! Check back later for some exclusive savings!</h3></div>
					</div>
					<div class="col-sm-5 col-md-5">
						<img class="img-thumbnail aga-img" src="/wp-content/uploads/2015/12/Verona-Promotion-Page-Image.png" alt="Verona Promo" />
					</div>
						
					</div>	
					<?php } ?>
			
					<?php endwhile; // end of the loop. ?>
					<?php
						wp_link_pages(array(
							'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
							'after'  => '</div>',
						));
					?>
				

		<!-- Footer Marketing messaging and featurettes -->
		<!-- Wrap the rest of the page in another container to center all the content. -->
<!-- 		<hr class="featurette-divider" /> -->
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