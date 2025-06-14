# Changelog

## [Unreleased]

## 0.1.1
* feat: Add support for lazy-loaded configuration values (e.g., descriptions) using callables, with compatibility layer for older WPGraphQL versions.
* chore: Update Composer dependencies.
* chore: misc code cleanup and formatting.

## v0.1.0
* feat: Enabled strict type declarations across all PHP files
* dev: Enhanced PHPStan configuration with stricter type checking
* chore: Updated WPGraphQL CS to 2.0.0-beta.3
* chore: Improved PHP type annotations
* chore: Code cleanup and whitespace formatting
* chore: Removed redundant PHPStan ignores

## v0.0.9
* dev: remove `static::$type_registry` property in favor of `WPGraphQL::get_type_registry()`.
* chore: Implement WPGraphQL Coding Standards ruleset for PHP_CodeSniffer.
* chore: Update example workflows.
* chore: Update composer deps.
* ci: Create separate `composer.json` for testing.

## v0.0.8
* feat: Deprecate `AXEWP_PB_HOOK_PREFIX` constant in favor of `Helper::set_hook_prefix()`.
* dev: recommend installation via Strauss.
* chore: exclude `assets` and `bin` from distribution.
* chore: use FQCN in docblocks.
* chore: fix various code smells.

## v0.0.7
* fix: ConnectionType::get_connection_args() should call ::connection_args().

## v0.0.6
* feat: only create classes if not already available.
* fix: scope type_prefix filter to plugin with `AXEWP_PB_HOOK_PREFIX` constant.
* chore: update composer deps
* ci: test library and plugin scaffold separately.

## v0.0.5
* feat: move explicit 3rd party dependencies to doc-blocks.
* chore: update composer deps.
* ci: update GH workflows. 

## v0.0.4
* dev!: Renames the Hookable interface to `Registrable.
* feat!: Use Registrable when registering GraphQL types.

## v0.0.3
* chore: Update composer deps.
* chore: Exclude `wp-graphql-plugin-name` when installing as composer dep.

## v0.0.2
* dev: Build composer deps on PHP 7.4.
* chore: Update composer deps.
* chore: Remove unused PHPStan ignored error.
* ci: Update PHP version used for CodeQuality.

## v0.0.1
* Initial Release
