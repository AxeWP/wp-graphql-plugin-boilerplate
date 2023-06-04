<?php
/**
 * Interface for for classes that register a GraphQL type with input fields to the GraphQL schema.
 *
 * @package AxeWP\GraphQL\Interfaces
 *
 * @license GPL-3.0-or-later
 * Modified by wp-graphql-plugin-boilerplate using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces;

if ( ! interface_exists( '\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\TypeWithInterfaces' ) ) {

	/**
	 * Interface - TypeWithInterfaces.
	 */
	interface TypeWithInterfaces extends GraphQLType {
		/**
		 * Gets the array of GraphQL interfaces that should be applied to the type.
		 *
		 * @return string[]
		 */
		public static function get_interfaces(): array;
	}
}
