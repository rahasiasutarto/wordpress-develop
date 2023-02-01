<?php
/**
 * Block Editor API.
 *
 * @package WordPress
 * @subpackage Editor
 * @since 5.8.0
 */

/**
 * Returns the list of default categories for block types.
 *
 * @since 5.8.0
 *
 * @return array[] Array of categories for block types.
 */
function get_default_block_categories() {
	return array(
		array(
			'slug'  => 'text',
			'title' => _x( 'Text', 'block category' ),
			'icon'  => null,
		),
		array(
			'slug'  => 'media',
			'title' => _x( 'Media', 'block category' ),
			'icon'  => null,
		),
		array(
			'slug'  => 'design',
			'title' => _x( 'Design', 'block category' ),
			'icon'  => null,
		),
		array(
			'slug'  => 'widgets',
			'title' => _x( 'Widgets', 'block category' ),
			'icon'  => null,
		),
		array(
			'slug'  => 'theme',
			'title' => _x( 'Theme', 'block category' ),
			'icon'  => null,
		),
		array(
			'slug'  => 'embed',
			'title' => _x( 'Embeds', 'block category' ),
			'icon'  => null,
		),
		array(
			'slug'  => 'reusable',
			'title' => _x( 'Reusable Blocks', 'block category' ),
			'icon'  => null,
		),
	);
}

/**
 * Returns all the categories for block types that will be shown in the block editor.
 *
 * @since 5.0.0
 * @since 5.8.0 It is possible to pass the block editor context as param.
 *
 * @param WP_Post|WP_Block_Editor_Context $post_or_block_editor_context The current post object or
 *                                                                      the block editor context.
 *
 * @return array[] Array of categories for block types.
 */
function get_block_categories( $post_or_block_editor_context ) {
	$block_categories     = get_default_block_categories();
	$block_editor_context = $post_or_block_editor_context instanceof WP_Post ?
		new WP_Block_Editor_Context(
			array(
				'post' => $post_or_block_editor_context,
			)
		) : $post_or_block_editor_context;

	/**
	 * Filters the default array of categories for block types.
	 *
	 * @since 5.8.0
	 *
	 * @param array[]                 $block_categories     Array of categories for block types.
	 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
	 */
	$block_categories = apply_filters( 'block_categories_all', $block_categories, $block_editor_context );

	if ( ! empty( $block_editor_context->post ) ) {
		$post = $block_editor_context->post;

		/**
		 * Filters the default array of categories for block types.
		 *
		 * @since 5.0.0
		 * @deprecated 5.8.0 Use the {@see 'block_categories_all'} filter instead.
		 *
		 * @param array[] $block_categories Array of categories for block types.
		 * @param WP_Post $post             Post being loaded.
		 */
		$block_categories = apply_filters_deprecated( 'block_categories', array( $block_categories, $post ), '5.8.0', 'block_categories_all' );
	}

	return $block_categories;
}

/**
 * Gets the list of allowed block types to use in the block editor.
 *
 * @since 5.8.0
 *
 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
 *
 * @return bool|string[] Array of block type slugs, or boolean to enable/disable all.
 */
function get_allowed_block_types( $block_editor_context ) {
	$allowed_block_types = true;

	/**
	 * Filters the allowed block types for all editor types.
	 *
	 * @since 5.8.0
	 *
	 * @param bool|string[]           $allowed_block_types  Array of block type slugs, or boolean to enable/disable all.
	 *                                                      Default true (all registered block types supported).
	 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
	 */
	$allowed_block_types = apply_filters( 'allowed_block_types_all', $allowed_block_types, $block_editor_context );

	if ( ! empty( $block_editor_context->post ) ) {
		$post = $block_editor_context->post;

		/**
		 * Filters the allowed block types for the editor.
		 *
		 * @since 5.0.0
		 * @deprecated 5.8.0 Use the {@see 'allowed_block_types_all'} filter instead.
		 *
		 * @param bool|string[] $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
		 *                                           Default true (all registered block types supported)
		 * @param WP_Post       $post                The post resource data.
		 */
		$allowed_block_types = apply_filters_deprecated( 'allowed_block_types', array( $allowed_block_types, $post ), '5.8.0', 'allowed_block_types_all' );
	}

	return $allowed_block_types;
}

/**
 * Returns the default block editor settings.
 *
 * @since 5.8.0
 *
 * @return array The default block editor settings.
 */
function get_default_block_editor_settings() {
	// Media settings.

	// wp_max_upload_size() can be expensive, so only call it when relevant for the current user.
	$max_upload_size = 0;
	if ( current_user_can( 'upload_files' ) ) {
		$max_upload_size = wp_max_upload_size();
		if ( ! $max_upload_size ) {
			$max_upload_size = 0;
		}
	}

	/** This filter is documented in wp-admin/includes/media.php */
	$image_size_names = apply_filters(
		'image_size_names_choose',
		array(
			'thumbnail' => __( 'Thumbnail' ),
			'medium'    => __( 'Medium' ),
			'large'     => __( 'Large' ),
			'full'      => __( 'Full Size' ),
		)
	);

	$available_image_sizes = array();
	foreach ( $image_size_names as $image_size_slug => $image_size_name ) {
		$available_image_sizes[] = array(
			'slug' => $image_size_slug,
			'name' => $image_size_name,
		);
	}

	$default_size       = get_option( 'image_default_size', 'large' );
	$image_default_size = in_array( $default_size, array_keys( $image_size_names ), true ) ? $default_size : 'large';

	$image_dimensions = array();
	$all_sizes        = wp_get_registered_image_subsizes();
	foreach ( $available_image_sizes as $size ) {
		$key = $size['slug'];
		if ( isset( $all_sizes[ $key ] ) ) {
			$image_dimensions[ $key ] = $all_sizes[ $key ];
		}
	}

	// These styles are used if the "no theme styles" options is triggered or on
	// themes without their own editor styles.
	$default_editor_styles_file = ABSPATH . WPINC . '/css/dist/block-editor/default-editor-styles.css';

	static $default_editor_styles_file_contents = false;
	if ( ! $default_editor_styles_file_contents && file_exists( $default_editor_styles_file ) ) {
		$default_editor_styles_file_contents = file_get_contents( $default_editor_styles_file );
	}

	$default_editor_styles = array();
	if ( $default_editor_styles_file_contents ) {
		$default_editor_styles = array(
			array( 'css' => $default_editor_styles_file_contents ),
		);
	}

	$editor_settings = array(
		'alignWide'                        => get_theme_support( 'align-wide' ),
		'allowedBlockTypes'                => true,
		'allowedMimeTypes'                 => get_allowed_mime_types(),
		'defaultEditorStyles'              => $default_editor_styles,
		'blockCategories'                  => get_default_block_categories(),
		'isRTL'                            => is_rtl(),
		'imageDefaultSize'                 => $image_default_size,
		'imageDimensions'                  => $image_dimensions,
		'imageEditing'                     => true,
		'imageSizes'                       => $available_image_sizes,
		'maxUploadFileSize'                => $max_upload_size,
		// The following flag is required to enable the new Gallery block format on the mobile apps in 5.9.
		'__unstableGalleryWithImageBlocks' => true,
	);

	$theme_settings = get_classic_theme_supports_block_editor_settings();
	foreach ( $theme_settings as $key => $value ) {
		$editor_settings[ $key ] = $value;
	}

	return $editor_settings;
}

/**
 * Returns the block editor settings needed to use the Legacy Widget block which
 * is not registered by default.
 *
 * @since 5.8.0
 *
 * @return array Settings to be used with get_block_editor_settings().
 */
function get_legacy_widget_block_editor_settings() {
	$editor_settings = array();

	/**
	 * Filters the list of widget-type IDs that should **not** be offered by the
	 * Legacy Widget block.
	 *
	 * Returning an empty array will make all widgets available.
	 *
	 * @since 5.8.0
	 *
	 * @param string[] $widgets An array of excluded widget-type IDs.
	 */
	$editor_settings['widgetTypesToHideFromLegacyWidgetBlock'] = apply_filters(
		'widget_types_to_hide_from_legacy_widget_block',
		array(
			'pages',
			'calendar',
			'archives',
			'media_audio',
			'media_image',
			'media_gallery',
			'media_video',
			'search',
			'text',
			'categories',
			'recent-posts',
			'recent-comments',
			'rss',
			'tag_cloud',
			'custom_html',
			'block',
		)
	);

	return $editor_settings;
}

/**
 * Collect the block editor assets that need to be loaded into the editor's iframe.
 *
 * @since 6.0.0
 * @access private
 *
 * @global string $pagenow The filename of the current screen.
 *
 * @return array {
 *     The block editor assets.
 *
 *     @type string|false $styles  String containing the HTML for styles.
 *     @type string|false $scripts String containing the HTML for scripts.
 * }
 */
function _wp_get_iframed_editor_assets() {
	global $pagenow;

	$script_handles = array(
		'wp-polyfill',
	);
	$style_handles  = array(
		'wp-edit-blocks',
	);

	if ( current_theme_supports( 'wp-block-styles' ) ) {
		$style_handles[] = 'wp-block-library-theme';
	}

	if ( 'widgets.php' === $pagenow || 'customize.php' === $pagenow ) {
		$style_handles[] = 'wp-widgets';
		$style_handles[] = 'wp-edit-widgets';
	}

	$block_registry = WP_Block_Type_Registry::get_instance();

	foreach ( $block_registry->get_all_registered() as $block_type ) {
		$style_handles = array_merge(
			$style_handles,
			$block_type->style_handles,
			$block_type->editor_style_handles
		);

		$script_handles = array_merge(
			$script_handles,
			$block_type->script_handles
		);
	}

	$style_handles = array_unique( $style_handles );
	$done          = wp_styles()->done;

	ob_start();

	// We do not need reset styles for the iframed editor.
	wp_styles()->done = array( 'wp-reset-editor-styles' );
	wp_styles()->do_items( $style_handles );
	wp_styles()->done = $done;

	$styles = ob_get_clean();

	$script_handles = array_unique( $script_handles );
	$done           = wp_scripts()->done;

	ob_start();

	wp_scripts()->done = array();
	wp_scripts()->do_items( $script_handles );
	wp_scripts()->done = $done;

	$scripts = ob_get_clean();

	return array(
		'styles'  => $styles,
		'scripts' => $scripts,
	);
}

/**
 * Returns the contextualized block editor settings for a selected editor context.
 *
 * @since 5.8.0
 *
 * @param array                   $custom_settings      Custom settings to use with the given editor type.
 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
 *
 * @return array The contextualized block editor settings.
 */
function get_block_editor_settings( array $custom_settings, $block_editor_context ) {
	$editor_settings = array_merge(
		get_default_block_editor_settings(),
		array(
			'allowedBlockTypes' => get_allowed_block_types( $block_editor_context ),
			'blockCategories'   => get_block_categories( $block_editor_context ),
		),
		$custom_settings
	);

	$global_styles = array();
	$presets       = array(
		array(
			'css'            => 'variables',
			'__unstableType' => 'presets',
			'isGlobalStyles' => true,
		),
		array(
			'css'            => 'presets',
			'__unstableType' => 'presets',
			'isGlobalStyles' => true,
		),
	);
	foreach ( $presets as $preset_style ) {
		$actual_css = wp_get_global_stylesheet( array( $preset_style['css'] ) );
		if ( '' !== $actual_css ) {
			$preset_style['css'] = $actual_css;
			$global_styles[]     = $preset_style;
		}
	}

	if ( wp_theme_has_theme_json() ) {
		$block_classes = array(
			'css'            => 'styles',
			'__unstableType' => 'theme',
			'isGlobalStyles' => true,
		);
		$actual_css    = wp_get_global_stylesheet( array( $block_classes['css'] ) );
		if ( '' !== $actual_css ) {
			$block_classes['css'] = $actual_css;
			$global_styles[]      = $block_classes;
		}
	} else {
		// If there is no `theme.json` file, ensure base layout styles are still available.
		$block_classes = array(
			'css'            => 'base-layout-styles',
			'__unstableType' => 'base-layout',
			'isGlobalStyles' => true,
		);
		$actual_css    = wp_get_global_stylesheet( array( $block_classes['css'] ) );
		if ( '' !== $actual_css ) {
			$block_classes['css'] = $actual_css;
			$global_styles[]      = $block_classes;
		}
	}

	$editor_settings['styles'] = array_merge( $global_styles, get_block_editor_theme_styles() );

	$editor_settings['__experimentalFeatures'] = wp_get_global_settings();
	// These settings may need to be updated based on data coming from theme.json sources.
	if ( isset( $editor_settings['__experimentalFeatures']['color']['palette'] ) ) {
		$colors_by_origin          = $editor_settings['__experimentalFeatures']['color']['palette'];
		$editor_settings['colors'] = isset( $colors_by_origin['custom'] ) ?
			$colors_by_origin['custom'] : (
				isset( $colors_by_origin['theme'] ) ?
					$colors_by_origin['theme'] :
					$colors_by_origin['default']
			);
	}
	if ( isset( $editor_settings['__experimentalFeatures']['color']['gradients'] ) ) {
		$gradients_by_origin          = $editor_settings['__experimentalFeatures']['color']['gradients'];
		$editor_settings['gradients'] = isset( $gradients_by_origin['custom'] ) ?
			$gradients_by_origin['custom'] : (
				isset( $gradients_by_origin['theme'] ) ?
					$gradients_by_origin['theme'] :
					$gradients_by_origin['default']
			);
	}
	if ( isset( $editor_settings['__experimentalFeatures']['typography']['fontSizes'] ) ) {
		$font_sizes_by_origin         = $editor_settings['__experimentalFeatures']['typography']['fontSizes'];
		$editor_settings['fontSizes'] = isset( $font_sizes_by_origin['custom'] ) ?
			$font_sizes_by_origin['custom'] : (
				isset( $font_sizes_by_origin['theme'] ) ?
					$font_sizes_by_origin['theme'] :
					$font_sizes_by_origin['default']
			);
	}
	if ( isset( $editor_settings['__experimentalFeatures']['color']['custom'] ) ) {
		$editor_settings['disableCustomColors'] = ! $editor_settings['__experimentalFeatures']['color']['custom'];
		unset( $editor_settings['__experimentalFeatures']['color']['custom'] );
	}
	if ( isset( $editor_settings['__experimentalFeatures']['color']['customGradient'] ) ) {
		$editor_settings['disableCustomGradients'] = ! $editor_settings['__experimentalFeatures']['color']['customGradient'];
		unset( $editor_settings['__experimentalFeatures']['color']['customGradient'] );
	}
	if ( isset( $editor_settings['__experimentalFeatures']['typography']['customFontSize'] ) ) {
		$editor_settings['disableCustomFontSizes'] = ! $editor_settings['__experimentalFeatures']['typography']['customFontSize'];
		unset( $editor_settings['__experimentalFeatures']['typography']['customFontSize'] );
	}
	if ( isset( $editor_settings['__experimentalFeatures']['typography']['lineHeight'] ) ) {
		$editor_settings['enableCustomLineHeight'] = $editor_settings['__experimentalFeatures']['typography']['lineHeight'];
		unset( $editor_settings['__experimentalFeatures']['typography']['lineHeight'] );
	}
	if ( isset( $editor_settings['__experimentalFeatures']['spacing']['units'] ) ) {
		$editor_settings['enableCustomUnits'] = $editor_settings['__experimentalFeatures']['spacing']['units'];
		unset( $editor_settings['__experimentalFeatures']['spacing']['units'] );
	}
	if ( isset( $editor_settings['__experimentalFeatures']['spacing']['padding'] ) ) {
		$editor_settings['enableCustomSpacing'] = $editor_settings['__experimentalFeatures']['spacing']['padding'];
		unset( $editor_settings['__experimentalFeatures']['spacing']['padding'] );
	}
	if ( isset( $editor_settings['__experimentalFeatures']['spacing']['customSpacingSize'] ) ) {
		$editor_settings['disableCustomSpacingSizes'] = ! $editor_settings['__experimentalFeatures']['spacing']['customSpacingSize'];
		unset( $editor_settings['__experimentalFeatures']['spacing']['customSpacingSize'] );
	}

	if ( isset( $editor_settings['__experimentalFeatures']['spacing']['spacingSizes'] ) ) {
		$spacing_sizes_by_origin         = $editor_settings['__experimentalFeatures']['spacing']['spacingSizes'];
		$editor_settings['spacingSizes'] = isset( $spacing_sizes_by_origin['custom'] ) ?
			$spacing_sizes_by_origin['custom'] : (
				isset( $spacing_sizes_by_origin['theme'] ) ?
					$spacing_sizes_by_origin['theme'] :
					$spacing_sizes_by_origin['default']
			);
	}

	$editor_settings['__unstableResolvedAssets']         = _wp_get_iframed_editor_assets();
	$editor_settings['__unstableIsBlockBasedTheme']      = wp_is_block_theme();
	$editor_settings['localAutosaveInterval']            = 15;
	$editor_settings['disableLayoutStyles']              = current_theme_supports( 'disable-layout-styles' );
	$editor_settings['__experimentalDiscussionSettings'] = array(
		'commentOrder'         => get_option( 'comment_order' ),
		'commentsPerPage'      => get_option( 'comments_per_page' ),
		'defaultCommentsPage'  => get_option( 'default_comments_page' ),
		'pageComments'         => get_option( 'page_comments' ),
		'threadComments'       => get_option( 'thread_comments' ),
		'threadCommentsDepth'  => get_option( 'thread_comments_depth' ),
		'defaultCommentStatus' => get_option( 'default_comment_status' ),
		'avatarURL'            => get_avatar_url(
			'',
			array(
				'size'          => 96,
				'force_default' => true,
				'default'       => get_option( 'avatar_default' ),
			)
		),
	);

	/**
	 * Filters the settings to pass to the block editor for all editor type.
	 *
	 * @since 5.8.0
	 *
	 * @param array                   $editor_settings      Default editor settings.
	 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
	 */
	$editor_settings = apply_filters( 'block_editor_settings_all', $editor_settings, $block_editor_context );

	if ( ! empty( $block_editor_context->post ) ) {
		$post = $block_editor_context->post;

		/**
		 * Filters the settings to pass to the block editor.
		 *
		 * @since 5.0.0
		 * @deprecated 5.8.0 Use the {@see 'block_editor_settings_all'} filter instead.
		 *
		 * @param array   $editor_settings Default editor settings.
		 * @param WP_Post $post            Post being edited.
		 */
		$editor_settings = apply_filters_deprecated( 'block_editor_settings', array( $editor_settings, $post ), '5.8.0', 'block_editor_settings_all' );
	}

	return $editor_settings;
}

/**
 * Preloads common data used with the block editor by specifying an array of
 * REST API paths that will be preloaded for a given block editor context.
 *
 * @since 5.8.0
 *
 * @global WP_Post    $post       Global post object.
 * @global WP_Scripts $wp_scripts The WP_Scripts object for printing scripts.
 * @global WP_Styles  $wp_styles  The WP_Styles object for printing styles.
 *
 * @param (string|string[])[]     $preload_paths        List of paths to preload.
 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
 */
function block_editor_rest_api_preload( array $preload_paths, $block_editor_context ) {
	global $post, $wp_scripts, $wp_styles;

	/**
	 * Filters the array of REST API paths that will be used to preloaded common data for the block editor.
	 *
	 * @since 5.8.0
	 *
	 * @param (string|string[])[]     $preload_paths        Array of paths to preload.
	 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
	 */
	$preload_paths = apply_filters( 'block_editor_rest_api_preload_paths', $preload_paths, $block_editor_context );

	if ( ! empty( $block_editor_context->post ) ) {
		$selected_post = $block_editor_context->post;

		/**
		 * Filters the array of paths that will be preloaded.
		 *
		 * Preload common data by specifying an array of REST API paths that will be preloaded.
		 *
		 * @since 5.0.0
		 * @deprecated 5.8.0 Use the {@see 'block_editor_rest_api_preload_paths'} filter instead.
		 *
		 * @param (string|string[])[] $preload_paths Array of paths to preload.
		 * @param WP_Post             $selected_post Post being edited.
		 */
		$preload_paths = apply_filters_deprecated( 'block_editor_preload_paths', array( $preload_paths, $selected_post ), '5.8.0', 'block_editor_rest_api_preload_paths' );
	}

	if ( empty( $preload_paths ) ) {
		return;
	}

	/*
	 * Ensure the global $post, $wp_scripts, and $wp_styles remain the same after
	 * API data is preloaded.
	 * Because API preloading can call the_content and other filters, plugins
	 * can unexpectedly modify the global $post or enqueue assets which are not
	 * intended for the block editor.
	 */
	$backup_global_post = ! empty( $post ) ? clone $post : $post;
	$backup_wp_scripts  = ! empty( $wp_scripts ) ? clone $wp_scripts : $wp_scripts;
	$backup_wp_styles   = ! empty( $wp_styles ) ? clone $wp_styles : $wp_styles;

	foreach ( $preload_paths as &$path ) {
		if ( is_string( $path ) && ! str_starts_with( $path, '/' ) ) {
			$path = '/' . $path;
			continue;
		}

		if ( is_array( $path ) && is_string( $path[0] ) && ! str_starts_with( $path[0], '/' ) ) {
			$path[0] = '/' . $path[0];
		}
	}

	unset( $path );

	$preload_data = array_reduce(
		$preload_paths,
		'rest_preload_api_request',
		array()
	);

	// Restore the global $post, $wp_scripts, and $wp_styles as they were before API preloading.
	$post       = $backup_global_post;
	$wp_scripts = $backup_wp_scripts;
	$wp_styles  = $backup_wp_styles;

	wp_add_inline_script(
		'wp-api-fetch',
		sprintf(
			'wp.apiFetch.use( wp.apiFetch.createPreloadingMiddleware( %s ) );',
			wp_json_encode( $preload_data )
		),
		'after'
	);
}

/**
 * Creates an array of theme styles to load into the block editor.
 *
 * @since 5.8.0
 *
 * @global array $editor_styles
 *
 * @return array An array of theme styles for the block editor.
 */
function get_block_editor_theme_styles() {
	global $editor_styles;

	$styles = array();

	if ( $editor_styles && current_theme_supports( 'editor-styles' ) ) {
		foreach ( $editor_styles as $style ) {
			if ( preg_match( '~^(https?:)?//~', $style ) ) {
				$response = wp_remote_get( $style );
				if ( ! is_wp_error( $response ) ) {
					$styles[] = array(
						'css'            => wp_remote_retrieve_body( $response ),
						'__unstableType' => 'theme',
						'isGlobalStyles' => false,
					);
				}
			} else {
				$file = get_theme_file_path( $style );
				if ( is_file( $file ) ) {
					$styles[] = array(
						'css'            => file_get_contents( $file ),
						'baseURL'        => get_theme_file_uri( $style ),
						'__unstableType' => 'theme',
						'isGlobalStyles' => false,
					);
				}
			}
		}
	}

	return $styles;
}

/**
 * Returns the classic theme supports settings for block editor.
 *
 * @since 6.2.0
 *
 * @return array The classic theme supports settings.
 */
function get_classic_theme_supports_block_editor_settings() {
	$theme_settings = array(
		'disableCustomColors'    => get_theme_support( 'disable-custom-colors' ),
		'disableCustomFontSizes' => get_theme_support( 'disable-custom-font-sizes' ),
		'disableCustomGradients' => get_theme_support( 'disable-custom-gradients' ),
		'disableLayoutStyles'    => get_theme_support( 'disable-layout-styles' ),
		'enableCustomLineHeight' => get_theme_support( 'custom-line-height' ),
		'enableCustomSpacing'    => get_theme_support( 'custom-spacing' ),
		'enableCustomUnits'      => get_theme_support( 'custom-units' ),
	);

	// Theme settings.
	$color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );
	if ( false !== $color_palette ) {
		$theme_settings['colors'] = $color_palette;
	}

	$font_sizes = current( (array) get_theme_support( 'editor-font-sizes' ) );
	if ( false !== $font_sizes ) {
		$theme_settings['fontSizes'] = $font_sizes;
	}

	$gradient_presets = current( (array) get_theme_support( 'editor-gradient-presets' ) );
	if ( false !== $gradient_presets ) {
		$theme_settings['gradients'] = $gradient_presets;
	}

	return $theme_settings;
}
