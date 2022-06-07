<?php

/**
 * @group pluggable
 * @covers ::wp_rand
 */
class Tests_Pluggable_wpRand extends WP_UnitTestCase {

	/**
	 * Tests that wp_rand() returns a positive integer for both positive and negative input.
	 *
	 * @ticket 55194
	 * @dataProvider data_wp_rand_should_return_a_positive_integer
	 *
	 * @param int $min Lower limit for the generated number.
	 * @param int $max Upper limit for the generated number.
	 */
	public function test_wp_rand_should_return_a_positive_integer( $min, $max ) {
		$this->assertGreaterThan(
			0,
			wp_rand( $min, $max ),
			'The value was not greater than 0'
		);

		$this->assertLessThan(
			100,
			wp_rand( $min, $max ),
			'The value was not less than 100'
		);
	}

	/**
	 * Data provider.
	 *
	 * @return array
	 */
	public function data_wp_rand_should_return_a_positive_integer() {
		return array(
			'1 and 99'       => array(
				'min' => 1,
				'max' => 99,
			),
			'-1 and 99'      => array(
				'min' => -1,
				'max' => 99,
			),
			'1 and -99'      => array(
				'min' => 1,
				'max' => -99,
			),
			'-1 and -99'     => array(
				'min' => -1,
				'max' => -99,
			),
			'1.0 and 99.0'   => array(
				'min' => 1.0,
				'max' => 99.0,
			),
			'-1.0 and -99.0' => array(
				'min' => -1.0,
				'max' => -99.0,
			),
		);
	}

	/**
	 * Tests that wp_rand() returns zero when `$min` and `$max` are zero.
	 *
	 * @ticket 55194
	 * @dataProvider data_wp_rand_should_return_zero_when_min_and_max_are_zero
	 *
	 * @param mixed $min Lower limit for the generated number.
	 * @param mixed $max Upper limit for the generated number.
	 */
	public function test_wp_rand_should_return_zero_when_min_and_max_are_zero( $min, $max ) {
		$this->assertSame( 0, wp_rand( $min, $max ) );
	}

	/**
	 * Data provider.
	 *
	 * @return array
	 */
	public function data_wp_rand_should_return_zero_when_min_and_max_are_zero() {
		return array(
			'min and max as 0'      => array(
				'min' => 0,
				'max' => 0,
			),
			'min and max as 0.0'    => array(
				'min' => 0.0,
				'max' => 0.0,
			),
			'min as null, max as 0' => array(
				'min' => null,
				'max' => 0,
			),
		);
	}
}
