<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>

		</div><!-- #content -->
	</div><!-- #page -->
	<footer id="colophon" class="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div id="footer-widgets" class="widget-area three">
					<?php
						/* footer sidebar */
						if ( ! is_404() ) : ?>
							
								<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
									<?php dynamic_sidebar( 'sidebar-4' ); ?>
								<?php endif; ?>
			
								<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
									<?php dynamic_sidebar( 'sidebar-5' ); ?>
								<?php endif; ?>
			
								<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
									<?php dynamic_sidebar( 'sidebar-6' ); ?>
								<?php endif; ?>
							<!-- #footer-widgets -->
					<?php endif; ?>
				</div><!-- .row -->
			</div>
		</div>
	</footer>
	<div class="gutter">
		<div class="container">
			<div class="row">
				<div class="col-md-12 site-info">
					<?php do_action( 'upbootwp_credits' ); ?>
					&copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?>
					<span class="sep"> | </span>
					<?php printf(__('Theme: %1$s by %2$s.', 'ModModeTheme' ), 'ModModeTheme', '<a href="http://mattpeternell.net" rel="designer">mpeternell</a>'); ?>
				</div>
			</div>
		</div>
	</div>

<?php wp_footer(); ?>
</body>
</html>