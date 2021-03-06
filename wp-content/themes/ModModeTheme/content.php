<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php if ('post' == get_post_type()) : ?>
            <div class="entry-meta">
                <?php upbootwp_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
    <?php if (is_search() || is_home()) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <div class="row">
                <div class="col-lg-8">
                    <?php //the_content(); ?>
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn-primary" title="Learn More" href="<?php the_permalink();?>">Learn More »</a></p>
                </div>
                <div class="col-lg-4">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium');
                    }
                    ?>
                </div> 
            </div>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content">
            <div class="row">
                <div class="col-lg-12">
                    <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'upbootwp')); ?>
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'upbootwp'),
                        'after' => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->
            </div>
        </div>
    <?php endif; ?>

    <footer class="entry-meta">
         <div class="row">
                <div class="col-lg-12">
        <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
           
                    <?php
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list(__(', ', 'upbootwp'));
                    if ($categories_list && upbootwp_categorized_blog()) :
                        ?>
                        <span class="cat-links">
                            <?php printf(__('Posted in %1$s', 'upbootwp'), $categories_list); ?>
                        </span>
                    <?php endif; // End if categories  ?>

                    <?php
                    /* translators: used between list items, there is a space after the comma */
                    $tags_list = get_the_tag_list('', __(', ', 'upbootwp'));
                    if ($tags_list) :
                        ?>
                        <span class="tags-links">
                            <?php printf(__('Tagged %1$s', 'upbootwp'), $tags_list); ?>
                        </span>
                    <?php endif; // End if $tags_list ?>
                <?php endif; // End if 'post' == get_post_type()  ?>


                <?php edit_post_link(__('Edit', 'upbootwp'), '<span class="edit-link">', '</span>'); ?>
            </div>
        </div>
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->
