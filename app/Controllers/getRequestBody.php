<?php
function getRequestBody() {
	$raw_data = file_get_contents( 'php://input' );
	return json_decode( $raw_data, true );
}
