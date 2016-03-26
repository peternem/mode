<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

get_header(); ?>

	<div class="container not-found">
		<div class="row">
			<div class="col-sm-8 col-md-8">
				<div id="primary" class="content-area">
					<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
				<main id="main" class="site-main" role="main">
			
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'upbootwp' ); ?></h1>
							</header><!-- .page-header -->
			
							<div class="page-content">
								<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'upbootwp' ); ?></p>
			
								<?php get_search_form(); ?>
			
					
			
								<?php
								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'upbootwp' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
								?>
			
								<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
			
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
			
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-md-8 -->
			<div class="col-sm-4 col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>