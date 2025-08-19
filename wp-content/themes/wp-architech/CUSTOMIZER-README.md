# WP Architech Theme Customizer Options

This document explains how to use the WordPress Customizer options added to the WP Architech theme.

## Accessing the Customizer

1. Log in to your WordPress admin panel
2. Go to **Appearance > Customize**
3. You'll see the customizer interface with live preview

## Header Settings

### Logo Upload
- **Location**: Header Settings > Header Logo
- **Description**: Upload a custom logo for your header
- **Recommended Size**: 250x80px
- **Fallback**: If no logo is uploaded, the site title will be displayed as an H1 heading

### Menu Colors
- **Menu Text Color**: Controls the color of menu items in normal state
- **Menu Hover Color**: Controls the color when hovering over menu items
- **Menu Active Color**: Controls the color of the currently active menu item

### CSS Classes Applied
The customizer automatically applies these colors to:
- `.main-menu a` - Menu text color
- `.main-menu a:hover` - Hover color
- `.main-menu .current-menu-item a` - Active menu color

## Footer Settings

### Footer Logo
- **Location**: Footer Settings > Footer Logo
- **Description**: Upload a custom logo for your footer
- **Recommended Size**: 200x60px
- **Fallback**: If no logo is uploaded, the site title will be displayed as an H3 heading

### Footer Description
- **Location**: Footer Settings > Footer Description
- **Description**: Add custom text description for your footer
- **Default**: Sample text about architecture and layouts
- **HTML Support**: Basic HTML tags are allowed

### Footer Menu Title
- **Location**: Footer Settings > Footer Menu Title
- **Description**: Customize the title for the footer menu section
- **Default**: "Useful links"
- **Type**: Text field

### Footer Menu
- **Location**: Footer Settings > Footer Menu
- **Description**: Select a WordPress menu to display in the footer
- **Fallback**: If no menu is selected, default links will be shown

### Copyright Text
- **Location**: Footer Settings > Copyright Text
- **Description**: Customize the copyright text in the footer
- **Default**: "Copyright © [Year] [Site Name]. All Rights Reserved."
- **HTML Support**: Basic HTML tags are allowed

### Social Media Links
- **Location**: Footer Settings > Social Media URLs
- **Supported Networks**: Facebook, Twitter, Instagram, LinkedIn, YouTube
- **Description**: Enter your social media profile URLs
- **Display**: Only networks with URLs will be displayed
- **Icons**: Font Awesome icons are automatically applied

## Live Preview

All color changes in the header section are applied in real-time using the WordPress Customizer's live preview feature. Other changes require saving and refreshing the page.

## File Structure

The customizer functionality is implemented in these files:

- `inc/theme-customizer.php` - Main customizer registration and controls
- `inc/theme-helpers.php` - Helper functions for accessing customizer values
- `assets/js/customizer.js` - Live preview JavaScript functionality
- `header.php` - Updated to use customizer options
- `footer.php` - Updated to use customizer options

## Helper Functions

The theme includes helper functions for easy access to customizer values:

```php
// Get header logo
wp_architech_get_header_logo()

// Get footer logo
wp_architech_get_footer_logo()

// Get footer description
wp_architech_get_footer_description()

// Get footer menu title
wp_architech_get_footer_menu_title()

// Get footer menu ID
wp_architech_get_footer_menu()

// Get copyright text
wp_architech_get_copyright_text()

// Get social media URL
wp_architech_get_social_url('facebook')

// Get all social networks
wp_architech_get_social_networks()

// Check if social links exist
wp_architech_has_social_links()

// Get menu colors
wp_architech_get_menu_colors()

// Display functions
wp_architech_header_logo()
wp_architech_footer_logo()
wp_architech_social_links()
```

## CSS Customization

The customizer automatically generates CSS for menu colors. You can override these styles in your theme's CSS files if needed.

### Additional CSS Fixes

The theme includes a custom CSS file (`assets/css/customizer-custom.css`) that provides:

- **Search Icon Centering**: Fixes the search icon alignment in the header without changing the original design
- **Logo Fallback Styling**: Proper styling for text fallbacks when logos aren't uploaded
- **Minimal Design Changes**: Preserves the original theme styling while adding customizer functionality

## Browser Compatibility

- **Chrome**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Edge**: Full support
- **Internet Explorer**: Limited support (no live preview)

## Troubleshooting

### Logo Not Displaying
1. Check if the image URL is correct
2. Verify the image file exists
3. Check file permissions
4. Clear browser cache

### Colors Not Applying
1. Save the customizer settings
2. Clear browser cache
3. Check if CSS is being loaded
4. Verify CSS selectors match your theme

### Menu Not Displaying
1. Create a menu in WordPress admin
2. Assign it to a location
3. Select it in the customizer
4. Save and refresh

## Support

For additional support or customization requests, please refer to the theme documentation or contact the theme developer.
