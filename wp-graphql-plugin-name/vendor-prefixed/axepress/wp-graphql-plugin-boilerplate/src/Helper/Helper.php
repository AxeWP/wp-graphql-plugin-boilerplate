<?php
/**
 * Helper functions.
 *
 * @package AxeWP\GraphQL\Helper
 *
 * @license GPL-3.0-or-later
 * Modified by wp-graphql-plugin-boilerplate using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Helper;

if ( ! class_exists( '\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Helper\Helper' ) ) {

	/**
	 * Class - Helper
	 */
	class Helper {
		/**
		 * Gets the hook prefix for the plugin.
		 */
		public static function hook_prefix() : string {
			return defined( 'AXEWP_PB_HOOK_PREFIX' ) ? AXEWP_PB_HOOK_PREFIX : 'graphql_pb';
		}
	}
}
