<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'cinefestivais' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'v4P s@s0*_/rQamEFCW0uA<GCu|)w#BVZ_z)u6!8=~3Z;<c#v)Qh u:=D`qX}-vr' );
define( 'SECURE_AUTH_KEY',  '8@qS:T:M`#YFX0`)8$S:*9hcRzGkk{v4D#O:w5&PRXE_Mtkgw`B@whHL2tu[6~? ' );
define( 'LOGGED_IN_KEY',    '+>4y$$KW001nnuXC|}[K45 S5ZxE+8MKW=9KZ{1 trNr.|`Wkw{yt7!owoC4#@:g' );
define( 'NONCE_KEY',        'XVO`bO!9{hArhp2V[ubn%b,*wf!}CKvK?FIs*AM[ 9#h=fHgGm49Dz!BBB*)4Eev' );
define( 'AUTH_SALT',        '`IRge|n]bZq*t~<i=pw3N?<YL8)P%9]sd?5VD?!H=9dxEa(41V{^)`~%+RkOZC/%' );
define( 'SECURE_AUTH_SALT', 'H/B0{:%@5x]Fq]qF->qc9&*;t&}>z_Hv)Jz]i_nkN~_cX rAvVR qQQ9Mo7<x^L(' );
define( 'LOGGED_IN_SALT',   'P[ze=K D|U!SHb> ]cyPu {-R9NLSn.;?@s[wF#`h9T A3.o7]IGWVop%j&w{wXU' );
define( 'NONCE_SALT',       'PmZ.Pg|bjWSB0,,jEQ)`Udj?GUIiJDOp4XJ*o iWtAHig)g=5PW=@hie@P6(=?^!' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');


define('FS_METHOD','direct');


