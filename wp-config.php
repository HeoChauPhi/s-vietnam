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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demowp_svietnam' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '1' );

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
define( 'AUTH_KEY',         '-VxO>Tpe&w$w2:7 rhr<!!Egiv^;.JlIsY4R3mK#m&*g_bo=9JU>0P`T_^az(2_^' );
define( 'SECURE_AUTH_KEY',  '~M[S%yiWT5z_XCxDmq3j=Oe<6#Ktk|.xl>u1R73qG?7Z-q2x4y88D>#BfXU,xs6:' );
define( 'LOGGED_IN_KEY',    'zZbzP6W3R#@q-7*|^c#BXLMVu49~W&rB3e(ws#1O=yim!6FLN6_i~+[-4j;pT&uX' );
define( 'NONCE_KEY',        'R>5SlQjP5wvigh:bvGm=;U2;0U0f(EB%G=UlF9k d1z*tSa$Fj31R_;)@mvXbo6Q' );
define( 'AUTH_SALT',        '2:2 *lEqtsL d$Q_I_Zd#7n,T[z^_9aN[aNX2IZd>)W1=91y,Zs{{:&(^a15jBR{' );
define( 'SECURE_AUTH_SALT', 'F1R70f`:p$mS$ca0j~jjf6?!yDvM[;Je.]k:pF5|fi!SZE;D1-b27jhMEW7:XMD|' );
define( 'LOGGED_IN_SALT',   '=4EI2(0!K*rPb${v]?&kIDEg-(JoONU }B7r!Uxk=#<zv/IP)(d{3$<dBl m41JT' );
define( 'NONCE_SALT',       '8i47Ap$[rw|(Q}Oy)%XMWy,r2w-7p8N$2YRf{7(?5=(PFan0]J8?6u]Fp $]Jlv_' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == "localhost") {
  define('WP_HOME', "http://s-vietnam.local/");
  define('WP_SITEURL', "http://s-vietnam.local/");
} elseif (isset($_SERVER['HTTP_HOST'])) {
  // HTTP is still the default scheme for now. 
  $scheme = 'http';
  // If we have detected that the end use is HTTPS, make sure we pass that
  // through here, so <img> tags and the like don't generate mixed-mode
  // content warnings.
  if (isset($_SERVER['HTTP_USER_AGENT_HTTPS']) && $_SERVER['HTTP_USER_AGENT_HTTPS'] == 'ON') {
      $scheme = 'https';
  }
  define('WP_HOME', $scheme . '://' . $_SERVER['HTTP_HOST']);
  define('WP_SITEURL', $scheme . '://' . $_SERVER['HTTP_HOST']);
}


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
