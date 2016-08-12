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
define('DB_NAME', 'enjoy');

/** MySQL database username */
define('DB_USER', 'molinski');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '9XD{IoT(xOO7hw-&?;I$6S]2_M{0l~p%;|7DlI~m{Mt/oTT|/8v:/+)gt1e1=5R1');
define('SECURE_AUTH_KEY',  '+;to#I#Y<e!RckeA^*Q2[5#NS$M0%p<r!WV8nL)Qzv,qEG+<RzinV&C:+yz_h3),');
define('LOGGED_IN_KEY',    'Z,!A!gmu-p<T~@_nJ!#fEg??:]+FeT5DL1r/C ~N nWfT?b-)L),8td^$n9U@t s');
define('NONCE_KEY',        'LiL^i_/!^Ai7K;-zzA*[.6!pXgUe=2eaf%}F:SvfKMClJtOtsYZly,G,MMBmCC@N');
define('AUTH_SALT',        'JAzymi!aKhR*jr{m-L6X|Pr5 /o?Q;-9w7SvOM9HYJS}U._f#ap8E%[xqgd;H_Nw');
define('SECURE_AUTH_SALT', '_|fm8OhD2_n(a @/p-4a8c!ET`8`X]>!Xtj>b1B$,M4=_-aUXDAu~&@@ PJE{qv{');
define('LOGGED_IN_SALT',   '#$6|V~BhMXKC<0xJs7i|$$v/483GH|so-en9ugM2F0}:yn:E)&8#CH+^p@v:S/q7');
define('NONCE_SALT',       'lHV p$mq[,(3xns^F+kU$NN/f?:bWhxj0B26f_VLnGu]=,J>`Hw`7NP_e8]K/~S*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ej_';

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
