<?php
function consulte_import_files() {

  return array(

    array(
      'import_file_name'           	 => esc_html__('Standard Demo', 'consulte'),
      'local_import_file'            => get_template_directory() . '/inc/import-data/default/all_content.xml',
      'local_import_widget_file'     => get_template_directory() . '/inc/import-data/default/widgets.wie',
      'local_import_customizer_file' => get_template_directory() . '/inc/import-data/default/customizer.dat',

      'import_preview_image_url'     => get_template_directory_uri().'/screenshot.png',
      'import_notice'                => __( 'After you import this demo, you will have setup all content.', 'consulte' ),
    ),
        array(
      'import_file_name'             => 'CommingSoon',
      'local_import_file'            => get_template_directory() . '/inc/import-data/default/all_content.xml',
      'import_widget_file_url'       => get_template_directory() . '/inc/import-data/default/widgets.wie',
      'local_import_customizer_file' => get_template_directory() . '/inc/import-data/default/customizer.dat',
      
      ),
      'import_preview_image_url'     => get_template_directory_uri() .'/screenshot.png',

  );

}
add_filter( 'pt-ocdi/import_files', 'consulte_import_files' );


function consulte_after_import_setup() {
	// set front page
	$front_page_id = get_page_by_title( 'Home' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );

	// set blog page
	$blog_page_id  = get_page_by_title( 'Blog' );
	update_option( 'page_for_posts', $blog_page_id->ID );


	// assign quick menu location
	$primary_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$extra_header_menu = get_term_by( 'name', 'Extra Header Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations' , array( 
			'main-menu' => $primary_menu->term_id,
			'extra-header-menu' => $extra_header_menu->term_id,
		)
	);

	// disable elementor color
	update_option('elementor_disable_color_schemes', 'yes');

	// disable elementor font
	update_option('elementor_disable_typography_schemes', 'yes');

	// set content width
	update_option('elementor_container_width', '1170');

	// set widget space
	update_option('elementor_space_between_widgets', '30');

	// set tablet breakpoint
	update_option('elementor_viewport_lg', '992');

	// disable lightbox
	update_option('elementor_global_image_lightbox', '');
    
    flush_rewrite_rules();
}
add_action( 'pt-ocdi/after_import', 'consulte_after_import_setup' );
