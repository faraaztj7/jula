<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consulte
 */

get_header();
?>

<div id="primary" class="content-area section-padding">
    <div class="consulte-site-main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.

                        endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
      
    </div><!-- #main -->
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
