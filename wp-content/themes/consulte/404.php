<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package consulte
 */

get_header();
?>
<div id="primary" class="content-area section-padding page-not-found-wrap">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pnf-inner-wrap">
                    <div class="pnf-inner">

                        <?php

                            $error_page_text = get_option( 'consulte_error_page_text', esc_html__( '404','consulte' ));
                            $error_page_title = get_option( 'consulte_error_page_title', esc_html__( 'PAGE NOT FOUND','consulte' ));
                            $error_page_content = get_option( 'consulte_error_page_content', esc_html__( 'The page you are looking for does not exist or has been moved.','consulte' ));
                            $error_page_btn = get_option( 'consulte_error_page_btn' );
                            $error_page_btn = get_option( 'consulte_error_page_btn', esc_html__( 'Go back to Home Page','consulte' ));
                            if ( !empty( $error_page_text )  ) {
                             echo "<h2>". wp_kses_post( $error_page_text)."</h2>" ;
                            }
                            if ( !empty( $error_page_title )  ) {
                             echo "<h2>". wp_kses_post( $error_page_title)."</h2>" ;
                            }
                            if ( !empty( $error_page_content )  ) {
                             echo "<p>". wp_kses_post( $error_page_content )."</p>" ;
                            }
                            if ( !empty( $error_page_btn )  ) {
                                ?>
                                <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn">

                                <?php echo wp_kses_post( $error_page_btn ); ?>
                                
                                </a>

                            <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- #primary -->
<?php
get_footer();