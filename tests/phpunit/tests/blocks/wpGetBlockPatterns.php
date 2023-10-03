<?php
/**
 * Tests for _wp_get_block_patterns.
 *
 * @package WordPress
 * @subpackage Blocks
 * @since 6.4.0
 *
 * @group blocks
 *
 * @covers ::_wp_get_block_patterns
 */
class Tests_Blocks_WpGetBlockPatterns extends WP_UnitTestCase {
	/**
	 * @ticket 59490
	 *
	 * @dataProvider data_wp_get_block_patterns
	 *
	 * @param string $theme    The theme's slug.
	 * @param array  $expected The expected pattern data.

	 */
	public function test_should_return_block_patterns( $theme, $expected ) {
		$patterns = _wp_get_block_patterns( wp_get_theme( $theme ) );
		$this->assertSameSets( $expected, $patterns );
	}

	/**
	 * @ticket 59490
	 */
	public function test_delete_theme_cache() {
		$theme = wp_get_theme( 'block-theme-patterns' );
		_wp_get_block_patterns( $theme );
		$transient = get_transient( 'wp_theme_patterns_block-theme-patterns' );
		$this->assertSameSets(
			array(
				'version'  => '1.0.0',
				'patterns' => array(
					'cta.php' => array(
						'title'       => 'Centered Call To Action',
						'slug'        => 'block-theme-patterns/cta',
						'description' => '',
						'categories'  => array( 'call-to-action' ),
					),
				),
			),
			$transient,
			'The transient for block theme patterns should be set'
		);
		$theme->cache_delete();
		$transient = get_transient( 'wp_theme_patterns_block-theme-patterns' );
		$this->assertFalse(
			$transient,
			'The transient for block theme patterns should have been cleared'
		);
	}

	/**
	 * @ticket 59490
	 */
	public function test_should_clear_transient_after_switching_theme() {
		switch_theme( 'block-theme' );
		_wp_get_block_patterns( wp_get_theme() );
		$this->assertSameSets(
			array(
				'version'  => '1.0.0',
				'patterns' => array(),
			),
			get_transient( 'wp_theme_patterns_block-theme' ),
			'The transient for block theme should be set'
		);
		switch_theme( 'block-theme-patterns' );
		$this->assertFalse( get_transient( 'wp_theme_patterns_block-theme' ), 'Transient should not be set for block theme after switch theme' );
		$this->assertFalse( get_transient( 'wp_theme_patterns_block-theme-patterns' ), 'Transient should not be set for block theme patterns before being requested' );
		_wp_get_block_patterns( wp_get_theme() );
		$transient = get_transient( 'wp_theme_patterns_block-theme-patterns' );
		$this->assertSameSets(
			array(
				'version'  => '1.0.0',
				'patterns' => array(
					'cta.php' => array(
						'title'       => 'Centered Call To Action',
						'slug'        => 'block-theme-patterns/cta',
						'description' => '',
						'categories'  => array( 'call-to-action' ),
					),
				),
			),
			$transient,
			'The transient for block theme patterns should be set'
		);
	}

	/**
	 * Data provider.
	 *
	 * @return array[]
	 */
	public function data_wp_get_block_patterns() {
		return array(
			array(
				'theme'    => 'block-theme',
				'patterns' => array(
					'version'  => '1.0.0',
					'patterns' => array(),
				),
			),
			array(
				'theme'    => 'block-theme-child',
				'patterns' => array(
					'version'  => '1.0.0',
					'patterns' => array(),
				),
			),
			array(
				'theme'    => 'block-theme-patterns',
				'patterns' => array(
					'version'  => '1.0.0',
					'patterns' => array(
						'cta.php' => array(
							'title'       => 'Centered Call To Action',
							'slug'        => 'block-theme-patterns/cta',
							'description' => '',
							'categories'  => array( 'call-to-action' ),
						),
					),
				),
			),
			array(
				'theme'    => 'broken-theme',
				'patterns' => array(
					'version'  => false,
					'patterns' => array(),
				),
			),
			array(
				'theme'    => 'invalid',
				'patterns' => array(
					'version'  => false,
					'patterns' => array(),
				),
			),
		);
	}
}
