<?php
/**
 * Tests access functions.
 *
 * @package Tests\WPGraphQL\PluginName\Integration
 */

declare( strict_types = 1 );

namespace Tests\WPGraphQL\PluginName\Integration;

use Tests\WPGraphQL\PluginName\TestCase;

/**
 * Class - AccessFunctionsTest
 *
 * @covers ::graphql_pb_get_setting
 */
class AccessFunctionsTest extends TestCase {
	/**
	 * {@inheritDoc}
	 */
	public function setUp(): void {
		parent::setUp();

		update_option( 'graphql_pb_settings', [ 'delete_data_on_deactivate' => true ] );
	}

	/**
	 * Tests graphql_pb_get_setting()
	 */
	public function testGraphQLPluginNameGetSetting(): void {
		$expected = true;

		$actual = graphql_pb_get_setting( 'delete_data_on_deactivate' );

		$this->assertEquals( $expected, $actual );

		// Test graphql_pb_get_setting_section_fields filter.
		$expected_value       = 'value';
		$expected_default     = 'default';
		$expected_option_name = 'mySetting';

		add_filter(
			'graphql_pb_get_setting_section_fields',
			function ( array $section_fields, string $section_name, $default_value ) use ( $expected_default ) {
				$this->assertEquals( $expected_default, $default_value );

				return array_merge( $section_fields, [ 'mySetting' => 'value' ] );
			},
			10,
			3
		);

		$actual = graphql_pb_get_setting( $expected_option_name, $expected_default );
		$this->assertEquals( 'value', $actual );

		// Test graphql_pb_get_setting_section_field_value filter.
		add_filter(
			'graphql_pb_get_setting_section_field_value',
			// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed -- Required for filter callback.
			function ( $value, $default_value, string $option_name, array $section_fields, string $section_name ) use ( $expected_value, $expected_default, $expected_option_name ) {
				$this->assertEquals( $expected_value, $value );
				$this->assertEquals( $expected_default, $default_value );
				$this->assertEquals( $expected_option_name, $option_name );

				return 'new value';
			},
			10,
			5
		);

		$actual = graphql_pb_get_setting( $expected_option_name, $expected_default );
		$this->assertEquals( 'new value', $actual );
	}
}
