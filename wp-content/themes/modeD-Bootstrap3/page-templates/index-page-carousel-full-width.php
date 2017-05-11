<?php

/**
 * Template Name: Index Page - Carousel Full Width
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<!-- Carousel ================================================== -->
<!-- <div class="jumbotron">
	<img class="visible-xs img-responsive" src="http://beta.modedistributing.com/wp-content/uploads/2013/10/bmw_news_aufmacher_1_3_2-crop.jpg" alt="First slide" class="img-responsive">

    <div id="myCarousel" class="hidden-xs carousel slide container" data-ride="carousel" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://beta.modedistributing.com/wp-content/uploads/2013/11/CIEH9-242-SS-1770x600.jpg" alt="First slide" class="img-responsive">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Skate ipsum dolor sit amet, frontside air opposite footed hurricane axle gnarly half-cab. Gap hospital flip nose grab late Tracker Steve Caballero dude.</p>
              <p><a class="btn btn-default btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://beta.modedistributing.com/wp-content/uploads/2013/11/CWEH9-46-SS-Kitchen-1770x600.jpg" alt="Second slide" class="img-responsive">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-default btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://beta.modedistributing.com/wp-content/uploads/2013/11/61RF-BS-F-R-Inset-1770x600.jpg" alt="Third slide" class="img-responsive">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-default btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div> -->
<div class="jumbotron product-carousel">
    <div id="myCarousel" class="hidden-xs carousel slide container" data-ride="carousel" data-interval="false">
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
				<header class="entry-header page-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
		</div>
		<!-- <div class="container marketing"> -->
		<div class="row">
			<!-- Three columns of text below the carousel -->
			<div id="footer-widgets" class="widget-area four col-md-12">
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
			<?php endif; ?>
			</div><!-- #footer-widgets -->
		</div>
		<div class="entry-content marketing">
					<?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>
					<?php
						wp_link_pages(array(
							'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
							'after'  => '</div>',
						));
					?>
					
		</div>	
		<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="row entry-meta"><div class="col-md-12"><span class="edit-link">', '</span></div></footer>' ); ?>
	
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>