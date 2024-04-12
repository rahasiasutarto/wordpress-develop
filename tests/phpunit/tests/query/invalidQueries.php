<?php

/**
 * @group query
 */
class Tests_Query_InvalidQueries extends WP_UnitTestCase {

	/**
	 * Store last query generated by WP_Query.
	 *
	 * @var string
	 */
	public static $last_posts_request;

	/**
	 * Author for creating posts.
	 *
	 * @var int
	 */
	public static $author_id;

	/**
	 * Shared fixture page IDs.
	 *
	 * @var int[]
	 */
	public static $page_ids;

	/**
	 * Shared fixture post IDs.
	 *
	 * @var int[]
	 */
	public static $post_ids;

	/**
	 * Generate shared fixtures.
	 *
	 * @param WP_UnitTest_Factory $factory Test suite factory.
	 */
	public static function wpSetUpBeforeClass( WP_UnitTest_Factory $factory ) {
		self::$author_id = $factory->user->create();

		foreach ( array( 'publish', 'private' ) as $status ) {
			self::$page_ids[ $status ] = $factory->post->create(
				array(
					'post_type'   => 'page',
					'post_status' => $status,
					'post_author' => self::$author_id,
				)
			);

			self::$post_ids[ $status ] = $factory->post->create(
				array(
					'post_status' => $status,
					'post_author' => self::$author_id,
				)
			);
		}
	}

	/**
	 * Set up prior to each test.
	 */
	public function set_up() {
		parent::set_up();

		// Clean up variable before each test.
		self::$last_posts_request = '';
		// Store last query for tests.
		add_filter( 'posts_request', array( $this, '_set_last_posts_request' ) );
	}

	/**
	 * Filter to store last SQL query generated by WP_Query.
	 *
	 * @param string $request Generated SQL query.
	 * @return string Unmodified SQL query.
	 */
	public function _set_last_posts_request( $request ) {
		self::$last_posts_request = $request;
		return $request;
	}

	/**
	 * Test WP Query with an invalid post type.
	 *
	 * @ticket 48556
	 */
	public function test_unregistered_post_type_wp_query() {
		global $wpdb;

		$query = new WP_Query( array( 'post_type' => 'unregistered_cpt' ) );

		$this->assertStringContainsString( "{$wpdb->posts}.post_type = 'unregistered_cpt'", self::$last_posts_request );
		$this->assertStringContainsString( "{$wpdb->posts}.post_status = 'publish'", self::$last_posts_request );
		$this->assertCount( 0, $query->posts );
	}

	/**
	 * Test WP Query with an invalid post type in a multiple post type query.
	 *
	 * @ticket 48556
	 */
	public function test_unregistered_post_type_wp_query_multiple_post_types() {
		global $wpdb;

		$query = new WP_Query(
			array(
				'post_type' => array( 'unregistered_cpt', 'page' ),
			)
		);

		$this->assertStringContainsString( "{$wpdb->posts}.post_type = 'unregistered_cpt'", self::$last_posts_request );
		$this->assertCount( 1, $query->posts, 'the valid `page` post type should still return one post' );
	}

	/**
	 * Test WP Query with an invalid post type specified in the URL.
	 *
	 * @ticket 48556
	 */
	public function test_unregistered_post_type_goto() {
		global $wpdb, $wp_query;

		$this->go_to( home_url( '?post_type=unregistered_cpt' ) );

		$this->assertStringContainsString( "{$wpdb->posts}.post_type = 'unregistered_cpt'", self::$last_posts_request );
		$this->assertStringContainsString( "{$wpdb->posts}.post_status = 'publish'", self::$last_posts_request );
		// $wp_query recovers to the post type "post" and is expected to return one.
		$this->assertCount( 1, $wp_query->get_posts() );
	}

	/**
	 * Ensure deprecated static parameter has no effect on queries.
	 */
	public function test_deprecated_parameters_have_no_effect_on_page() {
		$query = new WP_Query(
			array(
				'static'    => 'a',
				'post_type' => 'page',
			)
		);

		// Only the published page should be returned.
		$this->assertCount( 1, $query->posts );
	}

	/**
	 * Ensure deprecated static parameter has no effect on queries.
	 */
	public function test_deprecated_parameters_have_no_effect_on_post() {
		$query = new WP_Query(
			array(
				'static' => 'a',
			)
		);

		// Only the published post should be returned.
		$this->assertCount( 1, $query->posts );
	}

	/**
	 * Ensure a non-scalar page parameter does not throw a fatal error for trim().
	 *
	 * @ticket 56558
	 * @covers WP_Query::get_posts
	 */
	public function test_non_scalar_page_value() {
		$query = new WP_Query(
			array(
				'page' => array( 1, 2, 3 ),
			)
		);

		$this->assertSame( 0, $query->query_vars['page'] );
	}
}
