<?php

/**
 * Tests specific to managing network options in multisite.
 *
 * Some tests will run in single site as the `_network_option()` functions
 * are available and internally use `_option()` functions as fallbacks.
 *
 * @group option
 * @group ms-option
 * @group multisite
 */
class Tests_Option_NetworkOption extends WP_UnitTestCase {

	/**
	 * @group ms-required
	 *
	 * @covers ::add_site_option
	 */
	public function test_add_network_option_not_available_on_other_network() {
		$id     = self::factory()->network->create();
		$option = __FUNCTION__;
		$value  = __FUNCTION__;

		add_site_option( $option, $value );
		$this->assertFalse( get_network_option( $id, $option, false ) );
	}

	/**
	 * @group ms-required
	 *
	 * @covers ::add_network_option
	 */
	public function test_add_network_option_available_on_same_network() {
		$id     = self::factory()->network->create();
		$option = __FUNCTION__;
		$value  = __FUNCTION__;

		add_network_option( $id, $option, $value );
		$this->assertSame( $value, get_network_option( $id, $option, false ) );
	}

	/**
	 * @group ms-required
	 *
	 * @covers ::delete_site_option
	 */
	public function test_delete_network_option_on_only_one_network() {
		$id     = self::factory()->network->create();
		$option = __FUNCTION__;
		$value  = __FUNCTION__;

		add_site_option( $option, $value );
		add_network_option( $id, $option, $value );
		delete_site_option( $option );
		$this->assertSame( $value, get_network_option( $id, $option, false ) );
	}

	/**
	 * @ticket 22846
	 * @group ms-excluded
	 *
	 * @covers ::add_network_option
	 */
	public function test_add_network_option_is_not_stored_as_autoload_option() {
		$key = __FUNCTION__;

		add_network_option( null, $key, 'Not an autoload option' );

		$options = wp_load_alloptions();

		$this->assertArrayNotHasKey( $key, $options );
	}

	/**
	 * @ticket 22846
	 * @group ms-excluded
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_is_not_stored_as_autoload_option() {
		$key = __FUNCTION__;

		update_network_option( null, $key, 'Not an autoload option' );

		$options = wp_load_alloptions();

		$this->assertArrayNotHasKey( $key, $options );
	}

	/**
	 * @dataProvider data_network_id_parameter
	 *
	 * @param $network_id
	 * @param $expected_response
	 *
	 * @covers ::add_network_option
	 */
	public function test_add_network_option_network_id_parameter( $network_id, $expected_response ) {
		$option = rand_str();
		$value  = rand_str();

		$this->assertSame( $expected_response, add_network_option( $network_id, $option, $value ) );
	}

	/**
	 * @dataProvider data_network_id_parameter
	 *
	 * @param $network_id
	 * @param $expected_response
	 *
	 * @covers ::get_network_option
	 */
	public function test_get_network_option_network_id_parameter( $network_id, $expected_response ) {
		$option = rand_str();

		$this->assertSame( $expected_response, get_network_option( $network_id, $option, true ) );
	}

	public function data_network_id_parameter() {
		return array(
			// Numeric values should always be accepted.
			array( 1, true ),
			array( '1', true ),
			array( 2, true ),

			// Null, false, and zero will be treated as the current network.
			array( null, true ),
			array( false, true ),
			array( 0, true ),
			array( '0', true ),

			// Other truthy or string values should be rejected.
			array( true, false ),
			array( 'string', false ),
		);
	}

	/**
	 * @ticket 43506
	 * @group ms-required
	 *
	 * @covers ::get_network_option
	 * @covers ::wp_cache_get
	 * @covers ::wp_cache_delete
	 */
	public function test_get_network_option_sets_notoptions_if_option_found() {
		$network_id     = get_current_network_id();
		$notoptions_key = "$network_id:notoptions";

		$original_cache = wp_cache_get( $notoptions_key, 'site-options' );
		if ( false !== $original_cache ) {
			wp_cache_delete( $notoptions_key, 'site-options' );
		}

		// Retrieve any existing option.
		get_network_option( $network_id, 'site_name' );

		$cache = wp_cache_get( $notoptions_key, 'site-options' );
		if ( false !== $original_cache ) {
			wp_cache_set( $notoptions_key, $original_cache, 'site-options' );
		}

		$this->assertSame( array(), $cache );
	}

	/**
	 * @ticket 43506
	 * @group ms-required
	 *
	 * @covers ::get_network_option
	 * @covers ::wp_cache_get
	 */
	public function test_get_network_option_sets_notoptions_if_option_not_found() {
		$network_id     = get_current_network_id();
		$notoptions_key = "$network_id:notoptions";

		$original_cache = wp_cache_get( $notoptions_key, 'site-options' );
		if ( false !== $original_cache ) {
			wp_cache_delete( $notoptions_key, 'site-options' );
		}

		// Retrieve any non-existing option.
		get_network_option( $network_id, 'this_does_not_exist' );

		$cache = wp_cache_get( $notoptions_key, 'site-options' );
		if ( false !== $original_cache ) {
			wp_cache_set( $notoptions_key, $original_cache, 'site-options' );
		}

		$this->assertSame( array( 'this_does_not_exist' => true ), $cache );
	}

	/**
	 * Ensure updating network options containing an object do not result in unneeded database calls.
	 *
	 * @ticket 44956
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_array_with_object() {
		$array_w_object = array(
			'url'       => 'http://src.wordpress-develop.dev/wp-content/uploads/2016/10/cropped-Blurry-Lights.jpg',
			'meta_data' => (object) array(
				'attachment_id' => 292,
				'height'        => 708,
				'width'         => 1260,
			),
		);

		$array_w_object_2 = array(
			'url'       => 'http://src.wordpress-develop.dev/wp-content/uploads/2016/10/cropped-Blurry-Lights.jpg',
			'meta_data' => (object) array(
				'attachment_id' => 292,
				'height'        => 708,
				'width'         => 1260,
			),
		);

		// Add the option, it did not exist before this.
		add_network_option( null, 'array_w_object', $array_w_object );

		$num_queries_pre_update = get_num_queries();

		// Update the option using the same array with an object for the value.
		$this->assertFalse( update_network_option( null, 'array_w_object', $array_w_object_2 ) );

		// Check that no new database queries were performed.
		$this->assertSame( $num_queries_pre_update, get_num_queries() );
	}

	/**
	 * Tests that update_network_option() triggers one additional query and returns true
	 * for some loosely equal old and new values when the old value is retrieved from the cache.
	 *
	 * The additional query is triggered to update the value in the database.
	 *
	 * If the old value is false, the additional queries are triggered to:
	 * 1. get the old value from the database via get_network_option() -> get_option().
	 * 2. (Single Site only) get the old value from the database via update_network_option() -> update_option() -> get_option().
	 * 3. update the value in the database via update_network_options() -> update_option().
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 *
	 * @dataProvider data_loosely_equal_values_that_should_update
	 *
	 * @param mixed $old_value The old value.
	 * @param mixed $new_value The new value to try to set.
	 */
	public function test_update_network_option_should_update_some_loosely_equal_values_from_cache( $old_value, $new_value ) {
		add_network_option( null, 'foo', $old_value );

		$num_queries = get_num_queries();

		// Comparison will happen against value cached during add_network_option() above.
		$updated = update_network_option( null, 'foo', $new_value );

		$expected_queries = 1;

		if ( false === $old_value ) {
			$expected_queries = is_multisite() ? 2 : 3;
		}

		$this->assertSame( $expected_queries, get_num_queries() - $num_queries, "The number of queries should have increased by $expected_queries." );
		$this->assertTrue( $updated, 'update_network_option() should have returned true.' );
	}

	/**
	 * Tests that update_network_option() triggers two additional queries and returns true
	 * for some loosely equal old and new values when the old value is retrieved from the database.
	 *
	 * The two additional queries are triggered to:
	 * 1. retrieve the old value from the database, as the option does not exist in the cache.
	 * 2. update the value in the database.
	 *
	 * On Single Site, if the old value is false, the four additional queries are triggered to:
	 * 1. get the old value from the database via get_network_option() -> get_option().
	 * 2. get the alloptions cache via get_network_option() -> get_option().
	 * 3. get the old value from the database via update_network_option() -> update_option() -> get_option().
	 * 4. update the value in the database via update_network_options() -> update_option().
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 *
	 * @dataProvider data_loosely_equal_values_that_should_update
	 *
	 * @param mixed $old_value The old value.
	 * @param mixed $new_value The new value to try to set.
	 */
	public function test_update_network_option_should_update_some_loosely_equal_values_from_db( $old_value, $new_value ) {
		add_network_option( null, 'foo', $old_value );

		$num_queries = get_num_queries();

		// Delete cache.
		$network_cache_key = get_current_network_id() . ':foo';
		wp_cache_delete( $network_cache_key, 'site-options' );
		wp_cache_delete( 'alloptions', 'options' );

		$updated = update_network_option( null, 'foo', $new_value );

		$expected_queries = false === $old_value && ! is_multisite() ? 4 : 2;

		$this->assertSame( $expected_queries, get_num_queries() - $num_queries, "The number of queries should have increased by $expected_queries." );
		$this->assertTrue( $updated, 'update_network_option() should have returned true.' );
	}

	/**
	 * Tests that update_network_option() triggers one additional query and returns true
	 * for some loosely equal old and new values when the old value is retrieved from a refreshed cache.
	 *
	 * The additional query is triggered to update the value in the database.
	 *
	 * If the old value is false, the additional queries are triggered to:
	 * 1. get the old value from the database via get_network_option() -> get_option().
	 * 2. get the old value from the database via update_network_option() -> update_option() -> get_option().
	 * 3. update the value in the database via update_network_options() -> update_option().
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 *
	 * @dataProvider data_loosely_equal_values_that_should_update
	 *
	 * @param mixed $old_value The old value.
	 * @param mixed $new_value The new value to try to set.
	 */
	public function test_update_network_option_should_update_some_loosely_equal_values_from_refreshed_cache( $old_value, $new_value ) {
		add_network_option( null, 'foo', $old_value );

		// Delete and refresh cache from DB.
		wp_cache_delete( 'alloptions', 'options' );
		wp_load_alloptions();

		$num_queries = get_num_queries();
		$updated     = update_network_option( null, 'foo', $new_value );

		$expected_queries = 1;

		if ( false === $old_value ) {
			$expected_queries = is_multisite() ? 2 : 3;
		}

		$this->assertSame( $expected_queries, get_num_queries() - $num_queries, "The number of queries should have increased by $expected_queries." );
		$this->assertTrue( $updated, 'update_network_option() should have returned true.' );
	}

	/**
	 * Data provider.
	 *
	 * @return array
	 */
	public function data_loosely_equal_values_that_should_update() {
		return array(
			// Falsey values.
			'(string) "0" to false'       => array( '0', false ),
			'empty string to (int) 0'     => array( '', 0 ),
			'empty string to (float) 0.0' => array( '', 0.0 ),
			'(int) 0 to empty string'     => array( 0, '' ),
			'(int) 0 to false'            => array( 0, false ),
			'(float) 0.0 to empty string' => array( 0.0, '' ),
			'(float) 0.0 to false'        => array( 0.0, false ),
			'false to (string) "0"'       => array( false, '0' ),
			'false to (int) 0'            => array( false, 0 ),
			'false to (float) 0.0'        => array( false, 0.0 ),

			// Non-scalar values.
			'false to array()'            => array( false, array() ),
			'(string) "false" to array()' => array( 'false', array() ),
			'empty string to array()'     => array( '', array() ),
			'(int 0) to array()'          => array( 0, array() ),
			'(string) "0" to array()'     => array( '0', array() ),
			'(string) "false" to null'    => array( 'false', null ),
			'(int) 0 to null'             => array( 0, null ),
			'(string) "0" to null'        => array( '0', null ),
			'array() to false'            => array( array(), false ),
			'array() to (string) "false"' => array( array(), 'false' ),
			'array() to empty string'     => array( array(), '' ),
			'array() to (int) 0'          => array( array(), 0 ),
			'array() to (string) "0"'     => array( array(), '0' ),
			'array() to null'             => array( array(), null ),
		);
	}

	/**
	 * Tests that update_network_option() triggers no additional queries and returns false
	 * for some values when the old value is retrieved from the cache.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 *
	 * @dataProvider data_loosely_equal_values_that_should_not_update
	 * @dataProvider data_strictly_equal_values
	 *
	 * @param mixed $old_value The old value.
	 * @param mixed $new_value The new value to try to set.
	 */
	public function test_update_network_option_should_not_update_some_values_from_cache( $old_value, $new_value ) {
		add_network_option( null, 'foo', $old_value );

		$num_queries = get_num_queries();

		// Comparison will happen against value cached during add_option() above.
		$updated = update_network_option( null, 'foo', $new_value );

		$this->assertSame( $num_queries, get_num_queries(), 'No additional queries should have run.' );
		$this->assertFalse( $updated, 'update_network_option() should have returned false.' );
	}

	/**
	 * Tests that update_network_option() triggers one additional query and returns false
	 * for some values when the old value is retrieved from the database.
	 *
	 * The additional query is triggered to retrieve the old value from the database.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 *
	 * @dataProvider data_loosely_equal_values_that_should_not_update
	 * @dataProvider data_strictly_equal_values
	 *
	 * @param mixed $old_value The old value.
	 * @param mixed $new_value The new value to try to set.
	 */
	public function test_update_network_option_should_not_update_some_values_from_db( $old_value, $new_value ) {
		add_network_option( null, 'foo', $old_value );

		$num_queries = get_num_queries();

		// Delete cache.
		$network_cache_key = get_current_network_id() . ':foo';
		wp_cache_delete( $network_cache_key, 'site-options' );
		wp_cache_delete( 'alloptions', 'options' );

		$updated = update_network_option( null, 'foo', $new_value );

		$this->assertSame( 1, get_num_queries() - $num_queries, 'One additional query should have run to update the value.' );
		$this->assertFalse( $updated, 'update_network_option() should have returned false.' );
	}

	/**
	 * Tests that update_network_option() triggers no additional queries and returns false
	 * for some values when the old value is retrieved from a refreshed cache.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 *
	 * @dataProvider data_loosely_equal_values_that_should_not_update
	 * @dataProvider data_strictly_equal_values
	 *
	 * @param mixed $old_value The old value.
	 * @param mixed $new_value The new value to try to set.
	 */
	public function test_update_network_option_should_not_update_some_values_from_refreshed_cache( $old_value, $new_value ) {
		add_network_option( null, 'foo', $old_value );

		// Delete and refresh cache from DB.
		wp_cache_delete( 'alloptions', 'options' );
		wp_load_alloptions();

		$num_queries = get_num_queries();
		$updated     = update_network_option( null, 'foo', $new_value );

		/*
		 * Strictly equal old and new values will cause an early return
		 * with no additional queries.
		 */
		$this->assertSame( $num_queries, get_num_queries(), 'No additional queries should have run.' );
		$this->assertFalse( $updated, 'update_network_option() should have returned false.' );
	}

	/**
	 * Data provider.
	 *
	 * @return array[]
	 */
	public function data_loosely_equal_values_that_should_not_update() {
		return array(
			// Truthy values.
			'(string) "1" to (int) 1'     => array( '1', 1 ),
			'(string) "1" to (float) 1.0' => array( '1', 1.0 ),
			'(string) "1" to true'        => array( '1', true ),
			'(int) 1 to (string) "1"'     => array( 1, '1' ),
			'1 to (float) 1.0'            => array( 1, 1.0 ),
			'(int) 1 to true'             => array( 1, true ),
			'(float) 1.0 to (string) "1"' => array( 1.0, '1' ),
			'(float) 1.0 to (int) 1'      => array( 1.0, 1 ),
			'1.0 to true'                 => array( 1.0, true ),
			'true to (string) "1"'        => array( true, '1' ),
			'true to 1'                   => array( true, 1 ),
			'true to (float) 1.0'         => array( true, 1.0 ),

			// Falsey values.
			'(string) "0" to (int) 0'     => array( '0', 0 ),
			'(string) "0" to (float) 0.0' => array( '0', 0.0 ),
			'(int) 0 to (string) "0"'     => array( 0, '0' ),
			'(int) 0 to (float) 0.0'      => array( 0, 0.0 ),
			'(float) 0.0 to (string) "0"' => array( 0.0, '0' ),
			'(float) 0.0 to (int) 0'      => array( 0.0, 0 ),
			'empty string to false'       => array( '', false ),

			/*
			 * null as an initial value behaves differently by triggering
			 * a query, so it is not included in these datasets.
			 *
			 * See data_stored_as_empty_string() and its related test.
			 */
		);
	}

	/**
	 * Data provider.
	 *
	 * @return array
	 */
	public function data_strictly_equal_values() {
		$obj = new stdClass();

		return array(
			// Truthy values.
			'(string) "1"'       => array( '1', '1' ),
			'(int) 1'            => array( 1, 1 ),
			'(float) 1.0'        => array( 1.0, 1.0 ),
			'true'               => array( true, true ),
			'string with spaces' => array( ' ', ' ' ),
			'non-empty array'    => array( array( 'false' ), array( 'false' ) ),
			'object'             => array( $obj, $obj ),

			// Falsey values.
			'(string) "0"'       => array( '0', '0' ),
			'empty string'       => array( '', '' ),
			'(int) 0'            => array( 0, 0 ),
			'(float) 0.0'        => array( 0.0, 0.0 ),
			'empty array'        => array( array(), array() ),

			/*
			 * false and null are not included in these datasets
			 * because false is the default value, which triggers
			 * a call to add_network_option().
			 *
			 * See data_stored_as_empty_string() and its related test.
			 */
		);
	}

	/**
	 * Tests that update_network_option() handles a null new value when the new value
	 * is retrieved from the cache.
	 *
	 * On Single Site, this will result in no additional queries as
	 * the option_value database field is not nullable.
	 *
	 * On Multisite, this will result in one additional query as
	 * the meta_value database field is nullable.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_should_handle_a_null_new_value_from_cache() {
		add_network_option( null, 'foo', '' );

		$num_queries = get_num_queries();

		// Comparison will happen against value cached during add_option() above.
		$updated = update_network_option( null, 'foo', null );

		$expected_queries = is_multisite() ? 1 : 0;
		$this->assertSame( $expected_queries, get_num_queries() - $num_queries, "The number of queries should have increased by $expected_queries." );

		if ( is_multisite() ) {
			$this->assertTrue( $updated, 'update_network_option() should have returned true.' );
		} else {
			$this->assertFalse( $updated, 'update_network_option() should have returned false.' );
		}
	}

	/**
	 * Tests that update_network_option() handles a null new value when the new value
	 * is retrieved from the database.
	 *
	 * On Single Site, this will result in only 1 additional query as
	 * the option_value database field is not nullable.
	 *
	 * On Multisite, this will result in two additional queries as
	 * the meta_value database field is nullable.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_should_handle_a_null_new_value_from_db() {
		add_network_option( null, 'foo', '' );

		$num_queries = get_num_queries();

		// Delete cache.
		$network_cache_key = get_current_network_id() . ':foo';
		wp_cache_delete( $network_cache_key, 'site-options' );
		wp_cache_delete( 'alloptions', 'options' );

		$updated = update_network_option( null, 'foo', null );

		$expected_queries = is_multisite() ? 2 : 1;
		$this->assertSame( $expected_queries, get_num_queries() - $num_queries, "The number of queries should have increased by $expected_queries." );

		if ( is_multisite() ) {
			$this->assertTrue( $updated, 'update_network_option() should have returned true.' );
		} else {
			$this->assertFalse( $updated, 'update_network_option() should have returned false.' );
		}
	}

	/**
	 * Tests that update_network_option() handles a null new value when the new value
	 * is retrieved from a refreshed cache.
	 *
	 * On Single Site, this will result in no additional queries as
	 * the option_value database field is not nullable.
	 *
	 * On Multisite, this will result in one additional query as
	 * the meta_value database field is nullable.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_should_handle_a_null_new_value_from_refreshed_cache() {
		add_network_option( null, 'foo', '' );

		// Delete and refresh cache from DB.
		wp_cache_delete( 'alloptions', 'options' );
		wp_load_alloptions();

		$num_queries = get_num_queries();
		$updated     = update_network_option( null, 'foo', null );

		$expected_queries = is_multisite() ? 1 : 0;
		$this->assertSame( $expected_queries, get_num_queries() - $num_queries, "The number of queries should have increased by $expected_queries." );

		if ( is_multisite() ) {
			$this->assertTrue( $updated, 'update_network_option() should have returned true.' );
		} else {
			$this->assertFalse( $updated, 'update_network_option() should have returned false.' );
		}
	}

	/**
	 * Tests that update_network_option() adds a non-existent option when the new value
	 * is stored as an empty string and false is the default value for the option.
	 *
	 * @ticket 59360
	 *
	 * @dataProvider data_stored_as_empty_string
	 *
	 * @param mixed $new_value A value that casts to an empty string.
	 */
	public function test_update_network_option_should_add_network_option_when_the_new_value_is_stored_as_an_empty_string_and_matches_default_value_false( $new_value ) {
		global $wpdb;

		if ( is_multisite() ) {
			$this->markTestSkipped( 'This test should only run on Single Site.' );
		}

		$this->assertTrue( update_network_option( null, 'foo', $new_value ), 'update_network_option() should have returned true.' );

		$actual = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'foo' LIMIT 1" );

		$this->assertIsObject( $actual, 'The option was not added to the database.' );
		$this->assertObjectHasProperty( 'option_value', $actual, 'The "option_value" property was not included.' );
		$this->assertSame( '', $actual->option_value, 'The value was not stored as an empty string.' );
	}

	/**
	 * Data provider.
	 *
	 * @return array[]
	 */
	public function data_stored_as_empty_string() {
		return array(
			'empty string' => array( '' ),
			'null'         => array( null ),
		);
	}

	/**
	 * Tests that a non-existent option is added even when its pre filter returns a value.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_with_pre_filter_adds_missing_option() {
		$hook_name = is_multisite() ? 'pre_site_option_foo' : 'pre_option_foo';

		// Force a return value of integer 0.
		add_filter( $hook_name, '__return_zero' );

		/*
		 * This should succeed, since the 'foo' option does not exist in the database.
		 * The default value is false, so it differs from 0.
		 */
		$this->assertTrue( update_network_option( null, 'foo', 0 ) );
	}

	/**
	 * Tests that an existing option is updated even when its pre filter returns the same value.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_with_pre_filter_updates_option_with_different_value() {
		$hook_name = is_multisite() ? 'pre_site_option_foo' : 'pre_option_foo';

		// Add the option with a value of 1 to the database.
		update_network_option( null, 'foo', 1 );

		// Force a return value of integer 0.
		add_filter( $hook_name, '__return_zero' );

		/*
		 * This should succeed, since the 'foo' option has a value of 1 in the database.
		 * Therefore it differs from 0 and should be updated.
		 */
		$this->assertTrue( update_network_option( null, 'foo', 0 ) );
	}

	/**
	 * Tests that calling update_network_option() does not permanently remove pre filters.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_maintains_pre_filters() {
		$hook_name = is_multisite() ? 'pre_site_option_foo' : 'pre_option_foo';

		add_filter( $hook_name, '__return_zero' );
		update_network_option( null, 'foo', 0 );

		// Assert that the filter is still present.
		$this->assertSame( 10, has_filter( $hook_name, '__return_zero' ) );
	}

	/**
	 * Tests that update_network_option() conditionally applies
	 * 'pre_site_option_{$option}' and 'pre_option_{$option}' filters.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_should_conditionally_apply_pre_site_option_and_pre_option_filters() {
		$option      = 'foo';
		$site_hook   = new MockAction();
		$option_hook = new MockAction();

		add_filter( "pre_site_option_{$option}", array( $site_hook, 'filter' ) );
		add_filter( "pre_option_{$option}", array( $option_hook, 'filter' ) );

		update_network_option( null, $option, 'false' );

		$this->assertSame( 1, $site_hook->get_call_count(), "'pre_site_option_{$option}' filters occurred an unexpected number of times." );
		$this->assertSame( is_multisite() ? 0 : 1, $option_hook->get_call_count(), "'pre_option_{$option}' filters occurred an unexpected number of times." );
	}

	/**
	 * Tests that update_network_option() conditionally applies
	 * 'default_site_{$option}' and 'default_option_{$option}' filters.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_should_conditionally_apply_site_and_option_default_value_filters() {
		$option      = 'foo';
		$site_hook   = new MockAction();
		$option_hook = new MockAction();

		add_filter( "default_site_option_{$option}", array( $site_hook, 'filter' ) );
		add_filter( "default_option_{$option}", array( $option_hook, 'filter' ) );

		update_network_option( null, $option, 'false' );

		$this->assertSame( 2, $site_hook->get_call_count(), "'default_site_option_{$option}' filters occurred an unexpected number of times." );
		$this->assertSame( is_multisite() ? 0 : 2, $option_hook->get_call_count(), "'default_option_{$option}' filters occurred an unexpected number of times." );
	}

	/**
	 * Tests that update_network_option() adds a non-existent option that uses a filtered default value.
	 *
	 * @ticket 59360
	 *
	 * @covers ::update_network_option
	 */
	public function test_update_network_option_should_add_option_with_filtered_default_value() {
		global $wpdb;

		$option               = 'foo';
		$default_site_value   = 'default-site-value';
		$default_option_value = 'default-option-value';

		add_filter(
			"default_site_option_{$option}",
			static function () use ( $default_site_value ) {
				return $default_site_value;
			}
		);

		add_filter(
			"default_option_{$option}",
			static function () use ( $default_option_value ) {
				return $default_option_value;
			}
		);

		/*
		 * For a non existing option with the unfiltered default of false, passing false here wouldn't work.
		 * Because the default is different than false here though, passing false is expected to result in
		 * a database update.
		 */
		$this->assertTrue( update_network_option( null, $option, false ), 'update_network_option() should have returned true.' );

		if ( is_multisite() ) {
			$actual = $wpdb->get_row(
				$wpdb->prepare(
					"SELECT meta_value FROM $wpdb->sitemeta WHERE meta_key = %s LIMIT 1",
					$option
				)
			);
		} else {
			$actual = $wpdb->get_row(
				$wpdb->prepare(
					"SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1",
					$option
				)
			);
		}

		$value_field = is_multisite() ? 'meta_value' : 'option_value';

		$this->assertIsObject( $actual, 'The option was not added to the database.' );
		$this->assertObjectHasProperty( $value_field, $actual, "The '$value_field' property was not included." );
		$this->assertSame( '', $actual->$value_field, 'The new value was not stored in the database.' );
	}
}
