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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ikigaima_a2wp313' );

/** MySQL database username */
define( 'DB_USER', 'ikigaima_a2wp313' );

/** MySQL database password */
define( 'DB_PASSWORD', '6pDSp!r]05' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xcxv44ofg7zoebswkujeeelgnneeoeqfu89fyu6qgwklgcn1bknchw5edyib3rbf' );
define( 'SECURE_AUTH_KEY',  'pi2rzcty2gv9wewnyauwxzmmhlfqzmwohvecgkbmdlxs5aaqcbjexczeicqf3mba' );
define( 'LOGGED_IN_KEY',    'os7wztvnzhufat0xyxfrkkg1jclo0zucg3jstawkjzgclveuuoqnzypabu5c69vf' );
define( 'NONCE_KEY',        'rdkevgibpmhbdfa7brcycaxwfpiwj9wfohgmequzcnefkobovzfgj3dd2ntp0ag4' );
define( 'AUTH_SALT',        '4fw81vkjlfk1h8gnghxbqbnypugwvizmynhk4easgfvvhlsub0yxpq2hy4gfq6j2' );
define( 'SECURE_AUTH_SALT', 'ifioubf9444homi11hejfrawsgqzhfi0ioarvwwedvqtbqkiyqsl4jljiz0ooja6' );
define( 'LOGGED_IN_SALT',   '7oqsn44gmgpvjhxu1qxyus7u3t3d0uuifme2zprs89t9dir7qiyu2h4nnrsm02oh' );
define( 'NONCE_SALT',       'pglhty5acmgufhdhcptfd3pzeezr5sjvjas2vmediec6fzuied97yndrf0z1pz4x' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpwl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
