<?php
/**
 * Template Name: Dealer Tools
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<div class="jumbotron product-carousel">
	    <div id="myCarousel" class="hidden-xs carousel slide container" data-ride="carousel" data-interval="false">
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
				<header class="entry-header page-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content container marketing">
					<?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>
					<?php
						wp_link_pages(array(
							'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
							'after'  => '</div>',
						));
					?>
				</div><!-- .entry-content -->
				<div class="row featurette">
					<div class="col-md-12">
						<!-- Nav tabs -->
						<ul id="dealerToolsTab" class="nav nav-tabs">
						  <li><a href="#pricing" data-toggle="tab">Pricing</a></li>
						  <li><a href="#modeForms" data-toggle="tab">Mode Forms</a></li>
						  <!-- <li><a href="#messages" data-toggle="tab">Messages</a></li>
						  <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
						</ul>
						
						<!-- Tab panes -->
						<div class="tab-content">
						  	<div class="tab-pane active" id="pricing">
								<h2 class="featurette-heading">Marvel Pricing</h2>
								<p class="lead">Select a Marvel document to view in browser or download.</p>
								<ul class="specData">
								<?php 	
								$dir = "./wp-content/uploads/dealer-tools/marvel/";
								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
								    		if ($file != "." && $file != ".." && $file != ".htaccess") {
								        		$name = basename($file, '.pdf'); // Removes file extension  
												?>
								   				<li class="boxListItem">
								   					<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank">
								   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
								   						<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
								   					</a>
								   				</li>
												<?php
								    		}
										}
									}
									closedir($dh);
								}
								?>
								</ul>
								<hr class="featurette-divider" />
								<h2 class="featurette-heading">AGA Pricing</h2>
								<p class="lead">Select a AGA document to view in browser or download.</p>
								<ul class="specData">
								<?php 	
								$dir = "./wp-content/uploads/dealer-tools/aga/";
								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
								    		if ($file != "." && $file != ".." && $file != ".htaccess") {
								        		$name = basename($file, '.pdf'); // Removes file extension  
												?>
								   				<li class="boxListItem">
								   					<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank">
								   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
								   						<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
								   					</a>
								   				</li>
												<?php
								    		}
										}
									}
									closedir($dh);
								}
								?>
								</ul>
								<hr class="featurette-divider" />
								<h2 class="featurette-heading">American Range Pricing</h2>
								<p class="lead">Select a American Range document to view in browser or download.</p>
								<ul class="specData">
								<?php 	
								$dir = "./wp-content/uploads/dealer-tools/american-range/";
								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
								    		if ($file != "." && $file != ".." && $file != ".htaccess") {
								        		$name = basename($file, '.pdf'); // Removes file extension  
												?>
								   				<li class="boxListItem">
								   					<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank">
								   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
								   						<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
								   					</a>
								   				</li>
												<?php
								    		}
										}
									}
									closedir($dh);
								}
								?>
								</ul>
								<hr class="featurette-divider" />
								<h2 class="featurette-heading">Heartland Pricing</h2>
								<p class="lead">Select a Heartland document to view in browser or download.</p>
								<ul class="specData">
								<?php 	
								$dir = "./wp-content/uploads/dealer-tools/heartland";
								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
								    		if ($file != "." && $file != ".." && $file != ".htaccess") {
								        		$name = basename($file, '.pdf'); // Removes file extension  
												?>
								   				<li class="boxListItem">
								   					<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank">
								   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
								   						<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
								   					</a>
								   				</li>
												<?php
								    		}
										}
									}
									closedir($dh);
								}
								?>
								</ul>
								<hr class="featurette-divider" />
								<h2 class="featurette-heading">Vent-a-Hood Pricing</h2>
								<p class="lead">Select a Vent-a-Hood document to view in browser or download.</p>
								<ul class="specData">
								<?php 	
								$dir = "./wp-content/uploads/dealer-tools/vent-a-hood";
								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
								    		if ($file != "." && $file != ".." && $file != ".htaccess") {
								        		$name = basename($file, '.pdf'); // Removes file extension  
												?>
								   				<li class="boxListItem">
								   					<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank">
								   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
								   						<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
								   					</a>
								   				</li>
												<?php
								    		}
										}
									}
									closedir($dh);
								}
								?>
								</ul>
							</div>
						  <div class="tab-pane" id="modeForms">
						  	<h2 class="featurette-heading">Mode Forms</h2>
							<p class="lead">Select a Mode Form document to view in browser or download.</p>
							<ul class="specData">
								<?php 	
								$dir = "./wp-content/uploads/dealer-tools/mode-forms";
								if (is_dir($dir)) {
									if ($dh = opendir($dir)) {
										while (($file = readdir($dh)) !== false) {
								    		if ($file != "." && $file != ".." && $file != ".htaccess") {
								        		$name = basename($file, '.pdf'); // Removes file extension  
												?>
								   				<li class="boxListItem">
								   					<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank">
								   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
								   						<a href="<?php echo ".".$dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
								   					</a>
								   				</li>
												<?php
								    		}
										}
									}
									closedir($dh);
								}
								?>
								</ul>
						  </div>
						  <!-- <div class="tab-pane" id="messages">Tab 3</div>
						  <div class="tab-pane" id="settings">Tab 4</div> -->
						</div>
					</div>
				</div>
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
		<hr class="featurette-divider" />
				<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>