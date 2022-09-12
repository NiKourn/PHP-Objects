<?php

class loaderClass {

	/**
	 * @var string[]
	 */
	protected $dir_array = [
		'includes/traits/',
		'includes/interfaces/',
		'includes/abstracts/',
		'includes/classes/',
		'includes/functions/',
	];
	
	public function __construct() {
	$this->implement_includes();
	}
	
	/**
	 * @return array
	 */
	private function get_filenames() {
		$array = $this->dir_array;
		
		$new_array = [];
		foreach ( $array as $full_path ) {
			$remove_first_two_elements = array_diff( scandir( $full_path ), [ '.', '..' ] );
			
			foreach ( $remove_first_two_elements as $filenames ) {
				
				$new_array[] = $filenames;
				
			}
		}
		
		return $new_array;
	}
	
	public function implement_includes() {
		
		$get_filenames = $this->get_filenames();
		
		foreach ( $get_filenames as $filenames ) {
			
			if ( str_contains( $filenames, 'trait' ) ) {
				include_once 'includes/traits/' . $filenames;
				
			}
			if ( str_contains( $filenames, 'interface' ) ) {
				include_once 'includes/interfaces/' . $filenames;
				
			}
			if ( str_contains( $filenames, 'abstract' ) ) {
				include_once 'includes/abstracts/' . $filenames;
			}
			if ( str_contains( $filenames, 'class' ) ) {
				include_once 'includes/classes/' . $filenames;
				
			}
			if ( str_contains( $filenames, 'function' ) ) {
				include_once 'includes/functions/' . $filenames;
				
			}
			
			
		}
		
		
	}
	
	
}

$loaderClass = new loaderClass();