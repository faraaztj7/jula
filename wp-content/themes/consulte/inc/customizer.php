<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class consulte_Customizer{

    public $prefixid = 'consulte_';

    private static $_instance = null;
    public static function instance(){
        if( is_null( self::$_instance ) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function __construct(){
        add_action( 'customize_register', [ $this, 'add_settings' ], 999 );
        add_action( 'customize_register', [ $this, 'add_controls' ], 999 );
    }

    public function add_settings( $wp_customize ) {
        foreach ( $this->get_setting_controls() as $setting_key => $setting ) {
            $wp_customize->add_setting( $this->prefixid . $setting_key, array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'transport'         => isset( $setting['transport'] ) ? $setting['transport'] : 'postMessage',
                'default'           => isset( $setting['default'] ) ? $setting['default'] : '',
                'sanitize_callback' => isset( $setting['sanitize_callback'] ) ? array( 'consulte_Sanitize', $setting['sanitize_callback'] ) : '',
            ) );
        }
    }

    // Add Control
    public function add_controls( $wp_customize ){

        foreach ( $this->get_setting_controls() as $setting_key => $setting ) {
            
            // Add Section
            $this->section_add( $wp_customize, $setting );

            // Get control class name (none, color, upload, image)
            $control_class = isset( $setting['control_type'] ) ? ucfirst( $setting['control_type'] ) . '_' : '';
            $control_class = 'WP_Customize_' . $control_class . 'Control';

            // Control Configuration
            $control_config = array(
                'label'    => $setting['title'],
                'settings' => $this->prefixid . $setting_key,
                'priority' => isset( $setting['priority'] ) ? $setting['priority'] : 10,
            );

            // Description
            if ( ! empty( $setting['description'] ) ) {
                $control_config['description'] = $setting['description'];
            }

            // Add control to section
            if ( ! empty( $setting['section'] ) ) {
                $control_config['section'] = $this->prefixid . $setting['section'];
            }

            // Add custom field type
            if ( ! empty( $setting['type'] ) ) {
                $control_config['type'] = $setting['type'];
            }

            // Add select field options
            if ( ! empty( $setting['choices'] ) ) {
                $control_config['choices'] = $setting['choices'];
            }
            // Input attributese
            if ( ! empty( $setting['input_attrs'] ) ) {
                $control_config['input_attrs'] = $setting['input_attrs'];
            }

            // Repeater controls:
            if ( ! empty( $setting['customizer_repeater_image_control'] ) ) {
                $control_config['customizer_repeater_image_control'] = $setting['customizer_repeater_image_control'];
            }
            if ( ! empty( $setting['customizer_repeater_icon_control'] ) ) {
                $control_config['customizer_repeater_icon_control'] = $setting['customizer_repeater_icon_control'];
            }
            if ( ! empty( $setting['customizer_repeater_title_control'] ) ) {
                $control_config['customizer_repeater_title_control'] = $setting['customizer_repeater_title_control'];
            }
            if ( ! empty( $setting['customizer_repeater_link_control'] ) ) {
                $control_config['customizer_repeater_link_control'] = $setting['customizer_repeater_link_control'];
            }

            $wp_customize->add_control( new $control_class( $wp_customize, $this->prefixid . $setting_key, $control_config ) );

        }

    }

    // Section add
    public function section_add( $wp_customize, $fields ){
        // Get sections
        $sections = $this->get_sections();
        if ( ! empty( $fields['section'] ) && isset( $sections[ $fields['section'] ] ) ) {
            // Section key
            $section_key = $fields['section'];
            // Data Reference from section
            $section = $sections[ $section_key ];
            // Section config
            $section_config = array(
                'title'     => $section['title'],
                'priority'  => ( isset( $section['priority'] ) ? $section['priority'] : 10 ),
            );
            // Description
            if ( ! empty( $section['description'] ) ) {
                $section_config['description'] = $section['description'];
            }

            // Add Panel
            $this->panel_add( $wp_customize, $section );

            // Add Section to panel
            if ( ! empty( $section['panel'] ) ) {
                $section_config['panel'] = $this->prefixid . $section['panel'];
            }

            // Register section
            $wp_customize->add_section( $this->prefixid . $section_key, $section_config );
        }
    }

    // Panel Add
    public function panel_add( $wp_customize, $fieldssection ){
        // Panel List
        $panels = $this->get_panels();
        if ( ! empty( $fieldssection['panel'] ) && isset( $panels[ $fieldssection['panel'] ] ) ) {
            
            // Reference current panel key
            $panel_key = $fieldssection['panel'];
            // Data Reference from panel
            $panel = $panels[ $panel_key ];

            // Panel config
            $panel_config = array(
                'title'         => $panel['title'],
                'priority'      => ( isset( $panel['priority'] ) ? $panel['priority'] : 10 ),
            );
            // Panel description
            if ( ! empty( $panel['description'] ) ) {
                $panel_config['description'] = $panel['description'];
            }
            // Register panel
            $wp_customize->add_panel( $this->prefixid . $panel_key, $panel_config );

        }
    }

    // Panel List
    public function get_panels(){
        $panels = array(
            // Penel.
            'consulte_panel' => array(
                'title'    => esc_html__( 'Consulte Theme Options', 'consulte' ),
                'priority' => 170,
            ),
        );
        return $panels;
    }
    // Sections
    public function get_sections(){
        $sections = array(
            'theme_color_settings' => array(
                'title'    => esc_html__( 'Theme Color Settings', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 10,
            ),
            'header_settings' => array(
                'title'    => esc_html__( 'Header Settings', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 10,
            ),
            'premium_btn_settings' => array(
                'title'    => esc_html__( 'Menu Button', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 10,
            ),            
            'page_title_settings' => array(
                'title'    => esc_html__( 'Page Title Settings', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 10,
            ),
            
            'blogs_settings' => array(
                'title'    => esc_html__( 'Blog layout Settings', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 10,
            ),
            
            'footer_settings' => array(
                'title'    => esc_html__( 'Footer Settings', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 15,
            ), 

            'error_settings' => array(
                'title'    => esc_html__( '404 Page Settings', 'consulte' ),
                'panel' => 'consulte_panel',
                'priority'  => 20,
            ),

        );
        return $sections;
    }


    // Settings Controll Field
    public function get_setting_controls(){
        $controls = array();

        $controls['theme_pry_color'] = array(
            'title' => esc_html__('Theme Primary Color','consulte'),
            'section'   => 'theme_color_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );
            $controls['theme_sery_color'] = array(
            'title' => esc_html__('Theme Secondary Color','consulte'),
            'section'   => 'theme_color_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );

        $controls['header_bgcolor'] = array(
            'title' => esc_html__('Header BG Color','consulte'),
            'section'   => 'header_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );        
        $controls['header_menu_color'] = array(
            'title' => esc_html__('Header Menu Color','consulte'),
            'section'   => 'header_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );
        $controls['header_menu_hover_color'] = array(
            'title' => esc_html__('Header Menu Hover Color','consulte'),
            'section'   => 'header_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );

        $controls['pre_button_text'] = array(
            'title' => esc_html__('Button Text','consulte'),
            'section'   => 'premium_btn_settings',
            'type'   => 'text',
            'default'     => esc_html__( '','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>10,
        );

        $controls['pre_button_link'] = array(
            'title' => esc_html__('Button Link','consulte'),
            'section'   => 'premium_btn_settings',
            'type'   => 'text',
            'default'     => esc_html__( '#','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>10,
        );
        $controls['button_bgcolor'] = array(
            'title' => esc_html__('Button BG Color','consulte'),
            'section'   => 'premium_btn_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );
        $controls['button_color'] = array(
            'title' => esc_html__('Button Color','consulte'),
            'section'   => 'premium_btn_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );
        $controls['button_bg_hover_color'] = array(
            'title' => esc_html__('Button Hover BG Color','consulte'),
            'section'   => 'premium_btn_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );

        $controls['userlogin_show_hide'] = array(
            'title' => esc_html__('Show Search Button','consulte'),
            'section'   => 'premium_btn_settings',
            'type'   => 'checkbox',
            'default'     => true,
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>10,
        );
        $controls['login_color'] = array(
            'title' => esc_html__('Search Button Color','consulte'),
            'section'   => 'premium_btn_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );        
        $controls['login_hover_color'] = array(
            'title' => esc_html__('Search Button Hover Color','consulte'),
            'section'   => 'premium_btn_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>10,
        );

        // page title 
        $controls['page_title_bgimage'] = array(
            'title' => esc_html__('Background Image','consulte'),
            'section'   => 'page_title_settings',
            'control_type'=> 'image',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>15,
        );
        $controls['page_title_bgcolor'] = array(
            'title' => esc_html__('Background Color','consulte'),
            'section'   => 'page_title_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );
        $controls['page_title_color'] = array(
            'title' => esc_html__('Page Title Color','consulte'),
            'section'   => 'page_title_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );        
        $controls['breadcrumb_color'] = array(
            'title' => esc_html__('Breadcrumb Color','consulte'),
            'section'   => 'page_title_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );
        $controls['breadcrumb_color_hover'] = array(
            'title' => esc_html__('Breadcrumb Hover Color','consulte'),
            'section'   => 'page_title_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );
        $controls['hide_page_title_page'] = array(
            'title' => esc_html__('To Hide Page Title Section On Page','consulte'),
            'section'   => 'page_title_settings',
            'type'   => 'checkbox',
            'default'     => false,
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>15,
        );       

        // Blog setting
        $controls['show_read_more_button'] = array(
            'title' => esc_html__('Read More Button','consulte'),
            'section'   => 'blogs_settings',
            'type'   => 'checkbox',
            'default'     => true,
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>10,
        );
        $controls['read_more_text'] = array(
            'title' => esc_html__('Read More Button Text','consulte'),
            'section'   => 'blogs_settings',
            'type'   => 'text',
            'default'     => esc_html__( 'Read More','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>10,
        );        
        $controls['show_content'] = array(
            'title' => esc_html__('Blog Content','consulte'),
            'section'   => 'blogs_settings',
            'type'   => 'checkbox',
            'default'     => true,
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>10,
        );

        $controls['blog_prev_text'] = array(
            'title' => esc_html__('Prev Button Text','consulte'),
            'section'   => 'blogs_settings',
            'type'   => 'text',
            'default'     => esc_html__( 'Prev','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>15,
        );
        $controls['blog_next_text'] = array(
            'title' => esc_html__('Next Button Text','consulte'),
            'section'   => 'blogs_settings',
            'type'   => 'text',
            'default'     => esc_html__( 'Next','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>15,
        );
        // Footer Option
        $controls['footer_bgimage'] = array(
            'title' => esc_html__('Background Image','consulte'),
            'section'   => 'footer_settings',
            'control_type'=> 'image',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>15,
        );
        $controls['footer_bgcolor'] = array(
            'title' => esc_html__('Background Color','consulte'),
            'section'   => 'footer_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );

        $controls['footer_widgets_title_color'] = array(
            'title' => esc_html__('Widget Title Color','consulte'),
            'section'   => 'footer_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );
        $controls['footer_widgets_content_color'] = array(
            'title' => esc_html__('Widgets Content Color','consulte'),
            'section'   => 'footer_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );
        $controls['footer_widgets_link_hover_color'] = array(
            'title' => esc_html__('Widgets Link Hover Color','consulte'),
            'section'   => 'footer_settings',
            'type'=> 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'priority'=>15,
        );        


        // Copyright section

        $controls['footer_copyright_text'] = array(
            'title' => esc_html__('Footer Copyright Text','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'textarea',
            'default'     => sprintf( esc_html__('&copy; %1$s, %2$s','consulte'), date('Y'), esc_html__('Consulte Theme. All Rights Reserved. Built with Hasthemes.','consulte') ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,

        );
        $controls['footer_copyright_bg_color'] = array(
            'title' => esc_html__('Copyright BG Color','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,

        );
        $controls['footer_copyright_color'] = array(
            'title' => esc_html__('Copyright Text Color','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,

        );
        $controls['footer_social_color'] = array(
            'title' => esc_html__('Social Icon Color','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,

        );
        $controls['footer_social_hover_color'] = array(
            'title' => esc_html__('Social Icon Hover Color','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'color',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,

        );
        $controls['company_facebook_link'] = array(
            'title' => esc_html__('Facebook Link','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'text',
            'default'     => esc_html__( '#','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>30,
        );
        $controls['company_instagram_link'] = array(
            'title' => esc_html__('Instagram Link','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'text',
            'default'     => esc_html__( '#','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>30,
        );
        $controls['company_twitter_link'] = array(
            'title' => esc_html__('Twitter Link','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'text',
            'default'     => esc_html__( '#','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>30,
        );
        $controls['company_youtube_link'] = array(
            'title' => esc_html__('Youtube Link','consulte'),
            'section'   => 'footer_settings',
            'type'   => 'text',
            'default'     => esc_html__( '#','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>30,
        );

        
        // 404 Page Content

        $controls['error_page_text'] = array(
            'title' => esc_html__('404 Text','consulte'),
            'section'   => 'error_settings',
            'type'   => 'text',
            'default'     => esc_html__( '404','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,
        );
        $controls['error_page_title'] = array(
            'title' => esc_html__('404 Title','consulte'),
            'section'   => 'error_settings',
            'type'   => 'text',
            'default'     => esc_html__( 'PAGE NOT FOUND','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,
        );        
        $controls['error_page_content'] = array(
            'title' => esc_html__('404 Content','consulte'),
            'section'   => 'error_settings',
            'type'   => 'textarea',
            'default'     => esc_html__('The page you are looking for does not exist or has been moved.','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,

        );
        $controls['error_page_btn'] = array(
            'title' => esc_html__('404 Button Text','consulte'),
            'section'   => 'error_settings',
            'type'   => 'text',
            'default'     => esc_html__( 'Go back to Home Page','consulte' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_input',
            'priority'=>20,
        ); 




        return $controls;

    }

}

consulte_Customizer::instance();