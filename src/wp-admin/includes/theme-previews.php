<?php
/**
 * Theme previews using the Site Editor for block themes.
 *
 * @package WordPress
 */

/**
 * Filters the blog option to return the path for the previewed theme.
 *
 * @since 6.3.0
 *
 * @param string $current_stylesheet The current theme's stylesheet or template path.
 * @return string The previewed theme's stylesheet or template path.
 */
function wp_get_theme_preview_path( $current_stylesheet = null ) {
	if ( ! current_user_can( 'switch_themes' ) ) {
		return $current_stylesheet;
	}

	$preview_stylesheet = ! empty( $_GET['wp_theme_preview'] ) ? sanitize_text_field( wp_unslash( $_GET['wp_theme_preview'] ) ) : null;
	$wp_theme           = wp_get_theme( $preview_stylesheet );
	if ( ! is_wp_error( $wp_theme->errors() ) ) {
		if ( current_filter() === 'template' ) {
			$theme_path = $wp_theme->get_template();
		} else {
			$theme_path = $wp_theme->get_stylesheet();
		}

		return sanitize_text_field( $theme_path );
	}

	return $current_stylesheet;
}

/**
 * Adds a middleware to `apiFetch` to set the theme for the preview.
 * This adds a `wp_theme_preview` URL parameter to API requests from the Site Editor, so they also respond as if the theme is set to the value of the parameter.
 *
 * @since 6.3.0
 */
function wp_attach_theme_preview_middleware() {
	// Don't allow non-admins to preview themes.
	if ( ! current_user_can( 'switch_themes' ) ) {
		return;
	}

	wp_add_inline_script(
		'wp-api-fetch',
		sprintf(
			'wp.apiFetch.use( wp.apiFetch.createThemePreviewMiddleware( %s ) );',
			wp_json_encode( sanitize_text_field( wp_unslash( $_GET['wp_theme_preview'] ) ) )
		),
		'after'
	);
}
