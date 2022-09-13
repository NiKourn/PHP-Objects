<?php

class templateClassHelper {
	
	private string $folder_path_search = 'includes/*';
	
	private static string $folder_path = 'includes/';
	
	
	/**
	 * Gets the directory names
	 * @return array|false
	 */
	public function get_directories(): array|false {
		return glob( $this->folder_path_search );
		
	}
	
	/**
	 * @param $path
	 *
	 * @return void
	 */
	public static function header( $path ) {
		include_once self::$folder_path . $path . '.php';
		
	}
	
	public static function footer( $path ) {
		include_once self::$folder_path . $path . '.php';
		
	}
	
}

$template_class = new templateClassHelper();
