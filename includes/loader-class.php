<?php

class ObjectLoaderClass {
	
	
	public function __construct() {
		$this->implement_includes();
	}
	
	/**
	 * Gets the directory names
	 * @return array|false
	 */
	private function get_directories(): array|false {
		return glob( 'includes/*', GLOB_ONLYDIR );
	}
	
	/**
	 * Get the filenames
	 * @return array
	 */
	private function get_filenames(): array {
		$dir_array = $this->get_directories();
		$new_array = [];
		
		foreach ( $dir_array as $full_path ) {
			$remove_first_two_elements = array_diff( scandir( $full_path ), [ '.', '..' ] );
			
			foreach ( $remove_first_two_elements as $filenames ) {
				
				$new_array[] = $filenames;
				
			}
		}
		
		return $new_array;
	}
	
	private function folder_conditions(){
		
	}
	
	/**
	 * Include everything in include/ directory
	 * @return void
	 */
	private function implement_includes(): void {
		$get_filenames   = $this->get_filenames();
		$get_directories = $this->get_directories();
		
		foreach ( $get_filenames as $filenames ) {
			foreach ( $get_directories as $path ) {
				
				if ( str_contains( $filenames, 'trait' ) && str_contains( $path, 'trait' ) ) {
					include_once $path . '/' . $filenames;
					
				}
				
				if ( str_contains( $filenames, 'interface' ) && str_contains( $path, 'interface' ) ) {
					include_once $path . '/' . $filenames;
					
				}
				
				if ( str_contains( $filenames, 'abstract' ) && str_contains( $path, 'abstract' ) ) {
					include_once $path . '/' . $filenames;
					
				}
				
				if ( str_contains( $filenames, 'class' ) && str_contains( $path, 'class' ) ) {
					include_once $path . '/' . $filenames;
					
				}
				
				if ( str_contains( $filenames, 'function' ) && str_contains( $path, 'function' ) ) {
					include_once $path . '/' . $filenames;
					
				}
				
			}
		}
		
	}
	
}

$loaderClass = new ObjectLoaderClass();