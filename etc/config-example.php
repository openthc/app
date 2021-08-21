<?php
/**
 * OpenTHC Main Configuration File
 */

$cfg = [];

$cfg['application'] = [
	'id' => '',
	// base = https://app.openthc.dev
	// logo = https://cdn.openthc.com/img/logo.png
	// icon = https://cdn.openthc.com/img/icon.png
	// lang = en_US
	// name = OpenTHC
	// email = 'help@openthc.com'
	// phone = '+1 855 976 9333'
	'salt' => '',
];

$cfg['company'] = [
	// name = 'OpenTHC, Inc.'
	// address = '1752 NW Market St #955'
	// city = Seattle
	// region = WA
	// postal = 98107
];

$cfg['database'] = [
	// Auth Data: Contact, Company, Service
	'auth' => [
		'hostname' => 'sql0',
		'username' => 'openthc_auth',
		'password' => 'openthc_auth',
		'database' => 'openthc_auth',
	],
	// Main Data: Contact, Company, License
	'main' => [
		'hostname' => 'sql0',
		'username' => 'openthc_main',
		'password' => 'openthc_main',
		'database' => 'openthc_main',
	],
];

$cfg['redis'] = [
	'host' => '127.0.0.1',
	'hostname' => '127.0.0.1',
	'database' => '0',
];

$cfg['statsd'] = [
	'hostname' => '127.0.0.1',
	'host' => '127.0.0.1',
	'port' => 8192,
];

$cfg['openthc'] = [
	'b2b' => [
		'hostname' => 'b2b.openthc.dev',
		'secret' => 'app.openthc.dev-secret'
	],
	'cic' => [
		'hostname' => 'cic.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'data' => [
		'hostname' => 'data.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'dir' => [
		'hostname' => 'dir.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'lab' => [
		'hostname' => 'lab.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'menu' => [
		'hostname' => 'menu.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'pos' => [
		'hostname' => 'pos.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'ops' => [
		'hostname' => 'ops.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
	'sso' => [
		'hostname' => 'sso.openthc.dev',
		'secret' => 'app.openthc.dev-secret',
	],
];


$cfg['metabase'] = [
	'hostname' => 'meta.openthc.dev',
	'username' => 'root@openthc.com',
	'password' => '',
	'embedkey' => '',
];


$cfg['google'] = [
	'map_api_key' => '',
	'map_api_key_js' => '',
	'font_api_key' => '',
	'recaptcha-public' => '',
	'recaptcha-secret' => '',
];


$cfg['leaflink'] = [
	'username' => '',
	'password' => '',
];


return $cfg;
