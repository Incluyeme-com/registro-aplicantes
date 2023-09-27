<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/wp-load.php';

class UpdateData {
	private static int $userID;
	
	public function __construct() {
		self::$userID = get_current_user_id();
	}
	
	public function setMetaData( string $metaName, string $metaValue ): void {
		update_user_meta( self::$userID, $metaName, $metaValue );
	}
}