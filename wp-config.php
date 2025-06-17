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
define( 'AUTH_KEY',         'Wo(ax^|l%EG)xc/4HkaxjuX6O!^83Ix4[Os<S)NLHQ~?>*[Qr3>*/tu/KwV!4+5(' );
define( 'SECURE_AUTH_KEY',  ' R~@6<fwQBwHd^&`9;I5Qm7h<oGv?CHO,^wv6:Tbg2kaJnN)63v)R5hiZB?{2G0n' );
define( 'LOGGED_IN_KEY',    'EA{|,*p}DC*m:E06U2ib/56VVBkIqwC:QX<OCG|>gPbAwpwuU4_tgaa<6#<sC)EX' );
define( 'NONCE_KEY',        't#l#+f-gN:Sj s>QS~|HY+Xu1ufNG^Tk]N9Qy#vJCIDS>J%sjU-T/Gu(Zy;%?N0.' );
define( 'AUTH_SALT',        'rhcH8G}mWE<=ODfFK-xLcXQ#vF{6vl,X;TZ{r<:p^D~&`P@ p[0Cd+Lu),Nfz+7K' );
define( 'SECURE_AUTH_SALT', '//T]q*`y<RzGo|!k6mVW^$*2ybjp57g^oGv{Oc/e1Zi6,0X,_TN)!`+=p#5pA7kN' );
define( 'LOGGED_IN_SALT',   'Y0{_hoVNDJ*9URY:.|YbTOw5k~x~p q|%[Mx9C2>i#A2jsAKBpGwD=T=23;is(:0' );
define( 'NONCE_SALT',       'cdaz 9E(ensJ~]M1GnWyi;<-NK/q*1APFZ:gHmmqk]]C(pwcw-l*<=f&*bd[DEJI' );

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
