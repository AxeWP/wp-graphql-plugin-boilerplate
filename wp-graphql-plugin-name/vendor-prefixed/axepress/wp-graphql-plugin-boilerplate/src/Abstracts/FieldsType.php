<?php
/**
 * Abstract class to make it easy to register Fields to an existing type in WPGraphQL.
 *
 * @package AxeWP\GraphQL\Abstracts
 *
 * @license GPL-3.0-or-later
 * Modified by wp-graphql-plugin-boilerplate using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Abstracts;

use WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\GraphQLType;
use WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\Registrable;
use WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\TypeWithFields;

if ( ! class_exists( '\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Abstracts\FieldsType' ) ) {

	/**
	 * Class - FieldsType
	 */
	abstract class FieldsType implements GraphQLType, Registrable, TypeWithFields {
		/**
		 * {@inheritDoc}
		 */
		public static function init() : void {
			add_action( 'graphql_register_types', [ static::class, 'register' ] );
		}

		/**
		 * Defines the GraphQL type name registered in WPGraphQL.
		 */
		abstract protected static function type_name() : string;

		/**
		 * Gets the GraphQL type name.
		 */
		abstract public static function get_type_name() : string;

		/**
		 * Register Fields to the GraphQL Schema.
		 */
		public static function register() : void {
			register_graphql_fields( static::get_type_name(), static::get_fields() );
		}
	}
}