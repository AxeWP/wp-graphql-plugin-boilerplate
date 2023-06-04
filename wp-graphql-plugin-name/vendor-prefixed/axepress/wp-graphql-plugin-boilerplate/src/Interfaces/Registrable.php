<?php
/**
 * Interface for classes containing WordPress action/filter hooks.
 *
 * @package AxeWP\GraphQL\Interfaces
 *
 * @license GPL-3.0-or-later
 * Modified by wp-graphql-plugin-boilerplate using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces;

if ( ! interface_exists( '\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\Registrable' ) ) {

	/**
	 * Interface - Registrable
	 */
	interface Registrable {
		/**
		 * Registers class methods to WordPress.
		 *
		 * WordPress actions/filters should be included here.
		 */
		public static function init(): void;
	}
}
