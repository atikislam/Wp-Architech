<?php
/**
 * WP Architech Theme Helper Functions
 *
 * @package WP_Architech
 */

/**
 * Get header logo URL
 */
function wp_architech_get_header_logo() {
    return get_theme_mod( 'header_logo', '' );
}

/**
 * Get footer logo URL
 */
function wp_architech_get_footer_logo() {
    return get_theme_mod( 'footer_logo', '' );
}

/**
 * Get footer description
 */
function wp_architech_get_footer_description() {
    return get_theme_mod( 'footer_description', 'Contra and layouts, in content of dummy text is nonsensical.typefaces of dummy text is appearance of different general the content of dummy text is nonsensical. typefaces of dummy text is nonsensical.' );
}

/**
 * Get footer menu title
 */
function wp_architech_get_footer_menu_title() {
	return get_theme_mod( 'footer_menu_title', 'Useful links' );
}

/**
 * Get footer menu ID
 */
function wp_architech_get_footer_menu() {
	return get_theme_mod( 'footer_menu', '' );
}

/**
 * Get copyright text
 */
function wp_architech_get_copyright_text() {
    return get_theme_mod( 'copyright_text', 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.' );
}

/**
 * Get social media URL
 */
function wp_architech_get_social_url( $network ) {
    return get_theme_mod( 'social_' . $network, '' );
}

/**
 * Get all social media networks
 */
function wp_architech_get_social_networks() {
    return array(
        'facebook' => array(
            'name' => __( 'Facebook', 'wp-architech' ),
            'icon' => 'fa fa-facebook',
            'url' => wp_architech_get_social_url( 'facebook' )
        ),
        'twitter' => array(
            'name' => __( 'Twitter', 'wp-architech' ),
            'icon' => 'fa fa-twitter',
            'url' => wp_architech_get_social_url( 'twitter' )
        ),
        'instagram' => array(
            'name' => __( 'Instagram', 'wp-architech' ),
            'icon' => 'fa fa-instagram',
            'url' => wp_architech_get_social_url( 'instagram' )
        ),
        'linkedin' => array(
            'name' => __( 'LinkedIn', 'wp-architech' ),
            'icon' => 'fa fa-linkedin',
            'url' => wp_architech_get_social_url( 'linkedin' )
        ),
        'youtube' => array(
            'name' => __( 'YouTube', 'wp-architech' ),
            'icon' => 'fa fa-youtube',
            'url' => wp_architech_get_social_url( 'youtube' )
        )
    );
}

/**
 * Check if social media links should be displayed
 */
function wp_architech_has_social_links() {
    $social_networks = wp_architech_get_social_networks();
    foreach ( $social_networks as $network ) {
        if ( ! empty( $network['url'] ) ) {
            return true;
        }
    }
    return false;
}

/**
 * Get menu colors for CSS
 */
function wp_architech_get_menu_colors() {
    return array(
        'text' => get_theme_mod( 'menu_text_color', '#333333' ),
        'hover' => get_theme_mod( 'menu_hover_color', '#007cba' ),
        'active' => get_theme_mod( 'menu_active_color', '#007cba' )
    );
}

/**
 * Display header logo with fallback
 */
function wp_architech_header_logo() {
    $logo_url = wp_architech_get_header_logo();
    if ( $logo_url ) {
        echo '<img src="' . esc_url( $logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '">';
    } else {
        echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
    }
}

/**
 * Display footer logo with fallback
 */
function wp_architech_footer_logo() {
    $logo_url = wp_architech_get_footer_logo();
    if ( $logo_url ) {
        echo '<img src="' . esc_url( $logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '">';
    } else {
        echo '<h3>' . get_bloginfo( 'name' ) . '</h3>';
    }
}

/**
 * Display social media links
 */
function wp_architech_social_links() {
    $social_networks = wp_architech_get_social_networks();
    
    foreach ( $social_networks as $network ) {
        if ( ! empty( $network['url'] ) ) {
            echo '<li><a href="' . esc_url( $network['url'] ) . '" target="_blank" rel="noopener noreferrer" title="' . esc_attr( $network['name'] ) . '"><i class="' . esc_attr( $network['icon'] ) . '"></i></a></li>';
        }
    }
}
