<?php

if ( is_multisite() ) :

/**
 * Tests specific to users in multisite.
 *
 * @group user
 * @group ms-user
 * @group multisite
 */
class Tests_Multisite_User extends WP_UnitTestCase {
	protected $suppress = false;

	function setUp() {
		global $wpdb;
		parent::setUp();
		$this->suppress = $wpdb->suppress_errors();

		$_SERVER[ 'REMOTE_ADDR' ] = '';
	}

	function tearDown() {
		global $wpdb;
		parent::tearDown();
		$wpdb->suppress_errors( $this->suppress );
	}

	function test_remove_user_from_blog() {
		$user1 = $this->factory->user->create_and_get();
		$user2 = $this->factory->user->create_and_get();

		$post_id = $this->factory->post->create( array( 'post_author' => $user1->ID ) );

		remove_user_from_blog( $user1->ID, 1, $user2->ID );

		$post = get_post( $post_id );

		$this->assertNotEquals( $user1->ID, $post->post_author );
		$this->assertEquals( $user2->ID, $post->post_author );
	}

	function test_get_blogs_of_user() {
		// Logged out users don't have blogs.
		$this->assertEquals( array(), get_blogs_of_user( 0 ) );

		$user1_id = $this->factory->user->create( array( 'role' => 'administrator' ) );
		$blog_ids = $this->factory->blog->create_many( 10, array( 'user_id' => $user1_id ) );

		foreach ( $blog_ids as $blog_id )
			$this->assertInternalType( 'int', $blog_id );

		$blogs_of_user = array_keys( get_blogs_of_user( $user1_id, false ) );
		sort( $blogs_of_user );
		$this->assertEquals ( array_merge( array( 1 ), $blog_ids), $blogs_of_user );

		$this->assertTrue( remove_user_from_blog( $user1_id, 1 ) );

		$blogs_of_user = array_keys( get_blogs_of_user( $user1_id, false ) );
		sort( $blogs_of_user );
		$this->assertEquals ( $blog_ids, $blogs_of_user );

		foreach ( get_blogs_of_user( $user1_id, false ) as $blog ) {
			$this->assertTrue( isset( $blog->userblog_id ) );
			$this->assertTrue( isset( $blog->blogname ) );
			$this->assertTrue( isset( $blog->domain ) );
			$this->assertTrue( isset( $blog->path ) );
			$this->assertTrue( isset( $blog->site_id ) );
			$this->assertTrue( isset( $blog->siteurl ) );
			$this->assertTrue( isset( $blog->archived ) );
			$this->assertTrue( isset( $blog->spam ) );
			$this->assertTrue( isset( $blog->deleted ) );
		}

		// Non-existent users don't have blogs.
		wpmu_delete_user( $user1_id );
		$user = new WP_User( $user1_id );
		$this->assertFalse( $user->exists(), 'WP_User->exists' );
		$this->assertEquals( array(), get_blogs_of_user( $user1_id ) );
	}

	/**
	 * @expectedDeprecated is_blog_user
	 */
	function test_is_blog_user() {
		global $wpdb;

		$user1_id = $this->factory->user->create( array( 'role' => 'administrator' ) );

		$old_current = get_current_user_id();
		wp_set_current_user( $user1_id );

		$this->assertTrue( is_blog_user() );
		$this->assertTrue( is_blog_user( $wpdb->blogid ) );

		$blog_ids = array();

		$blog_ids = $this->factory->blog->create_many( 5 );
		foreach ( $blog_ids as $blog_id ) {
			$this->assertInternalType( 'int', $blog_id );
			$this->assertTrue( is_blog_user( $blog_id ) );
			$this->assertTrue( remove_user_from_blog( $user1_id, $blog_id ) );
			$this->assertFalse( is_blog_user( $blog_id ) );
		}

		wp_set_current_user( $old_current );
	}

	function test_is_user_member_of_blog() {
		global $wpdb;

		$user1_id = $this->factory->user->create( array( 'role' => 'administrator' ) );

		$old_current = get_current_user_id();
		wp_set_current_user( $user1_id );

		$this->assertTrue( is_user_member_of_blog() );
		$this->assertTrue( is_user_member_of_blog( 0, 0 ) );
		$this->assertTrue( is_user_member_of_blog( 0, $wpdb->blogid ) );
		$this->assertTrue( is_user_member_of_blog( $user1_id ) );
		$this->assertTrue( is_user_member_of_blog( $user1_id, $wpdb->blogid ) );

		$blog_ids = $this->factory->blog->create_many( 5 );
		foreach ( $blog_ids as $blog_id ) {
			$this->assertInternalType( 'int', $blog_id );
			$this->assertTrue( is_user_member_of_blog( $user1_id, $blog_id ) );
			$this->assertTrue( remove_user_from_blog( $user1_id, $blog_id ) );
			$this->assertFalse( is_user_member_of_blog( $user1_id, $blog_id ) );
		}

		wpmu_delete_user( $user1_id );
		$user = new WP_User( $user1_id );
		$this->assertFalse( $user->exists(), 'WP_User->exists' );
		$this->assertFalse( is_user_member_of_blog( $user1_id ), 'is_user_member_of_blog' );

		wp_set_current_user( $old_current );
	}

	/**
	 * @ticket 23192
	 */
	function test_is_user_spammy() {
		$user_id = $this->factory->user->create( array(
			'role' => 'author',
			'user_login' => 'testuser1',
		) );

		$spam_username = (string) $user_id;
		$spam_user_id = $this->factory->user->create( array(
			'role' => 'author',
			'user_login' => $spam_username,
		) );
		update_user_status( $spam_user_id, 'spam', '1' );

		$this->assertTrue( is_user_spammy( $spam_username ) );
		$this->assertFalse( is_user_spammy( 'testuser1' ) );
	}

	/**
	 * @ticket 20601
	 */
	function test_user_member_of_blog() {
		global $wp_rewrite;

		$this->factory->blog->create();
		$user_id = $this->factory->user->create();
		$this->factory->blog->create( array( 'user_id' => $user_id ) );

		$blogs = get_blogs_of_user( $user_id );
		$this->assertCount( 2, $blogs );
		$first = reset( $blogs )->userblog_id;
		remove_user_from_blog( $user_id, $first );

		$blogs = get_blogs_of_user( $user_id );
		$second = reset( $blogs )->userblog_id;
		$this->assertCount( 1, $blogs );

		switch_to_blog( $first );
		$wp_rewrite->init();

		$this->go_to( get_author_posts_url( $user_id ) );
		$this->assertQueryTrue( 'is_404' );

		switch_to_blog( $second );
		$wp_rewrite->init();

		$this->go_to( get_author_posts_url( $user_id ) );
		$this->assertQueryTrue( 'is_author', 'is_archive' );

		add_user_to_blog( $first, $user_id, 'administrator' );
		$blogs = get_blogs_of_user( $user_id );
		$this->assertCount( 2, $blogs );

		switch_to_blog( $first );
		$wp_rewrite->init();

		$this->go_to( get_author_posts_url( $user_id ) );
		$this->assertQueryTrue( 'is_author', 'is_archive' );
	}

	/**
	 * @ticket 27205
	 */
	function test_granting_super_admins() {
		if ( isset( $GLOBALS['super_admins'] ) ) {
			$old_global = $GLOBALS['super_admins'];
			unset( $GLOBALS['super_admins'] );
		}

		$user_id = $this->factory->user->create();

		$this->assertFalse( is_super_admin( $user_id ) );
		$this->assertFalse( revoke_super_admin( $user_id ) );
		$this->assertTrue( grant_super_admin( $user_id ) );
		$this->assertTrue( is_super_admin( $user_id ) );
		$this->assertFalse( grant_super_admin( $user_id ) );
		$this->assertTrue( revoke_super_admin( $user_id ) );

		// None of these operations should set the $super_admins global.
		$this->assertFalse( isset( $GLOBALS['super_admins'] ) );

		// Try with two users.
		$second_user = $this->factory->user->create();
		$this->assertTrue( grant_super_admin( $user_id ) );
		$this->assertTrue( grant_super_admin( $second_user ) );
		$this->assertTrue( is_super_admin( $second_user ) );
		$this->assertTrue( is_super_admin( $user_id ) );
		$this->assertTrue( revoke_super_admin( $user_id ) );
		$this->assertTrue( revoke_super_admin( $second_user ) );

		if ( isset( $old_global ) ) {
			$GLOBALS['super_admins'] = $old_global;
		}
	}

}

endif ;