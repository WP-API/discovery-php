<?php

namespace WordPress\Discovery\WebDemo;

use Exception;
use WordPress\Discovery;

require dirname( __DIR__ ) . '/vendor/autoload.php';

$uri = isset( $_GET['uri'] ) ? $_GET['uri'] : '';
$legacy = isset( $_GET['legacy'] );

$output_page = function ( $content, $title = 'Discover' ) use ( $uri, $legacy ) {
	require __DIR__ . '/layout.php';
};

$load_template = function ( $template, $args = array() ) {
	ob_start();
	require __DIR__ . '/' . $template . '.php';
	return ob_get_clean();
};

$requested = $_SERVER['REQUEST_URI'];
if ( $requested === '/style.css' ) {
	header( 'Content-Type: text/css; charset=utf-8' );
	readfile( __DIR__ . '/style.css' );
	return;
}

if ( empty( $_GET['uri'] ) ) {
	$output_page( '' );
	return;
}

try {
	$site = Discovery\discover( $uri, $legacy );
	if ( empty( $site ) ) {
		$error = "$uri does not appear to be a WordPress site (no API header found)";
		$output_page( $load_template( 'error', array(
			'error' => $error,
		)));
		return;
	}
} catch ( Exception $e ) {
	$error = sprintf(
		'Error occurred while trying to discover: %s (%d)',
		$e->getMessage(),
		$e->getCode()
	);
	$output_page( $load_template( 'error', array(
		'error' => $error,
	)));
	return;
}

$output_page( $load_template( 'details', array(
	'site' => $site,
	'uri'  => $uri,
)));
