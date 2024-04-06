<?php
/**
 * Registers Plugin types to the GraphQL schema.
 *
 * @package WPGraphQL\PluginName
 */

namespace WPGraphQL\PluginName;

use Exception;
use WPGraphQL\PluginName\Vendor\AxeWP\GraphQL\Interfaces\Registrable;

/**
 * Class - TypeRegistry
 */
class TypeRegistry {
	/**
	 * The local registry of registered types.
	 *
	 * @var string[]
	 */
	public static array $registry = [];

	/**
	 * Gets an array of all the registered GraphQL types along with their class name.
	 *
	 * @return string[]
	 */
	public static function get_registered_types(): array {
		if ( empty( self::$registry ) ) {
			self::initialize_registry();
		}

		return self::$registry;
	}

	/**
	 * Registers types, connections, unions, and mutations to GraphQL schema.
	 */
	public static function init(): void {
		/**
		 * Fires before all types have been registered.
		 */
		do_action( 'graphql_pb_before_register_types' );

		self::initialize_registry();

		/**
		 * Fires after all types have been registered.
		 */
		do_action( 'graphql_pb_after_register_types' );
	}

	/**
	 * Initializes the plugin type registry.
	 */
	private static function initialize_registry(): void {
		$classes_to_register = array_merge(
			self::enums(),
			self::inputs(),
			self::interfaces(),
			self::objects(),
			self::connections(),
			self::mutations(),
			self::fields(),
		);

		self::register_types( $classes_to_register );
	}

	/**
	 * List of Enum classes to register.
	 *
	 * @return string[]
	 */
	private static function enums(): array {
		// Enums to register.
		$classes_to_register = [];

		/**
		 * Filters the list of enum classes to register.
		 *
		 * Useful for adding/removing specific enums to the schema.
		 *
		 * @param array           $classes_to_register Array of classes to be registered to the schema.
		 */
		return apply_filters( 'graphql_pb_registered_enum_classes', $classes_to_register );
	}

	/**
	 * List of Input classes to register.
	 *
	 * @return string[]
	 */
	private static function inputs(): array {
		$classes_to_register = [];

		/**
		 * Filters the list of input classes to register.
		 *
		 * Useful for adding/removing specific inputs to the schema.
		 *
		 * @param array           $classes_to_register Array of classes to be registered to the schema.
		 */
		return apply_filters( 'graphql_pb_registered_input_classes', $classes_to_register );
	}

	/**
	 * List of Interface classes to register.
	 *
	 * @return string[]
	 */
	public static function interfaces(): array {
		$classes_to_register = [];

		/**
		 * Filters the list of interfaces classes to register.
		 *
		 * Useful for adding/removing specific interfaces to the schema.
		 *
		 * @param array           $classes_to_register = Array of classes to be registered to the schema.
		 */
		return apply_filters( 'graphql_pb_registered_interface_classes', $classes_to_register );
	}

	/**
	 * List of Object classes to register.
	 *
	 * @return string[]
	 */
	public static function objects(): array {
		$classes_to_register = [];

		/**
		 * Filters the list of object classes to register.
		 *
		 * Useful for adding/removing specific objects to the schema.
		 *
		 * @param array           $classes_to_register = Array of classes to be registered to the schema.
		 */
		return apply_filters( 'graphql_pb_registered_object_classes', $classes_to_register );
	}

	/**
	 * List of Field classes to register.
	 *
	 * @return string[]
	 */
	public static function fields(): array {
		$classes_to_register = [];

		/**
		 * Filters the list of field classes to register.
		 *
		 * Useful for adding/removing specific fields to the schema.
		 *
		 * @param array           $classes_to_register = Array of classes to be registered to the schema.
		 */
		return apply_filters( 'graphql_pb_registered_field_classes', $classes_to_register );
	}

	/**
	 * List of Connection classes to register.
	 *
	 * @return string[]
	 */
	public static function connections(): array {
		$classes_to_register = [];

		/**
		 * Filters the list of connection classes to register.
		 *
		 * Useful for adding/removing specific connections to the schema.
		 *
		 * @param array           $classes_to_register = Array of classes to be registered to the schema.
		 */
		return apply_filters( 'graphql_pb_registered_connection_classes', $classes_to_register );
	}

	/**
	 * Registers mutation.
	 *
	 * @return string[]
	 */
	public static function mutations(): array {
		$classes_to_register = [];

		/**
		 * Filters the list of connection classes to register.
		 *
		 * Useful for adding/removing specific connections to the schema.
		 *
		 * @param array           $classes_to_register = Array of classes to be registered to the schema.
		 */
		$classes_to_register = apply_filters( 'graphql_pb_registered_mutation_classes', $classes_to_register );

		return $classes_to_register;
	}

	/**
	 * Loops through a list of classes to manually register each GraphQL to the registry, and stores the type name and class in the local registry.
	 *
	 * Classes must extend WPGraphQL\Type\AbstractType.
	 *
	 * @param string[] $classes_to_register .
	 *
	 * @throws \Exception .
	 */
	private static function register_types( array $classes_to_register ): void {
		// Bail if there are no classes to register.
		if ( empty( $classes_to_register ) ) {
			return;
		}

		foreach ( $classes_to_register as $class ) {
			if ( ! is_a( $class, Registrable::class, true ) ) {
				// translators: PHP class.
				throw new Exception( sprintf( esc_html__( 'To be registered to the WPGraphQL Plugin Name GraphQL schema, %s needs to implement \AxeWP\GraphQL\Interfaces\Registrable', 'wp-graphql-plugin-name' ), esc_html( $class ) ) );
			}

			// Register the type to the GraphQL schema.
			$class::init();

			// Store the type in the local registry.
			self::$registry[] = $class;
		}
	}
}
