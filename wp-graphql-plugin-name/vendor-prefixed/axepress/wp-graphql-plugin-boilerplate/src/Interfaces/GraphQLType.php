<?php

/**
 * Interface for classes that register a GraphQL type to the GraphQL schema.
 *
 * @package \AxeWP\GraphQL\Interfaces
 */
declare (strict_types=1);
namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces;

if (!interface_exists('\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\GraphQLType')) {
    /**
     * Interface - GraphQLType
     */
    interface GraphQLType
    {
        /**
         * Register connections to the GraphQL Schema.
         */
        public static function register(): void;
    }
}