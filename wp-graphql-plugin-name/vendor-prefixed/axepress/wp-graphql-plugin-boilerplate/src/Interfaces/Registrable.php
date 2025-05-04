<?php

/**
 * Interface for classes containing WordPress action/filter hooks.
 *
 * @package \AxeWP\GraphQL\Interfaces
 */
declare (strict_types=1);
namespace WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces;

if (!interface_exists('\WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\Registrable')) {
    /**
     * Interface - Registrable
     */
    interface Registrable
    {
        /**
         * Registers class methods to WordPress.
         *
         * WordPress actions/filters should be included here.
         */
        public static function init(): void;
    }
}