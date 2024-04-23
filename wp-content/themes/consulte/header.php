<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consulte
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

<div id="page" class="site">
    
    <div class="consulte-header">
        <div class="consulte-header-inner">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Logo Start -->
                    <div class="col-lg-2 col-sm-5 col-5">
                        <div class="consulte-logo">
                            <?php
                                if( has_custom_logo() ){
                                    the_custom_logo(); 
                                }else {
                                ?>
                                    <h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
                                <?php
                                 $description = get_bloginfo( 'description', 'display' );
                                    if ( $description || is_customize_preview() ) { ?> 
                                        <p class="site-description"><?php echo esc_html( $description ); ?> </p> 
                                    <?php } 
                            }
          
                            ?>
                        </div>
                    </div>
                    <!-- Logo End -->

                    <!-- Menu & Button Start -->
                    <div class="col-lg-10 col-sm-7 col-7">
                        <div class="row align-items-center">
                            <div class="col position-static d-none d-lg-block">
                                <nav class="consulte-menu <?php if( get_option( 'consulte_userlogin_show_hide' ) == false){echo"consulte-menu-right";}  ?>" >
                                    <?php
                                        if (has_nav_menu('main-menu')) {
                                        wp_nav_menu( array(
                                        'theme_location' => 'main-menu',
                                        'container' => false,
                                        'menu_class' => 'consulte-nav',
                                        'walker' => new consulte_Walker_Nav_Menu(),
                                        'device' => 'desktop'
                                        ) );
                                        }
                                    ?>
                                </nav>
                            </div>

                        <?php if( !empty(get_option( 'consulte_pre_button_text' ))): ?>
                            <div class="col-auto d-none d-sm-block">
                                <?php echo consulte_button( 'consulte_pre_button_text','consulte_pre_button_link' ); ?>
                            </div>
                        <?php endif; ?>
                    <?php
                   
                     if( get_option( 'consulte_userlogin_show_hide' ) == true): ?>
                         <!-- Search Btn -->
                        <div class="col-auto ">
                            <div class="consulte-login">
                                <div class="search-box-btn search-box-outer">
                                    <span class="icon icofont-search"></span>
                                </div>
                             </div> 
                        </div>
                    <?php endif; ?>
                            <div class="col-auto d-lg-none">
                                <div class="consulte-mobile-menu-toggle">
                                    <button class="toggle">
                                        <i class="icon-top"></i>
                                        <i class="icon-middle"></i>
                                        <i class="icon-bottom"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu & Button End -->
                </div>
            </div>
        </div>
    </div>

    <div id="consulte-site-main-mobile-menu" class="consulte-site-main-mobile-menu">
        <div class="consulte-mobile-menu-header">
            <div class="consulte-mobile-menu-logo">
                    <?php
                        if( has_custom_logo() ){
                            the_custom_logo(); 
                        }else{
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php
                            bloginfo( 'name' );
                            ?>
                            </a>
                        <?php
                        }
                    ?>
            </div>
            <div class="consulte-mobile-menu-close">
                <button class="toggle">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="consulte-mobile-menu-content">
            <nav class="consulte-site-mobile-menu">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'menu_class'     => 'consulte-nav',
                        'walker'         => new consulte_Walker_Nav_Menu(),
                        'device'         => 'mobile'
                    ) );
                ?>
            </nav>
        </div>
    </div>

    <!-- Page Header Section Start -->


    <?php
    $hide_page_title_page='';
        $hide_page_title_page =  get_option('consulte_hide_page_title_page' );
        if ( $hide_page_title_page == true ){
        if( !is_front_page() && !is_page() && !is_404() ){
            get_template_part('/template-parts/page-title'); 
        }}else{
          if( !is_front_page() && !is_404() ){
            get_template_part('/template-parts/page-title'); 
        }  
        }
    ?>
    <!-- Page Header Section End -->

    <div id="content" class="site-content">
        