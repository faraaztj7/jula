<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consulte
 */
?>
        <div class="consulte-footer">
        <?php if( is_active_sidebar( 'sidebar-2') || is_active_sidebar( 'sidebar-3') || is_active_sidebar( 'sidebar-4')|| is_active_sidebar( 'sidebar-5')){

         ?>
            <!-- Footer Top/Widget Area Start -->
            <div class="consulte-footer-top" <?php if(!empty(get_option( 'consulte_footer_bgimage' ))){ ?> data-bg-image="<?php echo esc_url( get_option( 'consulte_footer_bgimage' )); ?>"<?php } if(!empty(get_option( 'consulte_footer_bgcolor' ))){ ?>  data-bg-color="<?php echo esc_url( get_option( 'consulte_footer_bgcolor' )); ?>" <?php } ?> >
                <div class="container">
                    <div class="row row-cols-sm-2 row-cols-1">
                         <?php 
                        $count = 0;
                        if( is_active_sidebar( 'sidebar-2' ) ){
                            $count++;
                     } if( is_active_sidebar( 'sidebar-3' ) ){
                        $count++;
                        } if( is_active_sidebar( 'sidebar-4' ) ){ 
                            $count++;
                        } if( is_active_sidebar( 'sidebar-5' ) ){
                            $count++;
                        }
                        $colum = 12/$count;
                        for($i = 1, $j=2; $i<=$count; $i++){
                            ?>
                            <div class="col-lg-<?php echo esc_attr($colum); ?>">
                            <?php
                            $sidebar = 'sidebar-'.$j;
                            dynamic_sidebar( $sidebar );
                            $j++;
                        ?>
                            </div>
                        <?php    
                        }

                      ?>
                    </div>
                </div>
            </div>    
            <!-- Footer Top/Widget Area End -->
            <?php } ?>
                <!-- Footer Bottom Start -->
                <div class="consulte-footer-bottom" <?php if(!empty(get_option( 'consulte_footer_copyright_bg_color' ))){ ?>  data-bg-color="<?php echo esc_url( get_option( 'consulte_footer_copyright_bg_color' )); ?>" <?php } ?>>
                    <div class="container">

                        <?php  

                        $social_links = [];
                        if(''!= get_option('consulte_company_facebook_link','#' )){
                            $social_links['facebook'] = get_option('consulte_company_facebook_link','#' );
                        }
                         if(''!= get_option('consulte_company_instagram_link','#' )){
                            $social_links['instagram'] = get_option('consulte_company_instagram_link','#' );
                        }
                         if(''!= get_option('consulte_company_twitter_link','#' )){
                            $social_links['twitter'] = get_option('consulte_company_twitter_link','#' );
                        }
                         if(''!= get_option('consulte_company_youtube_link','#' )){
                            $social_links['youtube'] = get_option('consulte_company_youtube_link','#' );
                        }

                        ?>

                        <div class="row justify-content-<?php if ( $social_links ) { echo'between';}else{ echo 'center';} ?>">
                            <div class="col-lg-auto col-12">
                            <p class="consulte-copyright"> <?php
                                    if ( !empty( get_option( 'consulte_footer_copyright_text' ) )  ) { echo wp_kses_post( get_option( 'consulte_footer_copyright_text' ) );
                                } else { esc_html_e('Copyright', 'consulte'); ?> &copy; <?php echo date("Y").' '.get_bloginfo('name');  esc_html_e('. All Rights Reserved.', 'consulte' );}
                                ?></p>
                            </div>
                            <?php 

                             if ( $social_links ) {

                             ?>

                            <div class="col-lg-auto col-12">
                                <div class="consulte-footer-link">
                                    <ul class="consulte-footer-social">

                                        <?php if(''!= get_option('consulte_company_facebook_link','#' ) ): ?>
                                        <li>
                                            <a href="<?php echo esc_url( $social_links['facebook'] ); ?>"><i class="icofont-facebook"></i></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( ''!= get_option('consulte_company_instagram_link','#' ) ): ?>
                                        <li><a href="<?php echo esc_url( $social_links['instagram'] ); ?>"><i class="icofont-instagram"></i></a></li>
                                        <?php endif; ?>

                                        <?php if(''!= get_option('consulte_company_twitter_link','#' ) ): ?>
                                        <li><a href="<?php echo esc_url( $social_links['twitter'] ); ?>"><i class="icofont-twitter"></i></a></li>
                                        <?php endif; ?>

                                        <?php if(''!= get_option('consulte_company_youtube_link','#' ) ): ?>
                                        <li><a href="<?php echo esc_url( $social_links['youtube'] ); ?>"><i class="icofont-play-alt-1"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                        <?php  } ?>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom End -->

            </div>
    </div><!-- #content -->
</div><!-- #page -->
    <!-- Search Popup -->
    <div class="search-popup">
        <button class="close-search style-two"><span class="icofont-brand-nexus"></span></button>
        <button class="close-search"><span class="icofont-arrow-up"></span></button>

        <form id="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
            <div class="form-group">
                <input type="text" name="s" class="input-text" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'consulte' ); ?>" required="" />
                <input type="hidden" name="post_type" value="post" />
                <button><i class="icon icofont-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Header Search -->
<?php wp_footer(); ?>

</body>
</html>
