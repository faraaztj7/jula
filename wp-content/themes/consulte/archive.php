<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consulte
 */

get_header(); ?>

<div class="content-area section-padding">
    <div class="consulte-site-main">
			<?php
				if ( have_posts() ) : ?>
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
				endif; ?>
	</div><!-- #primary -->
</div><!-- #primary -->

<?php get_footer();
