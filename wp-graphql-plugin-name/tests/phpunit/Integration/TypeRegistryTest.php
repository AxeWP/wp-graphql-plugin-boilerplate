<?php
/**
 * Tests TypeRegistry.
 *
 * @package Tests\WPGraphQL\PluginName\Integration
 */

declare( strict_types = 1 );

namespace Tests\WPGraphQL\PluginName\Integration;

use Tests\WPGraphQL\PluginName\Fixtures\RegistrableFixture;
use Tests\WPGraphQL\PluginName\TestCase;
use WPGraphQL\PluginName\TypeRegistry;

/**
 * Class - TypeRegistryTest
 *
 * @covers \WPGraphQL\PluginName\TypeRegistry
 */
class TypeRegistryTest extends TestCase {
	/**
	 * {@inheritDoc}
	 */
	public function setUp(): void {
		parent::setUp();

		// The registry is static, so reset it between tests.
		TypeRegistry::$registry          = [];
		RegistrableFixture::$initialized = false;
	}

	/**
	 * The boilerplate ships no types of its own, so a stock template registers nothing.
	 */
	public function test_get_registered_types_is_empty_by_default(): void {
		$this->assertSame( [], TypeRegistry::get_registered_types() );
	}

	/**
	 * Classes added via the `graphql_pb_registered_*_classes` filters are registered and stored.
	 */
	public function test_get_registered_types_includes_filtered_classes(): void {
		add_filter(
			'graphql_pb_registered_enum_classes',
			static function ( array $classes ): array {
				return array_merge( $classes, [ RegistrableFixture::class ] );
			}
		);

		$actual = TypeRegistry::get_registered_types();

		$this->assertContains( RegistrableFixture::class, $actual );
		$this->assertTrue( RegistrableFixture::$initialized, 'Registered classes should have init() called.' );
	}
}
