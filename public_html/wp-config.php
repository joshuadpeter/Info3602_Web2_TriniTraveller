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
define( 'AUTH_KEY',          'P|~G| YvXqbI6P1WVE>O-no$.]vpO=g|de|jjB!s8iX8hIG.*%Ad%&Ul6[V`otY/' );
define( 'SECURE_AUTH_KEY',   'p]8] HhfY:[2p$=A$@tg0i~z96sWWmOxN6 Q-o9@v_4PeHaYIw((CT.-G[q8y4x`' );
define( 'LOGGED_IN_KEY',     '?CDSY#E0V`|yfD/wd|f?8lyvpkb)XX1URUXl]g^g1i?e,.,-%X!gxksmnM5(F`5`' );
define( 'NONCE_KEY',         'Bh@D>Dri+{/(w*@@<K5qpQs=Vtt,Gj}wDA+l|$apscMDp-y,b-5oV}a#h)|4i186' );
define( 'AUTH_SALT',         '2NmwFVs2Av1*lA}*=E[7EZ&KyLf_Wpxt~>WR;q^qr.-s./-}<d3]q_t|ra0g{{_,' );
define( 'SECURE_AUTH_SALT',  '#a-.c6}iXdz:8WOKD(mW(d82JFj9TAHyesNk={k_)n02?C[?-K*bK|T2Rw^wY+WQ' );
define( 'LOGGED_IN_SALT',    'z hlE&rUR%[iGu9Z#F1`yFt[*d496mEp*T_2OOb 5:=yz;I$IKp|Dp2t@(>Js/-]' );
define( 'NONCE_SALT',        'l?6vB=&e[MFy7g@@ItzHKxV3k_C&.!!O8<k]ogc^6jO88:sXH%jZYSN3pe|ZGxfj' );
define( 'WP_CACHE_KEY_SALT', '~Ho<IK}Uuft_)2k:S 9`8e|P8uY 5p{%-ugft<s_o}zabo#-y8Vvzxe_!$fk)X@-' );

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
