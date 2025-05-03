<?php
/**
 * Helper functions for cross-version compatibility.
 *
 * @package AxeWP\GraphQL\Helper
 */

declare( strict_types=1 );

namespace AxeWP\GraphQL\Helper;

if ( ! class_exists( '\AxeWP\GraphQL\Helper\Compat' ) ) {
	/**
	 * Class - Compat
	 */
	class Compat {
		/**
		 * Adds backwards compatibility for lazy-loaded configs added in WPGraphQL versions 2.3.0 and later.
		 *
		 * @template T of array
		 * @param T $config The config to check.
		 *
		 * @return T&array{description?:string,deprecationReason?:string} The config with lazy-loaded configs replaced with their values.
		 */
		public static function resolve_graphql_config( array $config ): array {
			// Bail if we don't need to do anything.
			if ( ! defined( 'WPGRAPHQL_VERSION' ) || version_compare( WPGRAPHQL_VERSION, '2.3.0', '<' ) ) {
				return $config;
			}

			/**
			 * Documented in \WPGraphQL\TypeRegistry::get_introspection_keys()
			 *
			 * @see https://github.com/wp-graphql/wp-graphql/blob/f0988f9d70c592ae34902e6cd0a0ecf91774608e/src/Registry/TypeRegistry.php#L823-L836
			 *
			 * @var string[] $introspection_keys keys that are only needed for introspection.
			 */
			$introspection_keys = apply_filters( 'graphql_introspection_keys', [ 'description', 'deprecationReason' ] ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound

			foreach ( $introspection_keys as $key ) {
				if ( ! isset( $config[ $key ] ) || ! is_callable( $config[ $key ] ) ) {
					continue;
				}

				// @phpstan-ignore function.alreadyNarrowedType (`WPGraphQL::is_introspection_query()` is only available in WPGraphQL 1.28.0+)
				if ( method_exists( \WPGraphQL::class, 'is_introspection_query' ) && ! \WPGraphQL::is_introspection_query() ) {
					// If not introspection, set to null.
					$config[ $key ] = null;
					continue;
				}

				$config[ $key ] = is_callable( $config[ $key ] ) ? $config[ $key ]() : '';
			}

			return $config;
		}
	}
}
