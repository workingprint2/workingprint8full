<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache


/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp8');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Nz_7E^39$:xCohv+XamVykikfRcR"TY7K/CNv?AppNAl6c*2%Me;VsKe;14$GTjm');
define('SECURE_AUTH_KEY',  '"lr)7:Ro!Zv/ASi#~%&GYo(Sr5RO"bUZh??zKemRD1We%:"&|H+kf1`|K8+oDJax');
define('LOGGED_IN_KEY',    '3R(`Q(I4bI%E`vgJZog8$r!5tJCo:UlC0qxg9W5"~zu^#8dhuB0w$vG0(M8jy&;R');
define('NONCE_KEY',        'SZ9X~_b"ej7x;6&2^bdIcgyzg@&VP/$(AYz9B@b`_hpF(Ids@oCgM:u?y!k?77FA');
define('AUTH_SALT',        '"lYA;:ANnSYVW8Sgl_WYajUjF&+B4(X8&b?@c1tBMw3XjHf~_0i_y2*Eirq"re5s');
define('SECURE_AUTH_SALT', 'rNg/hS?aK/*xH0ICkHF&P|pVX&0pv@GrY4y8PQ2Ep_@2k)ydqckcpD"NXn:rUE0o');
define('LOGGED_IN_SALT',   'q!m82MR`te2|n`1iA5qgpnn%!)Nw33fVYXG@djSmoso5o%wI)5L;60P9n)cv0dzY');
define('NONCE_SALT',       '$Gup0D(VqKm"h8;IfuH?UPO"|ktjuBf7L_+2OU)@xyYv~MPeRs;NBE9nQL?aM"_Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_cwx2kk_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

