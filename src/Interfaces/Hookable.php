<?php
/**
 * Interface for classes containing WordPress action/filter hooks.
 *
 * @package AxeWP\GraphQL\Interfaces
 */

namespace AxeWP\GraphQL\Interfaces;

/**
 * Interface - Hookable
 */
interface Hookable {
	/**
	 * Registers class methods to WordPress.
	 *
	 * WordPress actions/filters should be included here.
	 */
	public static function init() : void;
}
