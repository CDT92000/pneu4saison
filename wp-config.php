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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'oXT)@>j?wQhXl[ww>%I_.@ ,hS`@VUrh%%lwL]f%7kgl@pA`}n2x=LV=$~%^61GX' );
define( 'SECURE_AUTH_KEY',  'o8uazN>ufKA*0|E[-Bx 2*_d[vC(S[eJ}GJ;+y$~uU|P2-y`N^5+<!PZ3v_>Ho9o' );
define( 'LOGGED_IN_KEY',    '%VxbCD(#1w3UUa+V_ux>;rRG}g[VvufIc7;tO8o^Eh&K;pVF8D-KfoTZ`=JTr  2' );
define( 'NONCE_KEY',        '5zF^iK})/4Jk^}6A|i0]Qp`#g*CY)gP?Ltkb@sbhR9I3XXLXn:i8JGHA&};<ohO*' );
define( 'AUTH_SALT',        'x/ X~m_cZ>eJEI_(u&hYAou`6$r#ri+V<ZYs{en{(jz~W9BunWf z}+*8c#W3pi<' );
define( 'SECURE_AUTH_SALT', ' {Yx#~?_;>Ep((#E,6x.X$si&s2Jb~yvK=P7`Va T.6`/^sst]]/`p5hOmt>;<$F' );
define( 'LOGGED_IN_SALT',   'N;hcfY[<^J=dG^$whxnby&/R%o@_HLB0c!j|Y|4ovuM%=9AZ}5g:R53yoI]R^}C%' );
define( 'NONCE_SALT',       'tUJEs:BHV&vwi[!Ny2LQz8h!_QxV2-$8i:fO6,s/ZW},zSl;I7gTdZrO2YQ$DV;4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
