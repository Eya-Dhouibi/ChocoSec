<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'if0_38046215_wordpress' );

/** Database username */
define( 'DB_USER', 'if0_38046215' );

/** Database password */
define( 'DB_PASSWORD', 'gFfS1VBpTSzN' );

/** Database hostname */
define( 'DB_HOST', 'sql205.infinityfree.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'hctizznmegx91sffoei3dluotqzby9sjkb3dwbqzbbnf5vyp8blgblrlw0oml6du' );
define( 'SECURE_AUTH_KEY',  'w4djhp9swlcddcc2n757wldmij7ecpwnhhjp1m705zqsthzspwqt4a0o0oop0e0f' );
define( 'LOGGED_IN_KEY',    'e7ezmdl3itpbbttdlls4glvpv1xfzwluqbjfxqxanco05tqolw9222fixhkbnvie' );
define( 'NONCE_KEY',        'zw2xwfv9wjwuwmh5aabjbsngfxsh5ikzxllsifldmkyaoq9lpmgvsbevvis6nt7o' );
define( 'AUTH_SALT',        'futyl4a2fob9jafpt4emtxht4ep46arp38vnlvsyunnxbenlypqyrktouexnink5' );
define( 'SECURE_AUTH_SALT', 'fi6s0nzadaicxugakfm67d3gwqvtl8tma1jfkvn6p4stuqg2uab1ud4gmwtuvtio' );
define( 'LOGGED_IN_SALT',   'vswphbm0iufihjz5hexkrt2zjuyqzw3m3ukafcyrjodrulrjuvrwsl93dspujqww' );
define( 'NONCE_SALT',       'tk6mbydrfy62ug4q6il4syjknrjsmahffkd7rztley48xdopunlvlnogoezktfq1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpyb_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';