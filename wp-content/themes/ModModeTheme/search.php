<?php
/**
 * The template for displaying Search Results pages.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header();
?>
<div class="container search-php">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <section id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php if (have_posts()) : ?>

                        <header class="page-header">
                            <h1 class="page-title"><?php printf(__('Search Results for: %s', 'upbootwp'), '<span>' . get_search_query() . '</span>'); ?></h1>
                        </header><!-- .page-header -->

                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>
               
                            <?php get_template_part('content', 'search'); ?>

                        <?php endwhile; ?>

                        <?php upbootwp_content_nav('nav-below'); ?>

                    <?php else : ?>
                      
                        <?php get_template_part('no-results', 'search'); ?>

                    <?php endif; ?>

                </main><!-- #main -->
            </section><!-- #primary -->
        </div><!-- .col-md-8 -->
    </div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>