<?php
/**
 * Tests Main.
 *
 * @package Tests\WPGraphQL\PluginName\Integration
 */

declare( strict_types = 1 );

namespace Tests\WPGraphQL\PluginName\Integration;

use ReflectionClass;
use Tests\WPGraphQL\PluginName\TestCase;
use WPGraphQL\PluginName\Main;

/**
 * Class - MainTest
 *
 * @covers \WPGraphQL\PluginName\Main
 * @covers ::graphql_pb_init
 */
class MainTest extends TestCase {
	/**
	 * @var ?\WPGraphQL\PluginName\Main
	 */
	public $instance;

	/**
	 * {@inheritDoc}
	 */
	public function tearDown(): void {
		unset( $this->instance );

		parent::tearDown();
	}

	/**
	 * Tests instance.
	 */
	public function testInstance(): void {
		$this->instance = new Main();
		$this->assertTrue( $this->instance instanceof Main );

		// graphql_pb_init() returns void; it bootstraps the Main singleton as a side effect.
		graphql_pb_init();

		$this->assertEquals( $this->instance, Main::instance() );
	}

	/**
	 * Tests instance before instantiation.
	 */
	public function testInstanceBeforeInstantiation(): void {
		$instance = Main::instance();
		$this->assertTrue( $instance instanceof Main );
	}

	/**
	 * Tests that Main cannot be cloned or unserialized.
	 */
	public function testClone(): void {
		$actual = Main::instance();
		$rc     = new ReflectionClass( $actual );
		$this->assertTrue( $rc->hasMethod( '__clone' ) );
		$this->assertTrue( $rc->hasMethod( '__wakeup' ) );
	}

	/**
	 * Tests that plugin constants are defined.
	 */
	public function testConstants(): void {
		do_action( 'init' );
		$this->assertTrue( defined( 'WPGRAPHQL_PB_VERSION' ) );
		$this->assertTrue( defined( 'WPGRAPHQL_PB_PLUGIN_DIR' ) );
		$this->assertTrue( defined( 'WPGRAPHQL_PB_PLUGIN_URL' ) );
		$this->assertTrue( defined( 'WPGRAPHQL_PB_PLUGIN_FILE' ) );
	}
}
