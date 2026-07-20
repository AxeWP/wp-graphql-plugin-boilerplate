<?php
/**
 * Tests CoreSchemaFilters.
 *
 * @package Tests\WPGraphQL\PluginName\Integration
 */

declare( strict_types = 1 );

namespace Tests\WPGraphQL\PluginName\Integration;

use Tests\WPGraphQL\PluginName\TestCase;
use WPGraphQL\PluginName\CoreSchemaFilters;

/**
 * Class - CoreSchemaFiltersTest
 *
 * @covers \WPGraphQL\PluginName\CoreSchemaFilters
 */
class CoreSchemaFiltersTest extends TestCase {
	/**
	 * Tests CoreSchemaFilters::get_type_prefix()
	 */
	public function testGetTypePrefix(): void {
		$actual = CoreSchemaFilters::get_type_prefix();
		$this->assertEquals( 'PluginName', $actual );

		$expected = 'somePrefix';
		$actual   = CoreSchemaFilters::get_type_prefix( $expected );
		$this->assertEquals( $expected, $actual );
	}
}
