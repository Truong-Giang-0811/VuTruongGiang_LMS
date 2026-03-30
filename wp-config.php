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
define( 'AUTH_KEY',         'WU.y(B{dtKE8?qJ-Sg@#O2|2G,@b8CDviF$rFHZ-hCuP3g~L+SqKG%{UpAZ_)L2U' );
define( 'SECURE_AUTH_KEY',  '!3;Ku>9]*}t+%w^`^OJ8Ts[%4mNdj1|fPY/rk05@!6_#}7[;Q1}[n,:}.OI[%t M' );
define( 'LOGGED_IN_KEY',    '}Y|h=q`d+RhB6oy=JQ<O} Q5FWQ:_;y`HIsszc$rJ$Fn/0O*2:!(bburyIa@V6?3' );
define( 'NONCE_KEY',        'Nj64Mx:# Lbrto<7q6qlm9pM~*PwZ3<zFW3%Z]aWnj*S8%zk]L0~$wdtjMuH}exr' );
define( 'AUTH_SALT',        'J:sE1X2VU18Z}s*O3%vu4w-#Fv2*Of|9spcMoWkMpP!BN(LxZa$`=.*LF,LGzRS)' );
define( 'SECURE_AUTH_SALT', 'W_nDL=3C#26e$g>9p=!P:#J*M!2!XV|pLa4fbY8g?tW/-^pUJo%9+GV!7Yk.Li:U' );
define( 'LOGGED_IN_SALT',   'ha[_GMYZtWn^.2:=dJoRt0?Ns0Vds]&AId|[PxB_NoY[XnEDod%B?*2o+|4;XlRD' );
define( 'NONCE_SALT',       '<`co7JayHqISRUK:yH*D{r;E/+NHgYMhq,M/p0=R),MBTs-YUicBhI>t7R+1|&Ze' );

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
