<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consulte
 */

get_header();
?>

<div id="primary" class="content-area section-padding">
    <div class="consulte-site-main">
        <?php
            if ( have_posts() ) :
                ?>
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="col-lg-4 consulte-sidebar-space">
                           <?php get_sidebar('sidebar-1'); ?>
                        </div>                       
                        <div class="col-lg-8">

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();
                                get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;
                        ?>
                            <div class="consulte-blog-pagination">
                                <?php consulte_blog_pagination(); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            else :
                get_template_part( 'template-parts/content', 'none' );

            endif;
        ?>
    </div><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();