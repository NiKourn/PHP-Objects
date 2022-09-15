<?php

class templateClassHelper {
	
	
	private static string $folder_path = 'includes/';
	
	
	/**
	 * @param $path
	 *
	 * @return void
	 */
	public static function include( $file_name ) {
		include_once self::$folder_path . $file_name . '.php';
		
	}
	
}

new templateClassHelper();
