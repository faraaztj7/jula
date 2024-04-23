<?php

if(!function_exists('consulte_custom_css')){

    function consulte_custom_css(){

      if ( !empty( get_option('consulte_theme_pry_color') )){
        $theme_pry_color = get_option('consulte_theme_pry_color');
      }

      if ( !empty( get_option('consulte_theme_sery_color') )){
        $theme_sery_color = get_option('consulte_theme_sery_color');
      }


      if ( !empty( get_option('consulte_header_bgcolor') )){
        $header_bgcolor = get_option('consulte_header_bgcolor');
      }
      if ( !empty( get_option('consulte_header_menu_color') )){
        $header_menu_color = get_option('consulte_header_menu_color');
      }
      if ( !empty( get_option('consulte_header_menu_hover_color') )){
        $header_menu_hover_color = get_option('consulte_header_menu_hover_color');
      }

      // Button Style
      if ( !empty( get_option('consulte_button_bgcolor') )){
        $button_bgcolor = get_option('consulte_button_bgcolor');
      }
      if ( !empty( get_option('consulte_button_color') )){
        $button_color = get_option('consulte_button_color');
      }
      if ( !empty( get_option('consulte_button_bg_hover_color') )){
        $button_bg_hover_color = get_option('consulte_button_bg_hover_color');
      }

      if ( !empty( get_option('consulte_login_color') )){
        $login_color = get_option('consulte_login_color');
      }
      if ( !empty( get_option('consulte_login_hover_color') )){
        $login_hover_color = get_option('consulte_login_hover_color');
      }

      // Page title color
      if ( !empty( get_option('consulte_page_title_color') )){
        $page_title_color = get_option('consulte_page_title_color');
      }
      if ( !empty( get_option('consulte_breadcrumb_color') )){
        $breadcrumb_color = get_option('consulte_breadcrumb_color');
      }
      if ( !empty( get_option('consulte_breadcrumb_color_hover') )){
        $breadcrumb_color_hover = get_option('consulte_breadcrumb_color_hover');
      }

      // Footer css
      if ( !empty( get_option('consulte_footer_widgets_title_color') )){
        $footer_widgets_title_color = get_option('consulte_footer_widgets_title_color');
      }
      if ( !empty( get_option('consulte_footer_widgets_content_color') )){
        $footer_widgets_content_color = get_option('consulte_footer_widgets_content_color');
      }
      if ( !empty( get_option('consulte_footer_widgets_link_hover_color') )){
        $footer_widgets_link_hover_color = get_option('consulte_footer_widgets_link_hover_color');
      }
      if ( !empty( get_option('consulte_footer_copyright_color') )){
        $footer_copyright_color = get_option('consulte_footer_copyright_color');
      }

      // Footer social
      if ( !empty( get_option('consulte_footer_social_color') )){
        $footer_social_color = get_option('consulte_footer_social_color');
      }
      if ( !empty( get_option('consulte_footer_social_hover_color') )){
        $footer_social_hover_color = get_option('consulte_footer_social_hover_color');
      }


       ?>     

         <!-- Custom Stylesheet -->

          <style type="text/css">

            /*Theme Primary color*/
            <?php if(!empty($theme_pry_color) ){ ?> 
              /*color*/
              a:hover, a:focus,.blog-search form button:hover,.consulte-blog-content >a, .consulte-category-list,
               .consulte-category-list a,.type-post.tag-sticky-2 .consulte-blog-content:before, .type-post.sticky .consulte-blog-content:before,.consulte-sidebar-widget ul li:hover >a,.widget_calendar tbody td#today,.widget-area .consulte-sidebar-widget select:focus,.widget-area .consulte-sidebar-widget select:active,
               .widget-area .consulte-sidebar-widget select:hover,.comment-reply-title small,.consulte-menu > ul > li:hover > a,.consulte-menu >ul > li >.sub-menu li:hover > a,.consulte-login a:hover,.consulte-page-breadcrumb li a:hover,.consulte-footer-widget ul li:hover > a,.consulte-footer-widget-list ul li:hover > a, .consulte-footer-widget.widget_nav_menu ul li:hover > a,.blog-search form button:hover,.consulte-excerpt ul.wp-block-archives.wp-block-archives-list li:hover > a , .consulte-excerpt ul.wp-block-categories.wp-block-categories-list li:hover > a,.consulte-menu>ul>li.current-menu-item > a,.theme-color,.newsletter-form .form-btn:hover::after {
                color:<?php echo esc_attr( $theme_pry_color );?>;    
              }
              /*backgound color*/
              .comment-form input[type="submit"],.post-password-form input[type="submit"],blockquote,.consulte-footer-widget div.wpforms-container-full .wpforms-form button[type=submit],.consulte-header-btn,a.wp-block-button__link:hover,.consulte-excerpt .is-style-outline .wp-block-button__link:not(.has-text-color):hover,.wp-block-search .wp-block-search__button,.tagcloud>a:hover,.pnf-inner a.btn,.next-prev a:hover,.wp-block-tag-cloud a:hover,.search-popup .close-search{   
                background-color:<?php echo esc_attr( $theme_pry_color );?>;    
              }
              
            /*border color*/
              .comment-form input[type="submit"],.type-post.tag-sticky-2 .consulte-blog-content-area, .type-post.sticky .consulte-blog-content-area,.tagcloud>a:hover,.post-password-form input[type="submit"],.consulte-footer-widget div.wpforms-container-full .wpforms-form button[type=submit],.wp-block-search .wp-block-search__button,.pnf-inner a.btn,.tagcloud>a:hover,.wp-block-tag-cloud a:hover {   
                border-color:<?php echo esc_attr( $theme_pry_color );?>;    
              }
              /*menu dot color*/

              .consulte-menu >ul > li >.sub-menu li:hover > a::before{
                text-shadow: 8px 0 <?php echo esc_attr( $theme_pry_color );?>, -8px 0 <?php echo esc_attr( $theme_pry_color );?>;
              }


          <?php } ?>

            /*Theme Secondary color*/
            <?php if(!empty($theme_sery_color) ){ ?> 
              /*color*/
              .consulte-blog-content >a:hover,.consulte-category-list>a:hover {
                color:<?php echo esc_attr( $theme_sery_color );?>;    
              }
              /*backgound color*/
              .comment-form input[type="submit"]:hover,.comment-form input[type="submit"]:focus,.post-password-form input[type="submit"]:hover,.consulte-footer-widget div.wpforms-container-full .wpforms-form button[type=submit]:hover,.consulte-header-btn:hover,.wp-block-search .wp-block-search__button:hover,.pnf-inner a.btn:hover {   
                background-color:<?php echo esc_attr( $theme_sery_color );?>;    
              }
              
            /*border color*/
              .comment-form input[type="submit"]:hover,.comment-form input[type="submit"]:focus,.post-password-form input[type="submit"]:hover,.consulte-footer-widget div.wpforms-container-full .wpforms-form button[type=submit]:hover,.wp-block-search .wp-block-search__button:hover,.pnf-inner a.btn:hover {
                border-color:<?php echo esc_attr( $theme_sery_color );?>;    
              }
          <?php } ?>

          /*Header Color*/
            <?php if(!empty($header_bgcolor) ){ ?> 
              .consulte-header .consulte-header-inner{   
                background-color:<?php echo esc_attr( $header_bgcolor );?>;    
              }
          <?php } if(!empty( $header_menu_color) ){ ?> 
              .consulte-menu > ul > li > a{
                color:<?php echo esc_attr( $header_menu_color );?>;    
              }
          <?php } if(!empty( $header_menu_hover_color) ){ ?> 
              .consulte-menu > ul > li:hover > a,.consulte-menu >ul > li >.sub-menu li:hover > a,.consulte-menu>ul>li.current-menu-item > a{
                color:<?php echo esc_attr( $header_menu_hover_color );?>;  
              }
              .consulte-menu > ul > li > a .text::before{
                background-color:<?php echo esc_attr( $header_menu_hover_color );?>;  
              }
              /*menu dot color*/
              .consulte-menu >ul > li >.sub-menu li:hover > a::before{
                text-shadow: 8px 0 <?php echo esc_attr( $header_menu_hover_color );?>, -8px 0 <?php echo esc_attr( $header_menu_hover_color );?>;
              }

           <?php } ?>


           /*Button style*/
          <?php if(!empty( $button_bgcolor )){ ?> 
              .consulte-header-btn{
                background-color:<?php echo esc_attr( $button_bgcolor );?>;  
              }
           <?php } if(!empty( $button_color )){ ?> 
              .consulte-header-btn{
                color:<?php echo esc_attr( $button_color );?>;  
              } 
             <?php } if(!empty( $button_bg_hover_color )){ ?> 
              .consulte-header-btn:hover{
                background-color:<?php echo esc_attr( $button_bg_hover_color );?>;  
              } 
             <?php } if(!empty( $login_color )){ ?> 
              .consulte-login a,.consulte-login>i,.search-box-btn{
                color:<?php echo esc_attr( $login_color );?>;  
              } 
              <?php } if(!empty( $login_hover_color )){ ?> 
              .consulte-login a:hover,.search-box-btn:hover{
                color:<?php echo esc_attr( $login_hover_color );?>;  
              } 
              <?php } ?>

              /*Page title color*/
        <?php if(!empty( $page_title_color )){ ?> 
              .consulte-page-header-content .title{
                color:<?php echo esc_attr( $page_title_color );?>;  
              } 
              <?php }if(!empty( $breadcrumb_color )){ ?> 
              .consulte-page-breadcrumb li {
                color:<?php echo esc_attr( $breadcrumb_color );?>;  
              } 
              <?php }if(!empty( $breadcrumb_color_hover )){ ?> 
              .consulte-page-breadcrumb li a:hover {
                color:<?php echo esc_attr( $breadcrumb_color_hover );?>;  
              } 
              <?php } ?>

            /*Footer css*/
            <?php if(!empty( $footer_widgets_title_color )){ ?> 
              .consulte-footer-widget-title{   
                color:<?php echo esc_attr( $footer_widgets_title_color );?>;    
              }
          <?php }  if(!empty( $footer_widgets_content_color )){ ?> 
              .consulte-footer-widget ul li,.consulte-footer-widget ul li a,.consulte-footer-widget p,.consulte-footer-widget b, .consulte-footer-widget strong,.consulte-footer-top,.consulte-footer-top .widget_calendar thead th,.consulte-footer-top .widget_calendar caption,.consulte-footer-widget-list ul li a, .consulte-footer-widget.widget_nav_menu ul li a{
                color:<?php echo esc_attr( $footer_widgets_content_color );?>;    
                }
        <?php } if(!empty( $footer_widgets_link_hover_color )){ ?> 

             .consulte-footer-widget ul li:hover > a,.consulte-footer-widget-list ul li:hover > a, .consulte-footer-widget.widget_nav_menu ul li:hover > a,.blog-search form button:hover{
                color:<?php echo esc_attr( $footer_widgets_link_hover_color );?>;    
                }
                .consulte-footer-widget .tagcloud>a:hover{
                  border-color: <?php echo esc_attr( $footer_widgets_link_hover_color );?>;
                  background-color: <?php echo esc_attr( $footer_widgets_link_hover_color );?>;
                }
        <?php } if(!empty( $footer_copyright_color )){ ?> 
             .consulte-copyright{
                color:<?php echo esc_attr( $footer_copyright_color );?>;    
                }
        <?php } if(!empty( $footer_social_color )){ ?> 
             ul.consulte-footer-social li a{
                color:<?php echo esc_attr( $footer_social_color );?>;    
                }
        <?php } if(!empty( $footer_social_hover_color )){ ?> 
             ul.consulte-footer-social li a:hover{
                color:<?php echo esc_attr( $footer_social_hover_color );?>;    
                }
        <?php } ?>

          </style>

      <?php

      }
  }


add_action( 'wp_head', 'consulte_custom_css'  ) ;