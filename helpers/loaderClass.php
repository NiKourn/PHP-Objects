<?php

class loaderClass {
	
	/**
	 * folders have to have the same name with the files inside.
	 * @var string
	 */
	private string $folder_path = 'helpers/*';
	
	public function __construct() {
		$this->implement_includes();
	}
	
	/**
	 * Gets the directory names
	 * @return array|false
	 */
	private function get_directories(): array|false {
		return glob( $this->folder_path, GLOB_ONLYDIR );
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
	
	private function folder_conditions( $needle, $filenames, $path ): void {
		if ( str_contains( $filenames, $needle ) && str_contains( $path, $needle ) ) {
			include_once $path . '/' . $filenames;
		}
	}
	
	/**
	 * Include everything in include/ directory
	 * @return void
	 */
	private function implement_includes(): void {
		
		foreach ( $this->get_filenames() as $filenames ) {
			foreach ( $this->get_directories() as $path ) {
				
				$this->folder_conditions( 'trait', $filenames, $path );
				$this->folder_conditions( 'interface', $filenames, $path );
				$this->folder_conditions( 'abstract', $filenames, $path );
				$this->folder_conditions( 'class', $filenames, $path );
				$this->folder_conditions( 'template', $filenames, $path );
				$this->folder_conditions( 'function', $filenames, $path );
				
			}
		}
		
	}
	
}

$loaderClass = new loaderClass();