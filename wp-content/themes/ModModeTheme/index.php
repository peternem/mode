<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header();
?>
<?php
if (is_front_page() && is_home()) {
    // Default homepage
} elseif (is_front_page()) {
    // static homepage
} elseif (is_home()) {
    ?>
    <div class="jumbotron product-carousel">
        <div id="myCarousel" class="carousel slide container" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <div class="item active">                    
                    <img alt="Second slide" class="img-responsive" src="/wp-content/themes/ModModeTheme/images/Mode-News-and-Reviews-Hero-1024x439.png"/>
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-xs-9 col-sm-10 col-md-10">
                                    <h1>MODE News and Reviews</h1>
                                    <p class="subtitle">A blog about the latest in luxury kitchen appliances.</p>
                                </div>
                                <div class="col-xs-3 col-sm-2 col-md-2">
                                    <div class="btn-group"><a class="btn btn-sm btn-primary" href="#blog" role="button">Learn More</a></div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
        <?php
    } else {
        //everything else
    }
    ?>
    <div id="blog" class="container">
        <div class="row">
            <div id="primary" class="col-sm-8 col-md-8 content-area">
                <main id="main" class="site-main" role="main">

                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('content', get_post_format());
                            ?>

                        <?php endwhile; ?>

                        <?php upbootwp_content_nav('nav-below'); ?>

                    <?php else : ?>
                        <?php get_template_part('no-results', 'index'); ?>
                    <?php endif; ?>

                </main><!-- #main -->
            </div><!-- .col-md-8 -->

            <div class="col-sm-4 col-md-4">
                <?php get_sidebar(); ?>
            </div><!-- .col-md-4 -->
        </div><!-- .row -->
    </div><!-- .container -->
    <?php get_footer(); ?>