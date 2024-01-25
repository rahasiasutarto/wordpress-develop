<?php
/**
 * Tests for the insert_hooked_blocks function.
 *
 * @package WordPress
 * @subpackage Blocks
 *
 * @since 6.5.0
 *
 * @group blocks
 * @group block-hooks
 */
class Tests_Blocks_InsertHookedBlocks extends WP_UnitTestCase {
	const ANCHOR_BLOCK_TYPE       = 'tests/anchor-block';
	const HOOKED_BLOCK_TYPE       = 'tests/hooked-block';
	const OTHER_HOOKED_BLOCK_TYPE = 'tests/other-hooked-block';

	const HOOKED_BLOCKS = array(
		self::ANCHOR_BLOCK_TYPE => array(
			'after'  => array( self::HOOKED_BLOCK_TYPE ),
			'before' => array( self::OTHER_HOOKED_BLOCK_TYPE ),
		),
	);

	/**
	 * @ticket 59572
	 * @ticket 60126
	 *
	 * @covers ::insert_hooked_blocks
	 */
	public function test_insert_hooked_blocks_adds_metadata() {
		$anchor_block = array(
			'blockName' => self::ANCHOR_BLOCK_TYPE,
		);

		$actual = insert_hooked_blocks( $anchor_block, 'after', self::HOOKED_BLOCKS, array() );
		$this->assertSame(
			array( self::HOOKED_BLOCK_TYPE ),
			$anchor_block['attrs']['metadata']['ignoredHookedBlocks'],
			"Hooked block type wasn't added to ignoredHookedBlocks metadata."
		);
		$this->assertSame(
			'<!-- wp:' . self::HOOKED_BLOCK_TYPE . ' /-->',
			$actual,
			"Markup for hooked block wasn't generated correctly."
		);
	}

	/**
	 * @ticket 59572
	 * @ticket 60126
	 *
	 * @covers ::insert_hooked_blocks
	 */
	public function test_insert_hooked_blocks_if_block_is_already_hooked() {
		$anchor_block = array(
			'blockName' => 'tests/anchor-block',
			'attrs'     => array(
				'metadata' => array(
					'ignoredHookedBlocks' => array( self::HOOKED_BLOCK_TYPE ),
				),
			),
		);

		$actual = insert_hooked_blocks( $anchor_block, 'after', self::HOOKED_BLOCKS, array() );
		$this->assertSame(
			array( self::HOOKED_BLOCK_TYPE ),
			$anchor_block['attrs']['metadata']['ignoredHookedBlocks'],
			"ignoredHookedBlocks metadata shouldn't have been modified."
		);
		$this->assertSame(
			'',
			$actual,
			"No markup should've been generated for ignored hooked block."
		);
	}

	/**
	 * @ticket 59572
	 * @ticket 60126
	 *
	 * @covers ::insert_hooked_blocks
	 */
	public function test_insert_hooked_blocks_adds_to_ignored_hooked_blocks() {
		$anchor_block = array(
			'blockName' => 'tests/anchor-block',
			'attrs'     => array(
				'metadata' => array(
					'ignoredHookedBlocks' => array( self::HOOKED_BLOCK_TYPE ),
				),
			),
		);

		$actual = insert_hooked_blocks( $anchor_block, 'before', self::HOOKED_BLOCKS, array() );
		$this->assertSame(
			array( self::HOOKED_BLOCK_TYPE, self::OTHER_HOOKED_BLOCK_TYPE ),
			$anchor_block['attrs']['metadata']['ignoredHookedBlocks'],
			"Newly hooked block should've been added to ignoredHookedBlocks metadata while retaining previously ignored one."
		);
		$this->assertSame(
			'<!-- wp:' . self::OTHER_HOOKED_BLOCK_TYPE . ' /-->',
			$actual,
			"Markup for newly hooked block should've been generated."
		);
	}

	/**
	 * @ticket 59572
	 * @ticket 60126
	 *
	 * @covers ::insert_hooked_blocks
	 */
	public function test_insert_hooked_blocks_filter_can_set_attributes() {
		$anchor_block = array(
			'blockName'    => self::ANCHOR_BLOCK_TYPE,
			'attrs'        => array(
				'layout' => array(
					'type' => 'constrained',
				),
			),
			'innerContent' => array(),
		);

		$filter = function ( $parsed_hooked_block, $relative_position, $parsed_anchor_block ) {
			// Is the hooked block adjacent to the anchor block?
			if ( 'before' !== $relative_position && 'after' !== $relative_position ) {
				return $parsed_hooked_block;
			}

			// Does the anchor block have a layout attribute?
			if ( isset( $parsed_anchor_block['attrs']['layout'] ) ) {
				// Copy the anchor block's layout attribute to the hooked block.
				$parsed_hooked_block['attrs']['layout'] = $parsed_anchor_block['attrs']['layout'];
			}

			return $parsed_hooked_block;
		};
		add_filter( 'hooked_block_' . self::HOOKED_BLOCK_TYPE, $filter, 10, 3 );
		$actual = insert_hooked_blocks( $anchor_block, 'after', self::HOOKED_BLOCKS, array() );
		remove_filter( 'hooked_block_' . self::HOOKED_BLOCK_TYPE, $filter, 10, 3 );

		$this->assertSame(
			array( self::HOOKED_BLOCK_TYPE ),
			$anchor_block['attrs']['metadata']['ignoredHookedBlocks'],
			"Hooked block type wasn't added to ignoredHookedBlocks metadata."
		);
		$this->assertSame(
			'<!-- wp:' . self::HOOKED_BLOCK_TYPE . ' {"layout":{"type":"constrained"}} /-->',
			$actual,
			"Markup wasn't generated correctly for hooked block with attribute set by filter."
		);
	}

	/**
	 * @ticket 59572
	 * @ticket 60126
	 *
	 * @covers ::insert_hooked_blocks
	 */
	public function test_insert_hooked_blocks_filter_can_wrap_block() {
		$anchor_block = array(
			'blockName'    => self::ANCHOR_BLOCK_TYPE,
			'attrs'        => array(
				'layout' => array(
					'type' => 'constrained',
				),
			),
			'innerContent' => array(),
		);

		$filter = function ( $parsed_hooked_block ) {
			if ( self::HOOKED_BLOCK_TYPE !== $parsed_hooked_block['blockName'] ) {
				return $parsed_hooked_block;
			}

			// Wrap the block in a Group block.
			return array(
				'blockName'    => 'core/group',
				'attrs'        => array(),
				'innerBlocks'  => array( $parsed_hooked_block ),
				'innerContent' => array(
					'<div class="wp-block-group">',
					null,
					'</div>',
				),
			);
		};
		add_filter( 'hooked_block_' . self::HOOKED_BLOCK_TYPE, $filter, 10, 3 );
		$actual = insert_hooked_blocks( $anchor_block, 'after', self::HOOKED_BLOCKS, array() );
		remove_filter( 'hooked_block_' . self::HOOKED_BLOCK_TYPE, $filter, 10, 3 );

		$this->assertSame(
			array( self::HOOKED_BLOCK_TYPE ),
			$anchor_block['attrs']['metadata']['ignoredHookedBlocks'],
			"Hooked block type wasn't added to ignoredHookedBlocks metadata."
		);
		$this->assertSame(
			'<!-- wp:group --><div class="wp-block-group"><!-- wp:' . self::HOOKED_BLOCK_TYPE . ' /--></div><!-- /wp:group -->',
			$actual,
			"Markup wasn't generated correctly for hooked block wrapped in Group block by filter."
		);
	}
}
