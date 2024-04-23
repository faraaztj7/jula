<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package consulte
 */

get_header();
?>

    <div id="primary" class="content-area section-padding single_blog_page">

        <div class="container">
            <div class="row  flex-row-reverse">
                <div class="col-lg-4 consulte-sidebar-space">
                    <?php get_sidebar('sidebar-1'); ?>
                </div>                
                <div class="col-lg-8">
                    <div class="single-blog-area">
                        <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content-single', get_post_format() );

                            endwhile; // End of the loop.
                        ?>
                    </div>
                </div>


            </div>
        </div>
    </div><!-- #primary -->
<?php
 // If comments are open or we have at least one comment, load up the comment template.
if ( ( comments_open() || get_comments_number() ) && ! post_password_required() ) :

    ?>
    <div class="consulte-comment-area">
        <div class="container">
            <?php
            comments_template();
            ?>
        </div>
    </div>
<?php
endif;
?>

<?php
get_footer();