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
define('DB_NAME', 'myportfolio');

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
define('AUTH_KEY',         '!L3Sn6]S*c-chJ@y=qpt}A*9qdrjpl9L;jwqFH9D7idHaa&L!5R`P:S$z*>>XKtu');
define('SECURE_AUTH_KEY',  '_&`;.Mg^E4f~iOzI33qr(n8_t|NA{Q3u/2f& dg&J%YS`={n)b3sgrq)r80_%7/g');
define('LOGGED_IN_KEY',    'b0IMN&0oeD`+IBSzHP)t2N_&f+N|%mDimvp6q8oSVdhhd p4OB41hN_.0pG=B_2}');
define('NONCE_KEY',        '=1a?1*;oMw1g.@at*Mkl*6qNQ=OcV&Uej@#8$,NEWSH(QLh>0s2YMpBeXE+1[98:');
define('AUTH_SALT',        '~~J+m{$S=7+=7vC]IJiRq}pi -]1A5bZJDmdFw@t(Z%_zOh2uZt7r4K&xwU~#9Lf');
define('SECURE_AUTH_SALT', '$ujFLf20Nd3PYQ/GC[j3Hu~yPFo4+x?x0#7Odxr n #A6}bsiTE1~]qxcho8((TQ');
define('LOGGED_IN_SALT',   'z8OFF1paNoPk4G;wM:|pQ$o<jeL1dHq]VRkAbb,pWHh1Q_)x;8q}a!w?a|?&WU,o');
define('NONCE_SALT',       'E  -Tkfa-&IH-V+|s]{#^Po;YX$8HOa37}@LhJ,oii&w?WMPSSjY?.XT:znVX~x)');

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
