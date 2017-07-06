<?php
require_once( ABSPATH . 'wp-admin/custom-header.php');

/**
 * @group image
 * @group header
 */
class Tests_Image_Header extends WP_UnitTestCase {
	var $custom_image_header;

	function setUp() {
		parent::setUp();
		$this->custom_image_header = new Custom_Image_Header( '__return_null' );
	}

	function test_header_image_has_correct_dimensions_with_max_width() {
		global $_wp_theme_features;

		$_wp_theme_features['custom-header'][0]['max-width'] = 1600;
		$_wp_theme_features['custom-header'][0]['width'] = 1200;
		$_wp_theme_features['custom-header'][0]['height'] = 230;
		$_wp_theme_features['custom-header'][0]['flex-width'] = false;
		$_wp_theme_features['custom-header'][0]['flex-height'] = false;

		$dimensions = $this->custom_image_header->get_header_dimensions( array(
			'width' => 1600,
			'height' => 1200,
		) );
		$this->assertEquals( 1200, $dimensions['dst_width'] );
		$this->assertEquals( 230, $dimensions['dst_height'] );

	}

	function test_header_image_has_correct_dimensions_with_fixed() {
		global $_wp_theme_features;

		unset( $_wp_theme_features['custom-header'][0]['max-width'] );
		$_wp_theme_features['custom-header'][0]['width'] = 1200;
		$_wp_theme_features['custom-header'][0]['height'] = 230;
		$_wp_theme_features['custom-header'][0]['flex-width'] = false;
		$_wp_theme_features['custom-header'][0]['flex-height'] = false;

		$dimensions = $this->custom_image_header->get_header_dimensions( array(
			'width' => 1600,
			'height' => 1200,
		) );
		$this->assertEquals( 1200, $dimensions['dst_width'] );
		$this->assertEquals( 230, $dimensions['dst_height'] );

	}

	function test_header_image_has_correct_dimensions_with_flex_height() {
		global $_wp_theme_features;

		unset( $_wp_theme_features['custom-header'][0]['max-width'] );
		$_wp_theme_features['custom-header'][0]['width'] = 1200;
		$_wp_theme_features['custom-header'][0]['height'] = 230;
		$_wp_theme_features['custom-header'][0]['flex-width'] = false;
		$_wp_theme_features['custom-header'][0]['flex-height'] = true;

		$dimensions = $this->custom_image_header->get_header_dimensions( array(
			'width' => 1600,
			'height' => 1200,
		) );
		$this->assertEquals( 1200, $dimensions['dst_width'] );
		$this->assertEquals( 900, $dimensions['dst_height'] );

	}

	function test_header_image_has_correct_dimensions_with_flex_width() {
		global $_wp_theme_features;

		unset( $_wp_theme_features['custom-header'][0]['max-width'] );
		$_wp_theme_features['custom-header'][0]['width'] = 1200;
		$_wp_theme_features['custom-header'][0]['height'] = 230;
		$_wp_theme_features['custom-header'][0]['flex-width'] = true;
		$_wp_theme_features['custom-header'][0]['flex-height'] = false;

		$dimensions = $this->custom_image_header->get_header_dimensions( array(
			'width' => 1600,
			'height' => 1200,
		) );
		$this->assertEquals( 1500, $dimensions['dst_width'] ); // max width
		$this->assertEquals( 230, $dimensions['dst_height'] );

	}

	function test_header_image_has_correct_dimensions_with_flex_width_and_height() {
		global $_wp_theme_features;

		$_wp_theme_features['custom-header'][0]['max-width'] = 1800;
		$_wp_theme_features['custom-header'][0]['width'] = 1200;
		$_wp_theme_features['custom-header'][0]['height'] = 230;
		$_wp_theme_features['custom-header'][0]['flex-width'] = true;
		$_wp_theme_features['custom-header'][0]['flex-height'] = true;

		$dimensions = $this->custom_image_header->get_header_dimensions( array(
			'width' => 1600,
			'height' => 1200,
		) );
		$this->assertEquals( 1600, $dimensions['dst_width'] );
		$this->assertEquals( 1200, $dimensions['dst_height'] );

	}

	function test_create_attachment_object() {
		$id = wp_insert_attachment( array(
			'post_status' => 'publish',
			'post_title' => 'foo.png',
			'post_type' => 'post',
			'guid' => 'http://localhost/foo.png'
		) );

		$cropped = 'http://localhost/foo-cropped.png';

		$object = $this->custom_image_header->create_attachment_object( $cropped, $id );
		$this->assertEquals( 'foo-cropped.png', $object['post_title'] );
		$this->assertEquals( $cropped, $object['guid'] );
		$this->assertEquals( 'custom-header', $object['context'] );
		$this->assertEquals( 'image/jpeg', $object['post_mime_type'] );
	}

	function test_insert_cropped_attachment() {
		$id = wp_insert_attachment( array(
			'post_status' => 'publish',
			'post_title' => 'foo.png',
			'post_type' => 'post',
			'guid' => 'http://localhost/foo.png'
		) );

		$cropped = 'http://localhost/foo-cropped.png';
		$object = $this->custom_image_header->create_attachment_object( $cropped, $id );

		$cropped_id = $this->custom_image_header->insert_attachment( $object, $cropped );

		$this->assertInternalType( 'int', $cropped_id );
		$this->assertGreaterThan( 0, $cropped_id );
	}

}
