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
define( 'DB_NAME', 'exampledb');

/** MySQL database username */
define( 'DB_USER', 'exampleuser');

/** MySQL database password */
define( 'DB_PASSWORD', 'examplepass');

/** MySQL hostname */
define( 'DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

 /**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e45552367ccc92de36ed9e0eea093dff9c7ddc5b');
define( 'SECURE_AUTH_KEY',  'dd2e6b67dae75f5ab2b8c606722e2a4a975e358a');
define( 'LOGGED_IN_KEY',    '3766c3da593fab78fc42228ab2746f9a86a6a137');
define( 'NONCE_KEY',        'ca95f4c0d65e8b2c6e9c3a2da455ddf15f20b11d');
define( 'AUTH_SALT',        'afab8d2ba0103499a3033f62e7715f136891d51e');
define( 'SECURE_AUTH_SALT', 'e593db32d93f185665f721805dbac212687f971e');
define( 'LOGGED_IN_SALT',   'f3e28280f621cfec804edb63ce30f085ffb059b8');
define( 'NONCE_SALT',       '9306b58caffab8896b9e34422d44f78ac61be87b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );


/*********************************************************************************************+*/

/* Configure HTTP Proxy Server, Hint: macOS does not provide Docker Bridge under 172.17.0.1, thus we use the provided host name to access services on docker host. */
define('WP_PROXY_HOST', 'host.docker.internal');
define('WP_PROXY_PORT', '8082');



