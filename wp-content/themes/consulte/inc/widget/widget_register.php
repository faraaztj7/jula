<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function consulte_widgets_init(){

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar ', 'consulte' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'consulte' ),
        'before_widget' => '<div id="%1$s" class="consulte-sidebar-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="consulte-sidebar-widget-title">',
        'after_title'   => '</h4>',
    ) );

    $footer_columns = 4;
    $j = 1;
    for( $i = 1; $i <= $footer_columns; $i++ ){
        $j++;
        register_sidebar( array(
            'name'          => esc_html__( 'Footer ', 'consulte' ) . esc_html( $i ),
            'id'            => 'sidebar-'.$j,
            'description'   => esc_html__( 'Add widgets here.', 'consulte' ),
            'before_widget' => '<div id="%1$s" class="consulte-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="consulte-footer-widget-title">',
            'after_title'   => '</h4>',
        ) );
    }

}
add_action( 'widgets_init', 'consulte_widgets_init' );