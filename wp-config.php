<?php
/**
 * Configuração do WordPress para CETESI
 */

// ** Configurações do MySQL/MariaDB ** //
define( 'DB_NAME', 'cetesi' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '127.0.0.1:3306' ); // Mudança aqui: IP específico + porta
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', 'utf8mb4_unicode_ci' ); // Mudança aqui: collation específica

// Configurações adicionais para MariaDB
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT );

/**#@+
 * Chaves únicas de autenticação e salts
 */
define('AUTH_KEY',         '>GFjA-yU[}~88c.&t`@IHD6?f#GIKj)Y|_T1(ZnsaJ9A`2[~I0-:#1wP|bGZZ5:5');
define('SECURE_AUTH_KEY',  'C?i^&U[O:J?}139guF}WzMWcNs]+x+Hti,.xO|q-H9$5~Bkg=T1MW>+6rc-zj$$e');
define('LOGGED_IN_KEY',    'sO7Y.F!|XZJQ> ?|v^H<<YXdBHs:?[+q4;!f?0B0xM|lVVI1&>kyZ</6_~vRa>-f');
define('NONCE_KEY',        'N{wPjU>cyo|?0dUl~cJYC 42#VCHoA+@Z|]++P@e,m%HPGWMa}tAkR~h)AWpk81}');
define('AUTH_SALT',        'xYG2K&=D!iIdtfl#/Fn9O2pfq>mV=^glHb@^h#)&YUtS}X}>K|!24ELt$lPe[)%t');
define('SECURE_AUTH_SALT', 'ZNUX][8q_zDiwABB 0-7L}A:sB&zmw{~}L?i0t}_C :q!>n>Vk-?PJq#[o_6w`o|');
define('LOGGED_IN_SALT',   'Is98<JDaMxDbd/6io6y]g^r(!I J8++,7;3WnAkbalWUDDjE}5&|(H<T>)ctz74h');
define('NONCE_SALT',       '(ds&6Z6RY&Jjd`<)U@d|e4Co&65;;b=)?en8;4Awx8E3%No@lG-im4&%+Z8xOkp-');
/**#@-*/

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Isto é tudo, pare de editar! */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';