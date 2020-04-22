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
define( 'DB_NAME', 'id13340919_wp_53fe98cadc17e44a8ca5d65827aac646' );

/** MySQL database username */
define( 'DB_USER', 'id13340919_wp_53fe98cadc17e44a8ca5d65827aac646' );

/** MySQL database password */
define( 'DB_PASSWORD', '43f44858061aa4427659205dfccc75cf0e2149af' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '4$}sInK:T[q&Aw7j 9Cf!0I* O.R?~ynYRy~0V9Lp&bW Wnoh2~`%T&@tf#?`h],' );
define( 'SECURE_AUTH_KEY',   'L1ll~:yY0 Ap$V;iAhLLKv[8j(GNKf_dB*VcOxWO9Bh*Kbz.fZ]Z&yMzpFz8^:%$' );
define( 'LOGGED_IN_KEY',     ')Ppyy+XTVJc5WOXe(L+=F1R|wX]d^gOfEHY2Byrv|V.p1|%*BU3}`uL1MpXgpZ^Q' );
define( 'NONCE_KEY',         'Z:wMo4DWF#i7V$VHYAaBC<EoSq{:8U0tbyc!6w7%Y8!e>a-jz|+#N^|KUQQ:J]2q' );
define( 'AUTH_SALT',         ',`Ro@p88Q[F=:FO,q9A!1VH*fufOF>oWI(}izUnG96?vcj.xG8b2y~Z_3MdBRJ;i' );
define( 'SECURE_AUTH_SALT',  'k3zxywW+5~!,MLO}B@8Dtj]OnV(D^,Swg2 F lmsHN<7$Qj UxHG9w?z@g{_xh`X' );
define( 'LOGGED_IN_SALT',    'GL+bY]D6vEE+:_XjYzf.D1~Ci&OIlEpKzm)wT,K<+l;Fztq[xoX~1GbbF)G:[k1F' );
define( 'NONCE_SALT',        'H|s oc_Io6v!Y^C/,sGQI`s2JB^L)eq(=*{ eFI`Q3Ac}C[/M7fF?vKQzPDK-0B;' );
define( 'WP_CACHE_KEY_SALT', '`+h|t?C>%m&^gP4OUUSD`kL]>%>cZ+PaQY7B Dy&=mqt2&QT{%|F(`C4i3bA p;(' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
