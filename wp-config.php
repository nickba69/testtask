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
define('DB_NAME', 'testtask');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'vDj^K.AkDSv*U)}uh(-Md:_Wwrrm/)YdDl7pqR5+[advwMt9N1s]W+-v4DFpwaNC');
define('SECURE_AUTH_KEY',  'mROYT24T;b?21b;$}UlJ$OI/q>BP&Y935;]yCbn5G@bf*VI>{4xE]p^ko@!pRBF4');
define('LOGGED_IN_KEY',    '=wffNif/y3C(x=%h$@:8h2+N-eyZ#A2|]l/6tV(heNdr3Dk?t&$$YJ~D_Cwdkf]=');
define('NONCE_KEY',        '800(BY}W.^fo(,<V)j!(/:`;`y@;svULZ-L&N@,V LTI|VS,v$,oh&0CIvVbGI3~');
define('AUTH_SALT',        'Bo<c<w69r[wL=PfG1$wY<eIS>wwvajP}<``!>~+f*/SA/)ded@EJ5Q$SL)-0iaQv');
define('SECURE_AUTH_SALT', 'nhun.tg`M`MH%w]a{9IUg[(YjcsdT-T6|VvEpdp Q_*QZQ_V8)B&i2Lgmxxk$m<O');
define('LOGGED_IN_SALT',   '/@iqH])SHjGUj$SWuqFehWAPK7!=>NXt0_H.*j%GRt2&dFS!_liJ2H4bn^m{;zyr');
define('NONCE_SALT',       '{>bOw(jLjl=R5G=DQk=P_f-`#zgcnC}GOeJ.D}_cP&JAcdU!0+/?WY-7r5PAj%bf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
