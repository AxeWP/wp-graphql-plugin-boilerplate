![WPGraphQL Plugin Name logo](./.wordpress-org/banner-1544x500.png)

# WPGraphQL Plugin Name

@todo Your description here

- [Join the WPGraphQL community on Slack.](https://join.slack.com/t/wp-graphql/shared_invite/zt-3vloo60z-PpJV2PFIwEathWDOxCTTLA)
- [Documentation](#usage)

## System Requirements

- PHP 7.4+
- WordPress 6.0+
- WPGraphQL 1.8.0+

## Quick Install

1. Install & activate [WPGraphQL](https://www.wpgraphql.com/).
2. Download the zip of this repository and upload it to your WordPress install, and activate the plugin.

## Supported Features

@todo list what the plugin does.

## Usage

@todo explain how to use your plugin.

## Testing

This plugin uses [PHPUnit](https://phpunit.de/) and [`@wordpress/env`](https://www.npmjs.com/package/@wordpress/env) (wp-env) to run its test suite in a local WordPress environment.

1. Install [Node](https://nodejs.org/) (see `.nvmrc` for the version) and [Docker](https://www.docker.com/).
2. Run `composer install` and `npm install`.
3. Start the test environment with `npm run wp-env:test start`.
4. Run the test suite with `npm run test:php`.

To lint and run static analysis:

- `composer lint` (PHPCS) / `composer format` (auto-fix)
- `composer phpstan`

The equivalent `npm run lint:php`, `npm run lint:php:fix`, and `npm run lint:php:stan` scripts run the same commands inside the wp-env container.

## Credits

<a href="https://github.com/AxeWP/wp-graphql-plugin-boilerplate">![Built with WPGraphQL Plugin Boilerplate](./assets/built-with.png)</a>
