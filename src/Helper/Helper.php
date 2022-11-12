<?php
/**
 * Helper functions.
 *
 * @package AxeWP\GraphQL\Helper
 */

namespace AxeWP\GraphQL\Helper;

if ( ! class_exists( '\AxeWP\GraphQL\Helper\Helper' ) ) {

	/**
	 * Class - Helper
	 */
	class Helper {
		/**
		 * Gets the hook prefix for the plugin.
		 */
		public static function hook_prefix() : string {
			return defined( 'WPGRAPHQL_PB_HOOK_PREFIX' ) ? WPGRAPHQL_PB_HOOK_PREFIX : 'graphql_pb';
		}
	}
}
