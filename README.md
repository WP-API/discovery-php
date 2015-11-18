# WordPress API Discovery

This library allows autodiscovery of the WordPress REST API shipping in WordPress 4.4.

## Installing

This library should be installed via Composer as `wp-api/discovery`.

If manually installing (i.e. via `git clone`), be sure to run `composer install` after cloning the code.

## Using

The main entry point is the `WordPress\Discovery\discover()` function. Simply pass in a URL to discover the API.

```php
/**
 * Discover the WordPress API from a URI.
 *
 * @param string $uri URI to start the search from.
 * @param bool $legacy Should we check for the legacy API too?
 * @return Site|null Site data if available, null if not a WP site.
 */
function discover( $uri, $legacy = false ) {
```

This project also includes a demo web install:

```sh
php -S 0.0.0.0:9000 www/index.php
```

Then access http://localhost:9000/ to view the demo. It looks something like this:

<img src="http://i.imgur.com/sKD0FFt.png" />

## License

This project is licensed under the MIT license. See [LICENSE.md](LICENSE.md) for the full license.
