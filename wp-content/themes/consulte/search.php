<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ruthem
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

                        </div>

                        <div class="col-md-12 text-center">
                            <?php consulte_blog_pagination(); ?>
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