/**
 * WP Architech Theme Customizer Live Preview
 *
 * @package WP_Architech
 */

(function($) {
    'use strict';

    // Menu Text Color
    wp.customize('menu_text_color', function(value) {
        value.bind(function(newval) {
            // Main menu items
            $('.main-menu > .navigation > ul > li > a, .main-menu .navigation > ul > li > a').css('color', newval);
            // Submenu items
            $('.main-menu .navigation ul ul a, .main-menu .navigation .sub-menu a, .main-menu .navigation .children a').css('color', newval);
        });
    });

    // Menu Hover Color
    wp.customize('menu_hover_color', function(value) {
        value.bind(function(newval) {
            // Main menu hover
            $('.main-menu > .navigation > ul > li > a:hover, .main-menu .navigation > ul > li > a:hover').css('color', newval);
            // Submenu hover
            $('.main-menu .navigation ul ul a:hover, .main-menu .navigation .sub-menu a:hover, .main-menu .navigation .children a:hover').css('color', newval);
        });
    });

    // Menu Active Color
    wp.customize('menu_active_color', function(value) {
        value.bind(function(newval) {
            $('.main-menu .current-menu-item > a, .main-menu .current_page_item > a, .main-menu .navigation .current-menu-item > a, .main-menu .navigation .current_page_item > a').css('color', newval);
        });
    });

    // Header Logo
    wp.customize('header_logo', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.logo img').attr('src', newval);
            } else {
                $('.logo img').replaceWith('<h1>' + wp.customize('blogname').get() + '</h1>');
            }
        });
    });

    // Footer Logo
    wp.customize('footer_logo', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.footer-logo img').attr('src', newval);
            } else {
                $('.footer-logo img').replaceWith('<h3>' + wp.customize('blogname').get() + '</h3>');
            }
        });
    });

    	// Footer Description
	wp.customize('footer_description', function(value) {
		value.bind(function(newval) {
			$('.about-widget .text').html(newval);
		});
	});

	// Footer Menu Title
	wp.customize('footer_menu_title', function(value) {
		value.bind(function(newval) {
			$('.links-widget .widget-title').html(newval);
		});
	});

    // Copyright Text
    wp.customize('copyright_text', function(value) {
        value.bind(function(newval) {
            $('.copyright-text p').html(newval);
        });
    });

    // Social Media Links
    var socialNetworks = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'];
    
    socialNetworks.forEach(function(network) {
        wp.customize('social_' + network, function(value) {
            value.bind(function(newval) {
                var $socialLink = $('.social-icon-two li a[href*="' + network + '"]');
                if (newval) {
                    $socialLink.attr('href', newval);
                } else {
                    $socialLink.attr('href', '#');
                }
            });
        });
    });

})(jQuery);
