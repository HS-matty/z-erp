<?php
/*
* Z-ERP Standart Library (Z-ERP STL)
*
* This file is published under RADMASTER PUBLIC LICENSE (RMPL)
* radmaster.net/public-licence.txt
*
*/

include_once('Std/Class.php');

class Zerp_Std {

	public static function loadClass($class_name,$base_path = ''){

		$class_name_array = Zerp_Std::parseClassName($class_name);

		$class_file = $base_path.'/';
		foreach ($class_name_array as $key => $value){

			if($key > 0) $class_file .= '/';
			$class_file .= $value;
			

		}
		$class_file .= '.php';

		$success_flag = false;
		
		if(file_exists($class_file)){
			
			include_once($class_file);
			$success_flag = true;
			
		}else {
			throw new Zerp_Std_Exception('Cannot load file '.$class_file);
		}
		
		return $success_flag;
		
	}

	/**
	 * Enter description here...
	 *
	 * @param string $class_name
	 * @return array
	 */
	public static function parseClassName($class_name){


		if($class_name) $class_name_array = preg_split("/\_/",$class_name);
		else $class_name_array = array();


		return $class_name_array;


		/*$class_name_parsed = '';
		if(count($class_name_array) > 1){
		foreach ($class_name_array as $key=> &$_class_name){
		if($key > 0) $class_name_parsed .= '/';
		$class_name_parsed .= $_class_name;
		}

		}*/


	}




}

class Zerp_Std_Exception extends Exception {

}
?>