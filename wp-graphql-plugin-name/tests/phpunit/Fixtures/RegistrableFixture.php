<?php
/**
 * A minimal Registrable used to exercise the TypeRegistry.
 *
 * @package Tests\WPGraphQL\PluginName\Fixtures
 */

declare( strict_types = 1 );

namespace Tests\WPGraphQL\PluginName\Fixtures;

use WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\Registrable;

/**
 * Class - RegistrableFixture
 */
class RegistrableFixture implements Registrable {
	/**
	 * Whether init() has been called.
	 *
	 * @var bool
	 */
	public static bool $initialized = false;

	/**
	 * {@inheritDoc}
	 */
	public static function init(): void {
		self::$initialized = true;
	}
}
