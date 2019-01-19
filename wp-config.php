<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ravinblepbase');

/** MySQL database username */
define('DB_USER', 'ravinblepbase');

/** MySQL database password */
define('DB_PASSWORD', 'Quetsu2018');

/** MySQL hostname */
define('DB_HOST', 'ravinblepbase.mysql.db:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zonXbfXoej9z6//FdTbg0p4YJwcHzG56UwXwRY4V2V1acNsiYkjIbmm/Hk1o');
define('SECURE_AUTH_KEY',  'KmziZMUW76toTHILxT7CxFg9hUoOm0QJXgHjDoYt91/JwNMRGLs9GCxUnzBR');
define('LOGGED_IN_KEY',    'N25cTP1WCU93zMSlfl6PHsLSAlDwAdvQ/3dvEFo0jCwLD1XjOJTUIq4Q6mO+');
define('NONCE_KEY',        'lbG50k+A40C/fQy1Uq9FR698cKnn8BMxM8quAVpCSqx1GxgCWOHx5gZOaWAv');
define('AUTH_SALT',        'GYVbekeb9ztkTXcK/8q7AehiqtHv3GOdmjRpSVoXtnqTUh1j0uwVxKyeTfeQ');
define('SECURE_AUTH_SALT', 'xQ6LPgsoj6p7hLJs+jEDoTROX1J8FCRt4d/+N+Ga4Jhkdt/TdYpbA2HVkMC5');
define('LOGGED_IN_SALT',   'Rrvm9jQALi5SkE088E+Te+6QxlIPkoXgqQd6aBG2qkDbyBH9z7b3WWxZQ0lF');
define('NONCE_SALT',       'hCZe+7+ThJuiMQ/vdFA5T0wC4EL6zFpLIhg8VGvhrws0U+qR0gFhRep8EfxA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wor4434_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
