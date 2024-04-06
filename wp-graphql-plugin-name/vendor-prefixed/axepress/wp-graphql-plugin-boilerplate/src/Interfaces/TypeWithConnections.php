<?php
/**
 * Interface for for classes that register a GraphQL type with connections to the GraphQL schema.
 *
 * @package AxeWP\GraphQL\Interfaces
 *
 * @license GPL-3.0-or-later
 * Modified by wp-graphql-plugin-boilerplate using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare( strict_types=1 );

namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces;

if ( ! interface_exists( '\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\TypeWithConnections' ) ) {

	/**
	 * Interface - TypeWithConnections
	 */
	interface TypeWithConnections extends GraphQLType {
		/**
		 * Gets the properties for the type.
		 *
		 * @return array<string,array{toType:string,description:string,args?:array<string,array{type:string|array<string,string|array<string,string>>,description:string,defaultValue?:mixed}>,connectionInterfaces?:string[],oneToOne?:bool,resolve?:callable}>
		 */
		public static function get_connections(): array;
	}
}
