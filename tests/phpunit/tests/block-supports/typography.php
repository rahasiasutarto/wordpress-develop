<?php
/**
 * @group block-supports
 */
class Tests_Block_Supports_Typography extends WP_UnitTestCase {
	/**
	 * @ticket 54337
	 *
	 * @covers ::wp_apply_typography_support
	 */
	function test_font_size_slug_with_numbers_is_kebab_cased_properly() {
		register_block_type(
			'test/font-size-slug-with-numbers',
			array(
				'api_version' => 2,
				'attributes'  => array(
					'fontSize' => array(
						'type' => 'string',
					),
				),
				'supports'    => array(
					'typography' => array(
						'fontSize' => true,
					),
				),
			)
		);
		$registry   = WP_Block_Type_Registry::get_instance();
		$block_type = $registry->get_registered( 'test/font-size-slug-with-numbers' );

		$block_atts = array( 'fontSize' => 'h1' );

		$actual   = wp_apply_typography_support( $block_type, $block_atts );
		$expected = array( 'class' => 'has-h-1-font-size' );

		$this->assertSame( $expected, $actual );
		unregister_block_type( 'test/font-size-slug-with-numbers' );
	}
	/**
	 * @ticket 54337
	 *
	 * @covers ::wp_apply_typography_support
	 */
	function test_font_family_with_legacy_inline_styles_using_a_value() {
		$block_name = 'test/font-family-with-inline-styles-using-value';
		register_block_type(
			$block_name,
			array(
				'api_version' => 2,
				'attributes'  => array(
					'style' => array(
						'type' => 'object',
					),
				),
				'supports'    => array(
					'typography' => array(
						'__experimentalFontFamily' => true,
					),
				),
			)
		);
		$registry   = WP_Block_Type_Registry::get_instance();
		$block_type = $registry->get_registered( $block_name );
		$block_atts = array( 'style' => array( 'typography' => array( 'fontFamily' => 'serif' ) ) );

		$actual   = wp_apply_typography_support( $block_type, $block_atts );
		$expected = array( 'style' => 'font-family: serif;' );

		$this->assertSame( $expected, $actual );
		unregister_block_type( $block_name );
	}

	/**
	 * @ticket 55505
	 *
	 * @covers ::wp_apply_typography_support
	 */
	function test_typography_with_skipped_serialization_block_supports() {
		$block_name = 'test/typography-with-skipped-serialization-block-supports';
		register_block_type(
			$block_name,
			array(
				'api_version' => 2,
				'attributes'  => array(
					'style' => array(
						'type' => 'object',
					),
				),
				'supports'    => array(
					'typography' => array(
						'fontSize'                        => true,
						'lineHeight'                      => true,
						'__experimentalFontFamily'        => true,
						'__experimentalLetterSpacing'     => true,
						'__experimentalSkipSerialization' => true,
					),
				),
			)
		);
		$registry   = WP_Block_Type_Registry::get_instance();
		$block_type = $registry->get_registered( $block_name );
		$block_atts = array(
			'style' => array(
				'typography' => array(
					'fontSize'      => 'serif',
					'lineHeight'    => 'serif',
					'fontFamily'    => '22px',
					'letterSpacing' => '22px',
				),
			),
		);

		$actual   = wp_apply_typography_support( $block_type, $block_atts );
		$expected = array();

		$this->assertSame( $expected, $actual );
		unregister_block_type( $block_name );
	}

	/**
	 * @ticket 55505
	 *
	 * @covers ::wp_apply_typography_support
	 */
	function test_letter_spacing_with_individual_skipped_serialization_block_supports() {
		$block_name = 'test/letter-spacing-with-individua-skipped-serialization-block-supports';
		register_block_type(
			$block_name,
			array(
				'api_version' => 2,
				'attributes'  => array(
					'style' => array(
						'type' => 'object',
					),
				),
				'supports'    => array(
					'typography' => array(
						'__experimentalLetterSpacing'     => true,
						'__experimentalSkipSerialization' => array(
							'letterSpacing',
						),
					),
				),
			)
		);
		$registry   = WP_Block_Type_Registry::get_instance();
		$block_type = $registry->get_registered( $block_name );
		$block_atts = array( 'style' => array( 'typography' => array( 'letterSpacing' => '22px' ) ) );

		$actual   = wp_apply_typography_support( $block_type, $block_atts );
		$expected = array();

		$this->assertSame( $expected, $actual );
		unregister_block_type( $block_name );
	}
	/**
	 * @ticket 54337
	 *
	 * @covers ::wp_apply_typography_support
	 */
	function test_font_family_with_legacy_inline_styles_using_a_css_var() {
		$block_name = 'test/font-family-with-inline-styles-using-css-var';
		register_block_type(
			$block_name,
			array(
				'api_version' => 2,
				'attributes'  => array(
					'style' => array(
						'type' => 'object',
					),
				),
				'supports'    => array(
					'typography' => array(
						'__experimentalFontFamily' => true,
					),
				),
			)
		);
		$registry   = WP_Block_Type_Registry::get_instance();
		$block_type = $registry->get_registered( $block_name );
		$block_atts = array( 'style' => array( 'typography' => array( 'fontFamily' => 'var:preset|font-family|h1' ) ) );

		$actual   = wp_apply_typography_support( $block_type, $block_atts );
		$expected = array( 'style' => 'font-family: var(--wp--preset--font-family--h-1);' );

		$this->assertSame( $expected, $actual );
		unregister_block_type( $block_name );
	}
	/**
	 * @ticket 54337
	 *
	 * @covers ::wp_apply_typography_support
	 */
	function test_font_family_with_class() {
		$block_name = 'test/font-family-with-class';
		register_block_type(
			$block_name,
			array(
				'api_version' => 2,
				'attributes'  => array(
					'style' => array(
						'type' => 'object',
					),
				),
				'supports'    => array(
					'typography' => array(
						'__experimentalFontFamily' => true,
					),
				),
			)
		);
		$registry   = WP_Block_Type_Registry::get_instance();
		$block_type = $registry->get_registered( $block_name );
		$block_atts = array( 'fontFamily' => 'h1' );

		$actual   = wp_apply_typography_support( $block_type, $block_atts );
		$expected = array( 'class' => 'has-h-1-font-family' );

		$this->assertSame( $expected, $actual );
		unregister_block_type( $block_name );
	}

}
