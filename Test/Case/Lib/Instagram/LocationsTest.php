<?php

/**
 * LocationsTestCase
 */
class LocationsTestCase extends CakeTestCase {

	private $_instagramConfig;

	/**
	 * setUp
	 *
	 * Setup the classes the crud component needs to be testable
	 */
	public function setUp() {
		// Use my Instagram client
		$this->_instagramConfig = Configure::read('Instagram');
		Configure::write('Instagram', array(
			'clientId'     => 'cdd97394669e453dabf1671cfadd7152',
			'clientSecret' => '62f381929d584c15b66bd18395f5a786',
			'accessToken'  => '180947758.cdd9739.cc9de8bab1ef4a93a84edd9c93fa4b3d',
		));

		// @todo: do not connect to Instagram API

		parent::setUp();
	}

	/**
	 * tearDown method
	 */
	public function tearDown() {
		Configure::write('Instagram', $this->_instagramConfig);
		parent::tearDown();
	}

	// Tests

	/**
	 * testRecent
	 */
	public function testGet() {
		$result = \Instagram\Locations::get(1234);
		$this->assertIsA($result, 'stdClass', 'Result is not an object');
		$this->assertTrue(isset($result->meta), 'Result does not contain meta data');
	}

	public function testRecent() {
		$result = \Instagram\Locations::recent(1234);
		$this->assertIsA($result, 'stdClass', 'Result is not an object');
		$this->assertTrue(isset($result->meta), 'Result does not contain meta data');
	}

	public function testSearch() {
		$result = \Instagram\Locations::search(array('lat' => 1234, 'lng' => 1234));
		$this->assertIsA($result, 'stdClass', 'Result is not an object');
		$this->assertTrue(isset($result->data), 'Result does not contain data');
	}

}