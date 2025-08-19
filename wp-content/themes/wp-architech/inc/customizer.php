<?php
/**
 * WP Architech Theme Customizer
 *
 * @package WP_Architech
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_architech_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wp_architech_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wp_architech_customize_partial_blogdescription',
			)
		);
	}

	// Header Section
	$wp_customize->add_section( 'header_settings', array(
		'title'       => __( 'Header Settings', 'wp-architech' ),
		'priority'    => 30,
		'capability'  => 'edit_theme_options',
		'description' => __( 'Customize your header appearance and colors.', 'wp-architech' ),
	) );

	// Header Logo
	$wp_customize->add_setting( 'header_logo', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'       => __( 'Header Logo', 'wp-architech' ),
		'description' => __( 'Upload a logo for the header. Recommended size: 250x80px', 'wp-architech' ),
		'section'     => 'header_settings',
		'settings'    => 'header_logo',
	) ) );

	// Menu Text Color
	$wp_customize->add_setting( 'menu_text_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
		'label'       => __( 'Menu Text Color', 'wp-architech' ),
		'description' => __( 'Choose the color for menu text', 'wp-architech' ),
		'section'     => 'header_settings',
		'settings'    => 'menu_text_color',
	) ) );

	// Menu Hover Color
	$wp_customize->add_setting( 'menu_hover_color', array(
		'default'           => '#007cba',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color', array(
		'label'       => __( 'Menu Hover Color', 'wp-architech' ),
		'description' => __( 'Choose the color for menu hover state', 'wp-architech' ),
		'section'     => 'header_settings',
		'settings'    => 'menu_hover_color',
	) ) );

	// Active Menu Color
	$wp_customize->add_setting( 'menu_active_color', array(
		'default'           => '#007cba',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active_color', array(
		'label'       => __( 'Menu Active Color', 'wp-architech' ),
		'description' => __( 'Choose the color for active menu items', 'wp-architech' ),
		'section'     => 'header_settings',
		'settings'    => 'menu_active_color',
	) ) );

	// Footer Section
	$wp_customize->add_section( 'footer_settings', array(
		'title'       => __( 'Footer Settings', 'wp-architech' ),
		'priority'    => 35,
		'capability'  => 'edit_theme_options',
		'description' => __( 'Customize your footer content and appearance.', 'wp-architech' ),
	) );

	// Footer Logo
	$wp_customize->add_setting( 'footer_logo', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
		'label'       => __( 'Footer Logo', 'wp-architech' ),
		'description' => __( 'Upload a logo for the footer. Recommended size: 200x60px', 'wp-architech' ),
		'section'     => 'footer_settings',
		'settings'    => 'footer_logo',
	) ) );

	// Footer Description
	$wp_customize->add_setting( 'footer_description', array(
		'default'           => 'Contra and layouts, in content of dummy text is nonsensical.typefaces of dummy text is appearance of different general the content of dummy text is nonsensical. typefaces of dummy text is nonsensical.',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'footer_description', array(
		'label'       => __( 'Footer Description', 'wp-architech' ),
		'description' => __( 'Add a description for your footer', 'wp-architech' ),
		'section'     => 'footer_settings',
		'type'        => 'textarea',
		'settings'    => 'footer_description',
	) );

	// Footer Menu Title
	$wp_customize->add_setting( 'footer_menu_title', array(
		'default'           => 'Useful links',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'footer_menu_title', array(
		'label'       => __( 'Footer Menu Title', 'wp-architech' ),
		'description' => __( 'Customize the title for the footer menu section', 'wp-architech' ),
		'section'     => 'footer_settings',
		'type'        => 'text',
		'settings'    => 'footer_menu_title',
	) );

	// Footer Menu
	$wp_customize->add_setting( 'footer_menu', array(
		'default'           => '',
		'sanitize_callback' => 'wp_architech_sanitize_menu',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'footer_menu', array(
		'label'       => __( 'Footer Menu', 'wp-architech' ),
		'description' => __( 'Select a menu to display in the footer', 'wp-architech' ),
		'section'     => 'footer_settings',
		'type'        => 'select',
		'choices'     => wp_architech_get_menus_list(),
		'settings'    => 'footer_menu',
	) );

	// Copyright Text
	$wp_customize->add_setting( 'copyright_text', array(
		'default'           => 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'copyright_text', array(
		'label'       => __( 'Copyright Text', 'wp-architech' ),
		'description' => __( 'Customize the copyright text in the footer', 'wp-architech' ),
		'section'     => 'footer_settings',
		'type'        => 'text',
		'settings'    => 'copyright_text',
	) );

	// Social Media Links
	$social_networks = array(
		'facebook'  => __( 'Facebook', 'wp-architech' ),
		'twitter'   => __( 'Twitter', 'wp-architech' ),
		'instagram' => __( 'Instagram', 'wp-architech' ),
		'linkedin'  => __( 'LinkedIn', 'wp-architech' ),
		'youtube'   => __( 'YouTube', 'wp-architech' ),
	);

	foreach ( $social_networks as $network => $label ) {
		$wp_customize->add_setting( 'social_' . $network, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		) );

		$wp_customize->add_control( 'social_' . $network, array(
			'label'       => sprintf( __( '%s URL', 'wp-architech' ), $label ),
			'description' => sprintf( __( 'Enter your %s profile URL', 'wp-architech' ), $label ),
			'section'     => 'footer_settings',
			'type'        => 'url',
			'settings'    => 'social_' . $network,
		) );
	}

	// Site Identity Section - Move logo here for better organization
	if ( $wp_customize->get_control( 'custom_logo' ) ) {
		$wp_customize->get_control( 'custom_logo' )->section = 'header_settings';
		$wp_customize->get_control( 'custom_logo' )->priority = 5;
		$wp_customize->get_control( 'custom_logo' )->label = __( 'Site Logo (Alternative)', 'wp-architech' );
		$wp_customize->get_control( 'custom_logo' )->description = __( 'Alternative logo option that works with WordPress core features', 'wp-architech' );
	}

	// Transport method for live preview
	if ( $wp_customize->selective_refresh ) {
		$wp_customize->selective_refresh->add_partial( 'header_logo', array(
			'selector'        => '.logo img',
			'render_callback' => 'wp_architech_customize_partial_header_logo',
		) );
	}
}
add_action( 'customize_register', 'wp_architech_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wp_architech_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wp_architech_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_architech_customize_preview_js() {
	wp_enqueue_script( 'wp-architech-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'wp_architech_customize_preview_js' );

/**
 * Sanitize menu selection
 */
function wp_architech_sanitize_menu( $input ) {
	$menus = wp_get_nav_menus();
	$valid_menus = array( '' => __( '-- Select Menu --', 'wp-architech' ) );
	
	foreach ( $menus as $menu ) {
		$valid_menus[ $menu->term_id ] = $menu->name;
	}
	
	if ( array_key_exists( $input, $valid_menus ) ) {
		return $input;
	}
	
	return '';
}

/**
 * Get list of available menus
 */
function wp_architech_get_menus_list() {
	$menus = wp_get_nav_menus();
	$menu_list = array( '' => __( '-- Select Menu --', 'wp-architech' ) );
	
	foreach ( $menus as $menu ) {
		$menu_list[ $menu->term_id ] = $menu->name;
	}
	
	return $menu_list;
}

/**
 * Customize partial for header logo
 */
function wp_architech_customize_partial_header_logo() {
	$logo_url = get_theme_mod( 'header_logo' );
	if ( $logo_url ) {
		echo '<img src="' . esc_url( $logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '">';
	} else {
		echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
	}
}

/**
 * Output custom CSS for menu colors
 */
function wp_architech_customizer_css() {
	$menu_text_color = get_theme_mod( 'menu_text_color', '#333333' );
	$menu_hover_color = get_theme_mod( 'menu_hover_color', '#007cba' );
	$menu_active_color = get_theme_mod( 'menu_active_color', '#007cba' );
	
	$css = "
	<style type='text/css'>
		.main-menu a,
		.main-menu .navigation a {
			color: {$menu_text_color} !important;
		}
		
		.main-menu a:hover,
		.main-menu .navigation a:hover {
			color: {$menu_hover_color} !important;
		}
		
		.main-menu .current-menu-item a,
		.main-menu .current-menu-item a:hover,
		.main-menu .current_page_item a,
		.main-menu .current_page_item a:hover {
			color: {$menu_active_color} !important;
		}
		
		.main-menu .navigation .current-menu-item > a,
		.main-menu .navigation .current_page_item > a {
			color: {$menu_active_color} !important;
		}
	</style>";
	
	echo $css;
}
add_action( 'wp_head', 'wp_architech_customizer_css' );
