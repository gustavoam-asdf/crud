<?php

namespace App\Entities;

class ApiResponseModel {
	public $ok;
	public $status;
	public $action;

	public function __construct( bool $status, string $action ) {
		http_response_code( $status ? 200 : 500 );

		$this->ok     = $status;
		$this->status = $status ? 'success' : 'failed';
		$this->action = $action;
	}

	public function toJson() {
		echo json_encode( $this );
	}
}
