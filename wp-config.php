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
define( 'DB_NAME', 'second_wp' );

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
define( 'AUTH_KEY',         'KDB]5C`CvEQ%/Qb?NR[O+f4,~xI/R,W(2#~)(TcsZn#=~vbRdN|wz~N;rmy(q5x+' );
define( 'SECURE_AUTH_KEY',  '?p0xL,rzMfFG6wOqxw`5`287G_h8_ki7/SVuR1 j~>B`:8QL5qKVN]F>(laO>JI*' );
define( 'LOGGED_IN_KEY',    '@8xPmJM#}t GykSO)FM?},,RBPgx81<_RgA$2C6[5o8OT]`:x3Txt:(EK.*j/%5p' );
define( 'NONCE_KEY',        'pp.9o8tFXSsR4jD~ISI<rimLAKTRr=3t1ojIdHfIr,Yn>kZGtepb0!Er/peRs#e=' );
define( 'AUTH_SALT',        'J=zOP3$aCd8@gW2b&9BO%).zk2A^<L3[V4?i0mC&oh|r1LdY{{~_&mg,]cHx~{A~' );
define( 'SECURE_AUTH_SALT', ',*^&V#~t(W.?)q:5Jk{>z>_oUb4|Ap7xgV/F4MFm)Uies* }|Ls<:Va@0@Cg&T`u' );
define( 'LOGGED_IN_SALT',   'oV!w#(TY{Bc.2c.EI{zXcW5~wZ?bb^3gx%J.wvs%@r&2fk`bP~Q&>BiZf`{Cymn_' );
define( 'NONCE_SALT',       ')W7_&43J0.ku+]*3NHV-a`b/CIBM2]oX RsX+_+2(GbFlV^=vv#2T9*g!YshH?B,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_123';

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
