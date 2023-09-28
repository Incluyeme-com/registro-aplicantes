<?php
/**
 * Copyright (c) 2020
 *
 * Developer by Jesus Nuñez <jesus.nunez2050@gmail.com> .
 */

include_once dirname( __DIR__, 1 ) . '/lib/WP_Incluyeme_Login_Countries.php';
header( 'Content-type: application/json' );
if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {
	$verifications = new WP_Incluyeme_Login_Countries();
	if ( isset( $_GET['user'] ) ) {
		echo $verifications->json_response( 200, $verifications::getUser( $_GET['user'], $_GET['applicationId'] ) );
		
		return;
	}
}

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	$verifications = new WP_Incluyeme_Login_Countries();
	$postData      = file_get_contents( "php://input" );
	$data          = json_decode( $postData, true );
	if ( isset( $data['selectedTags'] ) ) {
		echo $verifications->json_response( 200, $verifications::updateTags( $data['userID'], $data['selectedTags'] ) );
		
		return;
	}
	if ( isset( $data['commentsNews'] ) ) {
		echo $verifications->json_response( 200, $verifications::updateComments( $data['applicationId'], $data['commentsNews'] ) );
		return;
	}
}
