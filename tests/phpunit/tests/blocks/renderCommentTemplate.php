<?php
/**
 * Tests for the Comment Template block rendering.
 *
 * @package WordPress
 * @subpackage Blocks
 * @since 6.0.0
 *
 * @group blocks
 */
class Tests_Blocks_RenderReusableCommentTemplate extends WP_UnitTestCase {

	private static $custom_post;
	private static $comment_ids;
	private static $per_page = 5;

	/**
	 * Array of the comments options and their original values.
	 * Used to reset the options after each test.
	 *
	 * @var array
	 */
	private static $original_options;

	public static function set_up_before_class() {
		parent::set_up_before_class();

		// Store the original option values.
		$options = array(
			'comment_order',
			'comments_per_page',
			'default_comments_page',
			'page_comments',
			'previous_default_page',
			'thread_comments_depth',
		);
		foreach ( $options as $option ) {
			static::$original_options[ $option ] = get_option( $option );
		}
	}

	public function tear_down() {
		// Reset the comment options to their original values.
		foreach ( static::$original_options as $option => $original_value ) {
			update_option( $option, $original_value );
		}

		parent::tear_down();
	}

	public function set_up() {
		parent::set_up();

		update_option( 'page_comments', true );
		update_option( 'comments_per_page', self::$per_page );

		self::$custom_post = self::factory()->post->create_and_get(
			array(
				'post_type'    => 'dogs',
				'post_status'  => 'publish',
				'post_name'    => 'metaldog',
				'post_title'   => 'Metal Dog',
				'post_content' => 'Metal Dog content',
				'post_excerpt' => 'Metal Dog',
			)
		);

		self::$comment_ids = self::factory()->comment->create_post_comments(
			self::$custom_post->ID,
			1,
			array(
				'comment_author'       => 'Test',
				'comment_author_email' => 'test@example.org',
				'comment_author_url'   => 'http://example.com/author-url/',
				'comment_content'      => 'Hello world',
			)
		);
	}

	/**
	 * @ticket 55505
	 * @covers ::build_comment_query_vars_from_block
	 */
	public function test_build_comment_query_vars_from_block_with_context() {
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);

		$this->assertSameSetsWithIndex(
			array(
				'orderby'       => 'comment_date_gmt',
				'order'         => 'ASC',
				'status'        => 'approve',
				'no_found_rows' => false,
				'post_id'       => self::$custom_post->ID,
				'hierarchical'  => 'threaded',
				'number'        => 5,
				'paged'         => 1,
			),
			build_comment_query_vars_from_block( $block )
		);
	}

	/**
	 * @ticket 55567
	 * @covers ::build_comment_query_vars_from_block
	 */
	public function test_build_comment_query_vars_from_block_with_context_no_pagination() {
		update_option( 'page_comments', false );
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);

		$this->assertSameSetsWithIndex(
			array(
				'orderby'       => 'comment_date_gmt',
				'order'         => 'ASC',
				'status'        => 'approve',
				'no_found_rows' => false,
				'post_id'       => self::$custom_post->ID,
				'hierarchical'  => 'threaded',
			),
			build_comment_query_vars_from_block( $block )
		);
	}

	/**
	 * @ticket 55505
	 * @covers ::build_comment_query_vars_from_block
	 */
	public function test_build_comment_query_vars_from_block_no_context() {
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block( $parsed_blocks[0] );

		$this->assertSameSetsWithIndex(
			array(
				'orderby'       => 'comment_date_gmt',
				'order'         => 'ASC',
				'status'        => 'approve',
				'no_found_rows' => false,
				'hierarchical'  => 'threaded',
				'number'        => 5,
				'paged'         => 1,
			),
			build_comment_query_vars_from_block( $block )
		);
	}

	/**
	 * Test that if pagination is set to display the last page by default (i.e. newest comments),
	 * the query is set to look for page 1 (rather than page 0, which would cause an error).
	 *
	 * Regression: https://github.com/WordPress/gutenberg/issues/40758.
	 *
	 * @ticket 55658
	 * @covers ::build_comment_query_vars_from_block
	 */
	public function test_build_comment_query_vars_from_block_pagination_with_no_comments() {
		$comments_per_page     = get_option( 'comments_per_page' );
		$default_comments_page = get_option( 'default_comments_page' );

		update_option( 'comments_per_page', 50 );
		update_option( 'previous_default_page', 'newest' );

		$post_without_comments = self::factory()->post->create_and_get(
			array(
				'post_type'    => 'post',
				'post_status'  => 'publish',
				'post_name'    => 'fluffycat',
				'post_title'   => 'Fluffy Cat',
				'post_content' => 'Fluffy Cat content',
				'post_excerpt' => 'Fluffy Cat',
			)
		);

		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => $post_without_comments->ID,
			)
		);

		$this->assertSameSetsWithIndex(
			array(
				'orderby'       => 'comment_date_gmt',
				'order'         => 'ASC',
				'status'        => 'approve',
				'no_found_rows' => false,
				'post_id'       => $post_without_comments->ID,
				'hierarchical'  => 'threaded',
				'number'        => 50,
			),
			build_comment_query_vars_from_block( $block )
		);
	}


	/**
	 * Test that both "Older Comments" and "Newer Comments" are displayed in the correct order
	 * inside the Comment Query Loop when we enable pagination on Discussion Settings.
	 * In order to do that, it should exist a query var 'cpage' set with the $comment_args['paged'] value.
	 *
	 * @ticket 55505
	 * @covers ::build_comment_query_vars_from_block
	 */
	public function test_build_comment_query_vars_from_block_sets_cpage_var() {

		// This could be any number, we set a fixed one instead of a random for better performance.
		$comment_query_max_num_pages = 5;
		// We subtract 1 because we created 1 comment at the beginning.
		$post_comments_numbers = ( self::$per_page * $comment_query_max_num_pages ) - 1;
		self::factory()->comment->create_post_comments(
			self::$custom_post->ID,
			$post_comments_numbers,
			array(
				'comment_author'       => 'Test',
				'comment_author_email' => 'test@example.org',
				'comment_author_url'   => 'http://example.com/author-url/',
				'comment_content'      => 'Hello world',
			)
		);
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block  = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId'           => self::$custom_post->ID,
				'comments/inherit' => true,
			)
		);
		$actual = build_comment_query_vars_from_block( $block );
		$this->assertSame( $comment_query_max_num_pages, $actual['paged'] );
		$this->assertSame( $comment_query_max_num_pages, get_query_var( 'cpage' ) );
	}

	/**
	 * Test rendering a single comment
	 *
	 * @ticket 55567
	 */
	public function test_rendering_comment_template() {
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);

		$this->assertSame(
			str_replace( array( "\n", "\t" ), '', '<ol class="wp-block-comment-template"><li id="comment-' . self::$comment_ids[0] . '" class="comment even thread-even depth-1"><div class="wp-block-comment-author-name"><a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >Test</a></div><div class="wp-block-comment-content"><p>Hello world</p></div></li></ol>' ),
			str_replace( array( "\n", "\t" ), '', $block->render() )
		);
	}

	/**
	 * Test rendering nested comments:
	 *
	 * └─ comment 1
	 *    └─ comment 2
	 *       └─ comment 4
	 *    └─ comment 3
	 *
	 * @ticket 55567
	 */
	public function test_rendering_comment_template_nested() {
		$first_level_ids = self::factory()->comment->create_post_comments(
			self::$custom_post->ID,
			2,
			array(
				'comment_parent'       => self::$comment_ids[0],
				'comment_author'       => 'Test',
				'comment_author_email' => 'test@example.org',
				'comment_author_url'   => 'http://example.com/author-url/',
				'comment_content'      => 'Hello world',
			)
		);

		$second_level_ids = self::factory()->comment->create_post_comments(
			self::$custom_post->ID,
			1,
			array(
				'comment_parent'       => $first_level_ids[0],
				'comment_author'       => 'Test',
				'comment_author_email' => 'test@example.org',
				'comment_author_url'   => 'http://example.com/author-url/',
				'comment_content'      => 'Hello world',
			)
		);

		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);

		$top_level_ids = self::$comment_ids;
		$expected      = str_replace(
			array( "\r\n", "\n", "\t" ),
			'',
			<<<END
				<ol class="wp-block-comment-template">
					<li id="comment-{$top_level_ids[0]}" class="comment even thread-even depth-1">
						<div class="wp-block-comment-author-name">
							<a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >
								Test
							</a>
						</div>
						<div class="wp-block-comment-content">
							<p>Hello world</p>
						</div>
						<ol>
							<li id="comment-{$first_level_ids[0]}" class="comment odd alt depth-2">
								<div class="wp-block-comment-author-name">
									<a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >
										Test
									</a>
								</div>
								<div class="wp-block-comment-content">
									<p>Hello world</p>
								</div>
								<ol>
									<li id="comment-{$second_level_ids[0]}" class="comment even depth-3">
										<div class="wp-block-comment-author-name">
											<a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >
												Test
											</a>
										</div>
										<div class="wp-block-comment-content">
											<p>Hello world</p>
										</div>
									</li>
								</ol>
							</li>
							<li id="comment-{$first_level_ids[1]}" class="comment odd alt depth-2">
								<div class="wp-block-comment-author-name">
									<a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >
										Test
									</a>
								</div>
								<div class="wp-block-comment-content">
									<p>Hello world</p>
								</div>
							</li>
						</ol>
					</li>
				</ol>
END
		);

		$this->assertSame(
			$expected,
			str_replace( array( "\r\n", "\n", "\t" ), '', $block->render() )
		);
	}

	/**
	 * Test that line and paragraph breaks are converted to HTML tags in a comment.
	 *
	 * @ticket 55643
	 */
	public function test_render_block_core_comment_content_converts_to_html() {
		$comment_id  = self::$comment_ids[0];
		$new_content = "Paragraph One\n\nP2L1\nP2L2\n\nhttps://example.com/";
		self::factory()->comment->update_object(
			$comment_id,
			array( 'comment_content' => $new_content )
		);

		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId'           => self::$custom_post->ID,
				'comments/inherit' => true,
			)
		);

		$expected_content = "<p>Paragraph One</p>\n<p>P2L1<br />\nP2L2</p>\n<p><a href=\"https://example.com/\" rel=\"nofollow ugc\">https://example.com/</a></p>\n";

		$this->assertSame(
			'<ol class="wp-block-comment-template"><li id="comment-' . self::$comment_ids[0] . '" class="comment even thread-even depth-1"><div class="wp-block-comment-content">' . $expected_content . '</div></li></ol>',
			$block->render()
		);
	}

	/**
	 * Test that unapproved comments are included if it is a preview.
	 *
	 * @ticket 55634
	 * @covers ::build_comment_query_vars_from_block
	 */
	public function test_build_comment_query_vars_from_block_with_comment_preview() {
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);

		$commenter_filter = static function () {
			return array(
				'comment_author_email' => 'unapproved@example.org',
			);
		};

		add_filter( 'wp_get_current_commenter', $commenter_filter );

		$this->assertSameSetsWithIndex(
			array(
				'orderby'            => 'comment_date_gmt',
				'order'              => 'ASC',
				'status'             => 'approve',
				'no_found_rows'      => false,
				'include_unapproved' => array( 'unapproved@example.org' ),
				'post_id'            => self::$custom_post->ID,
				'hierarchical'       => 'threaded',
				'number'             => 5,
				'paged'              => 1,
			),
			build_comment_query_vars_from_block( $block )
		);
	}

	/**
	 * Test rendering an unapproved comment preview.
	 *
	 * @ticket 55643
	 */
	public function test_rendering_comment_template_unmoderated_preview() {
		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-author-name /--><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);

		$unapproved_comment = self::factory()->comment->create_post_comments(
			self::$custom_post->ID,
			1,
			array(
				'comment_author'       => 'Visitor',
				'comment_author_email' => 'unapproved@example.org',
				'comment_author_url'   => 'http://example.com/unapproved/',
				'comment_content'      => 'Hi there! My comment needs moderation.',
				'comment_approved'     => 0,
			)
		);

		$block = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);

		$commenter_filter = static function () {
			return array(
				'comment_author_email' => 'unapproved@example.org',
			);
		};

		add_filter( 'wp_get_current_commenter', $commenter_filter );

		$this->assertSame(
			'<ol class="wp-block-comment-template"><li id="comment-' . self::$comment_ids[0] . '" class="comment even thread-even depth-1"><div class="wp-block-comment-author-name"><a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >Test</a></div><div class="wp-block-comment-content"><p>Hello world</p></div></li><li id="comment-' . $unapproved_comment[0] . '" class="comment odd alt thread-odd thread-alt depth-1"><div class="wp-block-comment-author-name">Visitor</div><div class="wp-block-comment-content"><p><em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em></p>Hi there! My comment needs moderation.</div></li></ol>',
			str_replace( array( "\n", "\t" ), '', $block->render() ),
			'Should include unapproved comments when filter applied'
		);

		remove_filter( 'wp_get_current_commenter', $commenter_filter );

		// Test it again and ensure the unmoderated comment doesn't leak out.
		$this->assertSame(
			'<ol class="wp-block-comment-template"><li id="comment-' . self::$comment_ids[0] . '" class="comment even thread-even depth-1"><div class="wp-block-comment-author-name"><a rel="external nofollow ugc" href="http://example.com/author-url/" target="_self" >Test</a></div><div class="wp-block-comment-content"><p>Hello world</p></div></li></ol>',
			str_replace( array( "\n", "\t" ), '', $block->render() ),
			'Should not include any unapproved comments after removing filter'
		);
	}

	/**
	 * Tests that the Comment Template block makes comment ID context available to programmatically inserted child blocks.
	 *
	 * @ticket 58839
	 *
	 * @covers ::render_block_core_comment_template
	 * @covers ::block_core_comment_template_render_comments
	 */
	public function test_rendering_comment_template_sets_comment_id_context() {
		$render_block_context_callback = new MockAction();
		add_filter( 'render_block_context', array( $render_block_context_callback, 'filter' ), 2, 3 );

		$parsed_comment_author_name_block = parse_blocks( '<!-- wp:comment-author-name /-->' )[0];
		$comment_author_name_block        = new WP_Block(
			$parsed_comment_author_name_block,
			array(
				'commentId' => self::$comment_ids[0],
			)
		);
		$comment_author_name_block_markup = $comment_author_name_block->render();

		add_filter(
			'render_block',
			static function ( $block_content, $block ) use ( $parsed_comment_author_name_block ) {
				/*
				* Insert a Comment Author Name block (which requires `commentId`
				* block context to work) after the Comment Content block.
				*/
				if ( 'core/comment-content' !== $block['blockName'] ) {
					return $block_content;
				}

				$inserted_content = render_block( $parsed_comment_author_name_block );
				return $inserted_content . $block_content;
			},
			10,
			3
		);

		$parsed_blocks = parse_blocks(
			'<!-- wp:comment-template --><!-- wp:comment-content /--><!-- /wp:comment-template -->'
		);
		$block         = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);
		$markup        = $block->render();

		$this->assertStringContainsString( $comment_author_name_block_markup, $markup );

		$args    = $render_block_context_callback->get_args();
		$context = $args[0][0];
		$this->assertArrayHasKey(
			'commentId',
			$context,
			"commentId block context wasn't set for render_block_context filter at priority 2."
		);
		$this->assertSame(
			strval( self::$comment_ids[0] ),
			$context['commentId'],
			"commentId block context wasn't set correctly."
		);
	}

	/**
	 * Tests that an inner block added via the render_block_data filter is retained at render_block stage.
	 *
	 * @ticket 58839
	 *
	 * @covers ::render_block_core_comment_template
	 * @covers ::block_core_comment_template_render_comments
	 */
	public function test_inner_block_inserted_by_render_block_data_is_retained() {
		$render_block_callback = new MockAction();
		add_filter( 'render_block', array( $render_block_callback, 'filter' ), 10, 3 );

		$render_block_data_callback = static function ( $parsed_block ) {
			// Add a Social Links block to a Comment Template block's inner blocks.
			if ( 'core/comment-template' === $parsed_block['blockName'] ) {
				$inserted_block_markup = <<<END
<!-- wp:social-links -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /--></ul>
<!-- /wp:social-links -->'
END;

				$inserted_blocks = parse_blocks( $inserted_block_markup );

				$parsed_block['innerBlocks'][] = $inserted_blocks[0];
			}
			return $parsed_block;
		};

		add_filter( 'render_block_data', $render_block_data_callback, 10, 1 );
		$parsed_blocks = parse_blocks(
			'<!-- wp:comments --><!-- wp:comment-template --><!-- wp:comment-content /--><!-- /wp:comment-template --><!-- /wp:comments -->'
		);
		$block         = new WP_Block(
			$parsed_blocks[0],
			array(
				'postId' => self::$custom_post->ID,
			)
		);
		$block->render();
		remove_filter( 'render_block_data', $render_block_data_callback );

		$this->assertSame(
			5,
			$render_block_callback->get_call_count(),
			"render_block filter wasn't called the correct number of 5 times."
		);

		$args = $render_block_callback->get_args();
		$this->assertSame(
			'core/comment-content',
			$args[0][2]->name,
			"render_block filter didn't receive Comment Content block instance upon first call."
		);
		$this->assertSame(
			'core/comment-template',
			$args[1][2]->name,
			"render_block filter didn't receive Comment Template block instance upon second call."
		);
		$this->assertCount(
			2,
			$args[1][2]->inner_blocks,
			"Inner block inserted by render_block_data filter wasn't retained."
		);
		$this->assertInstanceOf(
			'WP_Block',
			$args[1][2]->inner_blocks[1],
			"Inner block inserted by render_block_data isn't a WP_Block class instance."
		);
		$this->assertSame(
			'core/social-links',
			$args[1][2]->inner_blocks[1]->name,
			"Inner block inserted by render_block_data isn't named as expected."
		);
	}
}
